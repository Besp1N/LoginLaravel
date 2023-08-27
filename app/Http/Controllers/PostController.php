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
        $posts = $user->posts;
        $allPosts = Post::where("user_id", "!=", $user->id)->get();

        return view('dashboard.index', ['name' => $user->name, "posts" => $posts, "allPosts" => $allPosts]);
    }

    public function store(Post $post, Request $request)
    {
        $validatedData = $request->validate($this->rules);
        $user = auth()->user();
        Post::create([
            "content" => $validatedData["content"],
            "user_id" => $user->id
        ]);
        $posts = $user->posts;
        $allPosts = Post::where("user_id", "!=", $user->id)->get();
        return view("dashboard.index", ["posts" => $posts, "allPosts" => $allPosts]);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route("dashboard.index");
    }


}
