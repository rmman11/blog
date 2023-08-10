@extends('admin.layouts.master')
@section('pageTitle', 'Profile')
@section('content')

<div class="card">
    <div class="card-header">
      <h3>Editare profile</h3>
    </div>

    <div class="card-body">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.username') }}*</label>
                <input type="text" id="username" name="username" class="form-control"
                value="{{  $user->username }}" required>{{  $user->username }}
                @if($errors->has('username'))
                    <em class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </em>
                @endif

            </div>


            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group">
               <img class="rounded-circle" src="{{ asset('/public/storage/avatars/' . $user->avatar) }}" width="300" height="300"/>
  </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
