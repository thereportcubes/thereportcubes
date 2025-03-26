@extends('user/header')
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
                           <a href="{{url('user/dashboard')}}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                           Press Release
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page"> Add New Press Release</li>
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
                           <h4 class="card-title">Add New Press Release</h4>
                        </div>
                        <div class="col-md-3 text-right"><a href="{{route('user.press_release_list')}}"><button type="button" class="btn btn-info text-right">All Press Release</button></a></div>
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
                  <form action="{{route('user/save_press_release')}}" method="post" id="myForm" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="title">Heading *</label>
                           <input type="text" name="heading" value="" placeholder="Title" class="form-control" required="required"  id="title">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="title">Post Date *</label>
                           <input type="date" name="post_date" value="" class="form-control" required="required"  id="post_date">
                        </div>
                        
                        <div class="form-group col-md-12">
                           <label for="description">Description</label>
                           <textarea class="form-control ckeditor" rows = "4" cols="50"  name="description"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="description2">Description2</label>
                           <textarea  class="form-control ckeditor" rows = "4" cols="50"  name="description2"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="title">Press Release Url *</label>
                           <input type="text" name="press_release_url" value="" placeholder="press release url" class="form-control" id="press_release_url">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="title"> Report Url *</label>
                           <input type="text" name="report_url" value="" placeholder="report-url" class="form-control" required="required"  id="title">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Seo Title</label>
                           <input type="text" name="seo_title"  placeholder=" seo title" class="form-control" id="seo_title" value = "">
                           <input type="hidden" name="page_type" class="form-control" id="page_type" value = "press_release">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="page">Seo Description</label>
                           <textarea class="form-control" name="seo_description" placeholder=" seo descriptions" rows = "4" cols="50"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="page">Seo Key Words</label>
                           <textarea class="form-control" name="seo_keyword" placeholder=" seo keywords" rows = "4" cols="50"></textarea>
                        </div>
                        <div class="form-group col-md-12 text-center">
                           <label></label>
                           <button type="submit" name = "update_press_release" class="btn btn-warning">Submit <i class="glyphicon glyphicon-send"></i></button>
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

<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>

<script>

  CKEDITOR.replace( 'description' , {
              // filebrowserBrowseUrl : '/browser/browse/type/all',
              filebrowserUploadUrl: '/media/upload/type/all',
              // filebrowserImageBrowseUrl : '/public/media',
              filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/user/Add_report/upload_image_description_ckeditor',
              filebrowserWindowWidth: 800,
              filebrowserWindowHeight: 500
          });
  CKEDITOR.replace( 'Description2' , {
              // filebrowserBrowseUrl : '/browser/browse/type/all',
              filebrowserUploadUrl: '/media/upload/type/all',
              // filebrowserImageBrowseUrl : '/public/media',
              filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/user/Add_report/upload_image_description_ckeditor',
              filebrowserWindowWidth: 800,
              filebrowserWindowHeight: 500
          });


</script>

<script type="text/javascript">

CKEDITOR.replace( 'description', {
    extraPlugins: 'imageuploader',
   filebrowserImageBrowseUrl :
    'https://www.marknteladvisors.com/theme/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb'
  
});
</script>

@endsection