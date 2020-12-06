@extends('layouts.app')

@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="d-flex justify-content-between pb-4">
        <h5><span class="text-info">Project - </span>  {{ $hdd->project->name }} </h5>

      </div>
        <div class="card">
        <div class="card-header">HDD Details</div>
        <div class="card-body">
          <form class="" action="{{ route('hdd.update', ['hdd' => $hdd]) }}" method="post">
            @csrf
          <div class="form-row">
            <div class="form-group col">
              <label for="serial_no">HDD Serial No</label>
              <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{ $hdd->serial_no }}" required>
            </div>
            <div class="form-group col">
              <label for="hdd_name">HDD Name</label>
              <input type="text" class="form-control" id="hdd_name" name="hdd_name" value="{{ $hdd->name }}" required>
            </div>
            <div class="form-group col">
              <label for="hdd_size">HDD Size</label>
              <input type="text" class="form-control" id="hdd_size" name="hdd_size" value="{{ $hdd->size }}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="hdd_type">HDD Type</label>
              <input type="text" class="form-control" id="hdd_type" name="hdd_type" value="{{ $hdd->type }}" required>
            </div>
            <div class="form-group col">
              <label for="giver_name">Giver Name</label>
              <input type="text" class="form-control" id="giver_name" name="giver_name" value="{{ $hdd->giver_name }}" required>
            </div>
            <div class="form-group col">
              <label for="hdd_check_in">Check In Date</label>
              <input type="date" class="form-control" id="hdd_check_in" name="hdd_check_in" value="{{ $hdd->check_in_date }}">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="reciever_name">Reciever Name</label>
              <input type="text" class="form-control" id="reciever_name" name="reciever_name" value="{{ $hdd->reciever_name }}" required>
            </div>
            <div class="form-group col">
              <label for="reciever_email">Email</label>
              <input type="email" class="form-control" id="reciever_email" name="reciever_email" value="{{ $hdd->reciever_email }}" required>
            </div>

          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="reciever_mobile">Mobile</label>
              <input type="numeric" class="form-control" id="reciever_mobile" name="reciever_mobile" value="{{ $hdd->reciever_mobile }}" required>
            </div>
            <div class="form-group col">
              <label for="hdd_check_out">Check Out Date</label>
              <input type="date" class="form-control" id="hdd_check_out" name="hdd_check_out" value="{{ $hdd->check_out_date }}">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="hdd_content">HDD Content</label>
              <textarea type="text" class="form-control" id="hdd_content" name="hdd_content" required> {{ $hdd->content }}</textarea>
            </div>
            <div class="form-group col">
              <label for="reciever_justify">Justification (Optional)</label>
              <textarea type="text" class="form-control" id="reciever_justify" name="reciever_justify"> {{ $hdd->reciever_justify }}</textarea>
            </div>
          </div>
          </div>
          </div>
          <div class="modal-footer ">
            <button type="submit" class="mx-auto btn btn-success">Update HDD</button>
          </div>

        </form>
      </div>
    </div>
    </div>
    </div>
@endsection
