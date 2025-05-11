<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewsletterSubscription;
use App\Models\SocialLink;
use App\Models\Tag;
use App\Models\User;

class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function services()
    {
        return view('pages.services');
    }

    public static function actualités()
    {
        // Récupérer les articles mis en avant (featured)
        $featuredPosts = Post::with('author')
            ->where('featured', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $posts = Post::where('featured', true)
        ->orderBy('published_at', 'desc')
        ->take(5)
        ->get();;

        return view('pages.blog.index', [
            'featuredPosts' => $featuredPosts,
            'posts' => $posts,
        ]);
    }
    public function categoryPosts($slug)
    {
        $posts = Post::all();
        return view('pages.blog.index', [
            'posts' => $posts,
        ]);
    }

    public static function contact()
    {
        return view('pages.contact');
    }

    public function categoryPost($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::with(['author', 'category'])
            ->where('category_id', $category->id)
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('pages.blog.categoryPosts', compact('category', 'posts'));
    }

    public function tagPosts($slug)
    {
        // Récupérer le tag correspondant au slug
        $tag = Tag::where('name', $slug)->firstOrFail();

        // Récupérer les articles associés au tag avec pagination
        $posts = Post::with(['author', 'category', 'tags'])
            ->whereHas('tags', function ($query) use ($slug) {
                $query->where('name', $slug);
            })
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('pages.blog.tagPosts', compact('tag', 'posts'));
    }

    public function authorPosts($slug)
    {
        $post =  User::where('username',$slug)->firstOrFail();
        $countPosts = $post->count();
        $newsletter = NewsletterSubscription::count();
        $author = User::withCount('posts')
            ->with(['posts' => function($query) {
                $query->with('category')
                      ->latest()
                      ->take(2);
            }])
            ->where('username', $slug)
            ->firstOrFail();

            $socialLinks = SocialLink::all();
            foreach ($socialLinks as $socialLink) {
                if ($socialLink->user_id  === $author->id)  {
                    $link = $socialLink;
                }else{
                    $link = null;
                }
            }

        return view('pages.blog.profileAuthor', compact(['author','countPosts','newsletter','link']));
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();

        return view('pages.blog.view-post', compact('post', 'relatedPosts'));
    }

    public function searchResults()
    {
        return view('pages.blog.search-results');
    }
}
