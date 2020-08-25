@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Visa Application') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Client Name</th>
                                    <th>Visa Type</th>
                                    <th>Country</th>
                                    <th>Duration</th>
                                    <th>Fee</th>
                                    <th>Down Payment</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($visa_app as $vid)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $vid->clients->name }}</td>
                                    <td>{{ $vid->visatype->name }}</td>
                                    <td>{{ $vid->country->name }}</td>
                                    <td>{{ $vid->visa_duration }} {{ $vid->visa_duration_type }}</td>
                                    <td>{{ $vid->app_fee }}</td>
                                    <td>{{ $vid->down_payment }}</td>
                                    <td>@if ($vid->status == 1) <label class="badge badge-primary">New</label> @elseif ($vid->status == 0) <label class="badge badge-warning">Pending</label> @elseif ($vid->status == 2) <label class="badge badge-success">Approved</label> @else <label class="badge badge-danger">Rejected</label> @endif</td>
                                    <td>
                                        <button class="btn-md btn-outline-warning" title="Edit"><a href="{{route('visa.edit',[$vid->id])}}"><i class="mdi mdi-pencil"></i></a></button>
                                        <button class="btn-md btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('visa.delete',[$vid->id])}}"><i class="mdi mdi-delete"></i></a></button>
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