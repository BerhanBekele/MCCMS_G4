{{-- @extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')
   <div class="container">
       <div class="row">
           <div class="col-lg-4 ms-auto">
               <p class="lead">{{ $description }}</p>
           </div>
           <div class="col-lg-4 me-auto">
               <p class="lead">{{ $author }}</p>
           </div>
       </div>
   </div>
@endsection --}}

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
   <div class="container">

       <div class="row">

           <div class="col-lg-4 ms-auto">
               <p class="lead"><h4><i>{{ $viewData['description'] }}</i></h4</p>
           </div>
           <div class="col-lg-4 me-auto">
               <p class="lead"><h4><i>{{ $viewData['author'] }}</i></h4></p>
           </div>
        </h4>
       </div>

   </div>
   <div class="row" >
    <img src="{{ asset('/images/justicLogo.png') }}"  height="1000" width="700"   >

    </div>
</div>
@endsection

