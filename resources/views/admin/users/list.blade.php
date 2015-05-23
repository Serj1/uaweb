@extends('admin.template')

@section('content')

    <div class="title pull-left">
        <h1>Users</h1>
    </div>

    <div class="pull-right">
        <a href="{{ url('/admin/user/create') }}" class="btn btn-default">Create</a>
    </div>


    <table class="table table-striped">

        <thead>
        <tr>
            <td> Name</td>
            <td> Login</td>
            <td> E-mail</td>
            <td> Actions</td>
        </tr>
        </thead>

        @foreach($users as $val)
            <tr>
                <td>{{ $val->name }}</td>
                <td>{{ $val->login }}</td>
                <td>{{ $val->email }}</td>
                <td>
                    <a href="/admin/user/edit/{{$val->id}}">Edit</a>
                    <a href="/admin/user/remove/{{$val->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

@stop