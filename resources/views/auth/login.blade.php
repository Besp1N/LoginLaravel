@extends("layouts.app")
@section("title", "Login")

@section("content")

    <form action="" method="post">
        @csrf
        <div class="inputs">
            <span>Login</span>
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Register</button>
        </div>
    </form>

@endsection
