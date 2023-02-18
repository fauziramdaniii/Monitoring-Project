@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Project Detail</h1>
        <hr>
        <div class="form-group">
            <label for="project_name">Project Name</label>
            <input type="text" class="form-control" name="project_name" value="{{ $project->project_name }}" readonly>
        </div>
        <div class="form-group">
            <label for="client_name">Client Name</label>
            <input type="text" class="form-control" name="client_name" value="{{ $project->client->client_name }}" readonly>
        </div>
        <div class="form-group">
            <label for="client_address">Client Address</label>
            <input type="text" class="form-control" name="client_address" value="{{ $project->client->client_address }}" readonly>
        </div>
        <div class="form-group">
            <label for="project_start">Project Start</label>
            <input type="text" class="form-control" name="project_start" value="{{ $project->project_start }}" readonly>
        </div>
        <div class="form-group">
            <label for="project_end">Project End</label>
            <input type="text" class="form-control" name="project_end" value="{{ $project->project_end }}" readonly>
        </div>
        <div class="form-group">
            <label for="project_status">Project Status</label>
            <input type="text" class="form-control" name="project_status" value="{{ $project->project_status }}" readonly>
        </div>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
