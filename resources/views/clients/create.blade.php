@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Add Client</h1>
            <hr>
            <form method="POST" action="{{ route('clients.store') }}">
                @csrf
                <div class="form-group">
                    <label for="client_name">Client Name</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" required>
                </div>
                <div class="form-group">
                    <label for="client_address">Client Address</label>
                    <input type="text" class="form-control" id="client_address" name="client_address" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('clients.index') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
