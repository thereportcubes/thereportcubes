@extends('user/header')
@section('title','All Blogs')
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
                            <h1>All Blogs</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('user/dashboard')}}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                    Blog
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">All Blogs</li>
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

                $Blogs = $permission->Blogs;
                $BlogsLen = count($Blogs);
            ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                        
                            <div class="card-heading">
                                
                                <form action="{{route('user.filter_blog')}}" method="get" enctype="multipart/form-data">
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
                                    <?php for($i=0;$i<$BlogsLen;$i++){ 
                                        if($Blogs[$i] == 'add') {  ?>
                                        <div class="col-md-2 text-right">
                                            <a href="{{route('user/blog')}}"><button type="button" class="btn btn-info text-right">Add New</button></a>
                                        </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="display compact table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="55%">Title</th>
                                            <th width="15%">Date</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $key => $data)
                                    <tr>    
                                        <td class="p-1">&nbsp;{{++$key}}</td>
                                        <td>{{$data->title}}</td>                                     
                                        
                                        <td>{{\Carbon\Carbon::parse($data->post_date)->format('d-m-Y')}}</td>
                                        
                                        <td>
                                            <?php for($i=0;$i<$BlogsLen;$i++){ 
                                                if($Blogs[$i] == 'edit') {  ?>
                                                    <a class="btn btn-sm btn-primary shadow-none" href="{{url('user/edit-blog')}}/{{$data->id}}" role="button">Edit</a>
                                                <?php } } ?> 

                                                &nbsp;

                                                <?php for($i=0;$i<$BlogsLen;$i++){ 
                                                if($Blogs[$i] == 'delete') {  ?>
                                                    <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a>
                                                <?php } } ?>              
                                            
                                         </td>
                                                    
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
   	      url : '{{route("user/delete_blog") }}' ,
   	      type: 'get',
            data: {'rowId':val},
            dataType: "text",
   	        success: function(response){				  
               alert(response);
               var base_url = {!! json_encode(url('/')) !!}
               window.location.href= base_url + '/user/blog-list';                
            }
         });
    }
    else{         
    }

   };

</script>
@endsection