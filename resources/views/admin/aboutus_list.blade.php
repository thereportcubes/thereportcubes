@extends('admin/header')
@section('title','About Us')
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
                  <h1>About Us</h1>
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
                        <li class="breadcrumb-item active text-primary" aria-current="page">About Us</li>
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
                        <div class="col-md-2 text-right"><a href="{{route('aboutus')}}"><button type="button" class="btn btn-info text-right">Add About Us</button></a></div>
                     </div>
                  </div>
               </div>
               <div class="datatable-wrapper table-responsive">
                  <table id="datatable" class="display compact table table-striped table-bordered">
                     <thead>
                     <tr>
                    <th>ID</th>
                    <th>Heading</th>
                    <th>Content</th>
                    <th>Created Date Time</th>
                    <th>Action</th>                   
                  </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                        <td class="p-1">&nbsp;{{++$key}}</td>
                           <td>{{$data->heading}}</td>
                           <td><?php echo $data->descritpion ?></td>
                           <td>{{$data->created_at}}</td>
                           <td><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit_aboutus')}}/{{$data->id}}" role="button">Edit</a>
                              &nbsp;
                              <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a>
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
         url : '{{route("TRC/11/delete_aboutus") }}' ,
         type: 'get',
           data: {'rowId':val},
           dataType: "text",
         success: function(response){				  
              alert(response);
              var base_url = {!! json_encode(url('/')) !!}
              window.location.href= base_url + '/TRC/11/aboutus_list';                
           }
        });
   }
   else{         
   }
   
   };
   
</script>
@endsection