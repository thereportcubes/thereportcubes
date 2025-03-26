@extends('admin/header')
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
                                        <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                        
                            <div class="card-heading">
                                <form action="{{route('filter_blog')}}" method="get" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="email">Title:</label>
                                        <input type="text" class="form-control" id="heading-search" name = "search" placeholder = "Search with Title" value = "{{request()->query('search')}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="pwd">Start Date:</label>
                                        <input type="date" class="form-control" id="search-start-date1" name = "start_date" placeholder = "Search Using Start Date" value = "">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="pwd">End Date:</label>
                                        <input type="date" class="form-control" id="search-start-date2" name = "end_date" placeholder = "Search Using End Date" value = "">
                                    </div>
                                    <div class="form-group col-md-3 text-right">
                                        <div id = "export-data" style="margin-top:8px;" >
                                            <br>
                                            <button type="submit" class="btn btn-primary" id = "search-dd-form" name = "search-dd-form">Go</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{route('blog_export')}}">
                                                <button type="button" class="btn btn-primary" id = "export-csv" name = "export-csv">Export CSV</button>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                                <div class="form-group col-md-12 text-right">
                                <div id = "export-data" style="margin-top:8px;"><br>
                                <a href=" {{route('TRC/11/blog')}}"><button type="submit" class="btn btn-info" id = "export-csv" name = "export-csv">Add New</button></a>
                                </div>
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
                                        <td class="p-1">{{++$key}}</td>
                                        <td><?php echo substr($data->title,0,70) ; ?></td>                                        
                                        
                                        <td>{{\Carbon\Carbon::parse($data->created_at)->format('d-m-Y')}}</td>
                                        <td><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit-blog')}}/{{$data->id}}" role="button">Edit</a>
                                        &nbsp;
                                        <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a></td>
                                                    
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