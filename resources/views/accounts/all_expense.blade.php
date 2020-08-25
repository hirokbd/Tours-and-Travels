@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Expenses') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Date</th>
                                    <th>Expense</th>
                                    <th>Payment Type</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($expense as $exp)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ date('d M y', strtotime($exp->ex_date)) }}</td>
                                    <td>@if(!empty($exp->exname)) {{ $exp->exname->ex_name }} @endif</td>
                                    <td>@if($exp->payment_type == 1) <label class="badge badge-success">Cash</label> @else <label class="badge badge-warning">Bank</label> @endif</td>
                                    <td>{{ number_format($exp->amount, 2) }}</td>
                                    <td>
                                        <button class="btn-md btn-outline-success" title="View"><a href="#"><i class="mdi mdi-eye"></i></a></button>
                                   <!--     <button class="btn-md btn-outline-warning" title="Edit"><a href=""><i class="mdi mdi-pencil"></i></a></button>-->
                                        <button class="btn-md btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('expense.delete',[$exp->id])}}"><i class="mdi mdi-delete"></i></a></button>
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