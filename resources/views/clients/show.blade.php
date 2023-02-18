@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Client Detail</h1>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $client->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $client->client_name }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $client->client_address }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back to Clients</a>
    </div>
@endsection
