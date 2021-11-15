<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Events\PostViewEvent;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(
            request(['search', 'category', 'author'])
        )->paginate(18)->withQueryString();

        foreach($posts as &$post) {
            $postViews = $post->views();
            $post->viewsCountAll = $postViews->count();
            $post->viewsCountDaily = $postViews->whereDate('viewed_at', Carbon::today())->count();
        }

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post, Request $request)
    {
        $postViews = $post->views();
        $post->viewsCountAll = $postViews->count();
        $post->viewsCountDaily = $postViews->whereDate('viewed_at', Carbon::today())->count();
        $eventData = [
            'post_id' => $post->id,
            'user_id' => optional($request->user())->id,
            'ip' => $request->ip()
        ];
        PostViewEvent::dispatch($eventData);
        
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
