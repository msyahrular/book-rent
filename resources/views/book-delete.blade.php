@extends('layouts.mainlayout')

@section('tittle', 'Delete Book')

@section('content')

    <h2>Are you sure to delete Book {{$book->title}} ?</h2>
        
    <div class="mt-5">
        <form style="display: inline-block" action="/book-delete/{{$book->slug}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger me-3">Sure</button>
        </form>

        <a href="/books" class="btn btn-primary">Cancel</a>
    </div>

@endsection