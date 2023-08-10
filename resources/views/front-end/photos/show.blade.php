
@extends('front-end.layouts.app')
@section('title', 'Photos')
@section('content')
<div class="container" style="background: #fff;padding:15px;">

  <div class="row">
    <div class="col-md-8">
      <div class="card">

<h1>{{ $photo->title }}</h1>
	<p>{{ $photo->description }}</p>
  <a style="margin-top:20px;" class="btn btn-info" href="{{ url()->previous() }}">Go Back</a>
	<hr>
	<div class="row">

	
		<img src="{{ asset('/public/album_covers/photos/'.$photo->album_id.'/'.$photo->photo) }}" alt="{{ $photo->title }}" class="mx-auto">

	</div>
	<div class="row mt-3">
		<form method="POST" action="/photos/{{ $photo->id }}">
			@method('DELETE')
			@csrf
			<input type="submit" class="btn btn-danger" value="Delete Photo">
		</form>
	</div>
	<hr>
	<small class="pb-5">Size: {{ $photo->size }}KB</small>
</div>
</div>
</div>
</div>
  @endsection
