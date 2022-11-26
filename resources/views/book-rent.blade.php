@extends('layouts.mainlayout')

@section('tittle', 'Book Rent')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
        <h1 class="mb-5">Book Rent Form</h1>

        <div class="mt-5">
            @if (session('status'))
                <div class="alert {{session('alert')}}" role="alert">
                    {{session('status') }}
                </div>
            @endif
        </div>

        <form action="/book-rent" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">User</label>
                <select name="user_id" id="user" class="form-control search-select">
                    <option value="">Select User</option>
                    @foreach ($users as $item)
                        <option value="{{$item->id}}">{{$item->username}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Book</label>
                <select name="book_id" id="book" class="form-control search-select">
                    <option value="">Select Book</option>
                    @foreach ($books as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.search-select').select2();
        });
    </script>
@endsection