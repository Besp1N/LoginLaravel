@extends("layouts.app")
@section("title", "Register")

@section("content")

    <form action="{{route("")}}" method="post">
        @csrf
        <div class="inputs">
            <span>Register</span>
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Register</button>
        </div>
    </form>

@endsection
