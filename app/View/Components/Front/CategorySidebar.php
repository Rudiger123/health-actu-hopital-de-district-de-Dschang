<?php

namespace App\View\Components\Front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category; // Importez le modèle Category

class CategorySidebar extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Récupérer les catégories avec le nombre d'articles
        $this->categories = Category::withCount('posts') // Supposons que vous avez une relation posts
            ->orderBy('name')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.category-sidebar');
    }
}