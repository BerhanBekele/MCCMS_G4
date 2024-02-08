@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">

        <div class="card-header"> Change Role</div>
        <div class="card-body">
             <div class= "card-body">
                {{-- <div>

                    <a href="{{ route('admin.role.update')}}">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        {{-- <button type="button" class="btn btn-primary float-end">
                            Create User
                        </button> --}}
                    {{-- </a>
                </div> --}}
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.role.update', ['id' => $viewData['user']->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $viewData['user']->name }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">EMail:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="email" value="{{ $viewData['user']->email }}" type="text"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                    <div class="col">
                        <div class="mb-2 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Granted Role</label>
                    <div class="col-md-6">
                        <select  id="role" class="form-control form-select @error('role') is-invalid @enderror" name="role">
                            <option value="{{$viewData['user']->role->id}}" selected>{{ $viewData['user']->role->role }}</option>
                            @foreach($viewData["roles"] as $role)
                            <option value="{{$role->id}}">{{$role->role}}</option>

                            @endforeach
                        </select>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    </div>
                    {{-- <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Balance:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="balance" value="{{ $viewData['user']->balance }}" type="number"
                                    class="form-control">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
