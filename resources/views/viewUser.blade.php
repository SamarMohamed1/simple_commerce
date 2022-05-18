@extends('layouts.app')

@section('content')
<div class="container">
        <div class="text-center">
            <a href="{{ route('userForm') }}" class="btn btn-success">Add new user</a>
        </div>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
