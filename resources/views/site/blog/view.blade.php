@extends('layouts.master')
@section('content')

    <section class="line">
        <div class="center-area">
            <div class="breadthumbs">
                <p>Головна<span> > </span>Блог<span> > </span><a href="#">Ексклюзив</a></p>
            </div>
            <div class="center-area__left">
                <div class="post-info">
                    <ul class="info">
                        <li><span class="date"></span><span class="text-info">08 березня</span></li>
                        <li><span class="views"></span><span class="text-info">5369</span></li>
                        <li><span class="like"></span><span class="text-info">43</span></li>
                    </ul>
                </div>
                <div class="post-title">
                    {{ $item->title }}
                </div>
                <div class="post-description">
                    {{ $item->description }}
                </div>
            </div>
            <div class="center-area__right">
                <div class="wrote-info wrote-info_margin90">
                    <figure>
                        <img src="/images/news/people-2.png" height="78" width="78" alt="">
                    </figure>
                    <div class="wrote-name"><p>{{$item->author}}</p></div>
                    <div class="wrote-status"><p>Автор</p></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <section></section>


    <section class="line ">
        <div class="center-area">

            {!! $item->body !!}

            <div class="clear"></div>
        </div>
    </section>

    <section class="line padBott30">
        <div class="main-blog">
            <div class="title-fullw">
                <h2 class="fullTitle-text">Блог</h2>

                <div class="navigate-block">
                    <a href="{{ url('/blog') }}">всі статті <span class="arr"></span></a>
                </div>
            </div>

            <div class="clear"></div>

            <div class="news">

                @if(count($posts) > 0)
                    @foreach($posts as $itm)
                        <article class="news-item">
                            <div class="new-item__image">
                                <div class="news-title">
                                    <p><a href="{{url('blog/'.$itm->id)}}">{{$itm->title}}</a></p>
                                </div>
                                <div class="news-coment">
                                    <div class="coment-photo">
                                        <img src="/images/news/people-1.png" height="75" width="75" alt="">
                                    </div>
                                    <div class="coment-text">
                                        <p class="name-people">{{$itm->author}}</p>

                                        <p class="coment-time"><span>{{ $itm->created_at }}</span></p>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <img src="/images/news/shoes.png" height="221" width="350" alt="">
                            </div>
                            <div class="full-review">
                                <p class="full-review__p">
                                    {{$itm->description}}
                                </p>
                            </div>
                            <div class="bottom-review">
                                <div class="bottom-review__left">
                                    <p class="count-coments">{{ $itm->count_coments }}</p>
                                </div>
                                <div class="bottom-review__right">
                                    <a href="#"><span class="image-href"></span></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </article>
                    @endforeach
                @endif

            </div>
        </div>
        <div class="clear"></div>
    </section>

@stop