@extends('master')

@section('content')

    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Add Expense') }}</h2>

                    @if ($errors->any())
                        <div class="alert alert-warning" role="alert">
                            <strong>Warning! </strong> @if ($errors->count() == 1)
                                {{$errors->first()}}
                            @else
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif

                    <form role="form" class="forms-sample" action="{{route('expense.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="expense_id" class="col-sm-4 col-form-label">{{ __('Expense Head') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control js-example-basic-single expense_id" id="expense_id" name="expense_id" style="width:100%">
                                            <option>Select Expense Head</option>
                                            @foreach($expense_name as $ex_id)
                                                <option value="{{$ex_id->id}}">{{$ex_id->ex_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment_type" class="col-sm-4 col-form-label">{{ __('Payment Type') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" onchange="bank_paymet(this.value)" id="payment_type" name="payment_type" style="width:100%">
                                            <option>Select Type</option>
                                            <option value="1">Cash</option>
                                            <option value="0">Bank</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ex_note" class="col-sm-4 col-form-label">{{ __('Note') }}</label>
                                    <div class="col-sm-8">
                                        <textarea name="ex_note" class="form-control p-input" id="ex_note" placeholder="Enter Note" rows="2"></textarea>
                                    </div>
                                </div>




                            </div>
                            <div class="col-lg-6 col-12">

                                <div class="form-group row">
                                    <label for="ex_date" class="col-sm-4 col-form-label">{{ __('Date') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ex_date" class="form-control p-input datepickernew" id="ex_date" placeholder="Enter Expense Date">
                                    </div>
                                </div>

                                 <div class="form-group row" style="display:none;" id="bankID">
                                    <label for="bank_id" class="col-sm-4 col-form-label">{{ __('Bank') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8 float-right">
                                        <select class="js-example-basic-single form-control" id="bank_id" name="bank_id" style="width:100%">
                                            <option value="0">Select Bank</option>
                                            @foreach($bank as $bk)
                                                <option value="{{$bk->id}}">{{$bk->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 
                                <div class="form-group row">
                                    <label for="amount" class="col-sm-4 col-form-label">{{ __('Amount') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="number" name="amount" class="form-control p-input" id="amount" placeholder="Enter Amount">
                                    </div>
                                </div>
                               
                                
                            </div>
                            <button type="submit" class="btn btn-success mt-4">{{ __('Submit') }}</button>


                        </div>





                    </form>
                </div>
            </div>
        </div>


    </div>
    <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
   
    <script>
        function bank_paymet(val){
            if(val==0){
                document.getElementById('bankID').style.display = 'block';
                document.getElementById('bank_id').setAttribute("required", true);
            }else{
                document.getElementById('bankID').style.display = 'none';
                document.getElementById('bank_id').removeAttribute("required");
            }

         //   document.getElementById('bankID').style.display = style;
        }

    </script>

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
    document.getElementById('ex_date').value = today;
</script>

@endsection