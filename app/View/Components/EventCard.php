<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventCard extends Component
{
    public $image;
    public $location;
    public $title;
    public $date;
    public $price;
    public $creatorImage;
    public $creatorName;

    public function __construct($image, $location, $title, $date, $price, $creatorImage, $creatorName)
    {
        $this->image = $image;
        $this->location = $location;
        $this->title = $title;
        $this->date = $date;
        $this->price = $price;
        $this->creatorImage = $creatorImage;
        $this->creatorName = $creatorName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event-card');
    }
}
