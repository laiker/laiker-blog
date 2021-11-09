<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\UserService;

class UserLogin
{
    public $userService;

    function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function handleUserLogin($event) {
        $user = $event->user;
        if($user->trashed()) {
            $this->userService->softRestore($event->user);
        }
    }

    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            [UserLogin::class, 'handleUserLogin']
        );
    }
}
