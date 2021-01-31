<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;

    public $fullTitle;

    public function __construct($title = null, $fullTitle = null)
    {
        $pageTitle = $title . ' | ' . config('app.name');

        $this->title = $fullTitle ? $fullTitle : $pageTitle;

        if (!isset($title) && !isset($fullTitle)) {
            $this->title = config('app.name');
        }
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
