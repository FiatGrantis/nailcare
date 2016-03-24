@extends('layout')
 
@section('title')
Добавление записи
@stop



@section('content')
@if (Auth::check() && Auth::user()->isAdmin())
   
<div class="jumbotron">
    <div class="container">

        @if ($errors->all())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <h2>Добавление записи</h2>
 
        {{ Form::open(array('url' => action('PostsController@postAdd'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'files' => true)) }}
        @include('posts/form')
        
        <div class="form-group">
            <div class="col-sm-2">&nbsp;</div>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary submit-button">Добавить</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@else

<div class="container">
<p>У вас нет прав для просмотра этой страницы.</p>

    @if (true)
        <script type="application/javascript">
            setTimeout(
                function() {
                    location.href = '/';
                },
                10000
            );
        </script>
        <p class="like-h">Нажмите <a href="/">эту ссылку</a>, если ваш браузер не поддерживает автоматический редирект.</p>
    @endif

@endif
</div>

@stop