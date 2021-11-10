<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

class UserService
{
    public function softDelete(User $user)
    {
        $userComments = $user->comments()->get();
        foreach ($userComments as $comment) {
            $comment->delete();
        }
        $user->delete();
    }

    public function softRestore(User $user)
    {
        if ($user->trashed()) {
            $user->restore();
            $userComments = $user->comments()->withTrashed()->get();
            foreach ($userComments as $comment) {
                $comment->restore();
            }
        }
    }

    public function forceDelete()
    {
        User::whereDate('deleted_at', '<=', Carbon::now()->subDays(14))->withTrashed()->get()->map(function ($user) {
            return $user->forceDelete();
        });
    }
}
