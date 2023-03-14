@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <h1>Register</h1>
                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            {{-- @method('post') --}}
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" name="name" id="" class="form-control"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
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
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-8 text-left">
                                    <a href="{{ route('login') }}" class="btn btn-link">Already Have Account</a>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="submit" value="Register">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
