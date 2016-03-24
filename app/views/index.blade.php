@extends('layout')

@section('title')
Профессиональный маникюр, наращивание и коррекция ногтей
@stop

@section('content')
<div class="wrapper">

<div class="jumbotron jumbotron-index">
    <div class="container">
        <h1>Профессиональный маникюр, наращивание и художественная роспись ногтей в г. Бровары</h1>
    </div>
</div>

        <div class="container">
            <p class="announce">Предлагаю Вам услуги профессионального мастера маникюра</p>
            <div class="col-md-3"><p class="item_descr1"><a href="{{ URL::to('services#design') }}"><img class="item_image" src="{{ asset('uploads/images/item-design.jpg') }}" alt="Художественный дизайн"/><br>Художественный дизайн</a></p></div>
            <div class="col-md-3"><p class="item_descr2"><a href="{{ URL::to('services#french') }}"><img class="item_image" src="{{ asset('uploads/images/item-french.jpg') }}" alt="Французский маникюр"/><br>Французский маникюр</a></p></div>
            <div class="col-md-3"><p class="item_descr3"><a href="{{ URL::to('services#extension') }}"><img class="item_image" src="{{ asset('uploads/images/item-extension.jpg') }}" alt="Гелевое наращивание"/><br>Гелевое наращивание</a></p></div>
            <div class="col-md-3"><p class="item_descr4"><a href="{{ URL::to('services#correction') }}"><img class="item_image" src="{{ asset('uploads/images/item-correction.jpg') }}" alt="Коррекция ногтей"/><br>Коррекция ногтей</a></p></div>
        </div>

    <div class="container">
        <h3 class="index_header">Последние новости</h3>
        <?php
        $news_all = array_chunk(iterator_to_array($news_all), 2);
        ?>
        @foreach($news_all as $news_allChunk)
            <div class="row">
                @foreach($news_allChunk as $news)
                    @include('posts/news')
                @endforeach
            </div>
        @endforeach
        <p><a href="{{ URL::to('news/all') }}">Перейти ко всем новостям</a></p>
    </div>


</div>
<div class="container posts">
    <h3 class="index_header_posts">Последние работы</h3>
    <?php
    $posts = array_chunk(iterator_to_array($posts), 3);
    ?>
    @foreach($posts as $postsChunk)
        <div class="row">
            @foreach($postsChunk as $post)
                @include('posts/post_preview')
            @endforeach
        </div>
    @endforeach
</div>
    <div class="pages">
        <p class="pages_index">Страницы:   
            <?php
            for ($i = 1; $i <= $pages; $i++){
                echo "<a href='/page/$i' class='page'>$i</a>";
            }
            ?>
        </p>
    </div>

<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_image_body" class="modal-body">
            </div>
        </div>
    </div>
</div>
@stop
