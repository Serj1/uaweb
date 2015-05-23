@extends('admin.template')

@section('content')

    <div class="title">
        @if(isset($item))
            <h1>Редагувати сторінку - {{$item->title}}</h1>
        @else
            <h1>Додати сторінку</h1>
        @endif

    </div>
    <hr/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST"
                      action="{{ (isset($item)) ? url('admin/pages/update') : url('admin/pages/store')  }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if(isset($item))
                        <input type="hidden" name="id" value="{{ $item->id }}">
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label">Назва</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" @if(isset($item))
                                   value="{{$item->title}}" @endif>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">Текс</label>

                        <div class="col-md-6">
                            <textarea name="body" id="body" cols="87" rows="20">
                                @if(isset($item)){{$item->body}}@endif
                            </textarea>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Зберегти</button>

                            <a href="{{url('admin/pages')}}" class="btn btn-default">Назад</a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
@stop


