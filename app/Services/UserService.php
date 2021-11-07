<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function softDelete(User $user)
    {
        $userComments = $user->comments()->get();
        foreach($userComments as $comment) {
            $comment->delete();
        }
        $user->delete();
    }

    public function softRestore(User $user)
    {
        
        $userComments = $user->comments()->withTrashed()->get();
        foreach($userComments as $comment) {
            $comment->restore();
        }
        $user->restore();
    }
}
