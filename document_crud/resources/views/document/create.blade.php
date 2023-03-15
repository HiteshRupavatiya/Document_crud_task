@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <h1 class="text-center mb-4">Upload Document</h1>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form action="{{ route('user-document.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-2 offset-md-1">
                    <label for="">Document Type :</label>
                </div>
                <div class="col-md-6 mb-4">
                    <select class="custom-select" name="documentName">
                        <option selected disabled>-- Select Document Type --</option>
                        @foreach ($documents as $document)
                            <option value="{{ $document->id }}">{{ $document->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('documentName'))
                        <div class="alert alert-danger mt-1 mb-1">{{ $errors->first('documentName') }}</div>
                    @endif
                </div>
                <div class="col-md-6 offset-md-3 mb-3">
                    <div class="form-group">
                        <input type="file" name="files[]" placeholder="Choose files" multiple
                            value="{{ old('files') }}">
                    </div>
                    @if ($errors->has('files'))
                        <div class="alert alert-danger mt-1 mb-1">{{ $errors->first('files') }}</div>
                    @endif
                </div>
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script>
        $(function() {
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
@endsection
