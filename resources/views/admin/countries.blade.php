@extends('admin/header')
@section('title','Countries')
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
                        Report Upload
                     </li>
                     <li class="breadcrumb-item active text-primary" aria-current="page"> Add New Country</li>
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
                     <div class="col-md-9">
                        <h4 class="card-title">Add New Country</h4>
                     </div>
                     <div class="col-md-3 text-right"><a href="{{route('country_list')}}"><button type="button" class="btn btn-info text-right">All Countries</button></a></div>
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
               <form action=" {{route('TRC/11/save_country')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label>Select Region</label>                  
                        <select name = "region_id" class="form-control" required>
                           <option value = "">Select Region</option>
                              @foreach($region as $cat)
                              <option  value="{{$cat->id}}">{{$cat->region_name}}</option>
                              @endforeach
                        </select>
                     </div>
                     <div class="form-group col-md-6">
                        <label>Country Name</label>
                        <input type="text" class="form-control" id="country_name" name = "country_name" required>
                     </div>
                     <div class="form-group col-md-12">
                        <label>Country Url</label>
                        <input type="text" class="form-control" id="country_url" name = "country_url" required>
                     </div>
                     <div class="form-group col-md-12">
                           <label for="page">Seo Title</label>
                           <input type="text" name="seo_title"  placeholder=" seo title" class="form-control" id="seo_title">
                           <input type="hidden" name="page_type" class="form-control" id="page_type" value = "category">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Seo Description</label>
                           <textarea name="seo_description" rows = "4" cols="50" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Seo Key Words</label>
                           <textarea name="seo_key_words" rows = "4" cols="50" class="form-control"></textarea>
                        </div>
                     
                     <div class="form-group text-center">
                        <label></label>
                        <button type="submit" name = "add" id = "add" class="btn btn-warning">Save <i class="glyphicon glyphicon-send"></i></button>
                     </div>
                     <div class="form-group text-center">
                     </div>
                     <div class="form-group text-center">
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