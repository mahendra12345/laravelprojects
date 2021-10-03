@extends('admin.admin_master')  

@section('admin') 


<a href="{{ url('/company_get') }}" class="btn btn-secondary" role="button" >Create New Company</a>

<hr>
<div class="row">
<table class="table table-hover">
  <thead>
    <tr>
      <h2>List Of Companies</h2>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Logo</th>
      <th scope="col">Website</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach($companyData as $comdata )
    <tr>
      <th scope="row">{{ $comdata->id }}</th>
      <td>{{ $comdata->name }}</td>
      <td>{{ $comdata->email }}</td>
      <td><img src="{{ asset($comdata->logo) }}" style="height:40px;width:70px;"></td>
      <td>{{ $comdata->website }}</td>
      <td><a href="{{ URL::to('companyedit/'.$comdata->id) }}" class="btn btn-primary" role="button" >Edit</a>
          <a href="{{ URL::to('companydelete/'.$comdata->id) }}" class="btn btn-danger" role="button" >Delete</a>
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
{{ $companyData->links() }}
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