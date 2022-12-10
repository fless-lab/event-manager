@extends('pages.layout.base')
@section('title', 'Events')
@section('header')
    <header id="header" class="bg-dark" id="home">
        <div class="container ">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="{{ asset('assets/users/gen/img/logo.png') }}" alt="Logo"
                            title="Logo" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/">Home</a></li>
                        <li class="menu-active"><a href="{{ route('events') }}">Events</a></li>
                        @if (Auth::user())
                            <li><a href="">Dashboard</a></li>
                            <li class="menu-has-children"><a href="javascript:void(0);">Settings</a>
                                <ul>
                                    <li><a href="#!">My Account</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" id="logoutForm" method="post">
                                            @csrf
                                            <a style="color: red;cursor:pointer;" id="logoutBtn">Logout</a>
                                            <script>
                                                let form = document.getElementById("logoutForm");
                                                let btn = document.getElementById("logoutBtn");

                                                btn.addEventListener("click", function() {
                                                    form.submit();
                                                })
                                            </script>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a class="ticker-btn" href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>
@endsection


@section('main')
    <section style="min-height: 60vh">
        <section class="schedule-area pb-100" id="schedule">
            <div class="container" style="margin-top: 100px">
                <div class="row d-flex justify-content-center">
                    <div>
                        <div class="title text-center">
                            <h1 class="mb-10">Check our event list to find your enjoy</h1>
                            <p>You can use search fields to filtrer your request.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-wrap col-lg-12">
                        <table class="schdule-table table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="head" scope="col">sl</th>
                                    <th class="head" scope="col">session</th>
                                    <th class="head" scope="col">speaker</th>
                                    <th class="head" scope="col">vanue</th>
                                    <th class="head" scope="col">time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="name" scope="row">01</th>
                                    <td>Reception &amp; Taling Seats</td>
                                    <td>Isabelle Cooper</td>
                                    <td>3rd Hall Room</td>
                                    <td>02.00</td>
                                </tr>
                                <tr>
                                    <th class="name" scope="row">02</th>
                                    <td>Breakfast and rest</td>
                                    <td>N/A</td>
                                    <td>4th Hall Room</td>
                                    <td>02.00</td>
                                </tr>
                                <tr>
                                    <th class="name" scope="row">03</th>
                                    <td>Reception &amp; Taling Seats</td>
                                    <td>Jane Daniel</td>
                                    <td>2nd Hall Room</td>
                                    <td>02.00</td>
                                </tr>
                                <tr>
                                    <th class="name" scope="row">04</th>
                                    <td>Next generation speech</td>
                                    <td>Billy Barton</td>
                                    <td>1st Hall Room</td>
                                    <td>02.00</td>
                                </tr>
                                <tr>
                                    <th class="name" scope="row">05</th>
                                    <td>Sppech for young people</td>
                                    <td>Flora Gonzales</td>
                                    <td>4rd Hall Room</td>
                                    <td>02.00</td>
                                </tr>
                                <tr>
                                    <th class="name" scope="row">06</th>
                                    <td>Lunch Break</td>
                                    <td>N/A</td>
                                    <td>3rd Hall Room</td>
                                    <td>02.00</td>
                                </tr>
                                <tr>
                                    <th class="name" scope="row">07</th>
                                    <td>Sppech for Middle aged people</td>
                                    <td>Francisco Barrett</td>
                                    <td>1st Hall Room</td>
                                    <td>02.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection


@section('footer')
    @include('pages.layout.footer')
@endsection
