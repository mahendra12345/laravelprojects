@extends('admin.admin_master')  

@section('admin') 

<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Edit  Employee</h5>
   <form action="{{ url('updateemp/'.$editemp->id) }}" enctype="multipart/form-data" method="POST">
   	@csrf
	      
  			 
       <input type="hidden" name="company_id" value="{{ $editemp->company_id }}">
   	<div class="form-group">
    <label for="exampleInputname">Firstname</label>
       <input type="type" name="firstname" value="{{ $editemp->firstname }}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
        @error('firstname')
         <span class="text-danger">{{$message }}</span>
        @enderror

     </div>

     <div class="form-group">
    <label for="exampleInputname">Lastname</label>
       <input type="type" name="lastname" value="{{ $editemp->lastname }}"  class="form-control" id="exampleInputName" aria-describedby="nameHelp">
        @error('lastname')
         <span class="text-danger">{{$message }}</span>
        @enderror

     </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="{{ $editemp->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">
    	@error('email')
         <span class="text-danger">{{ $message }}</span>
        @enderror
    </small>
  </div>
  

  <div class="form-group">
    <label for="exampleInputWebsite">Phone</label>
    <input type="text" name="phone" value="{{ $editemp->phone }}" class="form-control">
     @error('phone')
         <span class="text-danger">{{$message }}</span>
        @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>

@endsection