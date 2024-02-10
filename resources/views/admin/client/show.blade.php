@extends('layouts.judge')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
   <div class="card mb-3">
       <div class="row g-0">
           <div class="col-md-4">
                <img src="{{ asset('/images/' . $viewData['client']->client_photo) }}" class=" projects-image-weapper img-fluid rounded-start ">

           </div>
           <div class="col-md-8">
               <div class="card-body">
                   <h5>  <label class="form-label">Client Name</label>
                       ({{ $viewData['client']->client_name}})

                    </h5>
                    <h5>  <label class="form-label">Client Address</label>
                        ({{ $viewData['client']->client_address}})



                     </h5>
                   </h5>

                    </div>
               </div>
           </div>
       </div>
@endsection
