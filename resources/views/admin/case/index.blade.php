@extends('layouts.app')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2> {{ __('Created Cases') }}</h2>
    </div>
        <div class="card">
            <div class= "card-body">
                <div>
                    <a href="{{ route('admin.case.create')}}">
                        <button type="button" class="btn btn-primary float-end">
                            {{ __('Create Case') }}
                        </button>
                    </a>
                </div>

                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr >
                            {{-- style="align-text:center;" --}}
                            <th scope="col">Id</th>
                            <th scope="col">Case Type</th>
                            <th scope="col">Case Description</th>
                            <th scope="col">Case Status</th>
                            <th scope="col">Plaintiff</th>
                            <th scope="col">Case Created Date</th>
                            <th scope="col">Case Appointment Date</th>
                            <th scope="col">Prosecutor E-Mail Address</th>
                            <th scope="col">Add Party</th>
                            <th scope="col">View Parties</th>
                            {{-- <th scope="col">Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($viewData['cases'] as $case)
                            <tr>
                                <td>{{$case->id}}</td>
                                <td>{{$case->case_type}}</td>
                                <td>{{$case->case_description}}</td>
                                <td>{{$case->case_status}}</td>
                                <td>{{$case->client_name}}</td>
                                <td>{{$case->created_at}}</td>
                                <td>{{$case->updated_at}}</td>
                                <td>{{$case->email}}</td>
                                <td>
                                    <a href="{{ route('admin.party.create',['id' => $case->id]) }}">
                                                <button class="btn btn-primary">
                                                <i class="bi-pencil"></i>
                                                </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.party.showParties',['id' => $case->id]) }}">
                                                <button class="btn btn-primary"> View
                                                {{-- <i class="bi-pencil"></i> --}}
                                                </button>
                                    </a>
                                </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
