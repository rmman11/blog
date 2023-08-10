
@extends('admin.layouts.master')
@section('pageTitle', 'Login')
@section('content')


        <div class="row" style="background:white">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Login Admin</strong></h3>
                    </div>

                    <div class="panel-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ( session()->has('msg') )
                            <div class="alert alert-success">{{ session()->get('msg') }}</div>
                        @endif

                            <!-- prin metoda post sunt trasmise datele de logare in baza de date -->
                             <form method="POST" action="{{ route('admin.logare') }}">
                        @csrf
              

            <div class="form-group row">

                                <label for="email" class="col-md-2 col-form-label text-md-right">
                                  <i class="fa fa-user icon"  ></i>
                                Email</label>
                                    <div class="col-md-6">
                                <input type="email" name="email" id="email" placeholder="Email"
                                       class="form-control border-input">
                                     </div>
                            </div>

                                <div class="form-group row">

                              <label for="password" class="col-md-2 col-form-label text-md-right">
                                <i class="fa fa-key icon"></i>Password</label>

                              <div class="col-md-6">
                                <input type="password" name="password" id="password" placeholder="Password"
                                       class="form-control border-input">
                                     </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Login panel</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


@endsection
