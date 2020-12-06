@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Project</div>
                <a href="{{ route('project.index') }}">
                <div class="card-body">
                  <h3 class="text-center">{{ $projects }}</h3>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Hard Disk Info</div>

                <div class="card-body">
                  <h3 class="text-center">{{ $hdds }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">DIT</div>

                <div class="card-body">
                  <h3 class="text-center">{{ $dits }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Check In Hard Disk</div>
                <a href="{{ route('project.index') }}">
                <div class="card-body">
                  <h3 class="text-center">{{ $projects }}</h3>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Check Out Hard Disk</div>

                <div class="card-body">
                  <h3 class="text-center">{{ $hdds }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">DIT</div>

                <div class="card-body">
                  <h3 class="text-center">{{ $dits }}</h3>
                </div>
            </div>
        </div>
    </div>

@endsection
