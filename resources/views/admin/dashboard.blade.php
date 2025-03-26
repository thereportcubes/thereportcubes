@extends('admin/header')
@section('title','R Cube Admin || Dashboard')

@section('content')

<div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>R Cube Admin Dashboard</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Dashboard
                            </li>
                            
                        </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
            </div>
            <!-- end row -->
            <!-- start Crypto Currency contant -->
            
            <div class="row">
                <div class="col-xs-4 col-xxl-3 m-b-30">
                    <div class="card card-statistics h-100 m-b-0 bg-pink">
                        <div class="card-body">
                            <h2 class="text-white mb-0">1921</h2>
                            <p class="text-white">Visitors</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-xxl-3 m-b-30">
                    <div class="card card-statistics h-100 m-b-0 bg-primary">
                        <div class="card-body">
                            <h2 class="text-white mb-0">82</h2>
                            <p class="text-white">Orders </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-xxl-3 m-b-30">
                    <div class="card card-statistics h-100 m-b-0 bg-orange">
                        <div class="card-body">
                            <h2 class="text-white mb-0">61</h2>
                            <p class="text-white">Users </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-xxl-3 m-b-30">
                    <div class="card card-statistics h-100 m-b-0 bg-info">
                        <div class="card-body">
                            <h2 class="text-white mb-0">1421</h2>
                            <p class="text-white">Total Reports</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-xxl-3 m-b-30">
                    <div class="card card-statistics h-100 m-b-0 bg-orange">
                        <div class="card-body">
                            <h2 class="text-white mb-0">1098</h2>
                            <p class="text-white">Total Press Release </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-xxl-3 m-b-30">
                    <div class="card card-statistics h-100 m-b-0 bg-info">
                        <div class="card-body">
                            <h2 class="text-white mb-0">4</h2>
                            <p class="text-white">Services</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end container-fluid --> 
    </div>
@endsection
