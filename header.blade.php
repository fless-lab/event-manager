<header id="header" id="home" class=@yield('bgColor')>
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
                            <li><a href="{{route( (Auth::user()->role->name!='Admin' ? 'promoter':'admin').'.index')}}">Dashboard</a></li>
                        @endif
                        
                            <li>
                                <form action="{{ route('logout') }}" id="logoutForm" method="post">
                                    @csrf
                                    <a style="background: red; color: #fff;cursor:pointer;" id="logoutBtn">Logout</a>
                                    <script>
                                        let form = document.getElementById("logoutForm");
                                        let btn = document.getElementById("logoutBtn");

                                        btn.addEventListener("click", function() {
                                            form.submit();
                                        })
                                    </script>
                                </form>
                            </li>
                            
                        
                    @else
                        <li><a class="ticker-btn" href="{{ route('login') }}">Login</a></li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</header>
