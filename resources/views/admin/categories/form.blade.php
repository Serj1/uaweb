@extends('admin.template')

@section('content')

    <div class="title">
        @if(isset($item))

            <h1>Categories edit - {{$item->title}}</h1>

        @else
            <h1>Categories create</h1>
        @endif

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

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

                <form class="form-horizontal" role="form" method="POST" action="{{ (isset($item)) ? url('admin/categories/update') : url('admin/categories/store')  }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(isset($parent))
                    <input type="hidden" name="parent_id" value="{{ $parent->id }}">
                    @endif
                    @if(isset($item))
                        <input type="hidden" name="id" value="{{ $item->id }}">
                    @endif
                    <div class="form-group">
                        <label class="col-md-4 control-label">Title</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" @if(isset($item))
                                   value="{{$item->title}}" @endif>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
@stop

