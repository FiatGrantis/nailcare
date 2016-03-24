@extends('layout')

@section('title')
Новости
@stop

@section('content')
<div class="wrapper">
    <div class="jumbotron">
        <div class="container">
            <h2>Новости</h2>
        </div>
    </div>

    <div class="container">
        <?php
        $news_all = array_chunk(iterator_to_array($news_all), 1);
        ?>
        @foreach($news_all as $news_allChunk)
        <div class="row">
            @foreach($news_allChunk as $news)
            @include('news/news_preview')
            @endforeach
        </div>
        @endforeach
    </div>

    <div class="container">
        <?php
        for ($i = 1; $i <= $pages; $i++){
            echo "<a href='/news/all/page/$i' class='page'>$i</a>";
        }

        ?>
    </div>
</div>
@stop