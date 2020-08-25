@extends('master')

@section('content')
    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Add Foreign Office') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('office.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">{{ __('Foreign Office Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" minlength="5" name="name" class="form-control p-input" id="name" placeholder="Enter Agent Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email2" class="col-sm-4 col-form-label">{{ __('Email 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email2" class="form-control p-input" id="email2" placeholder="Enter Email Address 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone2" class="col-sm-4 col-form-label">{{ __('Phone 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone2" class="form-control p-input" id="phone2" placeholder="Enter Agent Phone 2">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="country_id" class="col-sm-4 col-form-label">{{ __('Country') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="country_id" name="country_id" style="width:100%">
                                            <option>Select Country</option>
                                            @foreach ($country_id as $cty_id)
                                                <option value="{{$cty_id->id}}">{{$cty_id->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">{{ __('Email') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control p-input" id="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">{{ __('Phone') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone" class="form-control p-input" id="phone" placeholder="Enter Agent Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">{{ __('Address') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="address" class="form-control p-input" id="address" placeholder="Enter Address">
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