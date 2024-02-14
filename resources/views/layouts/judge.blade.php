<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/styles.css">
    <link rel="icon" href="{{ asset('/images/justicLogo.png') }}" type="image/x-icon">
    <title>@yield('title', 'Admin - Court Cases')</title>
</head>


<body>
    <div class="row g-0">
        <!-- sidebar -->
        <div class="p-3 vh-100 col-lg-2 fixed text-white bg-dark">
            {{-- <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <span class="fs-4"><h3> Admin Panel<h3> </span>  </a> --}}


             <ul class="nav flex-column sidebar ">
                <a href="{{ route('admin.home.index') }}" class="nav  mt-2 text-white text-decoration-none">
                    <span class="fs-4"><h3> Judge Panel<h3> </span>
                </a>
                <hr />
                <li><a href="{{ route('admin.home.index') }}" class="nav  mt-3 btn bg-primary text-white"><h5>  Home </h5></a></li>
                    @if(Auth::user()->role->role=='clark')
                     <li><a href="{{ route('admin.client.index') }}" class="nav mt-3 btn bg-primary text-white"> <h5>  Show - Client </h5></a></li>
                    @endif
                    @if(Auth::user()->role->role=='judge'or Auth::user()->role->role=='lawyer' or Auth::user()->role->role=='supperAdmin')
                    <li><a href="{{ route('admin.client.index') }}" class="nav mt-3 btn bg-primary text-white"> <h5>  Show - Client </h5></a></li>
                    <li><a href="{{ route('admin.judge.asignedCases') }}" class="nav mt-3 btn bg-primary text-white"> <h5>  Edit - Cases </h5></a></li>
                    @endif
                    @if(Auth::user()->role->role=='supperAdmin')
                    <li><a href="{{ route('admin.case.asign') }}" class="nav mt-3 btn bg-primary text-white"> <h5>  Manage - Cases </h5></a></li>
                   @endif
                  <hr />
                 <li> <a href="{{ route('home.index') }}" class="nav mt-3 btn bg-primary text-white"><h6> Go back to the home page </h6></a></li>

            </ul>
        </div>
        <!-- sidebar -->
        <div class="col-lg-9 content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Admin Cases</span>
                {{-- <img class="img-profile rounded-circle" src="{{ asset('/image/admin.svg') }}"> --}}
                <img class="img-profile rounded-circle" href="{{ asset('/images/admin.svg') }}" >
            </nav>
            <div class="g-0 m-5 page_content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="copyright py-1 text-center text-white footer">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://twitter.com/user">
                    MoND Developer Group 4
                </a>
            </small>
            @include('partials.language_switcher')
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">

    </script>
</body>


</html>
