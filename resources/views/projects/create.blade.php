@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Create Project</h1>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input type="text" class="form-control" id="project_name" name="project_name">
            </div>
            <div class="form-group">
                <label for="client_id">Client Name</label>
                <select class="form-control" id="client_id" name="client_id">
                    <option value="">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->client_id }}">{{ $client->client_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="project_start">Project Start</label>
                <input type="date" class="form-control" id="project_start" name="project_start">
            </div>
            <div class="form-group">
                <label for="project_end">Project End</label>
                <input type="date" class="form-control" id="project_end" name="project_end">
            </div>
            <div class="form-group">
                <label for="project_status">Project Status</label>
                <select class="form-control" id="project_status" name="project_status">
                    <option value="">Select Status</option>
                    <option value="Open">Open</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
