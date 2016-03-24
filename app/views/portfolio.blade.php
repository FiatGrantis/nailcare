@extends('layout')

@section('title')
    Портфолио
@stop

@section('content')
    <div class="wrapper">

        <div class="jumbotron">
            <div class="container">
                <h2>Портфолио</h2>
            </div>
        </div>
        <h3 class="portfolio_header">Все работы <?php echo "($counter)"; ?>:</h3>
        <div class="container posts">
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
