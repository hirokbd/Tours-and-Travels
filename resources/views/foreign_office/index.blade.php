@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Foreign Office') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($office_id as $oid)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $oid->name }}</td>
                                    <td>{{ $oid->email }}</td>
                                    <td>{{ $oid->phone }}</td>
                                    <td>{{ $oid->country->name }}</td>
                                    <td>@if ($oid->status == 1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif</td>
                                    <td>
                                        <button class="btn-md btn-outline-warning" title="Edit"><a href="{{route('office.edit',[$oid->id])}}"><i class="mdi mdi-pencil"></i></a></button>
                                        <button class="btn-md btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('office.delete',[$oid->id])}}"><i class="mdi mdi-delete"></i></a></button>
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