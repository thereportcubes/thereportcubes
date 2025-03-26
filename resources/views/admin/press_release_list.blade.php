@extends('admin/header')
@section('title','Press Release Upload')
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
                  <h1>Press Release Upload</h1>
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
                        <li class="breadcrumb-item active text-primary" aria-current="page">Press Release</li>
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
            <form action="{{route('filter_press')}}" method="get" enctype="multipart/form-data">
               <div class="card-body">
                  <div class="card-heading">
                    <div class="row">
                     <div class="form-group col-md-3">
                        <label for="email">Heading:</label>
                        <input type="text" class="form-control" id="heading-search" name = "search" placeholder = "Search Using Heading" value = "{{request()->query('search')}}">
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
                     <div id = "export-data" style="margin-top:8px;" ><br>
                        <button type="submit" class="btn btn-primary" id = "search-dd-form" name = "search-dd-form">Go</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{route('press_export')}}"><button type="button" class="btn btn-primary" id = "export-csv" name = "export-csv">Export CSV</button></a>
                     </div>
                     </div>
                    </div>
                     <div class="row">
                        <div class="col-md-10">&nbsp;</div>
                        <div class="col-md-2 text-right"><a href="{{route('press_release')}}"><button type="button" class="btn btn-info text-right">Add New</button></a></div>
                     </div>
                  </div>
                  </form>
               </div>
               
               <div class="datatable-wrapper table-responsive">
                  <table id="datatable" class="display compact table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th width="5%">ID</th>
                           <th width="45%">Heading</th>
                           <th width="15%">Post Date</th>
                           <th width="15%">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                           <td class="pl-3">{{" ". ++$key  }}</td>
                           <td><?php echo substr($data->heading,0,65); ?></td>                           
                           <td>{{$data->post_date}}</td>
                           <td><a class="btn btn-sm btn-primary shadow-none" href="{{url('TRC/11/edit_press_release')}}/{{$data->id}}" role="button">Edit</a>
                              &nbsp;
                              <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a></td>
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
   	      url : '{{route("TRC/11/delete_press_release") }}' ,
   	      type: 'get',
            data: {'rowId':val},
            dataType: "text",
   	      success: function(response){				  
               alert(response);
               var base_url = {!! json_encode(url('/')) !!}
               window.location.href= base_url + '/TRC/11/press_release_list';                
            }
         });
    }
    else{         
    }

   };

</script>

@endsection