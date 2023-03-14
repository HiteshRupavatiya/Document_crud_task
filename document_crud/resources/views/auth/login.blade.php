@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h1>Login</h1>
                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        @if (Session::has('success'))
                            <p class="text-success">{{ Session::get('success') }}</p>
                        @endif

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control"
                                    value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control"
                                    value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember Me</label>
                            </div>
                            <div class="row">
                                <div class="col-8 text-left">
                                    <a href="" class="btn btn-link">Forgot Password</a>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="submit" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
