@extends('admin/header')
@section('title','Add Press Release')
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
                           Banner
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page"> Add New Banner</li>
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
                           <h4 class="card-title">Add New Banner</h4>
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
                  <form action="{{route('save_banner')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <!--<div class="form-group">-->
                        <!--    <label for="page">Banner Title</label>-->
                        <input type="hidden" name="title" value = "Banner_Title" class="form-control">
                        <!--</div>-->
                        <div class="form-group col-md-12">
                           <label for="page">Banner Order</label>
                           <input type="number" name="banner_order" id = "banner_order" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="title">Heading*</label>
                           <input type="text" name="banner_title" value="" placeholder="Heading" class="form-control"  id="title">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="title">Alt Tag*</label>
                           <input type="text" name="alt_tag" value="" placeholder="Alt Tag" class="form-control"   id="title">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="description">Description</label>
                           <textarea name="Description"rows = "4" cols="50" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Image</label>
                           <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="banner_mobile_image">Mobile Image</label>
                           <input type="file" name="banner_mobile_image" id="banner_mobile_image" class="form-control">
                        </div>
                        <div class="form-group text-center">
                           <label></label>
                           <button type="submit" name = "save_about_us" id = "save_banner" class="btn btn-warning">Save <i class="glyphicon glyphicon-send"></i></button>
                        </div>
                        <div class="form-group text-center">
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