@extends('master')

@section('content')
    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Edit Passenger') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('passenger.update',[$clientId->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">{{ __('Passenger Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" minlength="5" value="{{$clientId->name}}" name="name" class="form-control p-input" id="name" placeholder="Enter Agent Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">{{ __('Passenger Email') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" value="{{$clientId->email}}" class="form-control p-input" id="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone2" class="col-sm-4 col-form-label">{{ __('Passenger Phone 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone2" value="{{$clientId->phone2}}" class="form-control p-input" id="phone2" placeholder="Enter Client Phone 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">{{ __('Address') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="address" value="{{$clientId->address}}" class="form-control p-input" id="address" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="district_id" class="col-sm-4 col-form-label">{{ __('Passenger District') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="district_id" name="district_id" style="width:100%">
                                            <option>Select District</option>

                                            @foreach($location_id as $loc_id)
                                                <option value="{{$loc_id->id}}" {{$clientId->district_id == $loc_id->id ? "selected" : "" }}>{{$loc_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="agent_id" class="col-sm-4 col-form-label">{{ __('Agent Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="agent_id" name="agent_id" style="width:100%">
                                            <option>Select Agent</option>

                                            @foreach($agent_id as $agt_id)
                                                <option value="{{$agt_id->id}}" {{$clientId->agent_id == $agt_id->id ? "selected" : "" }}>{{$agt_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">{{ __('Passenger Phone') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone" value="{{$clientId->phone}}" class="form-control p-input" id="phone" placeholder="Enter Agent Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client_photo" class="col-sm-4 col-form-label">{{ __('Passenger Photo') }} <br> @if ($clientId->client_photo) <img src="{{ asset('uploads/clients/'.$clientId->client_photo) }}" height="60"> @endif</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="client_photo" id="client_photo" class="dropify custom-file-input" data-height="80" data-max-file-size="2048kb" />
                                        <input type="hidden" name="hidden_image" value="{{ $clientId->client_photo }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="upazila_id" class="col-sm-4 col-form-label">{{ __('Passenger Area') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="upazila_id" name="upazila_id" style="width:100%" disabled>
                                            <option>Select Upazila</option>
                                            @foreach($areas as $ar)
                                            <option value="{{ $ar->id }}" {{$clientId->upazila_id == $ar->id ? "selected" : "" }}>{{ $ar->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <br>
                        <h2 class="card-title">{{ __('Passport Details') }}</h2>
                        <div class="row">
                            <div class="col-lg-6 col-12">

                                <div class="form-group row">
                                    <label for="passport_no" class="col-sm-4 col-form-label">{{ __('Passport No') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="passport_no" value="{{$clientId->passport_no}}" class="form-control p-input" id="passport_no" placeholder="Enter Passport No">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passport_issue" class="col-sm-4 col-form-label">{{ __('Passport Issue Date') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="passport_issue" value="{{$clientId->passport_issue}}" class="form-control p-input datepicker" id="passport_issue" placeholder="Enter Passport Issue Date" autocomplete>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">

                                <div class="form-group row">
                                    <label for="birth_date" class="col-sm-4 col-form-label">{{ __('Birth Date') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="birth_date" value="{{$clientId->birth_date}}" class="form-control p-input datepicker" id="birth_date" placeholder="Enter Birth Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="passport_expired" class="col-sm-4 col-form-label">{{ __('Passport Expired Date') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="passport_expired"  value="{{$clientId->passport_expired}}" class="form-control p-input datepicker" id="passport_expired" placeholder="Enter Passport Expired Date" autocomplete>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <br>
                        <h2 class="card-title">{{ __('Emergency Details') }}</h2>
                        <div class="row">
                            <div class="col-lg-6 col-12">

                                <div class="form-group row">
                                    <label for="em_name" class="col-sm-4 col-form-label">{{ __('Contact Name') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="em_name" value="{{$clientId->em_name}}" class="form-control p-input" id="em_name" placeholder="Enter Contact Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="em_phone" class="col-sm-4 col-form-label">{{ __('Emergency Phone') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="em_phone" value="{{$clientId->em_phone}}" class="form-control p-input" id="em_phone" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="em_insurance_no" class="col-sm-4 col-form-label">{{ __('Insurance Policy No') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="em_insurance_no" value="{{$clientId->em_insurance_no}}" class="form-control p-input" id="em_insurance_no" placeholder="Enter Insurance Policy No">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">

                                <div class="form-group row">
                                    <label for="em_email" class="col-sm-4 col-form-label">{{ __('Emergency Email') }}</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="em_email" value="{{$clientId->em_email}}" class="form-control p-input" id="em_email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="em_insurance" class="col-sm-4 col-form-label">{{ __('Insurance Company') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="em_insurance" value="{{$clientId->em_insurance}}" class="form-control p-input" id="em_insurance" placeholder="Enter Insurance Company">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="em_company_phone" class="col-sm-4 col-form-label">{{ __('Company Phone') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="em_company_phone" value="{{$clientId->em_company_phone}}" class="form-control p-input" id="em_company_phone" placeholder="Enter Company Phone">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <h2 class="card-title">{{ __('Status') }}</h2>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                            <div class="form-group row">
                                <label for="status" class="col-sm-4 col-form-label">{{ __('Passenger Status') }} <span class="req-star">*</span></label>
                                <div class="col-sm-8">
                                    <div class="form-radio" style="display: inline-block!important;">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" id="status1" value="1" {{$clientId->status == 1 ? "checked" : "" }}>
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-radio" style="display: inline-block!important;">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" id="status2" value="0" {{$clientId->status == 0 ? "checked" : "" }}>
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>


                        <button type="submit" class="btn btn-success mt-4">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $('#district_id').change(function(){
            var districtID = $(this).val();
            if(districtID){
                $.ajax({
                    type:"GET",
                    url:"{{url('client/get-sub-location')}}?district_id="+districtID,
                    success:function(res){
                        if(res){
                            document.getElementById('upazila_id').removeAttribute("disabled");
                            $("#upazila_id").empty();
                            $("#upazila_id").append('<option>Select Upazila</option>');
                            $.each(res,function(key,value){
                                $("#upazila_id").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            document.getElementById('upazila_id').setAttribute("disabled", true);
                            $("#upazila_id").empty();

                        }
                    }
                });
            }else{
                $("#upazila_id").empty();
            }
        });
    </script>

@endsection