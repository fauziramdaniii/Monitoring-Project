@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Edit Project</h2>
        <hr>
        <form action="{{ route('projects.update', $project->project_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" class="form-control" id="project_name" name="project_name" value="{{ $project->project_name }}">
            </div>
            <div class="form-group">
                <label for="client_id">Client:</label>
                <select class="form-control" id="client_id" name="client_id">
                    @foreach($clients as $client)
                        <option value="{{ $client->client_id }}" @if($project->client_id == $client->client_id) selected @endif>{{ $client->client_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="project_start">Start Date:</label>
                <input type="date" class="form-control" id="project_start" name="project_start" value="{{ $project->project_start }}">
            </div>
            <div class="form-group">
                <label for="project_end">End Date:</label>
                <input type="date" class="form-control" id="project_end" name="project_end" value="{{ $project->project_end }}">
            </div>
            <div class="form-group">
                <label for="project_status">Project Status</label>
                <select class="form-control" id="project_status" name="project_status" value="{{ $project->project_status }}">
                    <option value="">Select Status</option>
                    <option value="Open">Open</option>
                    <option value="Doing">Doing</option>
                    <option value="Done">Done</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
