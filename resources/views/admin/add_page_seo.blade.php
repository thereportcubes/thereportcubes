@extends('admin/header')
@section('title','Add Seo Pages')
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
                           Seo Page
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page"> Add Page Seo content</li>
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
                           <h4 class="card-title">Add Page Seo content</h4>
                        </div>
                        <div class="col-md-2"><a href=" {{route('TRC/11/seo_page_list')}}"><button type="button" class="btn btn-info ">All Seo Pages</button></a></div>
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
                  <form action=" {{route('TRC/11/save_seo_pages')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">                        
                        <div class="form-group col-md-6">
                           <label for="category">Pages</label>
                           <select name="page_category" class="form-control " id="paage_category" required = "true">
                              <option value="">Select Page</option>
                              <option value="home">Home</option>
                              <option value="report_stores">Report Store</option>                             
                            
                              <option value="press_release">Press Release</option>
                              <option value="about_us">About Us</option>
                              <option value="contact_us">Contact Us</option>
                              <option value="search_page">Search</option>
                              <option value="infographics">Infographics</option>
                        
                              <option value="careers">Careers</option>
                              <option value="upcoming_reports">Upcoming Report</option>
                              <option value="terms_condition">Terms and Condition</option>
                              <option value="privacy_policy">Privacy Policy</option>
                               <option value="refund_policy">Refund Policy</option>
                               <option value="syndicated_research">Syndicated Research</option>
                              <option value="customized_research">Customized Research</option>
                              <option value="competitive_analysis">Competitive Analysis</option>
                              <option value="company_profile">Company Profile</option>
                              <option value="biographies">Biographies</option>
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="page">Seo Title</label>
                           <input type="text" name="seo_title"  placeholder="Seo Title" class="form-control" id="seo_title" required>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Seo Description</label>
                           <textarea name="seo_description" rows = "4" cols="50"  class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Seo Key Words</label>
                           <textarea name="seo_key_words" rows = "4" cols="50"  class="form-control"></textarea>
                        </div>
                        <div class="form-group text-center">
                           <label></label>
                           <button type="submit" class="btn btn-info" name = "add_seo_form" id="add_seo_form">Save <i class="glyphicon glyphicon-send"></i></button>
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