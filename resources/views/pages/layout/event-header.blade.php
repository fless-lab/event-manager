<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="{{ asset('assets/users/gen/img/logo.png') }}" alt="Logo"
                        title="Logo" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#home">Home</a></li>
                    <li><a href="#videos">Videos</a></li>
                    <li><a href="#speakers">Speakers</a></li>
                    <li><a href="#schedule">Schedule</a></li>
                    @if (Auth::user())
                        <li class="menu-has-children"><a href="">Settings</a>
                            <ul>
                                <li><a href="./generic.html">Account</a></li>
                                <li><a href="./elements.html">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="#schedule">Login</a></li>
                    @endif
                    <li><a class="ticker-btn" href="#">Buy Ticket</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
