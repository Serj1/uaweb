<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

</head>
<body class="body-page">

<header class="header">
    <div class="header-main">
        <div class="header-left">
            <div class="header-left__logo">
                <a href="/"><img src="/images/logo.png" height="29" width="65" alt=""></a>
            </div>
            <nav>
                <input type="checkbox" id="menu-main" class="hidden">
                <ul class="menu-products">
                    <li class="item-menu">
                        <label for="menu-main" class="link">Каталог товарів</label>
                    </li>

                    @foreach($menu as $item)
                        <li class="item-menu"><a href="{{ url('/section/'.$item['id']) }}"
                                                 class="link">{{$item['title']}}</a><span class="arr"></span>

                            @if(isset($item['child']))
                                <div class="sub-menu">
                                    @foreach($item['child'] as $section)

                                        <div class="section-menu">
                                            <p class="name-section">{{$section['title']}}</p>

                                            @if(isset($section['child']))
                                                <ul class="items-section">
                                                    @foreach($section['child'] as $itm)
                                                        <li>
                                                            <a href="{{ url('section/'.$itm['id']) }}">{{$itm['title']}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </div>

                                    @endforeach
                                    <div class="clear"></div>
                                </div>

                            @endif

                        </li>
                    @endforeach

                </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="header-right__top">
                <div class="title">
                    <p class="title-text title-text_blue ">Ми зібрали разом кращі українські товари та бренди</p>

                    <p class="title-text title-text_yellow">Вам залишилося обрати те, що дійсно до вподоби</p>
                </div>
                <div class="select-city" style="padding-right: 60px;">
                    <ul class="menu-city">
                        @foreach($cities as $city)
                            <li @if($current_city == $city->id) class="item-city" @else class="hidden-city"@endif>
                                <a href="{{url('set-city/'.$city->id)}}" style="color: #000000;">{{$city->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="lang">
                    <ul class="menu-lang">

                        @foreach($langs as $lang)
                            <li @if($current_lang == $lang->id) class="item-lang" @else class="hidden-lang" @endif>
                                <a href="{{url('/set-lang/'.$lang->id)}}">
                                    <img src="/images/ukraine.png" height="20" width="29" alt="">
                                </a>
                                {{$lang->lang}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="header-right__bottom">
                <div class="header-search">
                    <form>
                        <div class="search">
                            <input type="text" name="search" placeholder="Введіть назву товару або бренду">
                            <input type="submit" class="loupe" value="">
                        </div>
                    </form>
                    <div class="count-searching">
                        <p class="show-statistic"><span>1 764 зараз шукають</span></p>
                    </div>
                </div>
                <div class="for-user">
                    <ul>
                        <li class="sing-in"><a href="#">Вхід</a></li>
                        <li class="favorite"><a href="#">Вибране</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</header>

<section class="main-block">

    @yield('main-block__left')


    @yield('content')

    <div class="clear"></div>

    @yield('blog')

    <div class="clear"></div>
</section>


<footer>
    <div class="main-footer">
        <div class="main-footer__center">
            <div class="footer-top">
                <div class="social-block">
                    <ul class="social-icons">
                        <li class="icon"><a href="#" class="tweter-ico"></a></li>
                        <li class="icon"><a href="#" class="vk-ico"></a></li>
                        <li class="icon"><a href="#" class="facebook-ico"></a></li>
                    </ul>
                </div>
                <div class="footer-form">
                    <form>
                        <div class="subscription-form">
                            <input type="text" name="email" class="in-text" placeholder="Ваша електронна адреса">
                            <input type="submit" class="btn-submit" value="Підписатись">
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
            <div class="footer-center">
                <div class="footer-logo">
                    <a href="index.html"><img src="/images/logo-footer.png" height="29" width="65" alt=""></a>
                </div>
                <div class="footer-menu">
                    <ul class="nav-footer">
                        @if(count($footerMenu) > 0)

                            @foreach($footerMenu as $itm)
                                <li class="item-nav-foot"><a href="{{ url($itm['url']) }}">{{$itm['title']}}</a></li>
                            @endforeach

                        @endif

                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom__left">
                    <p>© Наше 2015. Усі права захищені.</p>
                </div>
                <div class="footer-bottom__right">
                    <p>Designed by Alex Shlafer</p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>