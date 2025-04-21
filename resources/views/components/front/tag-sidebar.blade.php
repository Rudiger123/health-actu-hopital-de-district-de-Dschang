<div class="tags-widget widget-item">
    <h3 class="widget-title">Tags</h3>
    <ul>
        @foreach($tags as $tag)
            <li>
                <a href="{{ route('tag_posts', $tag->name) }}">{{ $tag->name }}</a>
            </li>
        @endforeach
    </ul>
</div>