@extends('admin/header')
@section('title','All Transactions')
@section('content')

      <style>
        .avatar-sm span {
    width: 40px;
    height: 40px;
    display: inline-block;
    text-align: center;
    line-height: 40px;
    color: #fff;
    font-size: 20px;
}
      </style>

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
                                        <h1>Transaction List</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Transaction List</li>
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
                            
                            


                        <div class="col-xxl-9 m-b-30">
                        <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="header-title mb-0">Transaction List</h4>
                                      
                                    </div>

                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col" class="text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <div class="flex-shrink-0">
                                                                    <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="Avtar image" width="33">
                                                                </div> -->
                                                                <div class="flex-grow-1 ms-2">
                                                                    Mallinga
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="uil uil-calender me-1"></i>Jan 01, 2022</td>
                                                        <td>
                                                            <span class="badge bg-success-lighten text-success">Incoming</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success fw-semibold">+ $2,586.60</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="javascript:void(0);" class="font-18 text-info mr-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" class="font-18 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr> <!-- end tr -->
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <div class="flex-shrink-0">
                                                                    <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="Avtar image" width="33">
                                                                </div> -->
                                                                <div class="flex-grow-1 ms-2">
                                                                    John Doe
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="uil uil-calender me-1"></i>Feb 05, 2022</td>
                                                        <td>
                                                            <span class="badge bg-success-lighten text-success">Incoming</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success fw-semibold">+ $2,00.60</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="javascript:void(0);" class="font-18 text-info mr-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" class="font-18 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <div class="flex-shrink-0">
                                                                    <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="Avtar image" width="33">
                                                                </div> -->
                                                                <div class="flex-grow-1 ms-2">
                                                                    Braden Macculum
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="uil uil-calender me-1"></i>Mar 01, 2012</td>
                                                        <td>
                                                            <span class="badge bg-success-lighten text-success">Incoming</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success fw-semibold">+ $6,586.60</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="javascript:void(0);" class="font-18 text-info mr-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" class="font-18 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <div class="flex-shrink-0">
                                                                    <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="Avtar image" width="33">
                                                                </div> -->
                                                                <div class="flex-grow-1 ms-2">
                                                                    Adam Gilchrist
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="uil uil-calender me-1"></i>Apr 01, 2021</td>
                                                        <td>
                                                            <span class="badge bg-success-lighten text-success">Incoming</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success fw-semibold">+ $9,586.60</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="javascript:void(0);" class="font-18 text-info mr-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" class="font-18 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <div class="flex-shrink-0">
                                                                    <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="Avtar image" width="33">
                                                                </div> -->
                                                                <div class="flex-grow-1 ms-2">
                                                                    Adam Baldwin
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="uil uil-calender me-1"></i>Jan 01, 2022</td>
                                                        <td>
                                                            <span class="badge bg-success-lighten text-success">Incoming</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success fw-semibold">+ $2,586.60</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="javascript:void(0);" class="font-18 text-info mr-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" class="font-18 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <div class="flex-shrink-0">
                                                                    <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="Avtar image" width="33">
                                                                </div> -->
                                                                <div class="flex-grow-1 ms-2">
                                                                    Adam Baldwin
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><i class="uil uil-calender me-1"></i>Jan 01, 2022</td>
                                                        <td>
                                                            <span class="badge bg-success-lighten text-success">Incoming</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-success fw-semibold">+ $2,586.60</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="javascript:void(0);" class="font-18 text-info mr-2" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0);" class="font-18 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
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