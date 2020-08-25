@extends('master')

@section('content')
    <div class="row user-profile">
        <div class="col-lg-4 side-left">
            <div class="card mb-4">
                <div class="card-body avatar">
                    <h2 class="card-title">Info</h2>
                    @if($clientId->client_photo) <img src="{{ asset('uploads/clients/'.$clientId->client_photo) }}" alt="Client Photo" width="47"> @else
                    <img src="http://via.placeholder.com/47x47" alt="Client Photo">@endif
                    <p class="name">{{ $clientId->name }}</p>
                    <p class="designation">Agent:  {{$clientId->agent->name}}</p>
                    <a class="email" href="#">{{ $clientId->email }}</a>
                    <a class="number" href="#">{{ $clientId->phone }}</a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body overview">
                    <ul class="achivements">
                        <li><p>34</p><p>Projects</p></li>
                        <li><p>23</p><p>Task</p></li>
                        <li><p>29</p><p>Completed</p></li>
                    </ul>
                    @if($clientId->address)
                    <div class="wrapper about-user">
                        <h2 class="card-title mt-4 mb-3">Location</h2>
                        <p>{{ $clientId->address }}</p>
                    </div>
                    @endif
                    <div class="info-links">
                        @if($clientId->phone2)<p>Phone 2 : {{ $clientId->phone2 }}</p>@endif

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 side-right">
            <div class="card">
                <div class="card-body">
                    <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                        <h2 class="card-title">Details</h2>
                        <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Passport Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Emergency Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="security-tab" href="{{route('passenger.edit',[$clientId->id])}}">Passenger Edit</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wrapper">
                        <hr>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                <h5>Passport No: {{ $clientId->passport_no }}</h5>
                                <h5>Birth Date: {{ date('d M Y', strtotime($clientId->birth_date)) }}</h5>
                                <h5>Passport No: {{ date('d M Y', strtotime($clientId->passport_issue)) }}</h5>
                                <h5>Passport No: {{ date('d M Y', strtotime($clientId->passport_expired)) }}</h5>
                            </div><!-- tab content ends -->
                            <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                                <h5>Contact Name: {{ $clientId->em_name }}</h5>
                                <h5>Email: {{ $clientId->em_email }}</h5>
                                <h5>Phone: {{ $clientId->em_phone }}</h5>
                                @if($clientId->em_insurance)
                                <h5>Insurance Company: {{ $clientId->em_insurance }}</h5>
                                <h5>Insurance Policy No: {{ $clientId->em_insurance_no }}</h5>
                                <h5>Company Phone: {{ $clientId->em_company_phone }}</h5>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection