@extends('layouts.admin')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2>   Manage Users </h2>
    </div>

    <div class="card-body">
          @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>* {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {{-- <form method="POST" action="{{ route('admin.case.save') }}" enctype="multipart/form-data">

            @csrf --}}
        <div class="card">
            {{-- <div class= "card-body">
                <div>
                    <a href="{{ route('admin.role.create')}}">
                        <button type="button" class="btn btn-primary float-end">
                            Create User
                        </button>
                    </a>
                </div> --}}
                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Granted Role</th>
                            {{-- <th scope="col">Account Balance</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($viewData['users'] as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->role}}</td>
                                {{-- <td>{{$user->balance}}</td> --}}
                                <td>
                                    <a href="{{ route('admin.role.edit',['id' => $user->id]) }}">
                                            <button class="btn btn-primary">
                                              <i class="bi-pencil"></i>
                                            </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.role.delete',$user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="bi-trash"></i>
                                        </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection
