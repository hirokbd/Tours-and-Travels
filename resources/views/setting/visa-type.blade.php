@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-5 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">{{ __('Add Visa Type') }}</h2>

                          @if ($errors->any())
                              <div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  @if ($errors->count() == 1)
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

                          <form role="form" class="forms-sample" action="{{route('visa-type.store')}}" method="POST">
                              @csrf
                              <div class="form-group row">
                                  <label for="name" class="col-sm-4 col-form-label">{{ __('Name') }} <span class="req-star">*</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control p-input" id="name" placeholder="Enter Name *" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="description" class="col-sm-4 col-form-label">{{ __('Description') }}</label>
                                  <div class="col-sm-8">
                                      <textarea name="description" id="description" class="form-control p-input" rows="3" placeholder="Enter Description"></textarea>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-success mt-4">{{ __('Submit') }}</button>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="col-12 col-lg-7 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Visa Type') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($visa_type as $visa)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $visa->name }}</td>
                                    <td>{{ $visa->description }}</td>
                                    <td>
                                        <button class="btn-md btn-outline-danger"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('visa-type.delete',[$visa->id])}}"><i class="mdi mdi-delete"></i></a></button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              </div>


          </div>
@endsection