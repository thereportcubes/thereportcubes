@extends('admin/header')
@section('title','All Seo Pages')
@section('content')
<style>table td {
            word-wrap: break-word;
        }</style>
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>All Seo Pages</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                    Blog
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">All Seo Pages</li>
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
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                        
                            <div class="card-heading">
                                <div class="row">
                                    <div class="col-md-10">&nbsp;</div>
                                    <div class="col-md-2 text-right"><a href="{{route('TRC/11/seo_page')}}"><button type="button" class="btn btn-info text-right">Add New</button></a>
                                    </div>
                                    
                                </div>
                            </div>
                        
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="display compact table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:5%">#</th>
                                            <th style="width:5%">Page</th>
                                            <th style="width:5%">Title</th>
                                            <!--<th style="width:5%">Decription</th>-->
                                            <!--<th style="width:5%">Keywords</th>-->
                                            <th style="width:5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $key => $pg)
                                    @php $data = \DB::table('seo_content')->where('page_type',$pg->page_key)->where('static_pages','1')->first() @endphp 
                                    <tr>    
                                        <td class="p-1">{{++$key}}</td>
                                        <td>{{wordwrap($pg->page_name,15)}}</td>
                                     <td>
                                    <?php 
                                            if (!empty($data)) {
                                              echo substr($data->seo_title, 0, 70);
                                          }
                                                 ?>
                                        </td> 
                                        <td><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit-seo-page')}}/{{$pg->id}}" role="button">Edit</a>
                                        &nbsp;
                                        <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{ !empty($data) ? $data->id : '' }})" href="javascript:void()" role="button">Delete</a></td>
                                                    
                                    </tr>
                                    
                                    @endforeach
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

    <script>
    function delRow(val) {

      var r=confirm("Are you sure?")
      if (r==true)
      {
         $.ajax({
   	      url : '{{route("TRC/11/delete_blog") }}' ,
   	      type: 'get',
            data: {'rowId':val},
            dataType: "text",
   	        success: function(response){				  
               alert(response);
               var base_url = {!! json_encode(url('/')) !!}
               window.location.href= base_url + '/TRC/11/blog-list';                
            }
         });
    }
    else{         
    }

   };

</script>
@endsection