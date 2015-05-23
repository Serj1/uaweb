@extends('admin.template')

@section('content')

    @if(isset($user))

        <div class="title">
            <h1>Edit user - {{ $user->name }}</h1>
        </div>

    @else

        <div class="title">
            <h1>Create user</h1>
        </div>

    @endif
    <div>
        @if(isset($user))
            <form action="/admin/user/update/{{$user->id}}" method="post">
        @else
            <form action="/admin/user/store" method="post">
        @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" id="login" @if(isset($user)) value="{{$user->login}}" @endif>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" @if(isset($user)) value="{{$user->name}}" @endif>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" @if(isset($user)) value="{{$user->email}}" @endif>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-default">Save</button>
        </form>
    </div>


@stop