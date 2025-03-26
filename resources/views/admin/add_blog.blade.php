@extends('admin/header')
@section('title','Add Blog')
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
                                Blog
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Blog</li>
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
                                <div class="col-md-10"><h4 class="card-title">Add Blog</h4></div>
                                <div class="col-md-2 text-right"><a href=" {{route('TRC/11/blog_list')}}"><button type="button" class="btn btn-info ">All Blogs</button></a></div>
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
                        <form action=" {{route('TRC/11/save_blog')}}" id="myForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title *</label>
                                    <input type="text" name="title" value="" placeholder="Title" class="form-control" required="required"  id="title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea name="descr" rows = "4" cols="50" class="form-control ckeditor"></textarea>
                                    <!--
                                    <div class="quill-editor">
                                        <div id="editor"></div>
                                    </div>!-->
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="page">Blog Post Date</label>
                                    <input type="date" name="infographic_post_date" required id = "infographic_post_date" class="form-control">
                                </div>
                               
                                <div class="form-group col-md-6">
                                    <label for="page">Blog Status</label>
                                    <div class="checkbox checbox-switch switch-success">
                                        <label>
                                            <input type="checkbox" name="active_inactive" >
                                            <span></span>
                                            
                                        </label>
                                    </div>
                                </div>
                                <!--
                                <div class="form-group col-md-6">
                                    <label for="page">Blog Order</label>
                                    <input type="number" name="blog_order"  placeholder="Blog Order" class="form-control" id="Blog Url">
                                </div>
                                !-->
                                <div class="form-group col-md-12">
                                    <label for="page">Blog Url</label>
                                    <input type="text" name="slug"  placeholder="Blog Url" class="form-control" id="Inforaphic Url">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="page col-md-6">Seo Title</label>
                                    <input type="text" name="seo_title"  placeholder="Seo Title" class="form-control" id="seo_title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Description</label>
                                    <textarea name="seo_description" rows = "4" cols="50" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Key Words</label>
                                    <textarea name="seo_keyword" rows = "4" cols="50" class="form-control"></textarea>
                                </div>
                                
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Submit</button>

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
           