@extends('master')

@section('content')
    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Edit Foreign Office') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('office.update',[$for_office->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">{{ __('Foreign Office Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" minlength="5" value="{{$for_office->name}}" name="name" class="form-control p-input" id="name" placeholder="Enter Agent Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email2" class="col-sm-4 col-form-label">{{ __('Email 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="email" value="{{$for_office->email2}}" name="email2" class="form-control p-input" id="email2" placeholder="Enter Email Address 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone2" class="col-sm-4 col-form-label">{{ __('Phone 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" value="{{$for_office->phone2}}" name="phone2" class="form-control p-input" id="phone2" placeholder="Enter Agent Phone 2">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="country_id" class="col-sm-4 col-form-label">{{ __('Country') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="country_id" name="country_id" style="width:100%">
                                            <option>Select Country</option>
                                            @foreach ($country_id as $cty_id)
                                                <option value="{{$cty_id->id}}" {{$for_office->country_id == $cty_id->id ? "selected" : "" }}>{{$cty_id->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">{{ __('Email') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" value="{{$for_office->email}}" name="email" class="form-control p-input" id="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">{{ __('Phone') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel" value="{{$for_office->phone}}" name="phone" class="form-control p-input" id="phone" placeholder="Enter Agent Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">{{ __('Address') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$for_office->address}}" name="address" class="form-control p-input" id="address" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-4 col-form-label">{{ __('Status') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="form-radio" style="display: inline-block!important;">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="status1" value="1" {{$for_office->status == 1 ? "checked" : "" }}>
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-radio" style="display: inline-block!important;">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" id="status2" value="0" {{$for_office->status == 0 ? "checked" : "" }}>
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
    
@endsection