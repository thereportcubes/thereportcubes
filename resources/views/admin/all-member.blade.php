@extends('admin/header')
@section('title','All members')
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
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        User
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">All Members</li>
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
                                    <div class="col-md-10"><h3>All Members</h3></div>
                                    <div class="col-md-2 text-right"><a href=" {{route('TRC/11/add_member')}}"><button type="button" class="btn btn-info text-right">Add New</button></a>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="display compact table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="p-3">ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>DOB</th>
                                            <th>Gender</th>
                                            <th width="15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $key => $data)
                                    <tr>    
                                        <td class="p-3">{{++$key}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{$data->dob}}</td>
                                        <td>{{$data->gender}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit-member')}}/{{$data->id}}" role="button" title="Edit member details"><i class="ti ti-list"></i> </a>
                                            
                                            &nbsp;&nbsp;
                                            <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button" title="Delete member"><i class="ti ti-trash"></i></a>
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
            url : '{{route("TRC/11/delete_member") }}' ,
            type: 'get',
                data: {'rowId':val},
                dataType: "text",
                success: function(response){				  
                alert(response);
                var base_url = {!! json_encode(url('/')) !!}
                window.location.href= base_url + '/TRC/11/all-member';                
                }
            });
        }
        else{         
        }
    };
    </script>

@endsection