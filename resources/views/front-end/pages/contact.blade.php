@extends('front-end.layouts.app')
@section('title', 'Contact')
@section('content')
<div class="container" style="background: #fff;padding:15px;">

  <div class="row">
    <div class="col-md-8">
      <div class="card">


        <div class="card-header">
          <h1>Contact US Form</h1>

        </div>

        <div class="card-body">

          @if(Session::has('success'))

          <div class="alert alert-success">

            {{ Session::get('success') }}

          </div>

          @endif


          {!! Form::open(['route'=>'contactus.store']) !!}


          <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">

            <label for="email" class="col-md-2 col-form-label text-md-left">Name</label>
            <div class="col-md-8">
              {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}

              <span class="text-danger">{{ $errors->first('name') }}</span>

            </div>
          </div>


          <div class="form-group  row {{ $errors->has('email') ? 'has-error' : '' }}">


            <label for="email" class="col-md-2 col-form-label text-md-left">Email</label>
            <div class="col-md-8">

              {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}

              <span class="text-danger">{{ $errors->first('email') }}</span>

            </div>

          </div>

          <div class="form-group row {{ $errors->has('message') ? 'has-error' : '' }}">


            <label for="email" class="col-md-2 col-form-label text-md-left">Message</label>
            <div class="col-md-8">
              {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}

              <span class="text-danger">{{ $errors->first('message') }}</span>
            </div>
          </div>

          <div class="col-md-8 offset-md-4">

            <button class="btn btn-success">Contact US!</button>

          </div>


          {!! Form::close() !!}


        </div>
      </div>
    </div>

    <p>bllaaa email contact</p>
  </div>
</div>

  @endsection
