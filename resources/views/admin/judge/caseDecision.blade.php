@extends('layouts.judge')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header"> <h2> {{ __('Cases Decision') }}</div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.judge.updateCaseDecision', ['id' => $viewData['case']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Case Type:</label>
                                <input readonly name="case_type" value="{{ $viewData['case']->case_type }}" type="text"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Case Description</label>
                        <textarea readonly class="form-control" name="case_description" rows="3">{{ $viewData['case']->case_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Case Decision</label>
                        <textarea class="form-control" name="case_decision" rows="10" >{{ $viewData['case']->case_decision }}</textarea>
                    </div>
                    <div class="col-md-3">
                    <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Decision Date:</label>
                    <input name="updated_at" value="{{ $viewData['case']->updated_at }}" type="datetime-local"  class="form-control">
                    </div>


                </div>
                <button class="btn btn-primary"  type="submit">
                    <i class="bi-pencil"></i> {{ __('Submit') }}
                </button>

            </form>
        </div>
    </div>
@endsection
