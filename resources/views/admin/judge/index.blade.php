@extends('layouts.app')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2> Created Cases</h2>
    </div>
        <div class="card">

              <div class= "card-body">
                <div>
                    <a href="{{ route('admin.case.create')}}">
                        <button type="button" class="btn btn-primary float-end">
                            create Case
                        </button>
                    </a>
                </div>
                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Case Type</th>
                            <th scope="col">Case Description</th>
                            <th scope="col">Case Status</th>
                            <th scope="col">Case Created Date</th>
                            <th scope="col">Case Appointment Date</th>
                            {{-- <th scope="col">Edit</th>
                            <th scope="col">Delete</th> --}}
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
                                <td>{{$case->updated_at}}</td>
                                @if(Auth::user()->role->role=='admin')
                                    <a href="{{ route('admin.case.edit',['id' => $case->id]) }}">
                                            <button class="btn btn-primary">
                                              <i class="bi-pencil"></i>
                                            </button>
                                    </a>
                                </td>
                                <td>
                                  <form action="{{ route('admin.case.delete',$case->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                 @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
