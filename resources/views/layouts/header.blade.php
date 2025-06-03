<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <div class="container">
            <a class="navbar-brand" href="/">Movie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('navHome')"  href="">Home</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link @yield('navCategory')"  href="{{ route('category.index') }}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('navDosen')" href="{{ route('movie.index') }}">Movie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @yield('navProdi')" href="{{ route('movie.create') }}">Input Movie</a>
                    </li>
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">  {{ Auth::user()->name }} </a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <div>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item bg-transparent border-0 p-0 m-0" style="color: #212529;">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </div>
                    </ul>
                    </div>
                    @else
                    <li class="nav-item">
                        <a class="nav-link @yield('navProdi')" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-ligth text-center text-white " type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
