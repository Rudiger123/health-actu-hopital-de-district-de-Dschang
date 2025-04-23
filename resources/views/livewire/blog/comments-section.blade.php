<div>
    <section id="blog-comments" class="blog-comments section">
        <div wire:ignore.self class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="blog-comments-3">
                <div class="section-header">
                    <h3>Comments <span class="comment-count">({{ $totalComments }})</span></h3>
                </div>

                <div class="comments-wrapper">
                    @foreach ($comments as $comment)
                        @include('livewire.partials.comment', ['comment' => $comment])
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="blog-comment-form" class="blog-comment-form section">
        <div  wire:ignore.self class="container" data-aos="fade-up" data-aos-delay="100">
            <form wire:submit.prevent="submitComment">
                <div class="section-header">
                    <h3>Share Your Thoughts</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                </div>

                <div class="row gy-3">
                    @guest
                        <div class="col-md-6 form-group">
                            <label>Full Name *</label>
                            <input type="text" wire:model="name" class="form-control" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Email Address *</label>
                            <input type="email" wire:model="email" class="form-control" required>
                        </div>
                    @endguest

                    <div class="col-12 form-group">
                        <label>Your Comment *</label>
                        <textarea wire:model="content" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn-submit">Post Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <style>
        .comment-card.reply {
            margin-left: 2.5rem;
            border-left: 2px solid #eee;
            padding-left: 1rem;
        }

        .liked {
            color: #0d6efd;
        }

        .reply-thread {
            margin-top: 1.5rem;
        }
    </style>
</div>
