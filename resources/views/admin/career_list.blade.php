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
               <!-- <div class="page-title mb-2 mb-sm-0">
                  <h1>Speak To Analyst</h1>
               </div> -->
               <div class="ml-auto d-flex align-items-center">
                  <nav>
                     <ol class="breadcrumb p-0 m-b-0">
                        <li class="breadcrumb-item">
                           <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                           User
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">Career</li>
                     </ol>
                  </nav>
               </div>
            </div>
            <!-- end page title -->
         </div>
      </div>
      <!-- end row -->
     <!-- Categories Table -->
     <div class="card mb-3">
          <div class="card-body admin-category">
             <a href="{{route('add_career')}}" class="btn btn-primary" >Add Career Page Data</a>
          </div>      
          <div class="card-body admin-category">
             <a href="https://www.marknteladvisors.com/admin/career/add" class="btn btn-info" >Add Opening</a>
          </div>  
        </div>

        <div class="card mb-3">
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable"  cellspacing="0">
                     <thead>
                     <tr>
                        <th>ID</th>
                        <th>Heading</th>
                        <th>Experiance</th>
                        <th>Location</th>
                        <th>Report To</th>
                        <th style="width:100px">Roles & Responsibilities</th>
                        <th>Created Date Time</th>
                        <th>Action</th>                   
                    </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                           <td style="width:100px" class="p-1">&nbsp;{{++$key}}</td>
                           <td>{{$data->heading}}</td>
                           <td>{{$data->Experiance}}</td>
                           <td>{{$data->Location}}</td>
                           <td>{{$data->report_to}}</td>
                           <td><p style="word-break:break-all;";><?php echo $data->roles_responsibilities ?></p> </td>
                           <td>{{$data->created_date_time}}</td> 
                           <td><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit_career')}}/{{$data->id}}" role="button">Edit</a>
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
  <!-- /#wrapper -->

</div>
<!-- end app-main -->
<script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }

   function delRow(val) {
   
   var r=confirm("Are you sure?")
   if (r==true)
   {
      $.ajax({
       url : '{{route("TRC/11/delete_career") }}' ,
       type: 'get',
         data: {'rowId':val},
         dataType: "text",
       success: function(response){				  
            alert(response);
            var base_url = {!! json_encode(url('/')) !!}
            window.location.href= base_url + '/TRC/11/career_list';                
         }
      });
 }
 else{         
 }
 
 };
</script>
@endsection