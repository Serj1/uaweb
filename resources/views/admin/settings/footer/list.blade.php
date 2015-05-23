@extends('admin.template')

@section('content')

    <div class="col-lg-12">

        <div class="title col-lg-6">
            <h1>Елементи меню</h1>
        </div>

        <div class="col-lg-6 header-actions">
            <a href="{{ url('/admin/settings/footer/create') }}" class="btn btn-default pull-right">Додати</a>
        </div>

    </div>

    <div class="col-lg-12">
        <hr/>
    </div>


    <div class="col-lg-12">

        <table class="table table-striped">

            <thead>
            <tr>
                <td>Назва</td>
                <td>Дії</td>
            </tr>
            </thead>

            @foreach($menu as $val)
                <tr>
                    <td>{{ $val->title }}</td>
                    <td>
                        <a href="{{ url('admin/settings/footer/edit/'.$val->id) }}">Редагувати</a>
                        <a href="{{ url('admin/settings/footer/delete/'.$val->id) }}">Видалити</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@stop