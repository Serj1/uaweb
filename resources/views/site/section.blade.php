@extends('site.template')

@section('content')
    <div class="main-block__right">
        <ul>
            @if(count($products) > 0)

                @foreach($products as $itm)
                    <li>
                        <a href="{{ url('/product/'.$itm->id) }}" style="color: #000000">{{$itm->title}}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@stop

