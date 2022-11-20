@extends('layouts.mainlayout')

@section('tittle', 'Delete Category')

@section('content')

    <h2>Are you sure to delete Category {{$category->name}} ?</h2>
        
    <div class="mt-5">
        <form style="display: inline-block" action="/category-delete/{{$category->slug}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger me-3">Sure</button>
        </form>

        <a href="/categories" class="btn btn-primary">Cancel</a>
    </div>

@endsection