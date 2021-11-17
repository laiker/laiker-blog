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

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post, Request $request)
    {
        PostViewEvent::dispatch($post->id, optional($request->user())->id, $request->ip());
        
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
