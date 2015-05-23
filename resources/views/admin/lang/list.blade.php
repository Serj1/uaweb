@extends('admin.template')

@section('content')

    <div class="col-lg-12">

        <div class="title col-lg-6">
            <h1>Мови</h1>
        </div>

        <div class="col-lg-6 header-actions">
            <a href="{{ url('/admin/langs/create') }}" class="btn btn-default pull-right">Додати</a>
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

            @foreach($langs as $val)
                <tr>
                    <td>{{ $val->lang }}</td>
                    <td>
                        <a href="{{ url('admin/langs/edit/'.$val->id) }}">Редагувати</a>
                        <a href="{{ url('admin/langs/delete/'.$val->id) }}">Видалити</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@stop