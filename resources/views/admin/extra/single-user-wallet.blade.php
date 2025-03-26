@extends('admin/header')
@section('title','Single User Wallet')
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
                                 <h1>User Wallet</h1>
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
                                       <li class="breadcrumb-item active text-primary" aria-current="page">User Wallet</li>
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
                                <div class="row">
                                <div class="col-md-6">
                                <div class="page-account-profil card h-100">
                                <div class="card-header">
                                                    <h4 class="card-title">User Details</h4>
                                                </div>
                                                    <div class="profile-img text-center rounded-circle">
                                                        <div class="pt-4">
                                                            <div class="bg-img m-auto">
                                                                <img src="{{url('public/dist/img/avtar/02.jpg')}}" class="img-fluid" alt="users-avatar">
                                                            </div>
                                                            <div class="profile pt-4">
                                                                <h4 class="mb-1">Alice Williams</h4>
                                                                <p>Enthusiast</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="py-5 profile-counter">
                                                        <ul class="nav justify-content-center text-center">
                                                            <li class="nav-item border-right px-3">
                                                                <div>
                                                                    <h4 class="mb-0">90</h4>
                                                                    <p>Income</p>
                                                                </div>
                                                            </li>

                                                            <li class="nav-item border-right px-3">
                                                                <div>
                                                                    <h4 class="mb-0">1.5K</h4>
                                                                    <p>Expenses</p>
                                                                </div>
                                                            </li>

                                                            <li class="nav-item px-3">
                                                                <div>
                                                                    <h4 class="mb-0">4.4K</h4>
                                                                    <p>Transfar</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    
                                                </div>
                                </div>
                                    <div class="col-md-6">
                                                        <div class="card card-statistics dating-contant h-100 mb-0">
                                                <div class="card-header">
                                                    <h4 class="card-title">User Wallet</h4>
                                                </div>
                                                <div class="cards">
                                                    <div class="card-body">
                                                        <div class="border border-light p-3 rounded mb-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="font-18 mb-1">Income</p>
                                                                <h3 class="text-primary my-0">$2,76,548</h3>
                                                            </div>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title bg-primary rounded-circle h3 my-0">
                                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="border border-light p-3 rounded mb-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="font-18 mb-1">Expenses</p>
                                                                <h3 class="text-danger my-0">$50,216</h3>
                                                            </div>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title bg-danger rounded-circle h3 my-0">
                                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="border border-light p-3 rounded">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <p class="font-18 mb-1">Transfar</p>
                                                                <h3 class="text-success my-0">$98,100</h3>
                                                            </div>
                                                            <div class="avatar-sm">
                                                                <span class="avatar-title bg-success rounded-circle h3 my-0">
                                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    

                                </div>
                        </div>



                        <div class="col-xxl-9 m-b-30">
                           <div class="card">
                              <div class="card-header d-flex justify-content-between align-items-center">
                                 <h4 class="header-title mb-0">Transaction List {User Name}</h4>
                              </div>
                              <div class="card-body pt-0">
                                 <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                       <thead>
                                          <tr>
                                             <th scope="col">Payment Mode</th>
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
                                                      <img class="rounded-circle" src="{{url('assets/images/users/avatar-1.jpg')}}" alt="Avtar image" width="33">
                                                      </div> -->
                                                   <div class="flex-grow-1 ms-2">
                                                      Dante
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
                                          <!-- end tr -->
                                          <tr>
                                             <td>
                                                <div class="d-flex align-items-center">
                                                   <!-- <div class="flex-shrink-0">
                                                      <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="Avtar image" width="33">
                                                      </div> -->
                                                   <div class="flex-grow-1 ms-2">
                                                      Booker
                                                   </div>
                                                </div>
                                             </td>
                                             <td><i class="uil uil-calender me-1"></i>Feb 11, 2022</td>
                                             <td>
                                                <span class="badge bg-success-lighten text-success">Incoming</span>
                                             </td>
                                             <td>
                                                <span class="text-success fw-semibold">+ $2,000.60</span>
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
                                                      Azaire
                                                   </div>
                                                </div>
                                             </td>
                                             <td><i class="uil uil-calender me-1"></i>Dec 01, 2010</td>
                                             <td>
                                                <span class="badge bg-success-lighten text-success">Incoming</span>
                                             </td>
                                             <td>
                                                <span class="text-success fw-semibold">+ $24,586.60</span>
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
                                                      Alvis
                                                   </div>
                                                </div>
                                             </td>
                                             <td><i class="uil uil-calender me-1"></i>Nov 01, 2021</td>
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
                                                      kelvin
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
                                                      bood Baldwin
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