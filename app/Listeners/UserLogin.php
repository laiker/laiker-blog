<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\UserService;
use Illuminate\Auth\Events\Login;

class UserLogin
{
    private $userService;

    function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function handleUserLogin(Login $event) {
        $user = $event->user;
        $this->userService->softRestore($user);
    }

    public function subscribe($events)
    {
        $events->listen(Login::class, [UserLogin::class, 'handleUserLogin']);
    }
}
