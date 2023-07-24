<nav class="navbar navbar-expand-lg border-bottom mb-5" style="background-color: #e3f2fd; height: 70px;">
    <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    @foreach ($navbar as $name => $url)
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ $url }}">{{ $name }}</a>
                        </li>
                    @endforeach
                @endauth
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">

                @guest
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('login') }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('users.show', auth()->user()->username) }}">View
                                    profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest

            </ul>

        </div>

    </div>
</nav>
