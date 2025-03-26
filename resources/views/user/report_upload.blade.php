@extends('user/header')
@section('title','Add New Report Upload')
@section('content')

<style>
    #selected_data
    {
        /*display:none;*/
    }
	#pm_icons{display: inline-block;}
	i.ti.ti-plus.add {
		margin-left: 5px;
		margin-top: 9px;
		padding: 5px;
		background: #289604;
		color: #fff;
		border-radius: 5%;
		height: 20px;
		width: 20px;
		font-size: 12px;
	}
	a.ti.ti-minus.delete-option {
		margin-left: 10px;
		margin-top: 18px;
		padding: 5px;
		background: #e62d2d;
		color: #fff;
		border-radius: 5%;
		height: 20px;
		width: 20px;
		font-size: 12px;
	}
	.faqs {
		width: 100%;
		display: block;
		clear: both;
	}
	.halfInput{width:46%;float:left;resize:none;}

    #edit_data
    {
        display:block;
    }
        #delete_data
    {
        display:block;
    }
    #edit_data
    {
        display:none;
    }
        #delete_data
    {
        display:none;
    }    
</style>

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
                                Report Upload
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Report Upload</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        
        <div class="row">            
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <form action="{{url('user/bulk-report-upload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">                                
                                    <div class="col-md-3"><h4 class="card-title">Bulk Report Upload</h4></div>
                                    <div class="col-md-5 text-left">
                                        <input type="file" name="file" class="form-control" required/>
                                        <p class="text-danger">( File Upload only in (.xlsx) format )</p>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="submit" class="btn btn-warning ">Upload</button>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <a href="{{url('public/assets/bulk_report_upload.xlsx')}}" class="btn btn-success btn-sm"><i class="fa fa-download"></i> File Format</a>
                                    </div>
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
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
                                <div class="col-md-10"><h4 class="card-title">Add Report Upload</h4></div>
                                <div class="col-md-2 text-right"><a href="{{route('user/report_list')}}"><button type="button" class="btn btn-info ">All Reports</button></a></div>
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
                        <form action="{{route('user/save_report')}}" method="post" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">H1 *</label>
                                    <input type="text" name="title" value="" placeholder="Title" class="form-control"   id="title" required> 
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">H2 *</label>
                                    <input type="text" name="heading2" value="" placeholder="Title" class="form-control" required="required"  id="title2" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category"> Category</label>
                                    <select onchange ="getSubCatData()"  name="category_id" class="form-control" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subcategory">Sub Category</label>
                                    <select name="subcategory_id" class="form-control" id="subcategory">
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">No. Of Page</label>
                                    <input type="number" name="no_of_page" value="" placeholder="Number of page" class="form-control" id="page" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Report Code</label>
                                    <input type="text" name="report_code" value="" placeholder="Report Code" class="form-control" id="report_code" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Single License Price</label>
                                    <input type="text" name="single_user_license" value="" placeholder="Single License Price" class="form-control" id="single_user_license" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Special Single License Price</label>
                                    <input type="text" name="special_single_licence_price"  placeholder="Single License Price" class="form-control" id="special_single_licence_price">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Group license Price</label>
                                    <input type="text" name="group_user_license" value="" placeholder="Group License Price" class="form-control" id="group_user_license">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Special Group License Price</label>
                                    <input type="text" name="special_multi_user_price"  placeholder="Special Group License Price" class="form-control" id="special_multi_user_price">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Enterprise License Price</label>
                                    <input type="text" name="group_user_license_2" value="" placeholder="Enterprise License Price" class="form-control" id="group_user_license_2">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Special Enterprise License Price</label>
                                    <input type="text" name="special_custom_report_price" placeholder="Special Enterprise License Price" class="form-control" id="special_custom_report_price">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Excel Data Pack</label>
                                    <input type="text" name="excel_data_pack" value="" placeholder="Excel Data Pack" class="form-control" id="excel_data_pack">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Special Excel Data Pack</label>
                                    <input type="text" name="special_excel_data_pack" placeholder="Special Excel Data Pack" class="form-control" id="special_excel_data_pack">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="page">Report Post Date</label>
                                    <input type="date" name="report_post_date" id = "report_post_date" class="form-control" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="page">Report Status</label>                                    
                                    <div class="checkbox checbox-switch switch-success">
                                        <label>
                                            <input type="checkbox" name="active_inactive" checked>
                                            <span></span>                                            
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="page">Upcoming Report</label>                                    
                                    <div class="checkbox checbox-switch switch-success">
                                        <label>
                                            <input type="checkbox" name="upcomingactive_inactive" checked>
                                            <span></span>                                            
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description 1</label>
                                    <textarea name="Description"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description 2</label>
                                    <textarea name="Description2" ></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="page">Infographic Image</label>
                                    <input type="file" name="infographic_img" class="form-control">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="description">Faqs</label>
                                    <div id="faqs">
                                        <div class="faqs">
                                            <textarea type="text" placeholder="Question" rows="1" class="form-control halfInput" name="faqs_ques[]"></textarea>
                                            <textarea type="text" placeholder="Answer" rows="1" class="form-control halfInput" name="faqs_ans[]"></textarea>
                                            <div style="" id="pm_icons" class="pm_icons_first">
                                                <a href="javascript:" class="ti ti-miuns delete-option" style="display:none;"></a> 
                                                <a href="javascript:" class="option_add font-14" ><i class="ti ti-plus add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-md-12">
                                    <label for="description">Table of Content</label>
                                    <textarea name="table_of_content"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Segmentation</label>
                                    <input type="file" name="segment_img" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">Segmentation Alt Tag</label>
                                    <input type="text" name="segmentation_alt_tag" placeholder="Segmentation Alt Tag" class="form-control" id="segmentation_alt_tag">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">page Url</label>
                                    <input type="text" name="page_url"  placeholder="Page Url" class="form-control" id="page_url" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="page">Schema Description</label>
                                    <textarea type="text" name="schema_desc"  placeholder="Schema Description" class="form-control" id="schema_desc"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Review Count</label>
                                    <input type="text" name="review_count"  placeholder="Review Count" class="form-control" id="review_count">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Rating Value</label>
                                    <input type="text" name="review_value"  placeholder="Rating Value" class="form-control" id="review_value">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Title</label>
                                    <input type="text" name="seo_title"  placeholder=" seo title" class="form-control" id="seo_title" required>
                                    
                                    <input type="hidden" name="page_type" class="form-control" id="page_type" value = "report">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Description</label>
                                    <textarea name="seo_description" class="form-control" rows = "4" cols="50" required></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Key Words</label>
                                    <textarea name="seo_key_words" class="form-control" rows = "4" cols="50" required></textarea>
                                </div>
                                
                                <div class="form-group col-md-6" id = "selected_data">
                                    <label for="page">You are selected</label>
                                    <div id = "se_data">
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="page">Releted Report</label>
                                    <input type="text" name = "search_form_admin" id = "search_form_admin"  class="form-control" placeholder="Search..">
                                    <div id="suggesstion-box-admin" style = "display:none;">
                                        <ul id="country-list-admin"></ul>
                                        </select>
                                    </div>
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

  CKEDITOR.replace( 'table_of_content');

</script>

<script type="text/javascript">

CKEDITOR.replace( 'Description', {
    extraPlugins: 'imageuploader',
   filebrowserImageBrowseUrl :
    'https://www.marknteladvisors.com/theme/plugins/imageuploader/imgbrowser.php?CKEditor=textarea&CKEditorFuncNum=1&langCode=en-gb'
  
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#faqs').delegate('.option_add ','click',function(){
            $('#faqs .option_add').remove();
            var randid = Math.floor(Math.random() * (89562 - 112 + 1) + 112);
            add_condition('faqs',randid);
        });
        $('#faqs').delegate('.delete-option','click',function(){
            $('#faqs .option_add').remove();
            this.parentNode.parentNode.remove();
            $('#faqs .faqs:last-child').find('.delete-option').after('<a href="javascript:" class="option_add font-14"><i class="ti ti-plus add"></i></a>');
        });
    });

    function add_condition(section,randid)
    {
        var opt = document.createElement("div");
        opt.className = 'faqs additional_conditions';
        opt.innerHTML = '<textarea type="text" placeholder="Question" rows="1" required class="form-control halfInput" name="faqs_ques[]"></textarea><textarea type="text" placeholder="Answer" rows="1" required class="form-control halfInput" name="faqs_ans[]"></textarea><div style="text-align:right;visibility:visible;" id="pm_icons"><a href="javascript:" class="ti ti-minus delete-option" ></a> <a href="javascript:" class="option_add font-14" ><i class="ti ti-plus add"></i></a></div>';
        var xx = document.querySelector("#faqs");
        xx.appendChild(opt);
    }
</script>

<script>
    function getSubCatData()
    {
        $("#category").val();
        $.ajax(
        {
            url : '{{route("user/showCategory") }}' ,
            data: "cat_id="+$("#category").val(),
            type: 'GET',
            success: function (resp) 
            {
                $("#subcategory").html(resp);
            }
        });
    }
</script>

@endsection
           