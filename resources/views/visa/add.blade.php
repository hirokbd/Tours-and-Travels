@extends('master')

@section('content')
    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Add Visa Application') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('visa.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="client_id" class="col-sm-4 col-form-label">{{ __('Passenger Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="client_id" name="client_id" style="width:100%">
                                            <option>Select Passenger</option>

                                            @foreach($client_id as $cl_id)
                                                <option value="{{$cl_id->id}}">{{$cl_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country_id" class="col-sm-4 col-form-label">{{ __('Visa Applica. Country') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="country_id" name="country_id" style="width:100%">
                                            <option>Select Country</option>

                                            @foreach($country_id as $cun_id)
                                                <option value="{{$cun_id->id}}">{{$cun_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app_date" class="col-sm-4 col-form-label">{{ __('Application Date') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="app_date" class="form-control p-input datepicker" id="app_date" placeholder="Enter Application Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="down_payment" class="col-sm-4 col-form-label">{{ __('Down Payment') }}</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="down_payment" class="form-control p-input" id="down_payment" placeholder="Down Payment">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="js-example-basic-single form-control" id="down_payment_type" name="down_payment_type" style="width:100%">
                                            @foreach($payment_id as $pay_id)
                                                <option value="{{$pay_id->id}}">{{$pay_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="document" class="col-sm-4 col-form-label">{{ __('Document') }}</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="document" id="document" class="dropify custom-file-input" data-height="80" data-max-file-size="2048kb" />
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="visa_type" class="col-sm-4 col-form-label">{{ __('Visa Type') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="visa_type" name="visa_type" style="width:100%">
                                            <option>Select Visa Type</option>

                                            @foreach($visa_id as $vs_id)
                                                <option value="{{$vs_id->id}}">{{$vs_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="visa_duration" class="col-sm-4 col-form-label">{{ __('Visa Duration') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="visa_duration" class="form-control p-input" id="visa_duration" placeholder="Enter Duration">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="js-example-basic-single form-control" id="visa_duration_type" name="visa_duration_type" style="width:100%">
                                            <option value="Days">Days</option>
                                            <option value="Weeks">Weeks</option>
                                            <option value="Months">Months</option>
                                            <option value="Years">Years</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="processing_time" class="col-sm-4 col-form-label">{{ __('Processing Time') }}</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="processing_time" class="form-control p-input" id="processing_time" placeholder="Enter Processing Time">
                                    </div>
                                    <div class="col-sm-2">
                                        <p>Days</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="app_fee" class="col-sm-4 col-form-label">{{ __('Application Fee') }}</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="app_fee" class="form-control p-input" id="app_fee" placeholder="Application Fee">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="js-example-basic-single form-control" id="app_fee_type" name="app_fee_type" style="width:100%">
                                            @foreach($payment_id as $pay_id)
                                                <option value="{{$pay_id->id}}">{{$pay_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="remarks" class="col-sm-4 col-form-label">{{ __('Remarks') }}</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="4" name="remarks" id="remarks" placeholder="Enter Remarks"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">{{ __('Status') }} <span class="req-star">*</span></label>
                            <div class="col-sm-10">
                                <div class="form-radio" style="display: inline-block!important;">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="new" value="1" checked>
                                        New
                                    </label>
                                </div>
                                <div class="form-radio" style="display: inline-block!important;">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="pending" value="0">
                                        Pending
                                    </label>
                                </div>
                                <div class="form-radio" style="display: inline-block!important;">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="approved" value="2">
                                        Approved
                                    </label>
                                </div>
                                <div class="form-radio" style="display: inline-block!important;">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" id="rejected" value="3">
                                        Rejected
                                    </label>
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-success mt-4">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection