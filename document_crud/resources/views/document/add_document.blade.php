@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Create Document Type</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="" method="">
                    <div class="form-group">
                        <label for="">Document Type : </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Document Status : </label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="true" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                True
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="false">
                            <label class="form-check-label" for="exampleRadios2">
                                False
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
