@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phone</th>
        </tr>
    </thead>
    <tbody>
        @foreach()
        <tr>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
