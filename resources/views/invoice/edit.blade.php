@extends('master')

@section('content')

    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Edit Invoice') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('invoice.update',[$invoiceId->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">{{ __('Invoice No.') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="invoice_no" value="{{$invoiceId->invoice_no}}" class="form-control p-input" id="invoice_no" placeholder="Enter Invoice Number" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_id" class="col-sm-4 col-form-label">{{ __('Agent Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control agent_id" id="agent_id" name="agent_id" style="width:100%">
                                            <option>Select Agent</option>
                                            @foreach($agent_id as $ag_id)
                                                <option value="{{$ag_id->id}}" {{$invoiceId->agent_id == $ag_id->id ? "selected" : "" }}>{{$ag_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="visa_type" class="col-sm-4 col-form-label">{{ __('Visa Type') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="visa_type" name="visa_type" style="width:100%">
                                            <option>Select Visa Type</option>

                                            @foreach($visa_type as $visa)
                                                <option value="{{$visa->id}}" {{$invoiceId->visa_type == $visa->id ? "selected" : "" }}>{{$visa->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="year" class="col-sm-4 col-form-label">{{ __('Year') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="year" value="{{$invoiceId->year}}" class="form-control p-input" id="year" placeholder="Enter Year">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment_type" class="col-sm-4 col-form-label">{{ __('Payment Type') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" onchange="bank_paymet(this.value)" id="payment_type" name="payment_type" style="width:100%">
                                            <option>Select Type</option>
                                            <option value="1" {{$invoiceId->payment_type == '1' ? "selected" : "" }}>Cash</option>
                                            <option value="0" {{$invoiceId->payment_type == '0' ? "selected" : "" }}>Cheque</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" style="display: none" id="chequeID">
                                    <label for="cheque_no" class="col-sm-4 col-form-label">{{ __('Cheque Number') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8 float-right">
                                        <input type="text" name="cheque_no" value="{{$invoiceId->cheque_no}}" class="form-control p-input" id="cheque_no" placeholder="Enter Cheque Number">
                                    </div>
                                </div>



                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="invoice_date" class="col-sm-4 col-form-label">{{ __('Invoice Date') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="invoice_date" value="{{$invoiceId->invoice_date}}" class="form-control p-input datepickernew" id="invoice_date" placeholder="Enter Invoice Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_id" class="col-sm-4 col-form-label">{{ __('Passenger Name') }}</label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control client_id" id="client_id" name="client_id" style="width:100%">
                                            <option>Select Client</option>
                                            @foreach($client_id as $cl_id)
                                                <option value="{{$cl_id->id}}" {{$invoiceId->client_id == $cl_id->id ? "selected" : "" }}>{{$cl_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country_id" class="col-sm-4 col-form-label">{{ __('Country') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="country_id" name="country_id" style="width:100%">
                                            <option>Select Country</option>
                                            @foreach($country_id as $coun_id)
                                                <option value="{{$coun_id->id}}" {{$invoiceId->country_id == $coun_id->id ? "selected" : "" }}>{{$coun_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regi_type" class="col-sm-4 col-form-label">{{ __('Registration Type') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="regi_type" name="regi_type" style="width:100%">
                                            <option>Select Type</option>
                                                <option value="1" {{$invoiceId->regi_type == '1' ? "selected" : "" }}>Registration</option>
                                                <option value="0" {{$invoiceId->regi_type == '0' ? "selected" : "" }}>Pre Registration</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" style="display:none;" id="bankID">
                                    <label for="bank_id" class="col-sm-4 col-form-label">{{ __('Bank') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8 float-right">
                                        <select class="js-example-basic-single form-control" id="bank_id" name="bank_id" style="width:100%">
                                            <option value="0">Select Bank</option>
                                            @foreach($bank_id as $bk)
                                                <option value="{{$bk->id}}" {{$invoiceId->bank_id == $bk->id ? "selected" : "" }}>{{$bk->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                            </div>


                            <table class="table table-bordered" id="tbl_posts">
                                <thead>
                                <tr>
                                    <th width="25%">Package Name *</th>
                                    <th>Remarks</th>
                                    <th>Qty *</th>
                                    <th>Price *</th>
                                    <th>Total</th>
                                    <th style="text-align: center;"><a href="#" class="addRow btn btn-success"><i class="fa fa-plus"></i> </a></th>
                                </tr>
                                </thead>
                                <tbody id="sale_table">
                                  
                                    @foreach($invoiceinfo as $invinfo)
                                    
                                <tr>
                                    <td>
                                        <select class="form-control pack_id" id="pack_id" name="pack_id[]" style="width: 100%;">
                                            <option>Select Package</option>
                                            @foreach($package_id as $pack_id)
                                                <option value="{{$pack_id->id}}" {{$invinfo->pack_id == $pack_id->id ? "selected" : "" }}>{{$pack_id->pack_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" value="{{$invinfo->remarks}}" class="form-control text-right remarks" id="remarks" name="remarks[]" placeholder="Remarks">
                                    </td>
                                    <td>
                                        <input type="number" value="{{$invinfo->quantity}}" class="form-control text-right quantity" id="quantity" name="quantity[]" placeholder="0.00">
                                    </td>
                                    <td>
                                        <input type="number" value="{{$invinfo->price}}" class="form-control text-right price" id="price" name="price[]" placeholder="0.00" readonly>
                                    </td>

                                    <td>
                                        <input type="number" value="{{$invinfo->total_amount}}" class="form-control text-right total_amount" id="total_amount" name="total_amount[]" placeholder="0.00" readonly>
                                    </td>
                                    <td style="text-align: center;"><a href="#" class="remove btn btn-danger"><i class="fa fa-close"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right">Sub Total:</th>
                                    <th class="text-right">
                                        <input type="text" class="form-control text-right sub_total" id="sub_total" value="{{$invoiceId->sub_total}}" name="sub_total" placeholder="0.00" readonly>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Discount (%):</th>
                                    <th class="text-right">
                                        <input type="text" value="{{$invoiceId->invoice_discount}}" class="form-control text-right invoice_discount" id="invoice_discount" name="discount_percent" placeholder="0.00">
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Grand Total:</th>
                                    <th class="text-right">
                                        <input type="text" class="form-control text-right grand_total" value="{{$invoiceId->grand_total}}" id="grand_total" name="grand_total" placeholder="0.00" readonly>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Paid Amount:</th>
                                    <th class="text-right">
                                        <input type="number" class="form-control text-right paid_amount" value="{{$invoiceId->paid_amount}}" id="paid_amount" name="paid_amount" placeholder="0.00">
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Due:</th>
                                    <th class="text-right">
                                        <input type="text" value="{{$invoiceId->due_amount}}" class="form-control text-right due_amount" id="due_amount" name="due_amount" placeholder="0.00" readonly>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right"><button type="submit" class="btn btn-success mt-4 float-right">{{ __('Submit') }}</button></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>





                    </form>
                </div>
            </div>
        </div>


    </div>
    <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $('.addRow').on('click',function(){
            addRow();
        });
        function addRow() {
            var tr =  '<tr>'+
                '<td>'+
                '<select class="form-control select2 pack_id" id="pack_id" name="pack_id[]" style="width: 100%;">'+
                '<option>Select Package</option>'+
                '@foreach($package_id as $pack_id)'+
                '<option value="{{$pack_id->id}}">{{$pack_id->pack_name}}</option>'+
                '@endforeach'+
                '</select>'+
                '</td>'+
                '<td><input type="text" class="form-control text-right remarks" id="remarks" name="remarks[]" placeholder="Remarks"></td>'+
                '<td><input type="number" class="form-control text-right quantity" id="quantity" name="quantity[]" placeholder="0.00"></td>'+
                '<td><input type="number" class="form-control text-right price" id="price" name="price[]" placeholder="0.00" readonly></td>'+
                '<td><input type="number" class="form-control text-right total_amount" id="total_amount" name="total_amount[]" placeholder="0.00" readonly></td>'+
                '<td style="text-align: center;"><a href="#" class="btn btn-danger remove"><i class="fa fa-close"></i></a></td>'+
                '</tr>';
            $('tbody').append(tr);
        };
        $('tbody').on('click','.remove',function() {
            var l = $('tbody tr').length;
            if(l==1) {
                alert('You can not remove last one');
            }else {
                $(this).parent().parent().remove();
            }
        });
    </script>
    <script>
        function bank_paymet(val){
            if(val==0){
                document.getElementById('bankID').style.display = 'block';
                document.getElementById('chequeID').style.display = 'block';
                document.getElementById('bank_id').setAttribute("required", true);
            }else{
                document.getElementById('bankID').style.display = 'none';
                document.getElementById('chequeID').style.display = 'none';
                document.getElementById('bank_id').removeAttribute("required");
            }

         //   document.getElementById('bankID').style.display = style;
        }


        $('tbody').delegate('.quantity, .price, .total_amount','keyup', function(){
            var tr = $(this).parent().parent();
            var quantity = tr.find('.quantity').val();
            var price = tr.find('.price').val();
            var total_amount = (quantity * price);
            tr.find('.total_amount').val(total_amount);

            subtotal();
        });
        function subtotal () {
            var subtotal = 0;
            $('.total_amount').each(function (i,e) {
                var total_p = $(this).val()-0;
                subtotal += total_p;
            });
            $('.sub_total').val(subtotal);
            $('.grand_total').val(subtotal);
        }

        $('.invoice_discount').keyup(function () {
            //   var totaldis = 0;
            var invdis = $(this).val();
            var subt = $('.sub_total').val();
            if (invdis) {
                $('.grand_total').empty();
                var totaldis = (subt/100 * invdis);
                var gtotal = subt - totaldis;
                $('.grand_total').val(gtotal);
            }

        });
        $('.paid_amount').keyup(function () {
            var paidamount = $('.paid_amount').val();
            var gttal = $('.grand_total').val();
            var dueamount = gttal - paidamount;
            var changeamount = paidamount - gttal;
            if (gttal > paidamount ) {
                $('.due_amount').empty();
                $('.due_amount').val(dueamount);
            }else {
                $('.due_amount').empty();
                $('.due_amount').val('0');
            }

        });


        // Package Price
        $('tbody').delegate('.pack_id','change', function(){
            var tr = $(this).parent().parent();
            var id = tr.find('#pack_id :selected').val();
            var dataID = {'id':id};

            $.ajax({
                type:"GET",
                url:"{{url('/invoice/unitPrice')}}",
                dataType: 'json',
                data: dataID,
                success:function (data) {
                    tr.find('.price').val(data.pack_amount);

                }

            });
        });


    </script>
    <script type="text/javascript">
     /*   $('#client_id').change(function(){
            var id = $('#client_id').val();
            var dataID = {'id':id};
                $.ajax({
                    type:"GET",
                    url:" ",
                    dataType: 'json',
                    data: dataID,
                    success:function(data){
                        $('#agent_id').val(data.agent_id);
                    }
                });
        });*/

        $('#agent_id').change(function(){
            var id = $(this).val();
            var dataID = {'id':id};
                $.ajax({
                    type:"GET",
                    url:"{{url('invoice/clientID')}}",
                    dataType: 'json',
                    data: dataID,
                    success:function(data){
                        if(data){
                         //   document.getElementById('client_id').removeAttribute("disabled");
                            $("#client_id").empty();
                            $("#client_id").append('<option>Select</option>');
                            $.each(data,function(key,value){
                                $("#client_id").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#client_id").empty();
                        }
                    }
                });

        });


    </script>


@endsection