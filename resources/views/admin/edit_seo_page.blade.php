@extends('admin/header')
@section('title','Edit seo')
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
                                Seo Pages
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Edit Seo Page</li>
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
                                <div class="col-md-10"><h4 class="card-title">Edit Seo Page</h4></div>
                                <div class="col-md-2">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                <strong>Success!</strong> {{ session()->get('success') }}
                            </div><br>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                <strong>Warning!</strong> {{ session()->get('error') }}
                            </div><br>
                        @endif
                        <form action="{{url('TRC/11/update-seo-page')}}/{{request()->segment(4)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="category">Pages</label>
                                    <select name="page_category" class="form-control " id="paage_category" required = "true">
                                        <option value="">Select Page</option>
                                        <option value="home" @if($list->page_key == 'home') {{"selected"}} @endif >Home</option>
                                        <option value="report_stores" @if($list->page_key == 'report_stores') {{"selected"}} @endif>Report Store</option>
                                     
                                        <option value="press_release" @if($list->page_key == 'press_release') {{"selected"}} @endif>Press Release</option>
                                        <option value="about_us" @if($list->page_key == 'about_us') {{"selected"}} @endif>About Us</option>
                                        <option value="contact_us" @if($list->page_key == 'contact_us') {{"selected"}} @endif>Contact Us</option>
                                        <option value="search_page" @if($list->page_key == 'search_page') {{"selected"}} @endif>Search</option>
                                        <option value="infographics" @if($list->page_key == 'infographics') {{"selected"}} @endif>Infographics</option>
                                        
                                        <option value="careers" @if($list->page_key == 'careers') {{"selected"}} @endif>Careers</option>
                                        <option value="upcoming_reports" @if($list->page_key == 'upcoming_reports') {{"selected"}} @endif>Upcoming Report</option>
                                        <option value="terms_condition" @if($list->page_key == 'terms_condition') {{"selected"}} @endif>Terms and Condition</option>
                                        <option value="privacy_policy" @if($list->page_key == 'privacy_policy') {{"selected"}} @endif>Privacy Policy</option> 
                                        <option value="refund_policy" @if($list->page_key == 'refund_policy') {{"selected"}} @endif>Refund Policy</option>

                                         <option value="syndicated_research" @if($list->page_key == 'syndicated_research') {{"selected"}} @endif>Syndicated Research</option>
                                          <option value="customized_research" @if($list->page_key == 'customized_research') {{"selected"}} @endif>Customized Research</option>
                                           <option value="competitive_analysis" @if($list->page_key == 'competitive_analysis') {{"selected"}} @endif>Competitive Analysis</option>
                                            <option value="company_profile" @if($list->page_key == 'company_profile') {{"selected"}} @endif>Company Profile</option>
                                             <option value="biographies" @if($list->page_key == 'biographies') {{"selected"}} @endif>Biographies</option>
                                    </select>
                                </div>
                               <div class="form-group col-md-12">
                                    <label for="page">Seo Title</label>
                                        <input type="text" name="seo_title" placeholder="Seo Title" class="form-control" id="seo_title" required value="<?php echo !empty($seo_content->seo_title) ? $seo_content->seo_title : ''; ?>">
                                </div>
                              <div class="form-group col-md-12">
                                 <label for="page">Seo Description</label>
                                         <textarea name="seo_description" rows="4" cols="50" class="form-control"><?php echo !empty($seo_content->seo_description) ? $seo_content->seo_description : ''; ?></textarea>
                                        </div>
                                <div class="form-group col-md-12">
                                         <label for="page">Seo Key Words</label>
                                    <textarea name="seo_key_words" rows="4" cols="50" class="form-control"><?php echo !empty($seo_content->seo_key_words) ? $seo_content->seo_key_words : ''; ?></textarea>
                                        </div>
                                
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Update</button>
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


<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>

<script>

  CKEDITOR.replace( 'Description' , {
              // filebrowserBrowseUrl : '/browser/browse/type/all',
              filebrowserUploadUrl: '/media/upload/type/all',
              // filebrowserImageBrowseUrl : '/public/media',
              filebrowserImageUploadUrl: 'https://www.thereportcube.com/admin/Add_report/upload_image_description_ckeditor',
              filebrowserWindowWidth: 800,
              filebrowserWindowHeight: 500
          });
  CKEDITOR.replace( 'Description2' , {
              // filebrowserBrowseUrl : '/browser/browse/type/all',
              filebrowserUploadUrl: '/media/upload/type/all',
              // filebrowserImageBrowseUrl : '/public/media',
              filebrowserImageUploadUrl: 'https://www.thereportcube.com/admin/Add_report/upload_image_description_ckeditor',
              filebrowserWindowWidth: 800,
              filebrowserWindowHeight: 500
          });

  CKEDITOR.replace( 'table_of_content');

</script>

<script type="text/javascript">

CKEDITOR.replace( 'Description', {
    extraPlugins: 'imageuploader',
   filebrowserImageBrowseUrl :
    'https://www.thereportcube.com/theme/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb'
  
});
</script>


@endsection
           