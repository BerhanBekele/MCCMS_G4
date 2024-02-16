@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
     <div class="row" >
        <img src="{{ asset('/images/justicLogo.png') }}"  height="1150" width="750"   >
    </div>
           {{-- <div class="col-md-6 col-lg-4 mb-2">
               <img src="{{ asset('/images/safe.png') }}" class="img-fluid rounded" >
           </div>
           <div class="col-md-6 col-lg-4 mb-2">
               <img src="{{ asset('/images/submarine.png') }}" class="img-fluid rounded">
           </div> --}}
       </div>

@endsection

