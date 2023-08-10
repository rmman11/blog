@extends('admin.layouts.master')
@section('pageTitle', 'Create')
@section('content')

<div class="card">
    <div class="card-header">
      <h3>Create  Photo</h3>
    </div>

@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('admin.photos.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
  <label class="col-md-4 ">Enter First Name</label>
  <div class="col-md-8">
   <input type="text" name="first_name" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4">Enter Last Name</label>
  <div class="col-md-8">
   <input type="text" name="last_name" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4">Select Profile Image</label>
  <div class="col-md-8">
   <input type="file" name="image" />
  </div>
 </div>
 <br /><br /><br />
 <div class="form-group">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
 </div>

</form>



    </div>
</div>
@endsection
