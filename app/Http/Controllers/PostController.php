<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private array $rules = [
      "content" => "required"
    ];
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
}
