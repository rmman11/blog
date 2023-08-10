@extends('front-end.layouts.app')
@section('title', 'Show Photo')
@section('content')
<div class="container" style="background: #fff;padding:15px;">

	<div class="row">
		<div class="col-md-12">
			
<h1>{{ $album->name }}</h1>
  <a style="margin-top:20px;" class="btn btn-info" href="{{ url()->previous() }}">Go Back</a>
	<a class="btn btn-primary" href="/blog/photos/create/{{ $album->id }}">Add Photo To Album</a>
	<hr>
	<div class="row">
		@foreach($album->photos as $photo)
			<div class="card" style="width: 14rem;">
			  <img class="card-img-top" src="{{ asset('/public/album_covers/photos/'.$photo->album_id .'/'. $photo->photo) }}" alt="{{ $photo->title }}">
			  <div class="card-body">
			    <p class="card-title text-center"><a href="/blog/photos/{{ $photo->id }}">{{ $photo->title }}</a></p>
			  </div>
			</div>
		@endforeach
	</div>
			</div>
		</div>
	
</div>



@endsection
