@extends('layouts.mainlayout')

@section('tittle', 'Add Book')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <h1>Add New Book</h1>

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

        <form method="post" action="/book-add" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="code" name="book_code" placeholder="Book's Code" value="{{old('book_code')}}">
                <label for="code" class="form-label">Book's Code</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="Book's title" value="{{old('title')}}">
                <label for="title" class="form-label">Book's title</label>
            </div>

            <div class=" mb-3">
                <label for="cover" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class=" mb-3">
                <label for="cover" class="form-label">Image Cover</label>
                <input type="file" class="form-control" id="cover" name="image" placeholder="Book's cover" >
            </div>

            
                <button type="submit" class="mb-3 btn btn-success">Save</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection