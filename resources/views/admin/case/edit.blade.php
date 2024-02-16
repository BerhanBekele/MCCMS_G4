@extends('layouts.judge')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header"> <h2> Manage Case</div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.case.update', ['id' => $viewData['case']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Case Type:</label>
                                <input name="case_type" value="{{ $viewData['case']->case_type }}" type="text"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Case Description</label>
                        <textarea class="form-control" name="case_description" rows="3">{{ $viewData['case']->case_description }}</textarea>
                    </div>

                    <div class="col-md-3">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Case Status:</label>
                        <select  id="case_status" class="form-control form-select @error('caseType') is-invalid @enderror" name="case_status">
                         <option value="{{ $viewData['case']->case_status }}" selected>{{ $viewData['case']->case_status }}</option>
                         <option value="Started">Started</option>
                         <option value="On Progress">On Progress</option>
                         <option value="Postponded">Postponded</option>
                         <option value="terminated">Terminated</option>
                         <option value="unfullfill">Unfullfill</option>
                         <option value="Complitted">Complitted</option>
                     </select>
                    </div>
                     <div class="col-md-3">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Asign Prosecutor:</label>
                        <select  id="judge_id" class="form-control form-select @error('case') is-invalid @enderror" name="judge_id">
                         <option value="{{ $viewData['case']->judge->id }}" selected>{{ $viewData['case']->judge->judge_name }} </option>
                         @foreach($viewData['judge'] as $judges)
                         <option value="{{$judges->id}}">{{ $judges->judge_name }}</option>

                           @endforeach
                     </select>
                    </div>
                    <div class="col-md-3">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Select Court:</label>
                        <select  id="court_id" class="form-control form-select @error('case') is-invalid @enderror" name="court_id">
                         <option value="{{ $viewData['case']->court->id }}" selected>{{ $viewData['case']->court->court_name }} </option>
                         @foreach($viewData['court'] as $courts)
                         <option value="{{$courts->id}}">{{ $courts->court_name }}</option>

                           @endforeach
                     </select>
                    </div>
                    <div class="col-md-3">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Select Judge:</label>
                        <select  id="lawyer_id" class="form-control form-select @error('case') is-invalid @enderror" name="lawyer_id">
                         <option value="{{ $viewData['case']->lawyer->id }}" selected>{{ $viewData['case']->lawyer->lawyer_name}} </option>
                         @foreach($viewData['lawyer'] as $lawyer)
                         <option value="{{$lawyer->id}}">{{ $lawyer->lawyer_name }}</option>
                           @endforeach
                     </select>
                    </div>
                    <div class="col-md-3">
                    <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Appointment Date:</label>
                    <input name="updated_at" value="{{ $viewData['case']->updated_at }}" type="datetime-local"  class="form-control">
                    </div>
                    {{-- <div class="col-md-4">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Select Court:</label>
                        <select  id="case_type" class="form-control form-select @error('caseType') is-invalid @enderror" name="case_type">
                         <option value="{{ $viewData['case']->court_id }}" selected>Unasiged</option>
                         <option value="2">Regular</option>
                         <option value="3">High Court</option>
                     </select>
                    </div>
                     --}}

                </div>
                <button class="btn btn-primary"  type="submit">
                    <i class="bi-pencil"></i> Edit
                </button>

            </form>
        </div>
    </div>
@endsection
