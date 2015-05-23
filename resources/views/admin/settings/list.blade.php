@extends('admin.template')

@section('content')

    <div class="col-lg-12">

        <div class="title col-lg-6">
            <h1>Налаштування</h1>
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
            <tr>
                <td>Меню у футері</td>
                <td>
                    <a href="{{ url('admin/settings/footer') }}">Редагувати</a>
                </td>
            </tr>
        </table>

    </div>

@stop