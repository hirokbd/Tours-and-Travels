@extends('master')

@section('content')
    @foreach($companyinfo as $cinfo)
    <div class="row user-profile">
        <div class="col-lg-12 side-left">
            <div class="card mb-12">
                <div class="card-body avatar">
                    @if($cinfo->logo) <img src="{{ asset('uploads/company/'.$cinfo->logo) }}" alt="Company Logo" width="47"> @else
                    <img src="http://via.placeholder.com/47x47" alt="Company Logo">@endif
                    <p class="name">{{ $cinfo->name }}</p>
                    @if($cinfo->tagline)  <p class="designation">{{$cinfo->tagline}}</p>@endif
                    <a class="email" href="#">{{ $cinfo->email }}</a>
                    <a class="number" href="#">{{ $cinfo->phone }}</a>
                </div>
            </div>
            <div class="card mb-12">
                <div class="card-body overview">
                    @if($cinfo->description)
                    <div class="description">
                        <h2 class="card-title mt-4 mb-3">Description</h2>
                        <p class="text-justify">{{ $cinfo->description }}</p>
                    </div>
                    @endif
                    @if($cinfo->address)
                    <div class="wrapper about-user">
                        <h2 class="card-title mt-4 mb-3">Location</h2>
                        <p>{{ $cinfo->address }}</p>
                    </div>
                    @endif
                    @if($cinfo->email2)
                    <div class="info-links">
                        <p>Email 2 : {{ $cinfo->email2 }}</p>

                    </div>
                    @endif
                    @if($cinfo->phone2)
                    <div class="info-links">
                        <p>Phone 2 : {{ $cinfo->phone2 }}</p>
                    </div>
                    @endif
                        @if($cinfo->start_date)
                            <div class="info-links">
                                <p>Company Started : {{ date('d M Y', strtotime($cinfo->start_date)) }}</p>
                            </div>
                        @endif
                </div>
                <a class="nav-link" id="companyEdit" href="{{route('setting.edit',[$cinfo->id])}}">Company Setting Edit</a>
            </div>
        </div>


    </div>
    @endforeach
@endsection