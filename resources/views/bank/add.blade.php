@extends('master')

@section('content')
    <div class="row">

        <div class="col-12 col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ __('Add Bank') }}</h2>

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

                    <form role="form" class="forms-sample" action="{{route('bank.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">{{ __('Bank Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" minlength="5" name="name" class="form-control p-input" id="name" placeholder="Enter Bank Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="account_number" class="col-sm-4 col-form-label">{{ __('Account Number') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="account_number" class="form-control p-input" id="account_number" placeholder="Enter Account Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sing_photo" class="col-sm-4 col-form-label">{{ __('Signature') }}</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="sing_photo" id="sing_photo" class="dropify custom-file-input" data-height="80" data-max-file-size="2048kb" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group row">
                                    <label for="account_name" class="col-sm-4 col-form-label">{{ __('Account Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="account_name" class="form-control p-input" id="account_name" placeholder="Enter Account Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="branch" class="col-sm-4 col-form-label">{{ __('Branch Name') }} <span class="req-star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="branch" class="form-control p-input" id="branch" placeholder="Enter Branch Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="op_balance" class="col-sm-4 col-form-label">{{ __('Opening Balance') }}</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="op_balance" class="form-control p-input" id="op_balance" placeholder="Enter Opening Balance">
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