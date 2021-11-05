<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Models\Comment;

class CommentController extends Controller
{
    public function destroy(Comment $comment, CommentService $commentService, Request $request)
    {
        try {
            $commentService->delete($comment, $request->user());
            return back();
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
