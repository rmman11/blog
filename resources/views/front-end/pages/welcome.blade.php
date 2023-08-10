@extends('front-end.layouts.app')
@section('title', 'Welcome')
@section('content')


<div class="container"  style="background: #fff">


      <p>Our project is based on laravel and php</p>


        <h1>Laravel Vapor</h1>
        <p>Laravel Vapor is a serverless deployment platform for Laravel,
          powered by AWS. Launch your Laravel infrastructure on Vapor and fall
        in love with the scalable simplicity of serverless.</p>
        <a href="https://vapor.laravel.com" class="btn"><span>Learn More</span></a>


<div class="container">
<h3>Pictures</h3>
        <div class="row">
          @foreach($albums as $album)
          <div class="card mr-2" style="width: 20rem;">
            <img class="card-img-top" src="public/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}">


            <div class="card-body">
              <p class="card-title text-center"><a href="#">{{ $album->name }}</a></p>
            </div>
          </div>
          @endforeach
        </div>
        <div class="d-flex justify-content-center"> {!! $albums->links() !!} </div>
</div>
</div>
  @endsection
