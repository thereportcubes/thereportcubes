@extends('user/header')
@section('title','All Reports')
@section('content')

    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>All Reports</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('user/dashboard')}}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                    Upload Reports
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">All Reports</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <?php 
                $user_id = Auth::user()->id;
                $user_perms = \DB::table('user_permissions')->where('user_id',$user_id)->first();
                $permission = $user_perms->pages_permission;
                $permission = json_decode($permission);

                $Report = $permission->Report;
                $reportLen = count($Report);
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                        
                            <div class="card-heading">
                                <form action="{{route('user.filter_report')}}" method="get" enctype="multipart/form-data">
                           
                                   <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="email">Heading:</label>
                                            <input type="text" class="form-control" id="heading-search" name = "search" placeholder = "Search Using Heading" value = "{{request()->query('search')}}">
                                        </div>
                                      
                                        <div class="form-group col-md-3 text-right">
                                            <div id = "export-data" style="margin-top:8px;" ><br>
                                                <button type="submit" class="btn btn-primary" id = "search-dd-form" name = "search-dd-form">Go</button>
                                            </div>
                                        </div>
                                   </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-10">&nbsp;</div>

                                    <?php for($i=0;$i<$reportLen;$i++){ 
                                        if($Report[$i] == 'add') {  ?>

                                        <div class="col-md-2 text-right">
                                            <a href="{{route('user/report_upload')}}"><button type="button" class="btn btn-info text-right">Add New</button></a>
                                        </div>

                                    <?php } } ?>
                                </div>
                            </div>
                        
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="display compact table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="10%">Report Code</th>
                                            <th width="10%">Heading 1</th>
                                            <th width="10%">Report Date</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $key => $data)
                                        <?php 
                                            $category_name = "";
                                            $sub_category_name = "";

                                            if($data->cat_id > 0){
                                                $category = \DB::table('category')->select("cat_name")->where('id',$data->cat_id)->first();
                                                $category_name = $category->cat_name;
                                            }
                                            if($data->sub_cat_id !== NULL){ 
                                                $subcategory = \DB::table('sub_category')->select("sub_cat_name")->where('id',$data->sub_cat_id)->first();
                                                $sub_category_name = @$subcategory->sub_cat_name;
                                            }                                           
                                        ?>
                                    <tr>    
                                        <td class="p-1">{{++$key}}</td>
                                        <td>{{$data->report_code}}</td> 
                                        <td><?php echo substr($data->title,0,40).'...'; ?></td> 
                                        
                                        <td>{{\Carbon\Carbon::parse($data->report_post_date)->format('d-m-Y')}}</td>
                                        <td>
                                            
                                        <?php for($i=0;$i<$reportLen;$i++){ 
                                        if($Report[$i] == 'edit') {  ?>
                                            <a class="btn btn-sm btn-primary shadow-none" href="{{url('user/edit-report')}}/{{$data->id}}" role="button">Edit</a>
                                        <?php } } ?> 

                                        &nbsp;

                                        <?php for($i=0;$i<$reportLen;$i++){ 
                                        if($Report[$i] == 'delete') {  ?>
                                            <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a></td>
                                        <?php } } ?>                                          
                                        
                                                    
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
   	      url : '{{route("user/delete_report") }}' ,
   	      type: 'get',
            data: {'rowId':val},
            dataType: "text",
   	        success: function(response){				  
               alert(response);
               var base_url = {!! json_encode(url('/')) !!}
               window.location.href= base_url + '/user/report-list';                
            }
         });
    }
    else{         
    }

   };

</script>
@endsection