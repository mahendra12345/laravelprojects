@extends('admin.admin_master')  

@section('admin') 

<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Edit Company</h5>
   <form action="{{ url('companyupdate/'.$editcompany->id) }}" enctype="multipart/form-data" method="POST">
   	@csrf

   	<input type="hidden" name="old_image" value="{{ $editcompany->logo }}">
   	<div class="form-group">
    <label for="exampleInputname">Name</label>
       <input type="type" name="name" value="{{ $editcompany->name }}" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
        @error('name')
         <span class="text-danger">{{ $message }}</span>
        @enderror

     </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="{{ $editcompany->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">
    	@error('email')
         <span class="text-danger">{{ $message }}</span>
        @enderror
    </small>
  </div>
  <div class="form-group">
    <label for="exampleInputFile1">Logo</label>
   
       <input type="file" name="file" value="{{ $editcompany->logo }}" class="form-control-file">

     @error('logo')
         <span class="text-danger">{{$message }}</span>
        @enderror
  </div>
   <div class="form-group">
    <img src="{{ asset($editcompany->logo) }}" style="height:40px;width:100px;">
  </div>

  <div class="form-group">
    <label for="exampleInputWebsite">Website</label>
    <input type="text" name="website" value="{{ $editcompany->website }}" class="form-control">
     @error('website')
         <span class="text-danger">{{$message }}</span>
        @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

@endsection