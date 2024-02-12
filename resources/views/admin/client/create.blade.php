@extends('layouts.judge')
@section('title', $viewData['title'])
@section('content')
   <div class="card mb-4">
       <div class="card-header"> <h3> Create Client</h3> </div>
       <div class="card-body">
           {{-- @if ($errors->any())
               <ul class="alert alert-danger list-unstyled">
                   @foreach ($errors->all() as $error)
                       <li>* {{ $error }}</li>
                   @endforeach
               </ul>
            @endif --}}
           <form method="POST" action="{{ route('admin.client.save') }}" enctype="multipart/form-data">
               @csrf
               <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Client Full Name</label>
                         <input name="client_name" value="{{ old('client_name') }}" type="text" class="form-control">
                   </div>
                      <div class="col-md-3">
                            <label class="form-label">Date Of Birth</label>
                            <input name="dob" value="dob" type="date"  class="form-control">
                        </div>

                       <div class="col-md-3">
                           {{-- <div class="col-lg-10 col-md-6 col-sm-12"> --}}
                            <label >sex:</label>
                               <select  id="sex" class="form-control form-select @error('sex') is-invalid @enderror" name="sex">
                                <option value="Select Case Type" selected>Select sex</option>
                                <option value="male">Male</option>
                                <option value="female">Femel</option>
                            </select>
                           </div>
                       </div>
                       <div class="col-md-6">
                            <label class="form-label">Client Address</label>
                            <input name="client_address" value="{{ old('client_address') }}" type="text" class="form-control">
                       </div>
                       <div class="col-md-2">
                        <label class="form-label">Phone Number</label>
                        <input name="phone_number" value="{{ old('phone_number') }}" type="text" class="form-control">
                        </div>
                          <div class="col-md-6">
                            <label class="form-label">Client Photo:</label>
                            <div class="col-lg-12 col-md-3 col-sm-12">
                                <input class="form-control" type="file" name="client_photo" value="{{ old('client_photo') }}">
                                {{-- <input class="form-control" type="file" name="image"> --}}
                            </div>
                        </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                    </div>

           </form>
       </div>
   </div>
@endsection

