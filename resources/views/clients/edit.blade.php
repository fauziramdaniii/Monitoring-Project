@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Client</h1>
        <form action="{{ route('clients.update', $client->client_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="client_name">Name</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ $client->client_name }}" required>
                @error('client_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="client_address">Address</label>
                <input type="text" class="form-control @error('client_address') is-invalid @enderror" id="client_address" name="client_address" value="{{ $client->client_address }}" required>
                @error('client_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
