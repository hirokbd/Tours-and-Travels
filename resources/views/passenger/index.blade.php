@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Passenger') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Agent Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($client_id as $cid)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $cid->name }}</td>
                                    <td>@if ($cid->client_photo) <img src="{{ asset('uploads/clients/'.$cid->client_photo) }}" width="80"> @endif</td>
                                    <td>{{ $cid->phone }}</td>
                                    <td>{{ $cid->email }}</td>

                                    <td>{{ $cid->agent['name'] }}</td>

                                    <td>@if ($cid->status == 1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif</td>
                                    <td>
                                        <button class="btn-md btn-outline-success" title="View"><a href="{{route('passenger.view',[$cid->id])}}"><i class="mdi mdi-eye"></i></a></button>
                                        <button class="btn-md btn-outline-warning" title="Edit"><a href="{{route('passenger.edit',[$cid->id])}}"><i class="mdi mdi-pencil"></i></a></button>
                                        <button class="btn-md btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('passenger.delete',[$cid->id])}}"><i class="mdi mdi-delete"></i></a></button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              </div>


          </div>
@endsection