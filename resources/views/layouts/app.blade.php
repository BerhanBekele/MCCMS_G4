<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @notifyCss
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('/images/justicLogo.png') }}" type="image/x-icon">
    <title>@yield('title', 'Military Court Case Managment System')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-1">
        <div class="container">

            <a class="navbar-brand" href="#"> {{ __('Military Court Case Managment System') }} </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{route('home.index')}}">{{ __('Home') }}</a>
                    <div class=" vr bg-with mx-2 d-none d-lg-block"></div>
                    @guest
                    <a class="nav-link active" href="{{route('login')}}">{{ __('Login') }}</a>
                    @else

                        @if(Auth::user()->role->role=='admin')
                        <a class="nav-link active" href="{{route('admin.home.index')}}">{{ __('Admin Dashboard') }}</a>
                        <div class=" vr bg-with mx-2 d-none d-lg-block"></div>
                        @endif

                        @if(Auth::user()->role->role=='judge' or Auth::user()->role->role=='lawyer' or Auth::user()->role->role=='clark' or Auth::user()->role->role=='supperAdmin')
                         <a class ="nav-link active" href="{{route('admin.case.index')}}"> {{ __('Cases') }}</a>
                         {{-- <a class ="nav-link active" href="{{route('admin.case.searchCase')}}"> {{ __('Search Cases') }}</a> --}}
                         <div class=" vr bg-with mx-2 d-none d-lg-block"></div>
                         <a class ="nav-link active" href="{{route('admin.client.index')}}"> {{ __('Plaintiff') }}</a>
                         <div class=" vr bg-with mx-2 d-none d-lg-block"></div>
                         @endif
                         @if(Auth::user()->role->role<>'admin')
                         <a class="nav-link active" href="{{route('admin.judge.asignedCases')}}"> {{ __('Cases Dashboard') }}</a>
                         <div class=" vr bg-with mx-2 d-none d-lg-block"></div>
                          @endif

                          <form id="logout" action="{{route('logout')}}" method="POST">
                            <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();">{{ __('Logout') }}</a>
                                @csrf
                        </form>
                    @endguest
                    <div class=" vr bg-with mx-2 d-none d-lg-block"></div>
                    <a class="nav-link active" href="{{route('home.about')}}">{{ __('About') }}</a></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Footer -->
    <div class="container my-4">
        @yield('content')
    </div>
    <div class="py-3 text-center text-white footer">
        <div class="container">
            <small class="copyright">
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://twitter.com/user">
                    Group-4
                </a> - <b> MoND</b>
            </small>
            <div>{{-- Language Selector --}}
                @include('partials.language_switcher')
           </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
   @notifyJs
   @include('notify::components.notify')
   <script>
    const player = document.getElementById('player');
    const downloadLink = document.getElementById('download');
    const stopButton = document.getElementById('stop');

    const handleSuccess = function (stream) {
      const options = {mimeType: 'audio/webm'};
      const recordedChunks = [];
      const mediaRecorder = new MediaRecorder(stream, options);
      if (window.URL) {
        player.srcObject = stream;
      } else {
        player.src = stream;
      }
      mediaRecorder.addEventListener('dataavailable', function(e) {
        if (e.data.size > 0) recordedChunks.push(e.data);
      });

      mediaRecorder.addEventListener('stop', function() {

        downloadLink.href = URL.createObjectURL(new Blob(recordedChunks));
        downloadLink.download = 'acetest.wav';
        //  Storage::disk('public')->put($imageName,
        //                 file_get_contents(URL.createObjectURL(new Blob(recordedChunks))));
      });

      stopButton.addEventListener('click', function() {
        mediaRecorder.stop();
      });

      mediaRecorder.start();
    };

    navigator.mediaDevices.getUserMedia({audio: true, video: false})
      .then(handleSuccess);
  </script>

</body>

</html>
