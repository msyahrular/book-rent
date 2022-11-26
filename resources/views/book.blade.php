@extends('layouts.mainlayout')

@section('tittle', 'Book')

@section('content')


    <h1>Book List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/book-deleted" class="btn btn-secondary me-3">view Deleted Data</a>
        <a href="/book-add" class="btn btn-primary">Add Data</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->book_code}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            @foreach ($item->categories as $data)
                                {{$data->name}} <br>
                            @endforeach
                        </td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="/book-edit/{{$item->slug}}">Edit</a> |
                            <a href="/book-delete/{{$item->slug}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection