<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private array $rules = [
      "content" => "required"
    ];
    public function dashboard()
    {
        $user = auth()->user();
        return view('dashboard.index', ['name' => $user->name]);
    }

    public function store(Post $post, Request $request)
    {
        $validatedData = $request->validate($this->rules);
        $user = auth()->user();
        Post::create([
            "content" => $validatedData["content"],
            "user_id" => $user->id
        ]);
        return redirect()->route("dashboard.index");
    }

    public function showPosts()
    {
        $user = auth()->user();
        $posts = $user->posts;

        $test = "dupa";

        return view('dashboard.index', ["posts" => $posts]);

    }
}
