<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

        $posts = Post::all();

        // Récupérer les articles par catégorie
        $categories = [
            'Diabétologie' => Post::where('category_id', 1)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get(),
            'Prévention' => Post::where('category_id',2)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get(),
            'Nutrition' => Post::where('category_id', 3)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get(),
        ];

        return view('pages.blog.index',[
            'featuredPosts' => $featuredPosts,
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }   
    public function categoryPosts($slug)
    {
        $posts = Post::all();
        return view('pages.blog.index',[
            'posts' => $posts,
        ]);
    }

    public static function contact()
    {
        return view('pages.contact');
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
}
