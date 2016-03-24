<div class="container comments">
    <h3>Комментарии (<?php echo $comments_counter; ?>):</h3>
    @if(!empty($post['comments']))
        @foreach($post['comments'] as $comment)
            <hr/>
            <p><b>{{ $comment['name'] }}</b> <time>{{ $comment['date'] }}</time></p>
            <p>Заголовок: {{ $comment['title'] }}</p>
            <p>Комментарий: {{ $comment['comment'] }}</p>
            <hr/>
        @endforeach
    @elseif(empty($post['comments']))
        <p>У этой записи пока нет комментариев.</p>
    @endif
</div>