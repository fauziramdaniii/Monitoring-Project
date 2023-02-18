@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Add Client</a>
        @if ($clients->isNotEmpty())
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->client_id }}</td>
                            <td>{{ $client->client_name }}</td>
                            <td>{{ $client->client_address }}</td>
                            <td>
                                    <a href="{{ route('clients.show', $client->client_id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('clients.edit', $client->client_id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('clients.destroy', $client->client_id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this client?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                There are no clients yet.
            </div>
        @endif
    </div>
@endsection
