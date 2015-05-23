@extends('site.template')

@section('content')

    <section class="product-area">
        <div class="breadthumbs">
            <p>Взуття<span> > </span>Чоловіки<span> > </span><a href="#">Кросівки</a></p>
        </div>

        <div class="product-selected__title">
            <p>{{$item->title}}</p>
        </div>
        <div class="product-area__left">
            <figure class="product-selected__photo">
                <img src="/images/products/dsc_0930.jpg" alt="" class="big-photo">

                <div class="mini-photos">
                    <ul class="list-photo">
                        <li>
                            <a href="#"><img src="/images/products/NB_2.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="/images/products/2811490.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="/images/products/nb_m670_greynavy4.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                    <span class="zoom-photo"></span>
                </div>
            </figure>

            <div class="social-button">
                <ul>
                    <li>
                        <a href="#" class="button-facebook">
                            <span class="counter">32</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="button-vk">
                            <span class="counter">23 128</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="button-tweter">
                            <span class="counter">1 128</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-area__right">
            <div class="product-description">
                {!! $item->description !!}
            </div>

            <div class="price"><p>{{$item->price}} грн.</p></div>
            <div class="clear"></div>
            <div class="button-action">
                <a href="#" class="button">Додати у вибране</a>
                <a href="#" class="button button_buy">До магазину</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </section>

@stop
