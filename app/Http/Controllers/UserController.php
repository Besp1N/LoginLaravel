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

    private array $loginRules = [
        "email" => "required",
        "password" => "required"
    ];

    public function register(Request $request)
    {
        $validatedData = $request->validate($this->registerRules);
        $validatedData["password"] = bcrypt($validatedData["password"]);
        $user = User::create($validatedData);
        auth()->login($user);
        return redirect()->route("dashboard.index")->with("name", $user->name);
    }

    public function login(Request $request)
    {
        $validateData = $request->validate($this->loginRules);

        if (auth()->attempt(["email" => $validateData["email"], "password" => $validateData["password"]]))
        {
            $request->session()->regenerate();
            $user = auth()->user();
            return redirect()->route("dashboard.index")->with("name", $user->name);
        }
        else
        {
            return redirect()->route("home.index");
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route("home.index");
    }

    public function dashboard()
    {
        $user = auth()->user(); // Pobranie zalogowanego użytkownika
        return view('dashboard.index', ['name' => $user->name]);
    }

}
