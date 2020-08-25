@extends('master')

@section('content')
<a onclick="printContent('printDiv');" class="btn btn-danger pull-left">Print</a>
          <div class="row printDiv">

              <div class="col-12 col-lg-12 grid-margin">
                <div class="row">
                        <div class="col-12">
                            <div class="content-dir-item" style="text-align:center;">
                                <img src="{{ asset('uploads/company/'.$company_info->logo) }}" width="100">
                                <h3>{{$company_info->name}}</h3>
                                 <p>{{$company_info->address}}</p>
                                 <p>Phone: {{$company_info->phone}}, {{$company_info->phone2}}</p>
                                 <p>Email: {{$company_info->email}}, {{$company_info->email2}}</p>
                                 
                              <!--  <h3 class="pull-right">Order Information:</h3>-->
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <address>
                                    <strong>Billed To:</strong><br>
                                        Name: {{$invoice->clients->name}}<br>
                                       Address: {{$invoice->clients->address}}<br>
                                        Mobile: {{$invoice->clients->phone}}<br>
                                       Email: {{$invoice->clients->email}}<br>
                                    </address>
                                </div>
                                <div class="col-6 text-right">
                                    <address>
                                    <strong>Invoice Id: </strong>
                                        {{$invoice->invoice_no}}<br>
                                        <strong>Date: </strong>
                                        {{$invoice->invoice_date}}<br>
                    
                                    </address>
                                </div>
                               
                            </div>
                        <!--    <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        Visa ending **** 4242<br>
                                        jsmith@email.com
                                    </address>
                                </div>
                                
                            </div> -->
                        </div>
                    </div>

              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('Order Summary') }}</h2>
                  

                    <div class="row">
                        <div class="col-12">
                            <table id="order-list" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Package Name</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    
                                    
                                    
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice_info as $info)
                                <tr>
                                    <td>{{ $no++ }}</td>

                                    <td class="text-center">{{ $info->packages->pack_name }}</td>
                                    <td class="text-center">
                                        {{ $info->quantity }}</td>
                                    <td class="text-center">{{ $info->price }}</td>
                                    <td class="text-right">{{ $info->total_amount }}</td>
                                </tr>
                               @endforeach
                 
                                
                                <tr>
                                    
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">{{$invoice->sub_total}}</td>
                                </tr>
                               @if($invoice->discount_percent)
                                <tr>
                                   
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>

                                    <td class="no-line text-center"><strong>Total Discount:</strong></td>
                                    <td class="no-line text-right">{{$invoice->sub_total/100 * $invoice->discount_percent}}</td>
                                </tr>@endif
                                <tr>
                                    
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">{{$invoice->grand_total}}</td>
                                </tr>@if($invoice->paid_amount)
                                <tr>
                                    
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Paid Amount</strong></td>
                                    <td class="no-line text-right">{{$invoice->paid_amount}}</td>
                                </tr>@endif
                                <tr>@if($invoice->due_amount)
                                    
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Due Amount</strong></td>
                                    <td class="no-line text-right">{{$invoice->due_amount}}</td>
                                </tr>@endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              </div>


          </div>
@endsection