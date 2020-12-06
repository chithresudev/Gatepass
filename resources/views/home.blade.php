@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Project</div>
                <a href="{{ route('project.index') }}">
                <div class="card-body">
                  <h3 class="text-center">20</h3>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Hard Disk Info</div>

                <div class="card-body">
                  <h3 class="text-center">64</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">DIT</div>

                <div class="card-body">
                  <h3 class="text-center">200</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-5">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header">All Project</div>
        <div class="card-body p-0 m-0">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
    </div>
    </div>
@endsection
