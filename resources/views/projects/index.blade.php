@extends('layouts.app')

@section('content')

    <div class="row pt-5">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header">All Project</div>
        <div class="card-body p-0 m-0">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Company Email</th>
                <th scope="col">Director Email</th>
                <th scope="col">DOP Email</th>
                <th scope="col">HDD Qty</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($projects as $key => $project)
                <tr>
                  <th>1</th>
                  <td>{{ $project->name }}</td>
                  <td>{{ $project->company_email }}</td>
                  <td>{{ $project->director_email }}</td>
                  <td>{{ $project->dop_email }}</td>
                  <td>{{ $project->hdd_aty }}</td>
                  <td>{{ $project->creator_at }}</td>
                </tr>
              @empty
                <td colspan="5" class="mx-auto">No Data Available</td>
              @endforelse
            </tbody>
          </table>
      </div>
    </div>
    </div>
    </div>
@endsection
