@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('Search Date Wise') }}</h2>
                  <form role="form" class="forms-sample" action="{{route('search.incomeSearch')}}" method="POST">
                        @csrf
                  <div class="row">
                    <div class="col-lg-4 col-12">
                                 <div class="form-group row">
                                    <label for="from_date" class="col-sm-4 col-form-label">{{ __('Date From') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$start_date}}" name="from_date" class="form-control p-input datepickernew" id="from_date" placeholder="Enter Date From">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                 <div class="form-group row">
                                    <label for="to_date" class="col-sm-4 col-form-label">{{ __('Date To') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$end_date}}" name="to_date" class="form-control p-input datepickernew" id="to_date" placeholder="Enter Date To">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                 <button type="submit" class="btn btn-success">{{ __('Search') }}</button>
                            </div>
                  </div>
              </form>

                </div>
              </div>
              </div>


          </div>

                    <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title text-center">Search Results for: {{ date('d M y', strtotime($start_date)) }} to {{ date('d M y', strtotime($end_date)) }}</h2>
                 
                    <div class="row">
                        <div class="col-12">
                            <table id="income-statement" class="table table-striped" style="width:50%; float: left;">
                                <thead>
                                <tr>
                                    <th>Expense Title</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($expense_search as $exp)
                                <tr>
                                    <td>@if(!empty($exp->exname)) {{ $exp->exname->ex_name }} @endif</td>
                                    <td>{{ number_format($exp->amount, 2) }}</td>
                                    
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table id="income-statement" class="table table-striped" style="width:50%; float: left;">
                                <thead>
                                <tr>
                                    <th>Income Title</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoice_search as $inv)
                                <tr>
                                    <td>{{ $inv->invoice_no }}</td>
                                    <td>{{ number_format($inv->grand_total, 2) }}</td>
                                    
                                </tr>
                                @endforeach
                                </tbody>
                               
                            </table>
                            
                        </div>
                        <div class="col-12">
                             <table id="income-statement" class="table table-bordered" style="width:50%; float: right;">
                            
                                <tbody style="border-top: 2px solid #a59e9e;">
                                    <tr>
                                        <td>Total Income:</td>
                                        <td>{{ number_format($in_total, 2) }}</td>
                                    </tr> 
                                    <tr>
                                        <td>Total Expense:</td>
                                        <td>{{ number_format($ex_total, 2) }}</td>
                                    </tr> 
                                    
                                </tbody>
                                 <tfoot style="border-top: 2px solid #a59e9e;"> 
                                    <tr>
                                        <th>Balance:</th>
                                        <th>{{ number_format($in_total - $ex_total, 2) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              </div>


          </div>

@endsection