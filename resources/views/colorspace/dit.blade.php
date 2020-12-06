@extends('layouts.app')

@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="d-flex justify-content-between">
        <h5><span class="text-info">Project - </span>  </h5>
        <div class="text-right mb-4">
        <a href="{{ route('dit.create', ['hdd' => $hdd]) }}" class="btn btn-sm btn-success">Create DIT</a>
        </div>
      </div>
        <div class="card">
        <div class="card-header">HDD Details</div>
        <div class="card-body p-0 m-0">
        <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Day</th>
                <th scope="col">Date of Shoot</th>
                <th scope="col">Giver</th>
                <th scope="col">Cards</th>
                <th scope="col">Clips</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dits as $key => $dit)
                <tr>

                  <td>{{ $key + 1 }}</td>
                  <td>{{ $dit->day }}</td>
                  <td>{{ $dit->date_of_shoot }}</td>
                  <td>{{ $dit->giver_name }}</td>
                  <td>
                    <ol>
                      @foreach ($dit->cards as $key => $dit_card)
                        <li>{{ $dit_card->id }}</li>
                        <li>{{ $dit_card->details }}</li>
                      @endforeach
                    </ol>
                  </td>
                  <td>
                    <ol>
                      @foreach ($dit->cards as $key => $dit_card)
                        <li>{{ $dit_card->id }}</li>
                        <li>{{ $dit_card->details }}</li>
                      @endforeach
                    </ol>
                  </td>
                  <td>
                    <a href="{{ route('dit.edit', ['dit' => $dit]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('dit.remove', ['dit' => $dit]) }}" class="btn btn-sm btn-danger">Remove</a>
                  </td>
                    {{-- <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#view_{{ $hdd->id }}">View</a>
                    <div class="modal fade" id="view_{{ $hdd->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="card border-0">
                            <div class="card-body border-0">
                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mr-2 w-35">Check In</p>
                                <p class="w-25">-</p>
                                <p class="w-40">{{ $hdd->check_in_date }}</p>
                              </div>

                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mr-2 w-35">Reciever Email</p>
                                <p class="w-25">-</p>
                                <p class="w-40">{{ $hdd->reciever_email }}</p>                                                                                                                                                                                           </p>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mr-2 w-35">Reciever Mobile</p>
                                <p class="w-25">-</p>
                                <p class="w-40">{{ $hdd->reciever_mobile }}</p>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mr-2 w-35">Check Out Date</p>
                                <p class="w-25">-</p>
                                <p class="w-40">{{ $hdd->check_out_date }}</p>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mr-2 w-35">HDD Content</p>
                                <p class="w-25">-</p>
                                <p class="w-40">{{ $hdd->content }}</p>
                              </div>

                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mr-2 w-35">HDD Justification</p>
                                <p class="w-25">-</p>
                                <p class="w-40">{{ $hdd->justify }}</p>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                <p class="mr-2 w-35">Created At</p>
                                <p class="w-25">-</p>
                                <p class="w-40">{{ $hdd->created_at->format('d M Y') }}</p>
                              </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                    <a href="{{ route('dit.index', ['hdd' => $hdd]) }}" class="btn btn-sm btn-danger">DIT</a>
                    @if ($hdd->status == 'check_in')
                      <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#check_out_{{ $hdd->id }}">Check Out</a>
                      <div class="modal fade" id="check_out_{{ $hdd->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Reciever Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form class="" action="{{ route('hdd.checkout', ['hdd' => $hdd]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                          <div class="form-row">
                            <div class="form-group col">
                              <label for="reciever_name">Reciever Name</label>
                              <input type="text" class="form-control" id="reciever_name" name="reciever_name" required>
                            </div>
                            <div class="form-group col">
                              <label for="reciever_email">Email</label>
                              <input type="email" class="form-control" id="reciever_email" name="reciever_email" required>
                            </div>

                          </div>
                          <div class="form-row">
                            <div class="form-group col">
                              <label for="reciever_mobile">Mobile</label>
                              <input type="numeric" class="form-control" id="reciever_mobile" name="reciever_mobile" required>
                            </div>
                            <div class="form-group col">
                              <label for="hdd_check_out">Check Out Date</label>
                              <input type="date" class="form-control" id="hdd_check_out" name="hdd_check_out" required>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col">
                              <label for="reciever_justify">Justification (Optional)</label>
                              <textarea type="text" class="form-control" id="reciever_justify" name="reciever_justify"></textarea>
                            </div>
                          </div>
                          </div>
                          <div class="modal-footer ">
                            <button type="submit" class="mx-auto btn btn-success">Check Out</button>
                          </div>
                        </form>
                          </div>
                        </div>
                      </div>
                      @else
                        <a href="#" class="btn btn-sm btn-secondary" disabled>Check Out</a>
                    @endif


                    <a href="{{ route('hdd.edit', ['hdd' => $hdd])}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('hdd.remove', ['hdd' => $hdd])}}" class="btn btn-sm btn-danger">Remove</a> --}}

              @empty
                <td colspan="12" class="text-center"> No data available at this moment.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
      </div>
    </div>
    </div>
    </div>

@endsection
