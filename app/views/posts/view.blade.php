@extends('layout')

@section('title')
    Запись {{ $post['name'] }}
@stop

@section('headExtra')
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
@stop

@section('content')
    <div class="wrapper">
    <div class="jumbotron">
            <h2>{{ $post['name'] }}</h2>
    </div>
    <div class="container view" style="position: relative;">

            <div class="img_block">
                <p class="img_p"><img src="{{ $post['photo'] }}" alt="{{ $post['name'] }}" class="photo"/>{{ $post['description'] }}</p>
                <div class="next_right">
                    <?php
                    if($next > 0) {
                        echo link_to('posts/view/'.$next, '', array('id' => 'next', 'class' => 'glyphicon glyphicon-menu-right arrow'), $secure = null);
                    }
                    ?>
                </div>
                <div class="prev_left">
                    <?php
                    if($previous > 0) {
                        echo link_to('posts/view/'.$previous, '', array('id' => 'prev', 'class' => 'glyphicon glyphicon-menu-left arrow'), $secure = null);
                    }
                    ?>
                </div>
            </div>
        <p>Просмотров: {{ $post['views'] }}</p>

    </div>

@include('posts/comment')

    @if(Auth::check())
<div class="container comment_post col-md-8">
        @if ($errors->all())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    <h3>Оставьте свой комментарий</h3>
    <div class="comment_post">
    {{ Form::open(array('url' => action('CommentsController@postAdd'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'files' => true)) }}
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Заголовок</label>
            <div class="col-sm-5">
                {{ Form::text('title', null, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            <label for="text" class="col-sm-2 control-label">Комментарий</label>
            <div class="col-sm-5">
                {{ Form::textarea('text', null, array('class' => 'form-control bbeditor')) }}<br />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">&nbsp;</div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary submit-button">Добавить</button>
            </div>
        </div>
            <input type="hidden" name="post_id" value="{{ $post['post_id'] }}"/>
        {{ Form::close() }}
        </div>

        @elseif (!(Auth::check()))
        <div class="container only_auth">
            <p class="warning">Только авторизованные пользователи могут оставлять комментарии. Вы можете:</p>
            <p><a href="{{ action('UsersController@getRegister') }}">Зарегистрироваться</a></p>
            <p><a href="{{ action('UsersController@getLogin') }}">Войти</a></p>
        </div>
    @endif
</div>
    </div>
@stop