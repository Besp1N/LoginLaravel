@extends("layouts.app")
@section("title", "Login")

@section("content")

    <form action="{{route("auth.login.post")}}" method="post">
        @csrf
        <div class="inputs">
            <span>Login</span>
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Log in</button>
        </div>
    </form>

@endsection
