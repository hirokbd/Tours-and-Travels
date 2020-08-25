@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Bank') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Bank Name</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Branch</th>
                                    <th>Signature</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($bank_id as $bid)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $bid->name }}</td>
                                    <td>{{ $bid->account_name }}</td>
                                    <td>{{ $bid->account_number }}</td>
                                    <td>{{ $bid->branch }}</td>
                                    <td>@if ($bid->sing_photo)<img src='{{ asset('uploads/bank/'.$bid->sing_photo) }}' width="80">@endif</td>
                                    <td>@if ($bid->status == 1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif</td>
                                    <td>
                                        <button class="btn-md btn-outline-warning" title="Edit"><a href="{{route('bank.edit',[$bid->id])}}"><i class="mdi mdi-pencil"></i></a></button>
                                        <button class="btn-md btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('bank.delete',[$bid->id])}}"><i class="mdi mdi-delete"></i></a></button>
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