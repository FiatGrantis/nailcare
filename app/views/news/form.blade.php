<div class="form-group">
    <label for="news_name" class="col-sm-2 control-label">Название</label>
    <div class="col-sm-5">
        {{ Form::text('news_name', null, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label for="news_photo" class="col-sm-2 control-label">Фото</label>
    <div class="col-sm-5">
        {{ Form::file('news_photo', null, array('class' => 'form-control')) }}<br />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
</div>
<div class="form-group">
    <label for="news_text" class="col-sm-2 control-label">Текст новости</label>
    <div class="col-sm-5">
        {{ Form::textarea('news_text', null, array('class' => 'form-control bbeditor')) }}<br />
    </div>
</div>
<div class="form-group">
    <label for="news_prev_text" class="col-sm-2 control-label">Комментарий (сокращённый текст)</label>
    <div class="col-sm-5">
        {{ Form::textarea('news_prev_text', null, array('class' => 'form-control bbeditor')) }}<br />
    </div>
</div>