@extends('layouts.app')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2> {{ __('Created Cases') }}</h2>
    </div>
        <div class="card">
            <div class= "card-body">
                <form action="{{ route('admin.case.searchCase') }}" method="POST">
                @csrf
               <input name="id"   placeholder="Search by case  ID">
                <button type="submit" class="btn btn-primary"> {{ __('Search') }} </button>
                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Case Type</th>
                            <th scope="col">Case Description</th>
                            <th scope="col">Case Status</th>
                            <th scope="col">Plaintiff </th>
                            <th scope="col">Parties Info </th>
                            <th scope="col">Case Created Date</th>
                            <th scope="col">Asigned Prosecutor</th>
                            <th scope="col">Court</th>
                            <th scope="col">Asigned Judge</th>
                            <th scope="col">Appointment Date</th>

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
                                 <td>
                                 <a href="{{ route('admin.party.showParties',['id' => $case->id]) }}">
                                    <button type="submit" class="btn-secondary">
                                      <i class="bi-info"></i>
                                      </button>
                                     </a>
                                     </td>
                                <td>{{$case->created_at}}</td>
                                <td>{{$case->judge_name}}</td>
                                <td>{{$case->court_name}}</td>
                                <td>{{$case->lawyer_name}}</td>
                                <td>{{$case->updated_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- </form> --}}
            </div>
        </div>
@endsection
