@extends('master')

@section('content')
          <div class="row">

              <div class="col-12 col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">{{ __('All Agents') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table table-striped" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Agent ID</th>
                                    <th>Photo</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Area</th>
                                    <th>Commission</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($agent_id as $aid)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $aid->name }}</td>
                                    <td>{{ $aid->agent_id }}</td>
                                    <td>{{ $aid->phone }}</td>
                                    <td>{{ $aid->email }}</td>
                                    <td>@if ($aid->agent_photo)<img src="{{ asset('uploads/agents/'.$aid->agent_photo) }}" width="80">@endif</td>

                                    <td>@if ($aid->children['name']) {{ $aid->children['name'] }}, @endif {{ $aid->parent['name'] }}</td>
                                    <td>{{ $aid->commission }}%</td>
                                    <td>@if ($aid->status == 1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif</td>
                                    <td>
                                        <button class="btn-md btn-outline-warning" title="Edit"><a href="{{route('agent.edit',[$aid->id])}}"><i class="mdi mdi-pencil"></i></a></button>
                                        <button class="btn-md btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('agent.delete',[$aid->id])}}"><i class="mdi mdi-delete"></i></a></button>
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