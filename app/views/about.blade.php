@extends('layout')

@section('title')
    Обо мне
@stop

@section('content')
    <div class="wrapper">
        <div class="jumbotron">
            <div class="container">
                <h2>Обо мне</h2>
            </div>
        </div>
        <div class="container about_section">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="col-md-4">
                    <p>Меня зовут Людмила, Приветствую Вас на моём сайте, здесь вы можете посмотреть мои работы, оставить свой отклик или мнение, а также найти информацию о записи.</p>
                    <p>В 2006 я окончила академию American Beauty International по курсу наращивания ногтей. Слежу за новинками в ногтевой индустрии, посещаю семинары Академии маникюра Ирины Амросьевой, арт-студии «Волшебный ноготок» Ирины Купиной, выставки interCHARM.</p>
                </div>
                <div class="col-md-4"><p><img class="img_about" width="300" src="{{ URL::asset('uploads/images/photo.jpg') }}"></p></div>
                <div class="col-md-4">
                    <p>Мастер маникюра, наращивания и ногтевого дизайна.</p>
                    <p>День рождения: 3 июня 1970 года</p>
                    <p>Номер телефона: +38 096 441 59 04</p>
                    <p>Рабочий: 045 94 462 65</p>
                    <p>E-mail: artworkgroup2015@gmail.com</p>
                    <p>Веб-сайт: professional-nailcare.kiev.ua</p>
                    <p>Адрес: г. Бровары, ул. Воссоединения 5, ТЦ "Форум"</p>
                </div>
            </div>
            <div class="about_gallery" align="left">
                <img src="{{ URL::asset('uploads/about/thumbs/1.jpg') }}" class="about_image1" width="280"/>
                <img src="{{ URL::asset('uploads/about/thumbs/2.jpg') }}" class="about_image2" width="280"/>
                <img src="{{ URL::asset('uploads/about/thumbs/3.jpg') }}" class="about_image3" width="280"/>
                <img src="{{ URL::asset('uploads/about/thumbs/4.jpg') }}" class="about_image4" width="280"/>
            </div>
        </div>
    </div>
@stop