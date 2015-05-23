@extends('site.template')

@section('content')

    <div class="product-selected__title">
        <p>{{$item->title}}</p>
    </div>

    {!! $item->body !!}

@stop
