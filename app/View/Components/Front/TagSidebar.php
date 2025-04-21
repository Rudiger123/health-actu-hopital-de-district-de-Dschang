<?php

namespace App\View\Components\Front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Tag; // N'oubliez pas d'importer le modèle Tag

class TagSidebar extends Component
{
    public $tags;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Récupérer les tags depuis la base de données
        $this->tags = Tag::query()
            ->orderBy('name') // Vous pouvez modifier l'ordre selon vos besoins
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.tag-sidebar');
    }
}