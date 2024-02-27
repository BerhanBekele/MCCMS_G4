@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')

   <div class="card mb-4">
       <div class="card-header"> <h3> {{ __('Create Parties') }}</h3> </div>
       <div class="card-body">
           {{-- @if ($errors->any())
               <ul class="alert alert-danger list-unstyled">
                   @foreach ($errors->all() as $error)
                       <li>* {{ $error }}</li>
                   @endforeach
               </ul>
            @endif --}}
           <form method="POST" action="{{ route('admin.party.save') }}" enctype="multipart/form-data">
               @csrf
               <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Case Id</label>
                     {{-- <input name="case_id" value="{{ old('case_id') }}" type="text" class="form-control"> --}}
                     <input readonly name="case_id" value= "{{ $viewData['cases']->id}}" type="text" class="form-control">
               </div>
                    <div class="col-md-3">
                        <label class="form-label">Party Full Name</label>
                         <input name="party_name" value="{{ old('party_name') }}" type="text" class="form-control">
                   </div>
                   <div class="col-md-5">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Party Type:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <select  id="party_type" class="form-control form-select @error('caseType') is-invalid @enderror" name="party_type">
                         <option value="Select Case Type" selected>Select Party Type</option>
                         <option value="prosecutor">prosecutor</option>
                         <option value="Plaintiff Witness">Plaintiff Witness</option>
                         <option value="Accused">Accused</option>
                         <option value="Attorny">Attorny</option>
                         <option value="Accused Witness">Accused Witness</option>

                     </select>
                    </div>
                </div>
                        <div class="col-md-3">
                            <label class="form-label">Education Level</label>
                            <input name="educ_level" value="{{ old('educ_level') }}" type="text" class="form-control">
                        </div>
                      <div class="col-md-2">
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


                       <div class="col-md-4">
                            <label class="form-label">Party Address</label>
                            <input name="party_address" value="{{ old('party_address') }}" type="text" class="form-control">
                       </div>
                       <div class="col-md-2">
                        <label class="form-label">Phone Number</label>
                        <input name="phone_number" value="{{ old('phone_number') }}" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Party Word</label>
                            <textarea  class="form-control" name="party_word" rows="3" value="party_word">{{ old('party_word') }}</textarea>
                        </div>
                        <div class="mb-3">
                              {{-- source https://web.dev/articles/media-recording-audio --}}

                        </div>


                        <button type="submit" class="btn btn-primary"> {{ __('Submit') }}</button>

                    </div>

           </form>
       </div>
   </div>
   <div class="card mb-4">
    <div class="card-header"> <h3> {{ __('Audio Word') }}</h3> </div>
    <div class="card-body">
   <audio id="player" controls>NN</audio> <a id="download">   {{ __('Save') }}   <button id="stop">   {{ __('Stop') }} </button></a>


    </div>
</div>



@endsection

