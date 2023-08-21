@extends("layouts.app")
@section("title", "Home")

@section("content")
    <section class="register_login">
        <div>
            <a href="{{route("auth.register")}}">Register</a>
        </div>
        <div>
            <a href="{{route("auth.login")}}">Login</a>
        </div>
    </section>
@endsection
