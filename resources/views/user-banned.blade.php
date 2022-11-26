@extends('layouts.mainlayout')

@section('tittle', 'Banned User')

@section('content')

    <h1>Banned User List</h1>

    
    

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bannedUser as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->username}}</td>
                        <td>
                            @if ($item->phone)
                                {{$item->phone}}
                            @else
                                -
                            @endif 
                        </td>
                        <td>
                            <a href="/user-restore/{{$item->slug}}">Unbanned</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="mt-5 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary">Back</a>
    </div>


@endsection