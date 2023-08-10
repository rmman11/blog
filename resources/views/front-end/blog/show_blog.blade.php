@extends('front-end.layouts.app')
@section('title', 'Blog details')
@section('subtitle', $viewData["subtitle"])
@section('content')


<div class="row g-0">
<div class="panel-body">
<div class="card-body">
	<div class="panel-heading">{{ $viewData["posts"]->getTitle() }} </div>
<strong>Content :</strong><p class="card-text">{{ $viewData["posts"]->getContent() }}</p>
<strong>Date:</strong><p class="card-text">{{ $viewData["posts"]->getCreatedAt() }}</p>
</div>
<p>wrote by</p>:{{$viewData["user"]->getName()  }}
</div>
</div>
@endsection