@extends("layouts.app")
@section("title", "Logged in")

@section("content")
    @auth
        <p>Welcome {{Auth::user()->name}}</p>
        <form class="small_form" action="{{route("auth.logout")}}" method="post">
            @csrf
            @csrf
            <button class="logout">Log out</button>
        </form>

        <p class="center">add your post!</p>
        <form class="small_form" id="add_form" action="{{route("dashboard.store")}}" method="post">
            @csrf
            <input name="content" type="text" placeholder="type sth...">
            <input type="submit" value="add post">
        </form>
    @else
        <p>You are not logged in. Redirecting to home page</p>
        {{header("refresh:3;url=".route("home.index"))}}
        {{exit()}}
    @endauth
@endsection
