@extends('layouts.mainlayout')

@section('tittle', 'Ban User')

@section('content')

    <h2>Are you sure to Ban User {{$user->username}} ?</h2>
        
    <div class="mt-5">
        <form style="display: inline-block" action="/user-ban/{{$user->slug}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger me-3">Sure</button>
        </form>

        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>

@endsection