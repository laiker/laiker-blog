<?php

namespace App\Services;

use App\Models\View;
use App\Events\PostViewEvent;

class ViewService
{
    public function saveView($viewData)
    {
        View::create($viewData)->save();
    }
}