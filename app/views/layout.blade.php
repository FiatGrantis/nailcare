<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <title>@yield('title') - Профессиональный маникюр, наращивание и коррекция ногтей</title>
        <meta name="keywords" content="маникюр бровары, наращивание ногтей бровары, наращивание ногтей бровары на дому, французский маникюр бровары, роспись ногтей">
        <meta name="description" content="Маникюр Бровары, наращивание ногтей гелем, роспись ногтей, shellac, маникюр на дому.">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='yandex-verification' content='6e63131b69226f8f' />

        <!-- jQuery & jQuery UI -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
                integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="/css/styles.css">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lora&subset=cyrillic,latin' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Magnific Popup core CSS & JS files -->
        <link rel="stylesheet" href="http://www.professional-nailcare.kiev.ua/magnific-popup/magnific-popup.css">
        <script src="http://www.professional-nailcare.kiev.ua/magnific-popup/jquery.magnific-popup.js"></script>

        @yield('headExtra')
    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Людмила Кулиш</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!-- NAVIGATION ITEMS -->
                        <li class="nav_item"><a href="{{ action('IndexController@getIndex') }}">Главная страница</a></li>
                        <li class="nav_item"><a href="{{ action('NewsPageController@getNews') }}">Новости</a></li>
                        <li class="nav_item"><a href="{{ URL::to('about') }}">Обо мне</a></li>
                        <li class="nav_item"><a href="{{ URL::to('portfolio') }}">Портфолио</a></li>
                        <li class="nav_item"><a href="{{ URL::to('services') }}">Услуги</a></li>
                    </ul>
                    @if (!Auth::check())
                        <form class="navbar-form navbar-right" role="form" action="{{ action('UsersController@postLogin') }}" method="post">
                            <a href="/users/login" class="btn btn-success">Войти</a>
                            <a href="/users/register" class="btn btn-success">Регистрация</a>
                        </form>
                    @else
                        <form class="navbar-form navbar-right" role="form" action="/users/logout">
                            <button class="btn btn-success">Выйти</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><strong>{{ Auth::user()->username }}</strong></a></li>
                        </ul>
                            @if (Auth::check() && Auth::user()->isAdmin())
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{ action('PostsController@getAdd') }}">Добавить запись</a></li>
                                    <li><a href="{{ action('NewsController@getAdd') }}">Добавить новость</a></li>
                                </ul>
                            @endif
                    @endif
                </div><!--/.navbar-collapse -->
            </div>
        </div>
 
    @yield('content')
    @include('footer')
    </body>
    <script src="http://www.professional-nailcare.kiev.ua/js/main.js"></script>
</html>