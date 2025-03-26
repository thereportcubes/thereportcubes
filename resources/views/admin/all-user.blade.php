@extends('admin/header')
@section('title','All Users')
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
                                        <h1>All Users</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                   User
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">All Users</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="datatable" class="display compact table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>DOB</th>
                                                        <th>Gender</th>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($list as $key => $data)
                                                <tr>    
                                                    <th class="p-1">{{++$key}}</th>
                                                    <th>{{$data->name}}</th>
                                                    <th>{{$data->email}}</th>
                                                    <th>{{$data->phone}}</th>
                                                    <th>{{$data->dob}}</th>
                                                    <th>{{$data->gender}}</th>
                                                    <th>{{$data->address}}</th>
                                                    <th><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit-user')}}/{{$data->id}}" role="button">Edit</a>
                                                    &nbsp;
                                                    <a class="btn btn-sm btn-info shadow-none" href="{{url('TRC/11/user-view')}}/{{$data->id}}" role="button">View</a></th>
                                                    			
                                                </tr>
                                                
                                                @endforeach
                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Office</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th>Salary</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
@endsection