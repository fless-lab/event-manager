<header id="header" class="bg-dark" id="home">
    <div class="container ">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="{{ asset('assets/users/gen/img/logo.png') }}" alt="Logo"
                        title="Logo" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#home">Home</a></li>
                    <li><a href="#videos">Videos</a></li>
                    <li><a href="#speakers">Speakers</a></li>
                    <li><a href="#schedule">Schedule</a></li>
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
                    <li><a class="ticker-btn" href="#">Buy Ticket</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
