@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Images</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Document Id</th>
                    <th scope="col">Expired On</th>
                    <th scope="col">Status</th>
                    <th colspan="2" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userDocuments as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                        <td>
                            @foreach ($document->path as $file)
                                <img src="{{ asset('files/' . $file) }}" alt="" height="50" width="60">
                            @endforeach
                        </td>
                        <td>{{ $document->user_id }}</td>
                        <td>{{ $document->document_id }}</td>
                        <td>{{ $document->expires_at }}</td>
                        <td>{{ $document->status }}</td>
                        <td>
                            <a href="">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('user-document.delete', $document->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
