<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Calendar extends Component
{
    public $events;

    public function __construct($events = [])
    {
        $this->events = $events;
    }

    public function render()
    {
        return view('components.calendar');
    }
}
