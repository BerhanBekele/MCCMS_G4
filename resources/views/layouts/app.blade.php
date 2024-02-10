<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('/images/justicLogo.png') }}" type="image/x-icon">
    <title>@yield('title', 'Military Court Case Managment System')</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-1">
        <div class="container">
            <a class="navbar-brand" href="#"> {{ __('Military Court Case Managment System') }} </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{route('home.index')}}">Home</a>
                    {{-- <a class="nav-link active" href="{{route('products.index')}}">Products</a>
                    <a class="nav-link active" href="{{route('cart.index')}}">Cart</a>
                    <a class="nav-link active" href="{{route('home.about')}}">About</a> --}}
                    <div class=" vr bg-with mx-2 d-none d-lg-block"></div>
                    @guest
                    <a class="nav-link active" href="{{route('login')}}">Login</a>
                    @else
                      <a class ="nav-link active" href="{{route('admin.case.index')}}">My Cases</a>
                        @if(Auth::user()->role->role=='admin')
                            <a class="nav-link active" href="{{route('admin.home.index')}}">Admin Dashboard</a>
                        @endif

                        @if(Auth::user()->role->role=='judge')
                        <a class="nav-link active" href="{{route('admin.judge.asignedCases')}}">Cases Dashboard</a>
                        @endif

                        <form id="logout" action="{{route('logout')}}" method="POST">
                            <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();">Logout
                            </a>
                                @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Footer -->
    <div class="container my-4">
        @yield('content')
    </div>
    <div class="py-1 text-center text-white footer">
        <div class="container">
            <small class="copyright">
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://twitter.com/user">
                    Group-4
                </a> - <b> MoND</b>
            </small>
            {{-- Language Selector --}}
            @include('partials.language_switcher')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
