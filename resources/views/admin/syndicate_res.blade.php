@extends('admin/header')
@section('title','Syndicate Research')
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
                        <li class="breadcrumb-item active text-primary" aria-current="page">All Services Query</li>
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
            
                       <!--  <div class="card-heading">
                  <form action="{{route('filter_syndicate')}}" method="get" enctype="multipart/form-data">
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="email">Heading:</label>
                           <input type="text" class="form-control" id="heading-search" name = "search" placeholder = "Search Using Heading" value = "">
                           </div>
                        <div class="form-group col-md-3">
                           <label for="pwd">Start Date:</label>
                           <input type="date" class="form-control" id="search-start-date1" name = "start_date" placeholder = "Search Using Start Date" value = "">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="pwd">End Date:</label>
                           <input type="date" class="form-control" id="search-start-date2" name = "end_date" placeholder = "Search Using End Date" value = "">
                        </div>
                        <div class="form-group col-md-1 text-left">
                           <div id = "export-data" style="margin-top:8px;" ><br>
                              <button type="submit" class="btn btn-info" id = "search-dd-form" name = "search-dd-form">Go</button>
                           </div>
                        </div>
                        <div class="form-group col-md-2 text-right">
                           <div id = "export-data" style="margin-top:8px;" ><br>
                              
                              <a href="{{route('syndicate_export')}}"><button type="button" class="btn btn-primary" id = "export-csv" name = "export-csv">Export CSV</button></a>
                           </div>
                        </div>
                        
                        
                     </div> -->
                     </div>
                  </div>
                  </form>
               </div>
               <div class="datatable-wrapper table-responsive">
                  <table id="datatable" class="display compact table table-striped table-bordered">
                     <thead>
                     <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Busniess Email</th>
                    
                    <th>Contact Number</th>
                    <th>Budget</th>
                    <th>Message</th>
                    
                    <!--<th>Action</th>--> 
                  </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                           <td class="p-1">&nbsp;{{++$key}}</td>
                           
                           <td>{{$data->name}}</td>
                           <td>{{$data->bussinessemail}}</td>
                         
                           <td>{{$data->phone}}</td>
                           <td>{{$data->buget}}</td>
                           <td>{{$data->message}}</td>
                          
                           
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
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
@endsection