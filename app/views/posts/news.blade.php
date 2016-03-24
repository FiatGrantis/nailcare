<div class="col-lg-12 col-md-12 col-sm-12 news_post">
    <div class="col-sm-4 col-md-4">
        <a href="{{ action('NewsController@getView', array($news->id)) }}"><img src="{{ URL::asset($news['news_thumbnail']) }}" class="news_image"></a>
    </div>

    <div class="col-sm-8 col-md-8 news_caption">
        <h3>{{ $news->news_name }}</h3>
        <div class="caption">
            <p>{{ date_create($news->created_at)->format('d.m.Y H:i') }}
            </p>
        </div>
        <p>{{ $news->news_prev_text }}</p>
        <a class="btn btn-default" href="{{ action('NewsController@getView', array($news->id)) }}" role="button">Читать далее &raquo;</a>
    </div>
</div>
