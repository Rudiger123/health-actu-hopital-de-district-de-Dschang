<!-- Categories Widget -->
<div class="categories-widget widget-item">
    <h3 class="widget-title">Categories</h3>
    <ul class="mt-3">
        @foreach($categories as $category)
            <li>
                <a href="{{ route('category_posts', $category->slug) }}">
                    {{ $category->name }} <span>({{ $category->posts_count }})</span>
                </a>
            </li>
        @endforeach
    </ul>
</div><!--/Categories Widget -->