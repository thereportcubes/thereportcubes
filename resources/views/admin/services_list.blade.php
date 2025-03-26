@extends('admin/header')
@section('title','Rcube')
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
                  <h1></h1>
               </div>
               <div class="ml-auto d-flex align-items-center">
                  <nav>
                     <ol class="breadcrumb p-0 m-b-0">
                        <li class="breadcrumb-item">
                           <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                           Dashboard
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">All Services</li>
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
                        <div class="col-md-3 text-left"><a href="{{route('services')}}"><button type="button" class="btn btn-info text-right">Add New Services</button></a></div>
                     </div>
                  </div>
               </div>
               <div class="datatable-wrapper table-responsive">
                  <table id="datatable" class="display compact table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th width="5%">ID</th>
                           <th width="20%">Service Name</th>
                           <th width="40%">Service Desc</th>
                           <th width="10%">Service Image</th>
                           <th width="15%">Created Date Time</th>
                           <th width="15%">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                           <th class="p-1">&nbsp;{{++$key}}</th>
                           <th>{{$data->service_name}}</th>
                           <th>{{$data->services_desc}}</th>
                           <th style="text-align:center;"><?php if($data->services_image !=""){ ?> <img src="{{url('public/uploads/services')}}/{{$data->services_image}}" style="width:60px; height:60px;" /> <?php } else{ ""; }?> </th>
                           <th><?php 
                              $created_date = !empty($data->created_date_time) ? date('Y-m-d', strtotime($data->created_date_time)) : '';?>

                              {{$created_date}}</th>
                           <th><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit_services')}}/{{$data->id}}" role="button">Edit</a>
                              &nbsp;
                              <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a></th>
                           </th>
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
         url : '{{route("TRC/11/delete_services") }}' ,
         type: 'get',
           data: {'rowId':val},
           dataType: "text",
         success: function(response){				  
              alert(response);
              var base_url = {!! json_encode(url('/')) !!}
              window.location.href= base_url + '/TRC/11/services_list';                
           }
        });
   }
   else{         
   }
   
   };
   
</script>
@endsection