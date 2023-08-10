@extends('front-end.layouts.app')
@section('title', 'Photo')
@section('content')

<div class="container" style="background: #fff;padding:15px;">

	<div class="row">
		<div class="col-md-8">
			<div class="card">
<div class="row">
	<h3 class="mx-auto">Add Photo to Album</h3>
</div>
<div class="row">
	<form method="POST" action="/blog/photos/store" enctype="multipart/form-data" class="mx-auto">
		@csrf
		<input type="hidden" name="album_id" value="{{ $album_id }}">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" placeholder="Photo Title" class="form-control">

		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" placeholder="Photo Description" class="form-control"></textarea>
		</div>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text">Upload Image</span>
		  </div>
		  <div class="custom-file">
		    <input type="file" class="custom-file-input" id="photo" name="photo">
		    <label class="custom-file-label" for="photo">Choose file</label>
		  </div>
		</div>
		<input class="btn btn-primary" type="submit" value="Add">
	</form>
</div>
</div>
</div>
</div>

  @endsection
