@extends('layouts.main')

@section('content')
<script>
document.addEventListener("DOMContentLoaded", function() {
  // mendapatkan elemen-elemen yang diperlukan
  var searchBtn = document.getElementById("search-btn");
  var clearBtn = document.getElementById("clear-btn");
  var projectName = document.getElementById("project_name");
  var clientId = document.getElementById("client_id");
  var projectStatus = document.getElementById("project_status");

  // menambahkan event listener pada tombol search
  searchBtn.addEventListener("click", function() {
    // mendapatkan nilai-nilai input dari elemen-elemen yang diperlukan
    var name = projectName.value;
    var client = clientId.value;
    var status = projectStatus.value;

    // melakukan redirect ke halaman pencarian dengan parameter yang dibutuhkan
    var url = "{{ route('projects.index') }}";
    if (name) {
      url += "?name=" + name;
    }
    if (client && client !== "all") {
      url += (name ? "&" : "?") + "client=" + client;
    }
    if (status && status !== "all") {
      url += ((name || client) ? "&" : "?") + "status=" + status;
    }
    window.location.href = url;
  });

  // menambahkan event listener pada tombol clear
  clearBtn.addEventListener("click", function() {
    // mengosongkan nilai input dari elemen-elemen yang diperlukan
    projectName.value = "";
    clientId.value = "all";
    projectStatus.value = "all";
    searchBtn.click();
  });
});
</script>

    <div class="container">
        <h1 class="mb-3 text-center font-italic">Project List</h1>
        <div class="row mb-3">
            <div class="col-4">
                <label for="project_name">Project Name</label>
                <input type="text" name="project_name" id="project_name" class="form-control">
            </div>
            <div class="col-4">
                <label for="client_id">Client</label>
                <select name="client_id" id="client_id" class="form-control">
                    <option value="">All Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->client_id }}">{{ $client->client_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="project_status">Project Status</label>
                <select name="project_status" id="project_status" class="form-control">
                    <option value="">All Status</option>
                    <option value="OPEN">OPEN</option>
                    <option value="DOING">DOING</option>
                    <option value="DONE">DONE</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
              <button id="search-btn" class="btn btn-primary">Search</button>
              <button id="clear-btn" class="btn btn-secondary">Clear</button>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProjectModal">
                Add Project
              </button>
            </div>
          </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Client</th>
                    <th scope="col">Project Start</th>
                    <th scope="col">Project End</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->project_id }}</th>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->client->client_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($project->project_start)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($project->project_end)->format('d M Y') }}</td>
                        <td>{{ $project->project_status }}</td>
                        <td>
                            <!-- Tombol View -->
                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#view-project-{{ $project->project_id }}">View</a>
                            <div class="modal fade" id="view-project-{{ $project->project_id }}" tabindex="-1" role="dialog" aria-labelledby="view-project-label-{{ $project->project_id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="view-project-label-{{ $project->project_id }}">View Project</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Project Name: {{ $project->project_name }}</p>
                                            <p>Client Name: {{ $project->client->client_name }}</p>
                                            <p>Project Start: {{ $project->project_start }}</p>
                                            <p>Project End: {{ $project->project_end }}</p>
                                            <p>Project Status: {{ $project->project_status }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('projects.edit', $project->project_id) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $project->project_id }}">Edit</a>
                            <div class="modal fade" id="editModal{{ $project->project_id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $project->project_id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $project->project_id }}">Edit Project</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
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
                                                        <option value="OPEN">OPEN</option>
                                                        <option value="DOING">DOING</option>
                                                        <option value="DONE">DONE</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('projects.destroy', $project->project_id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal Add-->
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProjectModalLabel">Create Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                <option value="Open">OPEN</option>
                <option value="Doing">DOING</option>
                <option value="Done">DONE</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
  $('#addProjectModal').on('shown.bs.modal', function () {
    $('#project_name').trigger('focus')
  })
</script>
<script>
  $(document).ready(function() {
    $('.edit-btn').click(function() {
      $('#editModal').modal('show');
    });
  });
  $(document).ready(function() {
    $('.edit-btn').on('click', function() {
        var project_id = $(this).data('project-id');
        var project_name = $(this).data('project-name');
        var client_id = $(this).data('client-id');
        var project_start = $(this).data('project-start');
        var project_end = $(this).data('project-end');
        var project_status = $(this).data('project-status');

        $('#editModal #project_id').val(project_id);
        $('#editModal #project_name').val(project_name);
        $('#editModal #client_id').val(client_id);
        $('#editModal #project_start').val(project_start);
        $('#editModal #project_end').val(project_end);
        $('#editModal #project_status').val(project_status);

        $('#editModal').modal('show');
    });
});

</script>

    
@endpush
