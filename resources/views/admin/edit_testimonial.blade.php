@extends('admin/header')
@section('title','Edit Testimonial')
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
                           Testimonial
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page"> Edit Testimonial</li>
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
                           <h4 class="card-title">Edit Testimonial</h4>
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
                  <form action="{{url('TRC/11/update_testimonial')}}/{{request()->segment(4)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="title">Name*</label>
                           <input type="text" name="client_name" value="{{$list->client_name}}" placeholder="Client Name" class="form-control" required="required"  id="title">
                        </div>
                        <!-- <div class="form-group col-md-12">
                           <label for="title">Heading*</label>
                           <input type="text" name="title" value="{{$list->title}}" placeholder="Designation" class="form-control" required="required"  id="title">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="title">Country</label>
                           <input type="text" name="client_country" value="{{$list->client_country}}" placeholder="Country" class="form-control" required="required"  id="title">
                        </div> -->
                        <div class="form-group col-md-12">
                           <label for="description">Description</label>
                           <textarea name="Description"rows = "4" cols="50" class="form-control">{{$list->description}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Image</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group text-center">
                           <label></label>
                           <button type="submit" name = "save_about_us" id = "save_about_us" class="btn btn-warning">Update Details <i class="glyphicon glyphicon-send"></i></button>
                        </div>
                        <div class="form-group text-center">
                        </div>
                        <div class="form-group col-md-6 text-center">
                        </div>
                     </div>
                  </form>
                  <footer class="sticky-footer1">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © MarkNTel 2023</span>
          </div>
        </div>
      </footer>
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