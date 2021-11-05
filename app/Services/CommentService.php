<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\User;

class CommentService
{
    public function delete(Comment $comment, User $user)
    {
        if (!$comment->canDelete($user)) {
            throw new \RuntimeException('Нельзя удалить комментарий');
        }

        $comment->delete();
    }
}
