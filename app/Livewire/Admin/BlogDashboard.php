<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BlogDashboard extends Component
{
    public $test;
    public $timeRange = 'month';
    public $selectedCategories = [];
    
    protected $listeners = ['timeRangeUpdated' => 'updateTimeRange'];

    public function mount()
    {
        dd('hello');
    }

    public function updateTimeRange($range)
    {
        $this->timeRange = $range;
        $this->emit('refreshCharts');
    }

    public function render()
    {
        $stats = $this->getStats();
        $recentActivity = $this->getRecentActivity();
        $popularCategories = $this->getPopularCategories();
        $activeAuthors = $this->getActiveAuthors();

        return view('livewire.admin.blog-dashboard', [
            'totalPosts' => $stats['total_posts'],
            'totalComments' => $stats['total_comments'],
            'postsIncrease' => $stats['posts_increase'],
            'commentsIncrease' => $stats['comments_increase'],
            'recentPosts' => $recentActivity['posts'],
            'recentComments' => $recentActivity['comments'],
            'popularCategories' => $popularCategories,
            'activeAuthors' => $activeAuthors,
            'timeRange' => $this->timeRange,
        ]);
    }

    private function getStats()
    {
        // Périodes pour les comparaisons
        $currentStart = $this->getStartDate();
        $previousStart = $this->getStartDate(true);

        // Requêtes pour les stats principales
        $totalPosts = Post::count();
        $totalComments = Comment::count();

        // Calcul des augmentations
        $currentPosts = Post::where('created_at', '>=', $currentStart)->count();
        $previousPosts = Post::whereBetween('created_at', [$previousStart, $currentStart])->count();
        $postsIncrease = $this->calculateIncrease($currentPosts, $previousPosts);

        $currentComments = Comment::where('created_at', '>=', $currentStart)->count();
        $previousComments = Comment::whereBetween('created_at', [$previousStart, $currentStart])->count();
        $commentsIncrease = $this->calculateIncrease($currentComments, $previousComments);

        return [
            'total_posts' => $totalPosts,
            'total_comments' => $totalComments,
            'posts_increase' => $postsIncrease,
            'comments_increase' => $commentsIncrease,
        ];
    }

    private function getRecentActivity()
    {
        $posts = Post::with('author')
            ->latest()
            ->take(5)
            ->get();

        $comments = Comment::with(['post', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return [
            'posts' => $posts,
            'comments' => $comments,
        ];
    }

    private function getPopularCategories()
    {
        return Category::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();
    }

    private function getActiveAuthors()
    {
        return User::whereHas('posts')
            ->withCount(['posts' => function($query) {
                $query->where('created_at', '>=', $this->getStartDate());
            }])
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();
    }

    private function getStartDate($previous = false)
    {
        $multiplier = $previous ? 2 : 1;
        
        switch ($this->timeRange) {
            case 'week':
                return now()->subWeeks($multiplier);
            case 'year':
                return now()->subYears($multiplier);
            default: // month
                return now()->subMonths($multiplier);
        }
    }

    private function calculateIncrease($current, $previous)
    {
        if ($previous === 0) {
            return $current === 0 ? 0 : 100;
        }

        return round(($current - $previous) / $previous * 100);
    }
}