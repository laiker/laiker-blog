<?php

namespace App\Services;
use App\Models\Comment;

class CommentService
{
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function delete()
    {
        if ($this->comment->canDelete()) {
            $this->comment->delete();
        }
    }
}
