@extends("layouts.app")
@section("title", "Logged in")

@section("content")
    @auth
        <p>zalogowany jestes</p>
    @else
        <p>sadge</p>
    @endauth
@endsection
