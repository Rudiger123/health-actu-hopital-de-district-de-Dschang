<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    /**
     * Create a new component instance. 
     */
    public function __construct(
        public string $image1,
        public string $image2,
        public string $image3,
        public string $text1,
        public string $text2,
        public string $text3,
        public string $titel1,
        public string $titel2,
        public string $titel3,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.hero');
    }
}
