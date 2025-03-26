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
                        <li class="breadcrumb-item active text-primary" aria-current="page">All Financial List</li>
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
                        <div class="col-md-3 text-left"><a href="{{route('financial_research')}}"><button type="button" class="btn btn-info text-right">Add New Financial Services</button></a></div>
                     </div>
                  </div>
               </div>
               <div class="datatable-wrapper table-responsive">
                  <table id="datatable" class="display compact table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th width="5%">ID</th>
                           <th width="45%">Analytics Heading</th>
                           <th width="10%">Analytics Image</th>
                           <th width="10%">Analytics Description</th>
                           <th width="15%">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                           <th class="p-1">&nbsp;{{++$key}}</th>
                           <th>{{$data->financial_heading}}</th>
                           <th><?php if($data->financial_image !=""){ ?> <img src="{{url('public/uploads/financial')}}/{{$data->financial_image}}" style="width:100px; height:60px;" /> <?php } else{ ""; }?> </th>
                           <th>{{$data->analytics_description}}</th>
                           <th><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit_financial_research')}}/{{$data->id}}" role="button">Edit</a>
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
         url : '{{route("TRC/11/delete_financial_research") }}' ,
         type: 'get',
           data: {'rowId':val},
           dataType: "text",
         success: function(response){				  
              alert(response);
              var base_url = {!! json_encode(url('/')) !!}
              window.location.href= base_url + '/TRC/11/financial_list';                
           }
        });
   }
   else{         
   }
   
   };
   
</script>
@endsection