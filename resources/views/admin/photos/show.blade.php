@extends('admin.layouts.master')
@section('pageTitle', 'Show')
@section('content')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('admin.photos.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
<img src="{{ asset('/public/images/' . $data->image) }}" class="img-thumbnail" width="200" />
 <h3>First Name - {{ $data->first_name }} </h3>
 <h3>Last Name - {{ $data->last_name }}</h3>
</div>
@endsection