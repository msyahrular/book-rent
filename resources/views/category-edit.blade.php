@extends('layouts.mainlayout')

@section('tittle', 'Edit Category')

@section('content')

    <h1>Add New Category</h1>

    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="/category-edit/{{$category->slug}}">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" placeholder="Category Name">
                <label for="name" class="form-label">Category Name</label>
            </div>
                <button type="submit" class="mb-3 btn btn-success">Update</button>
        </form>
    </div>
@endsection