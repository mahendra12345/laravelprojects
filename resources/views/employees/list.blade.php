@extends('admin.admin_master')  

@section('admin') 


<a href="{{url('getemployee')}}" class="btn btn-secondary" role="button" >Create New Employee</a>

<hr>
<div class="row">
<table class="table table-hover">
  <thead>
    <tr>
      <h2>{{ __('list.title') }}</h2>
      <th scope="col">{{__('list.id') }}</th>
      <th scope="col">{{__('list.Firstname') }}</th>
      <th scope="col">{{__('list.Lastname') }}</th>
      <th scope="col">{{__('list.Email') }}</th>
      <th scope="col">{{__('list.Phone') }}</th>
      <th scope="col">{{__('list.Actions') }}</th>
    </tr>
  </thead>
  <tbody>
 @foreach($emplist as $emplists)

    <tr>
         
      <td>{{ $emplists->id }}</td>
      <td>{{ $emplists->firstname }}</td>
     <td>{{ $emplists->lastname }}</td>
     <td>{{ $emplists->email }}</td>
     <td>{{ $emplists->phone }}</td>

    
      <td><a href="{{ url('editemplist/'.$emplists->id) }}" class="btn btn-primary" role="button" >Edit</a>
          <a href="{{ url('deleteemplist/'.$emplists->id) }}" class="btn btn-danger" role="button" >Delete</a>
      </td>
      
    </tr>
   @endforeach
  </tbody>

</table>

<div class="container">
<div class="row">
  <div class="col-4"></div>
  <div class="col-4"></div>
<div class="col-4">
{{ $emplist->links() }}
</div> 
</div>
</div>

</div>
<style type="text/css">
  .w-5{
    display: none;
  }
</style>

 @endsection           