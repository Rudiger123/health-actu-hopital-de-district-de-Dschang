<button class="action-btn like-btn {{ $liked ? 'liked' : '' }}" wire:click="toggleLike">
    <i class="bi bi-hand-thumbs-up"></i>
    <span>{{ $count }}</span>
</button>
