<?php

namespace App\Services;

class CommentService
{
    public function delete($comment, $currentUser)
    {
        if (!$comment->canDelete($currentUser)) {
            throw new \RuntimeException('Нельзя удалить комментарий');
        }

        $comment->delete();
    }
}
