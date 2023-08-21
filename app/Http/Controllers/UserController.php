<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private array $registerRules = [
      "name" => "required|min:3|max:10",
      "email" => "required|email",
      "password" => "required|min:8|max:15"
    ];
    public function register(Request $request)
    {
        $validatedData = $request->validate($this->registerRules);
    }
}
