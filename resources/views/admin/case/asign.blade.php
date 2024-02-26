@extends('layouts.judge')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2>{{ __('Created Cases') }}</h2>
    </div>
        <div class="card">
            <div class= "card-body">
                <form action="{{ route('admin.case.searchAsigned') }}" method="POST">
                    @csrf
                   <input name="id"   placeholder="Search by case  ID">
                    <button type="submit" class="btn btn-primary"> {{ __('Search') }} </button>
                </form>
                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Case Type</th>
                            <th scope="col">Case Description</th>
                            <th scope="col">Case Status</th>
                            <th scope="col">Case Created Date</th>
                            <th scope="col">Asigned Prosecutor</th>
                            <th scope="col">Court</th>
                            <th scope="col">Asigned Judge</th>
                            <th scope="col">Case Appointment Date</th>
                            <th scope="col">Plaintiff Info</th>
                            <th scope="col">Parties Info</th>
                            <th scope="col">Manage</th>
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
                                <td>{{$case->created_at}}</td>
                                <td>{{$case->judge_name}}</td>
                                <td>{{$case->court_name}}</td>
                                <td>{{$case->lawyer_name}}</td>
                                <td>{{$case->updated_at}}</td>
                                <td><a href="{{ route('admin.client.show',['id' => $case->client_id]) }}">
                                    <button class="btn btn-secondary">
                                    <i class="bi-info"></i>
                                    </button></td>
                                <td>
                                    <a href="{{ route('admin.party.showParties',['id' => $case->id]) }}">
                                                      <button class="btn btn-primary">
                                                        <i class="bi-info"></i>
                                                        </button>
                                     </a>
                                 </td>

                                @if(Auth::user()->role->role=='supperAdmin')
                                    <td>
                                        <a href="{{ route('admin.case.edit',['id' => $case->id]) }}">
                                                    <button class="btn btn-primary">
                                                    <i class="bi-pencil"></i>
                                                    </button>
                                        </a>
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('admin.case.delete',$case->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                <i class="bi-trash"></i>
                                            </button>
                                        </a>
                                    </td> --}}
                                  @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
@endsection
