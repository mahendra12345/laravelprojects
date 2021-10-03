@extends('admin.admin_master')  

@section('admin') 

<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Create New Company</h5>
   <form action="{{ route('add') }}" enctype="multipart/form-data" method="POST">
   	@csrf
   	<div class="form-group">
    <label for="exampleInputname">Name</label>
       <input type="type" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
        @error('name')
         <span class="text-danger">{{$message }}</span>
        @enderror

     </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">
    	@error('email')
         <span class="text-danger">{{ $message }}</span>
        @enderror
    </small>
  </div>
  <div class="form-group">
    <label for="exampleInputFile1">Logo</label>
    <input type = "file" name="logo" class="form-control-file">

     @error('logo')
         <span class="text-danger">{{$message }}</span>
        @enderror
  </div>

  <div class="form-group">
    <label for="exampleInputWebsite">Website</label>
    <input type="text" name="website" class="form-control">
     @error('website')
         <span class="text-danger">{{$message }}</span>
        @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

@endsection