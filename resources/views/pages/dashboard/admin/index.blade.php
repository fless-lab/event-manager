@extends("pages.dashboard.admin.base")
@section("content")
<h3>Total <a href="{{route("admin.users.index")}}">users</a> : {{$users}}</h3>
<h3>Total <a href="{{route("admin.events.index")}}">events</a> : {{$events}}</h3>
<h3>Total <a href="{{route("admin.events.categories.index")}}">event categories</a> : {{$categories}}</h3>
@endsection
