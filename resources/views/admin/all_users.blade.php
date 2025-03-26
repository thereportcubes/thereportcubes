@extends('admin/header')
@section('title','All Users')
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
                            <h1>Users</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                    Users
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">All Users</li>
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
                                    <div class="col-md-10">Users List</div>                               
                                </div>
                            </div>                        
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="display compact table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="25%">Name</th>
                                            <th width="10%">Email</th>
                                            <th width="50%">Address</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $key => $data)
                                    <tr>    
                                        <td class="p-1">{{++$key}}</td>
                                        <td>{{$data->name}}</td>     
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->address}}</td>
                                        <td><a class="btn btn-sm btn-primary shadow-none" href="#" role="button">View</a>
                                        &nbsp;
                                        <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()"  role="button">Delete</a></td>
                                                    
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
   	      url : '{{route("TRC/11/delete_user") }}' ,
   	      type: 'get',
            data: {'rowId':val},
            dataType: "text",
   	        success: function(response){				  
               alert(response);
               var base_url = 'https://www.thereportcube.com/';//{!! json_encode(url('/')) !!}
               window.location.href= base_url + 'TRC/11/users';                
            }
         });
    }
    else{         
    }

   };

</script>
@endsection