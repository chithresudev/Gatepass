@extends('layouts.app')

@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="text-right mb-4">
        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#create_project">Create Project</a>
      </div>
        <div class="card">
        <div class="card-header">All Project</div>
        <div class="card-body p-0 m-0">
        <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Company Email</th>
                <th scope="col">Director Email</th>
                <th scope="col">DOP Email</th>
                <th scope="col">HDD Qty</th>
                <th scope="col">Project At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($projects as $key => $project)
                <tr>
                  <th>{{ $key + 1 }}</th>
                  <td>{{ $project->name }}</td>
                  <td>{{ $project->company_email }}</td>
                  <td>{{ $project->director_email }}</td>
                  <td>{{ $project->dop_email }}</td>
                  <td>{{ $project->hdd_count }}</td>
                  <td>{{ $project->created_at->format('M d Y') }}</td>
                  <td>
                    <a href="{{ route('hdd.index', ['project' => $project]) }}" class="btn btn-sm btn-info">+ HDD</a>
                  </td>

              @empty
                <td colspan="8" class="text-center"> No data available at this moment.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
      </div>
    </div>
    </div>
    </div>


  <div class="modal fade" id="create_project" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
      <div class="form-row">
        <div class="form-group col">
          <label for="project_name">Project Name</label>
          <input type="text" class="form-control" id="project_name" name="project_name" required>
        </div>
        <div class="form-group col">
          <label for="company_email">Company Email</label>
          <input type="email" class="form-control" id="company_email" name="company_email" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label for="director_email">Director Email</label>
          <input type="text" class="form-control" id="director_email" name="director_email" required>
        </div>
        <div class="form-group col">
          <label for="dop_email">DOP Email</label>
          <input type="text" class="form-control" id="dop_email" name="dop_email" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label for="project_logo">Project Images</label>
          <input type="file" class="form-control border-0" id="project_image" name="project_image" required>
        </div>
      </div>
      </div>
      <div class="modal-footer ">
        <button type="submit" class="mx-auto btn btn-success">Create Project</button>
      </div>
    </form>
      </div>
    </div>
  </div>

@endsection
