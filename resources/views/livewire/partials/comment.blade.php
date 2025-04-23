<article class="comment-card {{ $comment->parent_id ? 'reply' : '' }}">
    <div class="comment-header">
        <div class="user-info">
            <img src="{{ $comment->user?->avatar ?? 'assets/img/person/default-avatar.webp' }}" alt="User avatar">
            <div class="meta">
                <h4 class="name">{{ $comment->user?->name ?? $comment->guest_name }}</h4>
                <span class="date">
                    <i class="bi bi-calendar3"></i> 
                    {{ $comment->created_at->format('F d, Y') }}
                </span>
            </div>
        </div>
    </div>
    
    <div class="comment-content">
        <p>{{ $comment->content }}</p>
    </div>
    
    <div class="comment-actions">
        <livewire:blog.like-button :comment="$comment" :key="$comment->id" />
        
        {{-- <button class="action-btn reply-btn" wire:click="reply({{ $comment->id }})">
            <i class="bi bi-reply"></i>
            <span>Reply</span>
        </button> --}}
    </div>

    {{-- @if($comment->replies->count())
        <div class="reply-thread">
            @foreach($comment->replies as $reply)
                @include('livewire.partials.comment', ['comment' => $reply])
            @endforeach
        </div>
    @endif --}}
</article>