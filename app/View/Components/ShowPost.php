<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowPost extends Component
{

    //Value to be received in props
    public $posts;

    public function __construct($posts)
    {
        // Assignate the value to our props the value give to the html tag
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-post');
    }
}
