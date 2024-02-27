@extends('layouts.app')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2> {{ __('Created Parties') }}</h2>
    </div>
        <div class="card">
            <div class= "card-body">
                {{--  <div>
                   <a href="{{ route('admin.party.create')}}">
                        <button type="button" class="btn btn-primary float-end">
                            {{ __('Create Plaintiff') }}
                        </button>
                    </a>
                </div> --}}
                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr align="center">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($viewData['parties'] as $party)
                            <tr>
                                <td>{{$party->id}}</td>
                                <td>{{$party->party_type}}</td>
                                <td>{{$party->party_name}}</td>
                                <td>{{$party->dob}}</td>
                                <td>{{$party->sex}}</td>
                                <td>{{$party->educ_level}}</td>
                                <td>{{$party->party_address}}</td>
                                <td>{{$party->phone_number}}</td>
                                <td>{{$party->case_id}}</td>
                                <td>{{$party->party_word}}</td>
                                </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
