<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>@yield('title', 'Admin - Court Cases')</title>
</head>


<body>
    <div class="row g-0">
        <!-- sidebar -->
        <div class="p-3 vh-100 col-lg-2 fixed text-white bg-dark">
            <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <span class="fs-4"><h3> Admin Panel<h3> </span>
            </a>
            <hr />
            <ul class="nav flex-column sidebar">

                <li><a href="{{ route('admin.home.index') }}" class="nav  mt-3 btn bg-primary text-white"><h4>  Home </h4></a></li>
                <li><a href="{{ route('admin.case.asign') }}" class="nav mt-3 btn bg-primary text-white"> <h4>  Manage - Cases </h4></a></li>
                <li><a href="{{route('register')}}" class="nav mt-3 btn bg-primary text-white"><h4>Register New User </h4></a> </li>
                <li><a href="{{ route('admin.role.index') }}" class="nav mt-3 btn bg-primary text-white"><h4> Admin  User </h4></a></li>
                <li> <a href="{{ route('home.index') }}" class="nav mt-3 btn bg-primary text-white"><h4> Go back to the home page </h4></a></li>

            </ul>
        </div>
        <!-- sidebar -->
        <div class="col-lg-9 content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Admin</span>
                <img class="img-profile rounded-circle" src="{{ asset('/image/undraw_profile.svg') }}">
            </nav>
            <div class="g-0 m-5 page_content"> @yield('content')
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://twitter.com/user">
                    MoND Developer Group 4
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>


</html>
