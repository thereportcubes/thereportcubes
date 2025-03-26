@extends('admin/header')
@section('title','Add Financial Research')
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
                        Financial Research
                     </li>
                     <li class="breadcrumb-item active text-primary" aria-current="page"> Edit Financial Research</li>
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
                     <!-- <div class="col-md-10">
                        <h4 class="card-title">Add New Financial Research</h4>
                     </div> -->
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
               <form action="{{url('TRC/11/update_financial_research')}}/{{request()->segment(4)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-12">
                        <label for="title">Heading *</label>
                        <input type="text" name="title" value="{{$list->financial_heading}}" placeholder="Title" class="form-control" required="required"  id="title">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image</label>
                        <input type="file" name="financial_image" class="form-control">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea name="Description"></textarea>
                     </div>
                     <!--Start ideatation implementation-->
                     <div class="form-group col-md-12">
                        <label for="page">From ideation to implementation</label>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image From ideation to implementation 1</label>
                        <input type="file" name="ideation_implementation_image1" class="form-control">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="description">Description From ideation to implementation 1</label>
                        <textarea name="Description2"></textarea>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image From ideation to implementation 2</label>
                        <input type="file" name="ideation_implementation_image2" class="form-control">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="description">Description From ideation to implementation 2</label>
                        <textarea name="impletation2"></textarea>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image From ideation to implementation 3</label>
                        <input type="file" name="ideation_implementation_image3" class="form-control">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="description">Description From ideation to implementation 3</label>
                        <textarea name="impletation3"></textarea>
                     </div>
                     <!--End Idealtion Implementation-->
                     <!--Financial Research Slider start here-->
                     <div class="form-group col-md-12">
                        <label for="description">Description From Slider 1</label>
                        <textarea name="slider1"></textarea>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image From Slider 1</label>
                        <input type="file" name="image_slider1" class="form-control">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="description">Description From Slider 2</label>
                        <textarea name="slider2"></textarea>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image From Slider 2</label>
                        <input type="file" name="image_slider2" class="form-control">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="description">Description From Slider 3</label>
                        <textarea name="slider3"></textarea>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image From Slider 3</label>
                        <input type="file" name="image_slider3" class="form-control">
                     </div>
                     <div class="form-group col-md-12">
                        <label for="description">Description From Slider 4</label>
                        <textarea name="slider4"></textarea>
                     </div>
                     <div class="form-group col-md-12">
                        <label for="page">Image From Slider 4</label>
                        <input type="file" name="image_slider4" class="form-control">
                     </div>
                     <!--Financial Research Slider End Here-->
                     <div class="form-group text-center">
                        <label></label>
                        <button name = "save_financial_report" id = "save_financial_report" type="submit" class="btn btn-warning">Update Details <i class="glyphicon glyphicon-send"></i></button>
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
<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
<script>
   CKEDITOR.replace( 'Description' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
   CKEDITOR.replace( 'Description2' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
           CKEDITOR.replace( 'impletation2' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
   CKEDITOR.replace( 'impletation3' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
           CKEDITOR.replace( 'slider1' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
   CKEDITOR.replace( 'slider2' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
           CKEDITOR.replace( 'desc-slider3' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
   CKEDITOR.replace( 'desc-slider4' , {
               // filebrowserBrowseUrl : '/browser/browse/type/all',
               filebrowserUploadUrl: '/media/upload/type/all',
               // filebrowserImageBrowseUrl : '/public/media',
               filebrowserImageUploadUrl: 'https://www.marknteladvisors.com/admin/Add_report/upload_image_description_ckeditor',
               filebrowserWindowWidth: 800,
               filebrowserWindowHeight: 500
           });
   
   CKEDITOR.replace( 'table_of_content');
   
</script>
<script type="text/javascript">
   CKEDITOR.replace( 'Description', {
       extraPlugins: 'imageuploader',
      filebrowserImageBrowseUrl :
       'https://www.marknteladvisors.com/theme/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb'
     
   });
</script>
@endsection