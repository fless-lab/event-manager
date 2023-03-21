@extends('pages.dashboard.admin.base')

<style>
    .d {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .c {
        color: #fff;
        height: 250px;
        width: 300px;
        margin: 20px;
        text-align: center;
        box-shadow: 0px 2px 5px black;
    }

    .e {
        background: #fff;
        height: 200px;
        text-align: center;
    }

    .p a {
        text-decoration: none;
        font-size: 20px;
    }

    .e h1 {
        font-size: 150px;
    }


    .e-1 {
        background: blue;
    }

    .e-2 {
        background: blueviolet;
    }

    .e-3 {
        background: #FF007F;
    }
</style>

@section('content')
    <div class="d">
        <div class="c">
            <div class="e e-1">
                <h1>{{ $users }}</h1>
            </div>
            <div class="p p-1">
                <a href="{{ route('admin.users.index') }}">users</a>
            </div>

        </div>
        <div class="c">
            <div class="e e-2">
                <h1>{{ $events }}</h1>
            </div>
            <div class="p p-2">
                <a href="{{ route('admin.events.index') }}">events</a>
            </div>
        </div>
        <div class="c">
            <div class="e e-3">
                <h1>{{ $categories }}</h1>
            </div>
            <div class="p p-3">
                <a href="{{ route('admin.events-categories.index') }}">event categories</a>
            </div>
        </div>
    </div>
    </div>
@endsection
