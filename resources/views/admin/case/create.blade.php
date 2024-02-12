@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
   <div class="card mb-4">
       <div class="card-header"> <h3> Create Case</h3> </div>

       <div class="card-body">
           @if ($errors->any())
               <ul class="alert alert-danger list-unstyled">
                   @foreach ($errors->all() as $error)
                       <li>* {{ $error }}</li>
                   @endforeach
               </ul>
           @endif
           <form method="POST" action="{{ route('admin.case.save') }}" enctype="multipart/form-data">
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Submit</button>
             </div>
               @csrf

               <div class="row">
                       <div class="col-md-5">
                           <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Case Type:</label>
                           <div class="col-lg-10 col-md-6 col-sm-12">
                               <select  id="case_type" class="form-control form-select @error('caseType') is-invalid @enderror" name="case_type">
                                <option value="Select Case Type" selected>Select Case Type</option>
                                <option value="disciplen">Disciplen</option>
                                <option value="criminal">Criminal</option>
                                <option value="murder">Murder</option>
                            </select>
                           </div>
                       </div>
                       <div class="col-md-8">
                            <label class="form-label">Case Description</label>
                            <textarea class="form-control" name="case_description" rows="3" value="case_description" >{{ old('case_description') }}</textarea>

                       </div>
                       <div class="col-3">
                        <label class="form-label">Case Handler Judge E-Mail Address</label>
                        <input name="email" value="{{ old('email') }}" type="text" class="form-control">
                        </div>

                       <div class="col-3">
                        <label class="form-label">Case Submit Client Name</label>
                        <select  id="client_id" class="form-control form-select @error('case') is-invalid @enderror" name="client_id">
                         <option value="0" selected>Select Client Name</option>
                            @foreach($viewData['clients'] as $client)
                            <option value="{{$client->id}}">{{ $client->client_name }}
                            </option>
                          @endforeach
                    </div>


           </form>
       </div>
   </div>
@endsection

