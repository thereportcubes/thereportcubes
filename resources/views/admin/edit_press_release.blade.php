@extends('admin/header')
@section('title','Edit Press Release')
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
                           
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">Edit Press Release Upload</li>
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
                           <h4 class="card-title">Edit Press Release</h4>
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
                  <form action="{{url('TRC/11/update_press_release')}}/{{request()->segment(4)}}" id="myForm" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="title">Heading *</label>
                           <input type="text" name="heading" value="{{$list->heading}}" placeholder="Title" class="form-control" required="required"  id="title">
                        </div>

                        <div class="form-group col-md-6">
                           <label for="title">Image *</label>
                           <input type="file" name="press_image" value="" class="form-control"  id="press_image">
                        </div>
                       <div class="form-group col-md-3">
    <label for="page">View Image</label>
    <br/>
      <input type="hidden" name="press_image_H" class="form-control" value="{{$list->image}}">
    @if($list->image != "")
        <a href="{{ asset('uploads/press_release/' . $list->image) }}" target="_blank">
            <img src="{{ asset('uploads/press_release/' . $list->image) }}" width="60" height="40"/>
        </a>
    @endif
</div>
                        <div class="form-group col-md-6">
                           <label for="">Image alt *</label>
                           <input type="text" name="image_alt"  value="{{$list->image_alt}}"  class="form-control" required="required"  id="image_alt" >
                        </div>
                        <div class="form-group col-md-6">
                           <label for="title">Post Date *</label>
                           <input type="date" name="post_date" value="{{$list->post_date}}" class="form-control" required="required"  id="post_date">
                        </div>
                        
                        <div class="form-group col-md-12">
                           <label for="description">Description</label>
                           <textarea  class="form-control ckeditor" name="description" >{{$list->description}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="description">Description2</label>
                           <textarea class="form-control ckeditor" name="description2">{{$list->description2}}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="title">Press Release Url *</label>
                           <input type="text" name="press_release_url" value="{{$list->press_release_url}}" placeholder="press release url" class="form-control" id="press_release_url">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="title"> Report Url *</label>
                           <input type="text" name="report_url" value="{{$list->button_refrence}}" placeholder="report-url" class="form-control"  id="title">
                        </div>
                        <div class="form-group col-md-12">
                           <label for="page">Seo Title</label>
                           <input type="text" name="seo_title" value="{{$seo_content->seo_title}}" placeholder=" seo title" class="form-control" id="seo_title">
                           <input type="hidden" name="page_type" class="form-control" id="page_type" value = "press_release">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="page">Seo Description</label>
                           <textarea class="form-control" name="seo_description" rows = "4" cols="50">{{$seo_content->seo_description}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="page">Seo Key Words</label>
                           <textarea class="form-control" name="seo_keyword" rows = "4" cols="50">{{$seo_content->seo_key_words}}</textarea>
                        </div>
                        <div class="form-group col-md-12 text-left">
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

<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>

<script>

 // Replace Description textarea
     CKEDITOR.replace('description', {
        filebrowserUploadUrl: '{{ route("TRC.11.ckeditor.upload", ["_token" => csrf_token()]) }}',
        filebrowserImageUploadUrl: '{{ route("TRC.11.ckeditor.upload", ["_token" => csrf_token()]) }}',
        filebrowserWindowWidth: 800,
        filebrowserWindowHeight: 500,
        on: {
            instanceReady: function() {
                this.on('fileUploadRequest', function(evt) {
                    var xhr = evt.data.fileLoader.xhr;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    xhr.setRequestHeader('X-CSRF-TOKEN', token);
                });
            }
        }
    });


     CKEDITOR.replace('description2', {
        filebrowserUploadUrl: '{{ route("TRC.11.ckeditor.upload", ["_token" => csrf_token()]) }}',
        filebrowserImageUploadUrl: '{{ route("TRC.11.ckeditor.upload", ["_token" => csrf_token()]) }}',
        filebrowserWindowWidth: 800,
        filebrowserWindowHeight: 500,
        on: {
            instanceReady: function() {
                this.on('fileUploadRequest', function(evt) {
                    var xhr = evt.data.fileLoader.xhr;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    xhr.setRequestHeader('X-CSRF-TOKEN', token);
                });
            }
        }
    });


</script>

<script type="text/javascript">

// CKEDITOR.replace( 'description', {
//     extraPlugins: 'imageuploader',
//    filebrowserImageBrowseUrl :
//     'https://www.thereportcube.com/theme/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb'
  
// });
</script>


@endsection