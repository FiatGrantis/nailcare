@extends('layout')

@section('title')
    {{ $news['news_name'] }}
@stop

@section('headExtra')
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
@stop

@section('content')
    <div class="wrapper">
    <div class="jumbotron">
        <div class="container">
            <h2>
                {{{ $news['news_name'] }}}
            </h2>
        </div>
    </div>
        <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 news_post">
            <div class="col-sm-4 col-md-4">
                <img src="{{ URL::asset($news['news_thumbnail']) }}" class="news_image">
            </div>

            <div class="col-sm-8 col-md-8 news_caption">
                <h3>{{ $news->news_name }}</h3>
                <div class="caption">
                    <p>
                        {{ date_create($news->created_at)->format('d.m.Y H:i') }}
                    </p>
                    <p>
                    </p>
                </div>
                <p>{{ $news->news_text }}</p>
            </div>
        </div>
        </div>
    <div class="container">
        <?php
        if($next > 0) {
            echo link_to('news/view/'.$next, 'Следующая новость', $secure = null);
        }
        ?>
    </div>
    <div class="container">
        <?php
        if($previous > 0) {
            echo link_to('news/view/'.$previous, 'Предыдущая новость', $secure = null);
        }
        ?>
    </div>
    </div>
@stop