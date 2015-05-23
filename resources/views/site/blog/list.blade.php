@extends('layouts.master')
@section('content')

    <ul>
        @if(count($items) > 0)

            @foreach($items as $item)
                <li>
                    <a href="{{ url('blog/'.$item->id) }}" style="color: #000000;">{{$item->title}}</a>
                </li>
            @endforeach
        @endif
    </ul>

@stop