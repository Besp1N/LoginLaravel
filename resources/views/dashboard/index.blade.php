@extends("layouts.app")
@section("title", "Logged in")

@section("content")
    @auth
        <p>zalogowany jestes</p>
        <p>siema {{session("name")}}</p>
        <form action="{{route("auth.logout")}}" method="post">
            @csrf
            <button>Log out</button>
        </form>
    @else
        <p>sadge</p>
    @endauth
@endsection
