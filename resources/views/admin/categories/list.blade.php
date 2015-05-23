@extends('admin.template')

@section('content')

    <div class="col-lg-12">

        <div class="title col-lg-6">
            <a href="{{ url('/admin/categories/') }}"><h1>Категорії</h1></a>
        </div>

        <div class="col-lg-6 header-actions">
            <a href="{{ url('/admin/categories/create/'.$parent->id) }}" class="btn btn-default pull-right">Додати</a>
        </div>

    </div>

    <div class="col-lg-12">
        <hr/>
    </div>


    <div class="col-lg-12">
        <ul>
            @foreach($three as $key => $itm)
                <li style="margin-left: {{$itm->depth * 20}}px;">
                    <a href="{{ url('/admin/categories/'.$itm->id) }}">{{$itm->title}}</a>
                    <a href="{{ url('/admin/categories/delete/'.$itm->id) }}" class="pull-right table-action">Delete</a>
                    <a href="{{ url('/admin/categories/edit/'.$itm->id) }}" class="pull-right table-action">Edit</a>
                    <a href="{{ url('/admin/categories/create/'.$itm->id) }}" class="pull-right table-action">Create children</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-lg-12">

        @if( isset($products) && count($products) > 0)
        <table class="table table-striped">

            <thead>
            <tr>
                <td>Назва</td>
                <td>Дії</td>
            </tr>
            </thead>

            @foreach($products as $val)
                <tr>
                    <td>{{ $val->title }}</td>
                    <td>
                        <a href="{{ url('admin/products/edit/'.$val->id) }}">Редагувати</a>
                        <a href="{{ url('admin/products/delete/'.$val->id) }}">Видалити</a>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>

@stop