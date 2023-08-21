<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private array $registerRules = [
      "name" => "required|min:3|max:10|unique:users",
      "email" => "required|email|unique:users",
      "password" => "required|min:8|max:15"
    ];

    public function register(Request $request)
    {
        $validatedData = $request->validate($this->registerRules);
        $validatedData["password"] = bcrypt($validatedData["password"]);
        $user = User::create($validatedData);
        auth()->login($user);

        return redirect()->route("dashboard.index");
    }
}
