@extends('layouts.mainlayout')

@section('tittle', 'Deleted Book')

@section('content')

    <h1>Deleted Book List</h1>

    

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedBooks as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->book_code}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            <a href="/book-restore/{{$item->slug}}">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-5 d-flex justify-content-end">
        <a href="books" class="btn btn-primary">Back</a>
    </div>

@endsection