@extends('layouts.judge')
@section('title',$viewData['title'])
@section('content')
    <div class="card-header">
        <h2> Created Client</h2>
    </div>
        <div class="card">
            <div class= "card-body">
                <div>
                    <a href="{{ route('admin.client.create')}}">
                        <button type="button" class="btn btn-primary float-end">
                            Create Client
                        </button>
                    </a>
                </div>
                <table class= "table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Case Name</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Sex</th>
                            <th scope="col">Case Address</th>
                            <th scope="col">Phone  Number</th>
                            <th scope="col">Client Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($viewData['client'] as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->client_name}}</td>
                                <td>{{$client->dob}}</td>
                                <td>{{$client->sex}}</td>
                                <td>{{$client->client_address}}</td>
                                <td>{{$client->phone_number}}</td>
                                <td><img src="{{ asset('/storage/' . $client->client_photo) }}" width="60"   height="50"class=" projects-image-weapper img-fluid rounded-start ">
                                </td>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
