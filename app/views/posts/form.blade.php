<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Название</label>
    <div class="col-sm-5">
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <label for="group" class="col-sm-2 control-label">Группа</label>
    <div class="col-sm-5">
        {{ Form::select('group', Post::$group, null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <label for="photo" class="col-sm-2 control-label">Фото</label>
    <div class="col-sm-5">
        {{ Form::file('photo', null, array('class' => 'form-control')) }}<br />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
</div>

<div class="form-group">
    <label for="post_prev_text" class="col-sm-2 control-label">Комментарий (сокращённый текст)</label>
    <div class="col-sm-5">
        {{ Form::textarea('post_prev_text', null, array('class' => 'form-control bbeditor')) }}<br />
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Текст записи</label>
    <div class="col-sm-5">
        {{ Form::textarea('description', null, array('class' => 'form-control bbeditor')) }}<br />
    </div>
</div>