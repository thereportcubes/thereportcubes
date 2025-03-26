@extends('admin/header')
@section('title','Add Refund Policy')
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
                        Refund Policy
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page"> Add New Refund Policy</li>
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
                           <h4 class="card-title">Add New Refund Policy</h4>
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
                  <form action=" {{route('TRC/11/save_refund')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="description">Description</label>
                           <textarea name="Description"></textarea>
                        </div>
                        <div class="form-group text-center">
                           <label></label>
                           <button type="submit" id="add_vision_mission_form" name = "add_vision_mission_form" class="btn btn-warning">Save <i class="glyphicon glyphicon-send"></i></button>
                        </div>
                        <div class="form-group text-center">
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
</script>
<script type="text/javascript">
   CKEDITOR.replace( 'Description', {
       extraPlugins: 'imageuploader',
      filebrowserImageBrowseUrl :
       'https://www.marknteladvisors.com/theme/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb'
     
   });
</script>
@endsection