@extends('layouts.admin-master')


@section('nav')

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/admin">Home</a></li>

                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/categories">Категорії</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/products">Товари</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/brands">Виробники</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/users">Користувачі</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/blog">Блог</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/pages">Сторінки</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/cities">Міста</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="/admin/langs">Мови</a></li>
                </ul>


                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/logout') }}">Вихід</a></li>
                </ul>
            </div>
        </div>
    </nav>
@stop

@section('content')

@stop