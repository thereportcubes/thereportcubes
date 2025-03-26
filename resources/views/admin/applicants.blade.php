@extends('admin/header')
@section('title','Applicant')
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
                  <h1>Applicants</h1>
               </div>
               <div class="ml-auto d-flex align-items-center">
                  <nav>
                     <ol class="breadcrumb p-0 m-b-0">
                        <li class="breadcrumb-item">
                           <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                           User
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">Applicant</li>
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
                     <div class="form-group col-md-3">
                        <label for="email">Heading:</label>
                        <input type="text" class="form-control" id="heading-search" name ="heading-search" placeholder = "Search Using Heading" value = "">
                     </div>
                     <div class="form-group col-md-3">
                        <label for="pwd">Start Date:</label>
                        <input type="date" class="form-control" id="search-start-date1" name = "search-start-date1" placeholder = "Search Using Start Date" value = "">
                     </div>
                     <div class="form-group col-md-3">
                        <label for="pwd">End Date:</label>
                        <input type="date" class="form-control" id="search-start-date2" name = "search-start-date2" placeholder = "Search Using End Date" value = "">
                     </div>
                     <div class="form-group col-md-3 text-right">
                     <div id = "export-data" style="margin-top:8px;" ><br>
                     <button type="submit" class="btn btn-info" id = "search-dd-form" name = "search-dd-form">Go</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <a href="{{route('applicants_export')}}"><button type="submit" class="btn btn-primary" id = "export-csv" name = "export-csv">Export CSV</button>
                     </div>
                   </div>
                    </div>
               
               <div class="datatable-wrapper table-responsive">
                  <table id="datatable" class="display compact table table-striped table-bordered">
                     <thead>
                     <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>Resume</th>
                    <th>position Apply For</th>
                    <th>Experiance</th>
                    <th>Location</th>
                    <th>ctc</th>
                    <th>Notice Period</th>
                    <th>Message</th>
                    <th>Created Date Time</th>
                    <th>Action</th>                   
                  </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                           <td class="p-1">&nbsp;{{++$key}}</td>
                           <td>{{$data->name}}</td>
                           <td>{{$data->email}}</td>
                           <td>{{$data->phone}}</td>
                           <td>{{$data->resume}}</td>
                           <td>{{$data->position_apply_for}}</td>
                           <td>{{$data->Experiance}}</td>
                           <td>{{$data->Location}}</td>
                           <td>{{$data->ctc}}</td>
                           <td>{{$data->notice_period}}</td>
                           <td>{{$data->message}}</td>
                           <td>{{$data->created_at}}</td>  
                           <td>
                              <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a></td>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <div class="row">
                  {{$list->links()}}
                  </div>
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
   	      url : '{{route("TRC/11/delete_applicants") }}' ,
   	      type: 'get',
            data: {'rowId':val},
            dataType: "text",
   	      success: function(response){				  
               alert(response);
               var base_url = {!! json_encode(url('/')) !!}
               window.location.href= base_url + '/TRC/11/applicants';                
            }
         });
    }
    else{         
    }

   };

</script>

@endsection