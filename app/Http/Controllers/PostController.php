<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('create-post');
    }

    public function store(Request $request) {
        $validatedRequest = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $post = Post::create($validatedRequest);

        if ($post) {
            PostPublished::dispatch($post);
        }

        return $post;
    }
}
