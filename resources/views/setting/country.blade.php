@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-5 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">{{ __('Add Country') }}</h2>

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

                          <form role="form" class="forms-sample" action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">
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
                              <div class="form-group row">
                                  <label for="flag" class="col-sm-4 col-form-label">{{ __('Country Flag') }} <span class="req-star">*</span></label>
                                  <div class="col-sm-8">
                                      <input type="file" name="flag" id="flag" class="dropify custom-file-input" data-height="80" data-max-file-size="2048kb" required/>
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
                  <h2 class="card-title">{{ __('All Country') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Flag</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($country_id as $cnd)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $cnd->name }}</td>
                                    <td>@if ($cnd->flag)<img src='{{ asset('uploads/flag/'.$cnd->flag) }}' width="40">@endif</td>
                                    <td>{{ $cnd->description }}</td>
                                    <td>
                                        <button class="btn-md btn-outline-danger"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('country.delete',[$cnd->id])}}"><i class="mdi mdi-delete"></i></a></button>
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