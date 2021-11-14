<?php

namespace App\Services;

use App\Models\View;
use App\Events\PostViewEvent;

class ViewService
{
    public function __construct(View $view) 
    {
        $this->view = $view;
    }

    public function saveView($viewData)
    {
        $this->view->create($viewData)->save();
    }
}