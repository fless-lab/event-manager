<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="{{ asset('assets/users/gen/img/logo.png') }}" alt="Logo" title="Logo"
                        width="px" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="/">Home</a></li>
                    <li><a href="{{ route('events') }}">Events</a></li>
                    @if (Auth::user())
                        @if (Auth::user()->role->name != 'User')
                            <li><a href="">Dashboard</a></li>
                        @endif
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
