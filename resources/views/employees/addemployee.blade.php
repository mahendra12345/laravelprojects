@extends('admin.admin_master')  

@section('admin') 

<div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Create New Employee</h5>
   <form action="{{ url('addemp') }}" enctype="multipart/form-data" method="POST">
   	@csrf
	      <div class="form-group">
             <label for="exampleInputname">Companies</label>
			<select name ="company" class=" form-control form-select" aria-label="Select Companies">
				<option selected>Select Companies</option>
				@foreach($comlist as $list)
			  
			  <option value="{{$list->id}}">{{ $list->name }}</option>
			  
			  @endforeach
			  </select>
			  @error('company')
         <span class="text-danger">{{$message }}</span>
        @enderror
			</div>
  			 

   	<div class="form-group">
    <label for="exampleInputname">Firstname</label>
       <input type="type" name="firstname" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
        @error('firstname')
         <span class="text-danger">{{$message }}</span>
        @enderror

     </div>

     <div class="form-group">
    <label for="exampleInputname">Lastname</label>
       <input type="type" name="lastname" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
        @error('lastname')
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
    <label for="exampleInputWebsite">Phone</label>
    <input type="text" name="phone" class="form-control">
     @error('phone')
         <span class="text-danger">{{$message }}</span>
        @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>

@endsection