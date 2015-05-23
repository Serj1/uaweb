@extends('layouts.master')

@section('main-block__left')
    <div class="main-block__left">
        <div class="block-title">
            <h3 class="sub-title-text">Товар дня</h3>
        </div>
        <div class="clear"></div>

        @if($productToDay)
            <div class="products-toDay">
                <div class="item-products item-products_orange">
                    <div class="products-image">
                        <a href="#"><img src="/images/products/kettle.png" height="200" width="255" alt=""></a>
                    </div>
                    <div class="products-title">
                        <a href="#" class="product-name">{{$productToDay['title']}}</a>

                        <p class="category">{{$productToDay['category']}}</p>

                        {{--                    <p class="product-price">{{$productToDay['price']}} грн.</p>--}}
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        @endif
    </div>
@stop


@section('content')
    <div class="main-block__right">
        <div class="main-block__right">
            <div class="slider">
                <div class="main-slider" id="owl-demo" class="owl-carousel owl-theme">
                    <div class="item item-slider">
                        <div class="slide-title">
                            <h3>Як оригінально носити<br>український одяг?</h3>

                            <p>Український одяг має свою аутентичність.</p>

                            <p>Яскраві кольори добре поєднуються із фактурою тканини.</p>

                            <p>Завдяки цьому, одяг можна носити багатьма способами.</p>
                            <a href="#" class="slide-button">Детальніше</a>
                        </div>
                        <div class="slide-image">
                            <img src="images/woman.png" height="350" width="286" alt="">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="item item-slider">
                        <div class="slide-title">
                            <h3>Як оригінально носити<br>український одяг?</h3>

                            <p>Український одяг має свою аутентичність.</p>

                            <p>Яскраві кольори добре поєднуються із фактурою тканини.</p>

                            <p>Завдяки цьому, одяг можна носити багатьма способами.</p>
                            <a href="#" class="slide-button">Детальніше</a>
                        </div>
                        <div class="slide-image">
                            <img src="images/woman.png" height="350" width="286" alt="">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    var owl = $("#owl-demo");
                    owl.owlCarousel({
                        navigation: true,
                        singleItem: true,
                        transitionStyle: "fade",
                        navigationText: false
                    });
                });
            </script>

        <div class="popular-products">
            <div class="block-title">
                <h3 class="sub-title-text">Популярні товари</h3>
            </div>
            <div class="navigate-block">
                <span class="prev"></span>
                <span class="next"></span>
            </div>
            <div class="clear"></div>

            <div class="toddler">
                <div class="toddler-line"><span class="toddler-circle"></span></div>
            </div>

            <div class="carusel-products">

                @if(count($products) > 0)
                    @foreach($products as $itm)

                        <div class="item-products">
                            <div class="products-image">
                                <a href="#"><img src="images/products/sweater.png" alt=""></a>
                            </div>
                            <div class="products-title">
                                <a href="#" class="product-name">{{$itm['title']}}</a>

                                <p class="category">{{$itm['category']}}</p>

                                {{--<p class="product-price">{{$itm['price']}} грн.</p>--}}
                            </div>
                        </div>

                    @endforeach
                @endif

                <div class="clear"></div>
            </div>
        </div>

        <div class="popular-brends">
            <div class="block-title">
                <h3 class="sub-title-text">Популярні бренди</h3>
            </div>
            <div class="navigate-block">
                <span class="prev"></span>
                <span class="next"></span>
            </div>
            <div class="clear"></div>

            <div class="toddler">
                <div class="toddler-line"><span class="toddler-circle"></span></div>
            </div>

            <div class="carusel-products">

                @if(count($brands) > 0)

                    @foreach($brands as $itm)

                        <div class="item-products">
                            <div class="products-image">
                                <a href="#"><img src="images/company/vesna.png" alt=""></a>
                            </div>
                            <div class="products-title">
                                <a href="#" class="product-name">{{$itm['title']}}</a>

                                <p class="category category_brends">{{$itm['type']}}</p>
                            </div>
                        </div>

                    @endforeach

                @endif

                <div class="clear"></div>
            </div>
        </div>
    </div>
@stop

@section('blog')
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
@stop

