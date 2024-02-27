@extends('layouts.app')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2> {{ __('Created Parties') }}</h2>
    </div>
        <div class="card">
            <div class= "card-body">
                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Party Name</th>
                            <th scope="col">Party Type</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Education Level</th>
                            <th scope="col">Party Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">case Number</th>
                            <th scope="col">Party Word</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($viewData['parties'] as $party)
                            <tr>
                                <td>{{$party->id}}</td>
                                <td>{{$party->party_name}}</td>
                                <td>{{$party->party_type}}</td>
                                <td>{{$party->dob}}</td>
                                <td>{{$party->sex}}</td>
                                <td>{{$party->educ_level}}</td>
                                <td>{{$party->party_address}}</td>
                                <td>{{$party->phone_number}}</td>
                                <td>{{$party->case_id}}</td>
                                <td>{{$party->party_word}}</td>
                                @if(Auth::user()->role->role=='lawyer' or Auth::user()->role->role=='clark' or Auth::user()->role->role=='supperAdmin')
                                <td>
                                    <a href="{{ route('admin.party.edit',['id' => $party->id]) }}">
                                                <button class="btn btn-primary">
                                                <i class="bi-pencil"></i>
                                                </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.party.delete',$party->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </a>
                                </td>
                             @endif
                                </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
