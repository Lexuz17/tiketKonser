<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CategoryCard extends Component
{

    public $backgroundColor;
    public $image;
    public $categoryName;

    public function __construct($backgroundColor, $image, $categoryName)
    {
        $this->backgroundColor = $backgroundColor;
        $this->image = $image;
        $this->categoryName = $categoryName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-card');
    }
}
