@extends('layouts.app')

@stack('styles')
<style media="screen">
  .table td, .table th {
    border:none!important;
  }
</style>
@section('content')
  <form class="" action="{{ route('dit.store', ['hdd' => $hdd]) }}" method="post">
    @csrf

    <div class="row">
      <div class="col-md-12">
        <h5 class="text-danger">{{ $hdd->name }} - DIT Data</h5>
        <div class="card mb-4">

          <div class="card-body">
            <div class="form-row">
              <div class="form-group col">
                <label for="day_no">Day No</label>
                <input type="text" class="form-control" id="day_no" name="day_no" required>
              </div>
              <div class="form-group col">
                <label for="date_of_shoot">Date Of Shoot</label>
                <input type="date" class="form-control" id="date_of_shoot" name="date_of_shoot" required>
              </div>
              <div class="form-group col">
                <label for="giver_name">Giver Name</label>
                <input type="text" class="form-control" id="giver_name" name="giver_name" required>
              </div>
            </div>
          </div>
        </div>
    </div>

      <div class="col-md-6">
        <div class="card">

          <div class="card-body">
            <h6 class="text-danger">Card Data Details</h6>
            <div class="table-responsive">
                    <table border="0" class="table table-none border-0" id="card_dynamic_field">
                        <tr>
                            <td><input type="text" name="card_details[]" placeholder="1. Enter Card Data" class="form-control name_list" required="" /></td>
                            <td><button type="button" id="card_add" class="btn btn-success">+</button></td>
                        </tr>
                    </table>
                </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <h6 class="text-danger">Clips Data Details</h6>
                    <table border="0" class="table table-none border-0" id="clip_dynamic_field">
                        <tr>
                            <td><input type="text" name="clip_details[]" placeholder="1. Enter Clips Data" class="form-control name_list" required="" /></td>
                            <td><button type="button" id="clip_add" class="btn btn-success">+</button></td>
                        </tr>
                    </table>

                </div>
          </div>
        </div>
      </div>
    <div class="mx-auto mt-5">
      <button type="submit" class="btn btn-info">Add DIT</button>
    </div>

    </div>
  </form>


@endsection

@push('scripts')
  <script type="text/javascript">
      $(document).ready(function(){
        var i=1;

        $('#card_add').click(function(){
             i++;
             $('#card_dynamic_field').append('<tr id="card_row'+i+'" class="card-dynamic-added"><td><input type="text" name="card_details[]" placeholder="' + i + '. Enter Card Data" class="form-control name_list" required /></td><td><button type="button" id="'+i+'" class="btn btn-danger card_btn_remove">X</button></td></tr>');
        });


        $(document).on('click', '.card_btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#card_row' + button_id + '').remove();
        });

        var j=1;

        $('#clip_add').click(function(){
             j++;
             $('#clip_dynamic_field').append('<tr id="clip_row'+j+'" class="clip-dynamic-added"><td><input type="text" name="clip_details[]" placeholder="' + j + '. Enter Clip Data" class="form-control name_list" required /></td><td><button type="button"id="'+j+'" class="btn btn-danger clip_btn_remove">X</button></td></tr>');
        });


        $(document).on('click', '.clip_btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#clip_row' + button_id + '').remove();
        });
      });
  </script>
@endpush
