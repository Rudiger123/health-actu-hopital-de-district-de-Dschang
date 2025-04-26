<div class="min-h-screen bg-gray-50 p-6">
    
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Gestion des Interactions</h1>
            <div class="flex space-x-4">
                <div class="relative">
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Rechercher des posts..."
                        class="pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
                <h3 class="text-sm font-medium text-gray-500">Total Commentaires</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $commentStats['total'] }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                <h3 class="text-sm font-medium text-gray-500">Total Articles</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $commentStats['posts'] }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
                <h3 class="text-sm font-medium text-gray-500">Likes</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $commentStats['like'] }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
                <h3 class="text-sm font-medium text-gray-500">Réponses</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $commentStats['replies'] }}</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Posts List -->
            <div class="lg:w-2/5">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-lg font-semibold text-gray-800">Liste des Posts</h2>
                    </div>
                    <div class="divide-y">
                        @foreach ($posts as $post)
                            <div wire:click="selectPost({{ $post->id }})"
                                class="p-6 hover:bg-gray-50 cursor-pointer transition-colors {{ $selectedPost?->id == $post->id ? 'bg-blue-50' : '' }}">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-medium text-gray-800">{{ Str::words($post->title, 10, '...') }}</h3>
                                    <span class="text-xs text-gray-500">{{ $post->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="mt-2 flex space-x-4">
                                    <span class="inline-flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                        {{ $post->all_comments_count }}
                                    </span>
                                    <span class="inline-flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                            </path>
                                        </svg>
                                         {{ $post->comments()->get()->count() }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="px-6 py-4 border-t">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="lg:w-3/5">
                @if ($selectedPost)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b flex justify-between items-center">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">Commentaires pour:
                                    {{ $selectedPost->title }}</h2>
                                <p class="text-sm text-gray-500">Posté le
                                    {{ $selectedPost->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <button wire:click="$set('selectedPost', null)"
                                    class="p-2 text-gray-500 hover:text-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="divide-y max-h-[600px] overflow-y-auto">
                            @forelse($comments as $comment)
                                <div class="p-6 bg-yellow-50">
                                    <div class="flex justify-between">
                                        <div class="flex items-start space-x-3">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                    {{ substr($comment->guest_name, 0, 1) }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex items-center space-x-2">
                                                    <h4 class="font-medium text-gray-800">{{ $comment->guest_name }}
                                                    </h4>
                                                    {{-- @if (!$comment->approved)
                                            <span class="px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded-full">En attente</span>
                                            @endif --}}
                                                </div>
                                                <p class="text-sm text-gray-500">
                                                    {{ $comment->created_at->diffForHumans() }}</p>
                                                <p class="mt-2 text-gray-700">{{ $comment->content }}</p>

                                                <!-- Actions -->
                                                <div class="mt-3 flex space-x-3">
                                                    @if (!$comment)
                                                        <button wire:click="approveComment({{ $comment->id }})"
                                                            class="text-sm text-green-600 hover:text-green-800 flex items-center">
                                                            <svg class="w-4 h-4 mr-1" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                            Approuver
                                                        </button>
                                                    @endif
                                                    <button wire:click="deleteComment({{ $comment->id }})"
                                                        class="text-sm text-red-600 hover:text-red-800 flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                        Supprimer
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @empty
                                <div class="p-6 text-center text-gray-500">
                                    Aucun commentaire pour ce post
                                </div>
                            @endforelse
                        </div>
                    </div>
                @else
                    <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun post sélectionné</h3>
                        <p class="mt-1 text-sm text-gray-500">Sélectionnez un post pour voir ses commentaires et
                            interactions</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
