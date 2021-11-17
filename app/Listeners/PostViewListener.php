<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostViewEvent;
use App\Models\View;
use App\Services\ViewService;

class PostViewListener implements ShouldQueue
{
    private $viewService;

    function __construct(ViewService $viewService) 
    {
        $this->viewService = $viewService;
    }

    public function handleUserView(PostViewEvent $eventData) 
    {
        $this->viewService->saveView($eventData);
    }

    public function subscribe($events)
    {
        $events->listen(PostViewEvent::class, [PostViewListener::class, 'handleUserView']);
    }
}
