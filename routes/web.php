<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('company_get',[Controller::class,'getCompany']);

Route::post('/addcompany',[Controller::class,'companyStore'])->name('add');


Route::get('/dashboard',[Controller::class,'getData'])->middleware(['auth'])->name('dashboard');


Route::get('/user/logout',[Controller::class,'logout'])->name('user.logout');
Route::get('/companyedit/{id}',[Controller::class,'companyEdit']);
Route::get('/companydelete/{id}',[Controller::class,'companyDelete']);
Route::post('/companyupdate/{id}',[Controller::class,'companyUpdate']);

    

require __DIR__.'/auth.php';


//routing for employee tab

Route::get('/employee.details',[Controller::class,'getList']);

Route::get('/getemployee',[Controller::class,'getEmp']);
Route::post('/addemp',[Controller::class,'addEmployees']);
Route::get('/editemplist/{id}',[Controller::class,'getEmpList']);
Route::post('/updateemp/{id}',[Controller::class,'updEmp']);
Route::get('/deleteemplist/{id}',[Controller::class,'employeeDelete']);

