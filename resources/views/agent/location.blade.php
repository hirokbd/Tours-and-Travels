@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-5 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">{{ __('Add Location') }}</h2>

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

                          <form role="form" class="forms-sample" action="{{route('location.store')}}" method="POST">
                              @csrf
                              <div class="form-group row">
                                  <label for="name" class="col-sm-4 col-form-label">{{ __('Name') }}</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control p-input" id="name" placeholder="Enter Name">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="parent_id" class="col-sm-4 col-form-label">{{ __('District Name') }}</label>
                                  <div class="col-sm-8">
                                      <select class="js-example-basic-single form-control" name="parent_id" style="width:100%">
                                          <option>Select District</option>
                                          @foreach($location_id as $loc_id)
                                              <option value="{{$loc_id->id}}">{{$loc_id->name}}</option>
                                          @endforeach
                                      </select>
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
                  <h2 class="card-title">{{ __('All Location') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>District</th>
                                    <th>Upazila</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($location as $loc)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $loc->name }}</td>
                                    <td>
                                        @foreach ($sub_location as $subloc)

                                            @if ( $subloc->parent_id == $loc->id )
                                                {{ $subloc->name }} <a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('subloc.delete',[$subloc->id])}}"><i class="mdi mdi-close-circle-outline"></i></a>,

                                            @endif

                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn-md btn-outline-danger"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('location.delete',[$loc->id])}}"><i class="mdi mdi-delete"></i></a></button>
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