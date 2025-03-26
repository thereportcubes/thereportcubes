@extends('admin/header')
@section('title','Edit Services')
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
               <!-- <div class="page-title mb-2 mb-sm-0">
                  <h1>MemberShip</h1>
                  </div> -->
               <div class="ml-auto d-flex align-items-center">
                  <nav>
                     <ol class="breadcrumb p-0 m-b-0">
                        <li class="breadcrumb-item">
                           <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                           Services
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page"> Edit Services</li>
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
         <div class="col-xl-12">
            <div class="card card-statistics">
               <div class="card-header">
                  <div class="card-heading">
                     <div class="row">
                        <div class="col-md-10">
                           <h4 class="card-title">Edit Services</h4>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  @if(session()->has('success'))
                  <div class="alert-success" style="padding:18px;border-radius: 5px;">
                     <strong>Success!</strong> {{ session()->get('success') }}
                  </div>
                  <br>
                  @endif
                  @if(session()->has('error'))
                  <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                     <strong>Warning!</strong> {{ session()->get('error') }}
                  </div>
                  <br>
                  @endif
                  <form action="{{url('TRC/11/update_services')}}/{{request()->segment(4)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="title">Title *</label>
                           <input type="text" name="service_name" value="{{$list->service_name}}" placeholder="Service Name" class="form-control" required="required"  id="title">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Service Image</label>
                           <img class = "custom_inner" src = "">
                           <input type="file" name="services_image" class="form-control">
                           <input type="hidden" name="hidden_report_image" id = "hidden_report_imag" value = "">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="description">Description</label>
                           <textarea class="form-control" class="form-control" name="services_desc">
                           {{$list->services_desc}}</textarea>
                        </div>
                        <div class="form-group col-md-12 text-center">
                           <label></label>
                           <button type="submit" name = "update_press_release" class="btn btn-warning">Update <i class="glyphicon glyphicon-send"></i></button>
                        </div>
                        <div class="form-group col-md-6 text-center">
                        </div>
                     </div>
                  </form>
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