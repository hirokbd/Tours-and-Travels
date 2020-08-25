@extends('master')

@section('content')
    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Edit Company Settings') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('setting.update',[$company_info->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">{{ __('Company Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" minlength="5" value="{{$company_info->name}}" name="name" class="form-control p-input" id="name" placeholder="Enter Company Name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">{{ __('Company Email') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" value="{{$company_info->email}}" class="form-control p-input" id="email" placeholder="Enter Company Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-4 col-form-label">{{ __('Company Phone') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone" value="{{$company_info->phone}}" class="form-control p-input" id="phone" placeholder="Enter Company Phone" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">{{ __('Company Address') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="address" value="{{$company_info->address}}" class="form-control p-input" id="address" placeholder="Enter Company Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="website" class="col-sm-4 col-form-label">{{ __('Company Website') }}</label>
                                    <div class="col-sm-8">
                                        <input type="url" name="website" value="{{$company_info->website}}" class="form-control p-input" id="website" placeholder="Enter Company Website">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="start_date" class="col-sm-4 col-form-label">{{ __('Company Start Date') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="start_date" value="{{$company_info->start_date}}" class="form-control p-input datepicker" id="start_date" placeholder="Enter Company Start Date">
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="tagline" class="col-sm-4 col-form-label">{{ __('Company Tag Line') }}</label>
                                    <div class="col-sm-8">
                                        <input type="text" minlength="5" value="{{$company_info->tagline}}" name="tagline" class="form-control p-input" id="name" placeholder="Enter Company Tag Line">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email2" class="col-sm-4 col-form-label">{{ __('Company Email 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email2" value="{{$company_info->email2}}" class="form-control p-input" id="email2" placeholder="Enter Company Email Address 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone2" class="col-sm-4 col-form-label">{{ __('Company Phone 2') }}</label>
                                    <div class="col-sm-8">
                                        <input type="tel" name="phone2" value="{{$company_info->phone2}}" class="form-control p-input" id="phone2" placeholder="Enter Company Phone 2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="logo" class="col-sm-4 col-form-label">{{ __('Company Logo') }} <br> @if ($company_info->logo) <img src="{{ asset('uploads/company/'.$company_info->logo) }}" height="60"> @endif</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="logo" id="logo" class="dropify custom-file-input" data-height="80" data-max-file-size="2048kb" />
                                        <input type="hidden" name="hidden_image" value="{{ $company_info->logo }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-4 col-form-label">{{ __('Company Description') }}</label>
                                    <div class="col-sm-8">
                                        <textarea name="description" rows="3" class="form-control p-input" id="description" placeholder="Enter Company Description">{{ $company_info->description }}</textarea>
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