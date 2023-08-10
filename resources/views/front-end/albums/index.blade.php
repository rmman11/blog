@extends('front-end.layouts.app')
@section('title', 'Albums')
@section('content')
<div class="container" style="background: #fff;padding:15px;">


	<div class="row">

        <a class="btn btn-success" style="width:200px; height: 40px;" href="{{ route('albums.create') }}">
            New Albums
        </a>
		<div class="col-md-8">
			<div class="card">

				<h3>Albums</h3>
				<div class="row">
					@foreach($albums as $album)
					<div class="card mr-2" style="width: 20rem;">
						<img class="card-img-top" src="/public/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}">


						<div class="card-body">
							<p class="card-title text-center"><a href="/blog/albums/{{ $album->id }}">{{ $album->name }}</a></p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
