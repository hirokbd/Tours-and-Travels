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
                                        <input type="text" name="from_date" class="form-control p-input datepickernew" id="from_date" placeholder="Enter Date From">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                 <div class="form-group row">
                                    <label for="to_date" class="col-sm-4 col-form-label">{{ __('Date To') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="to_date" class="form-control p-input datepickernew" id="to_date" placeholder="Enter Date To">
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
                  <h2 class="card-title">{{ __('Income Statement') }}</h2>
                 
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
                                @foreach ($expense as $exp)
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
                                @foreach ($invoice as $inv)
                                <tr>
                                    <td>@if($inv->invoices['invoice_no']){{ $inv->invoices['invoice_no'] }}@else  {{ $inv->remittance['foffice']['name'] }} @endif</td>
                                    <td>{{ number_format($inv->pay_amount, 2) }}</td>
                                    
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
                                        <td>{{ number_format($gtotal, 2) }}</td>
                                    </tr> 
                                    <tr>
                                        <td>Total Expense:</td>
                                        <td>{{ number_format($etotal, 2) }}</td>
                                    </tr> 
                                    
                                </tbody>
                                 <tfoot style="border-top: 2px solid #a59e9e;"> 
                                    <tr>
                                        <th>Balance:</th>
                                        <th>{{ number_format($gtotal - $etotal, 2) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              </div>


          </div>

           <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
   
<script>
    var today = new Date();

    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    }

    if(mm<10) {
        mm = '0'+mm
    }

    // today = yyyy + '/' + mm + '/' + dd;
    today = dd + '-' + mm + '-' + yyyy;

    //    console.log(today);
    document.getElementById('from_date').value = today;
    document.getElementById('to_date').value = today;
</script>
@endsection