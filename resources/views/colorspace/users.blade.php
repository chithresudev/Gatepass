@extends('layouts.app')

@section('content')
    <div class="row pt-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
        <h5></h5>
        <div class="text-right mb-4">
        <a href="{{ route('register') }}" class="btn btn-sm btn-success">Register</a>
        </div>
      </div>

        <div class="card">
        <div class="card-header">All Users</div>
        <div class="card-body p-0 m-0">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $key => $user)

              @empty

              @endforelse
              <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td><a href="{{ route('user.remove', ['user' => $user]) }}" class="btn btn-sm btn-danger">Remove</a></td>
              </tr>

            </tbody>
          </table>
      </div>
    </div>
    </div>
    </div>
@endsection
