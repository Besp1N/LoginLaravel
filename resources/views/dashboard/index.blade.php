@extends("layouts.app")
@section("title", "Logged in")

@section("content")
    @auth
        <p>Welcome {{Auth::user()->name}}</p>
        <form action="{{route("auth.logout")}}" method="post">
            @csrf
            <button class="logout">Log out</button>
        </form>

        <p>add your post!</p>
    @else
        <p>You are not logged in. Redirecting to home page</p>

        {{header("refresh:3;url=".route("home.index"))}}
        {{exit()}}
    @endauth
@endsection
