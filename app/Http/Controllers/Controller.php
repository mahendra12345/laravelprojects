<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function logout(){
         
         Auth::logout();

         return Redirect()->route('login')->with('success','User Successfully logout');
     }


    public function getData(){
         
          $companyData = Company::latest()->paginate(10);
         return view('admin.index',compact('companyData'));

    } 

    public function getCompany(){
         return view('admin.company');
    }


    public function companyStore(Request $request){

         $validated = $request->validate([
             'name' => 'required',
             'email' => 'required',
             'logo' => 'required',
             'website' => 'required',
          ],
          ['name.required'=>'Please Enter The Value It can not leave blank',
          'email.required'=>'Please Enter The Value It can not leave blank']
          );
          
         $logo_image = $request->file("logo");
         $name_gen = hexdec(uniqid());
         $img_ext = strtolower($logo_image->getClientOriginalExtension());
         $image_name = $name_gen.'.'.$img_ext;
         $up_location = 'backend/images/';
         $last_image = $up_location.$image_name;
         $logo_image->move($up_location,$image_name);

 
       $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $last_image;
        $company->website = $request->website; 

        $company->save();

        return Redirect()->route('dashboard')->with('success','Data Successfully Inserted!!');
             
    }


    public function companyEdit($id){

          $editcompany =  Company::find($id);
          
          return view('admin.companyedit',compact('editcompany'));
    }



    public function companyDelete($id){

        Company::find($id)->delete();

         return Redirect()->route('dashboard')->with('success','Data Successfully Deleted!!');
    }

    public function companyUpdate(Request $request,$id){

         $old_image = $request->old_image; 
         $logo_image = $request->file("file");
         if($logo_image == NULL){
            return "<h2>Please select Image </h2>";
         }
         $name_gen = hexdec(uniqid());
         $img_ext = strtolower($logo_image->getClientOriginalExtension());
         $image_name = $name_gen.'.'.$img_ext;
         $up_location = 'backend/images/';
         $last_image = $up_location.$image_name;
         $logo_image->move($up_location,$image_name);
         unlink($old_image);
              $update = Company::find($id)->update([
                   'name' => $request->name,
                   'email' => $request->email,
                   'logo' => $last_image,
                   'website' => $request->website,

               ]);

          return Redirect()->route('dashboard')->with('success','Data Successfully Updated!!');

    }



    public function getList(){
         $emplist =Employee::latest()->paginate(10);
        return view('employees.list',compact('emplist'));   
    }

    public function getEmp(){

        $comlist = Company::all();

        return view('employees.addemployee',compact('comlist'));
    }

    public function addEmployees(Request $request){
        $validated = $request->validate([
             'firstname' => 'required',
             'lastname' => 'required',
             'email' => 'required',
             'phone' => 'required',
             'company' => 'required',
          ],
          ['firstname.required'=>'Please Enter The Value It can not leave blank',
           'email.required'=>'Please Enter The Value It can not leave blank']
          );

        $employee = new Employee();
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->phone = $request->phone; 
        $employee->company_id =$request->company; 

        $employee->save();

        return Redirect()->to('employee.details')->with('success','Data Successfully Inserted!!');

    }

    public function getEmpList($id){
        $editemp =  Employee::find($id);
        return view('employees.editemployee',compact('editemp'));
    }

    public function updEmp(Request $request,$id){

       $update = Employee::find($id)->update([
                   'firstname' => $request->firstname,
                   'lastname' => $request->lastname,
                   'email' => $request->email,
                   'phone' => $request->phone,
                   'company_id' => $request->company_id,
                   ]);

      return Redirect()->to('employee.details')->with('success','Data Successfully Updated!!');


    }



    public function employeeDelete($id){

        Employee::find($id)->delete();

         return Redirect()->to('employee.details')->with('success','Data Successfully Deleted!!');
    }

    
}
