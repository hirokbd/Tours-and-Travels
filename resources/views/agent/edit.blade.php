@extends('master')

@section('content')
    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Add Agent') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('agent.update',[$agentId->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">{{ __('Agent Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" minlength="5" value="{{$agentId->name}}" name="name" class="form-control p-input" id="name" placeholder="Enter Agent Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">{{ __('Agent Email') }}</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" value="{{$agentId->email}}" class="form-control p-input" id="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone2" class="col-sm-4 col-form-label">{{ __('Agent Phone 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone2" value="{{$agentId->phone2}}" class="form-control p-input" id="phone2" placeholder="Enter Agent Phone 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">{{ __('Address') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="address" value="{{$agentId->address}}" class="form-control p-input" id="address" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="district_id" class="col-sm-4 col-form-label">{{ __('Agent District') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="district_id" name="district_id" style="width:100%">
                                            <option>Select District</option>

                                            @foreach($location_id as $loc_id)
                                                <option value="{{$loc_id->id}}" {{$agentId->district_id == $loc_id->id ? "selected" : "" }}>{{$loc_id->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="commission" class="col-sm-4 col-form-label">{{ __('Agent Commission (%)') }}</label>
                                    <div class="col-sm-8">
                                        <input type="number" value="{{$agentId->commission}}" name="commission" class="form-control p-input" id="commission" placeholder="Enter Commission (%)">
                                    </div>
                                </div>
                               

                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="agent_id" class="col-sm-4 col-form-label">{{ __('Agent ID') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="agent_id" value="{{$agentId->agent_id}}" class="form-control p-input" id="agent_id" placeholder="Enter Agent ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">{{ __('Agent Phone') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone" value="{{$agentId->phone}}" class="form-control p-input" id="phone" placeholder="Enter Agent Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="agent_photo" class="col-sm-4 col-form-label">{{ __('Agent Photo') }} <br> @if ($agentId->agent_photo) <img src="{{ asset('uploads/agents/'.$agentId->agent_photo) }}" height="60"> @endif</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="agent_photo" id="agent_photo" class="dropify custom-file-input" data-height="80" data-max-file-size="2048kb" />
                                        <input type="hidden" name="hidden_image" value="{{ $agentId->agent_photo }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="upazila_id" class="col-sm-4 col-form-label">{{ __('Agent Area') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="js-example-basic-single form-control" id="upazila_id" name="upazila_id" style="width:100%" disabled>
                                            <option>Select Upazila</option>
                                            <option value="{{ $agentId->upazila_id }}" selected>{{ $agentId->areas['name'] }}</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label for="status" class="col-sm-4 col-form-label">{{ __('Agent Status') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="form-radio" style="display: inline-block!important;">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="status1" value="1" {{$agentId->status == 1 ? "checked" : "" }}>
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-radio" style="display: inline-block!important;">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="status2" value="0" {{$agentId->status == 0 ? "checked" : "" }}>
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
                    url:"{{url('agent/get-sub-location')}}?district_id="+districtID,
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