<div class="col-md-4 post">
    <h4>{{{ $post->name }}}</h4>

    <p class="thumb_p"><img src="{{ asset('uploads/'.$post->thumbnail) }}" alt="{{{ $post->name }}}" class="thumbnail image_preview" data-full="{{ asset('uploads/'.$post->photo) }}"/></p>

    <p class="description"><small>{{{ $post->post_prev_text }}}</small></p>
    <table>
        <tr>
            <td class="td_left"><small>Просмотров: {{ $post->views }}</small></td>

        </tr>
    </table>
    <p><a class="btn btn-default" href="{{ action('PostsController@getView', array($post->id)) }}" role="button">Детали записи &raquo;</a></p>
</div>