@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-5 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title">{{ __('Received Remittance') }}</h2>

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

                          <form role="form" class="forms-sample" action="{{route('remittance.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                  <label for="office_id" class="col-sm-4 col-form-label">{{ __('Foreign Office Name') }} <span class="req-star">*</span></label>
                                  <div class="col-sm-8">
                                    <select name="office_id" id="office_id" class="form-control p-input">
                                      <option>Select Foreign Office</option>
                                      @foreach ($for_office as $force)
                                        <option value="{{$force->id}}">{{$force->name}}</option>
                                      @endforeach
                                      
                                    </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="rem_amount" class="col-sm-4 col-form-label">{{ __('Remittance Amount') }} <span class="req-star">*</span></label>
                                  <div class="col-sm-8">
                                      <input type="number" name="rem_amount" id="rem_amount" class="form-control p-input" placeholder="Enter Received Amount" required />
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="note" class="col-sm-4 col-form-label">{{ __('Note') }}</label>
                                  <div class="col-sm-8">
                                      <textarea name="note" id="note" class="form-control p-input" rows="3" placeholder="Enter Note"></textarea>
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
                  <h2 class="card-title">{{ __('All Remittance') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Foreign Office Name</th>
                                    <th>Country</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($remittance as $rem)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $rem->foffice->name }}</td>
                                    <td>{{ $rem->foffice->country->name }}</td>
                                    <td>{{ number_format($rem->rem_amount, 2) }}</td>
                                    <td>{{ $rem->note }}</td>
                                    <td>
                                        <button class="btn-md btn-outline-danger"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('remittance.delete',[$rem->id])}}"><i class="mdi mdi-delete"></i></a></button>
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