@extends('layouts.app')

@stack('styles')
<style media="screen">
  .table td, .table th {
    border:none!important;
  }
</style>
@section('content')
  <form class="" action="{{ route('dit.update', ['dit' => $dit]) }}" method="post">
    @csrf

    <div class="row">
      <div class="col-md-12">
        <h5 class="text-danger">{{ $dit->hdd->name }} - DIT Data</h5>
        <div class="card mb-4">

          <div class="card-body">
            <div class="form-row">
              <div class="form-group col">
                <label for="day_no">Day No</label>
                <input type="text" class="form-control" id="day_no" name="day_no" required value="{{ $dit->day }}">
              </div>
              <div class="form-group col">
                <label for="date_of_shoot">Date Of Shoot</label>
                <input type="date" class="form-control" id="date_of_shoot" name="date_of_shoot" required value="{{ $dit->date_of_shoot }}">
              </div>
              <div class="form-group col">
                <label for="giver_name">Giver Name</label>
                <input type="text" class="form-control" id="giver_name" name="giver_name" required value="{{ $dit->giver_name }}">
              </div>
            </div>
          </div>
        </div>
    </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h6 class="text-danger float-left">Card Data Details</h6>
            <div class="float-right">
              <button type="button" id="card_add" class="btn btn-sm btn-success">Add New</button>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
                          @foreach ($dit->cards as $key => $card)
                            <table border="0" class="table table-none border-0" id="edit_card_dynamic_field_{{ $card->id }}">
                            <tr id="edit_card_row_{{ $card->id }}" class="edit_card-dynamic-added">
                            <td><input type="text" name="card_details[]" placeholder="{{ $card->id }}. Enter Card Data" class="form-control name_list" required="" value="{{ $card->details }}"/></td>

                            <td><button type="button"id="{{ $card->id }}" class="btn btn-danger edit_card_btn_remove_{{ $card->id }}">X</button></td>
                            {{-- <td><button type="button" id="card_add_{{ $card->id }}" class="btn btn-success">+</button></td> --}}
                        @push('scripts')
                          <script type="text/javascript">
                                var i = {{ $card->id }};

                                $('#edit_card_add_{{ $card->id }}').click(function(){
                                     i++;
                                     $('#edit_card_dynamic_field_{{ $card->id }}').append('<tr id="edit_card_row_'+i+'" class="edit_card-dynamic-added"><td><input type="text" name="card_details[]" placeholder="' + i + '. Enter Card Data" class="form-control name_list" required /></td><td><button type="button" id="'+i+'" class="btn btn-danger edit_card_btn_remove">X</button></td></tr>');
                                });


                                $(document).on('click', '.edit_card_btn_remove_{{ $card->id }}', function(){
                                     var button_id = $(this).attr("id");
                                     $('#edit_card_row_' + button_id + '').remove();
                                });
                                </script>
                        @endpush

                          @endforeach

                        </tr>


                      </table>

                      <table border="0" class="table table-none border-0" id="card_dynamic_field">
                    </table>
                </div>
          </div>
        </div>
      </div>


      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h6 class="text-danger float-left">Clip Data Details</h6>
            <div class="float-right">
              <button type="button" id="clip_add" class="btn btn-sm btn-success">Add New</button>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
                          @foreach ($dit->clips as $key => $clip)

                            <table border="0" class="table table-none border-0" id="edit_clip_dynamic_field_{{ $clip->id }}">
                            <tr id="edit_clip_row_{{ $clip->id }}" class="edit_clip-dynamic-added">
                            <td><input type="text" name="clip_details[]" placeholder="{{ $clip->id }}. Enter Clip Data" class="form-control name_list" required="" value="{{ $clip->details }}"/></td>

                            <td><button type="button"id="{{ $clip->id }}" class="btn btn-danger edit_clip_btn_remove_{{ $clip->id }}">X</button></td>
                            {{-- <td><button type="button" id="card_add_{{ $card->id }}" class="btn btn-success">+</button></td> --}}
                        @push('scripts')
                          <script type="text/javascript">
                                var i = {{ $clip->id }};

                                $('#edit_clip_add_{{ $clip->id }}').click(function(){
                                     i++;
                                     $('#edit_clip_dynamic_field_{{ $clip->id }}').append('<tr id="edit_clip_row_'+i+'" class="edit_clip-dynamic-added"><td><input type="text" name="clip_details[]" placeholder="' + i + '. Enter Clip Data" class="form-control name_list" required /></td><td><button type="button" id="'+i+'" class="btn btn-danger edit_clip_btn_remove">X</button></td></tr>');
                                });


                                $(document).on('click', '.edit_clip_btn_remove_{{ $clip->id }}', function(){
                                     var button_id = $(this).attr("id");
                                     $('#edit_clip_row_' + button_id + '').remove();
                                });
                                </script>
                        @endpush

                          @endforeach

                        </tr>


                      </table>

                      <table border="0" class="table table-none border-0" id="clip_dynamic_field">
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
      $(document).ready(function() {
        var i=1;

        $('#card_add').click(function(){
             i++;

             $('#card_dynamic_field').append('<tr id="card_row_'+i+'" class="card-dynamic-added"><td><input type="text" name="card_details[]" placeholder="' + i + '. Enter Card Data" class="form-control name_list" required /></td><td><button type="button" id="'+i+'" class="btn btn-danger card_btn_remove">X</button></td></tr>');
        });


        $(document).on('click', '.card_btn_remove', function(){
             var button_id = $(this).attr("id");
             $('#card_row_' + button_id + '').remove();
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
