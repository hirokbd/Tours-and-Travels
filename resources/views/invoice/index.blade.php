@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Clients') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Date</th>
                                    <th>Agent Name</th>
                                    <th>Passenger Name</th>
                                    <th>Country</th>
                                    <th>Visa Type</th>
                                    <th>Total Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoice as $inv)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ date('d M y', strtotime($inv->invoice_date)) }}</td>
                                    <td>@if(!empty($inv->agents)) {{ $inv->agents->name }} @endif</td>
                                    <td>@if(!empty($inv->clients)) {{ $inv->clients->name }} @endif</td>
                                    <td>@if(!empty($inv->country)){{ $inv->country->name }} @endif</td>
                                    <td>@if(!empty($inv->visatype)){{ $inv->visatype->name }} @endif</td>
                                    <td>{{ number_format($inv->grand_total, 2) }}</td>
                                    <td>
                                        <button class="btn-md btn-outline-success" title="View"><a href="{{route('invoice.view',[$inv->id])}}"><i class="mdi mdi-eye"></i></a></button>
                                   <!--     <button class="btn-md btn-outline-warning" title="Edit"><a href=""><i class="mdi mdi-pencil"></i></a></button>-->
                                        <button class="btn-md btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('invoice.delete',[$inv->id])}}"><i class="mdi mdi-delete"></i></a></button>
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