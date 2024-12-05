<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FAQItem extends Component
{
    public $question;
    public $answer;

    public function __construct($question, $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    public function render()
    {
        return view('components.faq-item');
    }
}