@extends('admin/header')
@section('title','All User Wallet')
@section('content')

                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>Users</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Users</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                      
                        <div class="row">
                            
                            <div class="col-xxl-9 m-b-30">
                                <div class="card card-statistics dating-contant h-100 mb-0">
                                    <div class="card-header">
                                        <h4 class="card-title">All Users</h4>
                                    </div>
                                    <div class="card-body pt-2" style=""><div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;"><div id="mCSB_3_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0">S.No</th>
                                                        <th class="border-top-0">User Name</th>
                                                        <th class="border-top-0">Wallet(RS)</th> 
                                                        <th class="border-top-0">Date</th>
                                                        <th class="border-top-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-muted">
                                                    <tr>
                                                        <td>00001</td>
                                                        <td>
                                                            <div class="bg-img">
                                                                <img class="img-fluid mCS_img_loaded" src="{{url('public/dist/img/avtar/02.jpg')}}" alt="user">
                                                            </div>
                                                            <p>Adrian Demiandro</p>
                                                        </td>

                                                        <td>
                                                        <p>122352637</p>
                                                        </td>
                                                        
                                                        <td>17/7/2019</td>
                                                        <td>
                                                        <a class="mr-2" href="javascript:void(0)"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i></a>
                                                            <a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                                            <a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                                        </td>
                                                    </tr>
                                                   
                                                  
                                                    <tr>
                                                        <td>00002</td>
                                                        <td>
                                                            <div class="bg-img">
                                                                <img class="img-fluid mCS_img_loaded" src="{{url('public/dist/img/avtar/02.jpg')}}" alt="user">
                                                            </div>
                                                            <p>Demiandro</p>
                                                        </td>

                                                        
                                                        <td>
                                                        <p>7658543</p>
                                                        </td>
                                                        
                                                        <td>11/3/2022</td>
                                                        <td>
                                                        <a class="mr-2" href="javascript:void(0)"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i></a>
                                                            <a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                                            <a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                                        </td>
                                                    </tr>     <tr>
                                                        <td>00003</td>
                                                        <td>
                                                            <div class="bg-img">
                                                                <img class="img-fluid mCS_img_loaded" src="{{url('public/dist/img/avtar/02.jpg')}}" alt="user">
                                                            </div>
                                                            <p>Danish Pole</p>
                                                        </td>

                                                        
                                                        <td>
                                                        <p>437568790</p>
                                                        </td>
                                                        
                                                        <td>24/3/2016</td>
                                                        <td>
                                                        <a class="mr-2" href="javascript:void(0)"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i></a>
                                                            <a href="javascript:void(0)" class="mr-2"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                                            <a href="javascript:void(0)"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                                        </td>
                                                    </tr>
                                                   
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div></div><div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 166px; max-height: 266px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
    @endsection