@extends('master')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Users - {{ $user }}</h2>
                </div>
                <div class="dashboard-chart-card-container">
                    <div id="dashboard-card-chart-1" class="card-float-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Agents - {{ $agent }}</h2>
                </div>
                <div class="dashboard-chart-card-container">
                    <div id="dashboard-card-chart-2" class="card-float-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Passengers - {{ $client }}</h2>
                </div>
                <div class="dashboard-chart-card-container">
                    <div id="dashboard-card-chart-3" class="card-float-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Invoices - {{ $invoice }}</h2>
                </div>
                <div class="dashboard-chart-card-container">
                    <div id="dashboard-card-chart-4" class="card-float-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 revenue-card grid-margin d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="card-title">Activities</h2>
                    <ul class="ct-legend mt-5"></ul>
                    <div id="dashboard-chartist-simple"></div>
                    <div class="row mx-1 mt-5 d-none d-sm-flex">
                        <div class="col-12">
                            <hr class="mt-1">
                        </div>
                        <div class="col-12 col-sm-4 revenue-details text-center text-sm-left">
                            <p class="head text-muted">Total Income</p>
                            <p class="count">{{ number_format($gtotal, 2) }}</p>
                        </div>
                        <div class="col-12 col-sm-4 d-flex justifiy-content-center flex-column text-center revenue-details">
                            <p class="head text-muted">Total Expenses</p>
                            <p class="count">{{ number_format($etotal, 2) }}</p>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right revenue-details">
                            <p class="head text-muted">Balance</p>
                            <p class="count">{{ number_format($gtotal - $etotal, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--    <div class="col-lg-6 stock-price grid-margin d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h2 class="card-title">Total Income</h2>
                    <div class="amount-column-wrapper wrapper">
                        <p class="total-performance">৳ {{ number_format($gtotal - $etotal, 2) }}</p>
                        <div class="row">
                            <div class="performace-tile col-6">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-arrow-up-thick text-success"></i>
                                    <p class="progess mb-0">58.8%</p>
                                </div>
                                <p class="description"></p>
                            </div>
                            <div class="performace-tile col-6">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-arrow-up-thick text-success"></i>
                                    <p class="progess mb-0">+32</p>
                                </div>
                                <p class="description"></p>
                            </div>
                            <div class="col-12"><hr></div>
                            <div class="performace-tile col-6">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-arrow-down-thick text-danger"></i>
                                    <p class="progess mb-0">18.2%</p>
                                </div>
                                <p class="description"></p>
                            </div>
                            <div class="performace-tile col-6">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-arrow-up-thick text-success"></i>
                                    <p class="progess mb-0">+89</p>
                                </div>
                                <p class="description"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex flex-row align-items-center mt-4">
                                <p class="mb-0 mr-3">Sources: </p>
                                <a href="#" class="btn btn-rounded bg-google btn-social mr-2"><i class="mdi mdi-google"></i></a>
                                <a href="#" class="btn btn-rounded bg-facebook btn-social mr-2"><i class="mdi mdi-facebook"></i></a>
                                <a href="#" class="btn btn-rounded bg-twitter btn-social"><i class="mdi mdi-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>


@endsection