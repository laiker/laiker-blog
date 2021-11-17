<?php

namespace App\Services;

use App\Models\View;
use App\Events\PostViewEvent;

class ViewService
{
    public function saveView(PostViewEvent $eventViewData)
    {
        View::firstOrNew(['user_id' => $eventViewData->userId, 'post_id' => $eventViewData->postId, 'ip' => $eventViewData->ip])->save();
    }
}