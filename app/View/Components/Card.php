<?php

namespace App\View\Components;

use App\Models\Announcement;
use Illuminate\View\Component;

class Card extends Component
{
    public $announcement;

    public function __construct(Announcement $announcement)
    {
        $this->announcement=$announcement;
    }

    public function render()
    {
        return view('components.card');
    }
}
