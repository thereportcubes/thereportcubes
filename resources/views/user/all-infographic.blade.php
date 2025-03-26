@extends('user/header')
@section('title','All Infographic')
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
                  <h1>All Infographic</h1>
               </div>
               <div class="ml-auto d-flex align-items-center">
                  <nav>
                     <ol class="breadcrumb p-0 m-b-0">
                        <li class="breadcrumb-item">
                           <a href="{{url('user/dashboard')}}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                           User
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">All Infographic</li>
                     </ol>
                  </nav>
               </div>
            </div>
            <!-- end page title -->
         </div>
      </div>
      <!-- end row -->
      <!-- begin row -->

      <?php 
            $user_id = Auth::user()->id;
            $user_perms = \DB::table('user_permissions')->where('user_id',$user_id)->first();
            $permission = $user_perms->pages_permission;
            $permission = json_decode($permission);

            $Info = $permission->Info;
            $infoLen = count($Info);
      ?>

      <div class="row">
         <div class="col-lg-12">
            <div class="card card-statistics">
            
               <div class="card-body">
                  <div class="card-heading">

                        <form action="{{route('user.filter_infographic')}}" method="get" enctype="multipart/form-data">
                           
                           <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="email">Heading:</label>
                                    <input type="text" class="form-control" id="heading-search" name = "search" placeholder = "Search Using Heading" value = "{{request()->query('search')}}">
                                </div>
                              
                                <div class="form-group col-md-3 text-right">
                                    <div id = "export-data" style="margin-top:8px;" ><br>
                                        <button type="submit" class="btn btn-primary" id = "search-dd-form" name = "search-dd-form">Go</button>
                                    </div>
                                </div>
                           </div>
                        </form>
                       
                        <div class="form-group col-md-12 text-right">                           

                           <?php for($i=0;$i<$infoLen;$i++){ 
                                 if($Info[$i] == 'add') {  ?>

                                 <div id = "export-data" style="margin-top:8px;"><br>
                                    <a href="{{route('user.infographic')}}"><button type="submit" class="btn btn-info" id = "export-csv" name = "export-csv">Add New</button> 
                                 </div> 

                           <?php } } ?>

                          
                        </div>

                     </div>
                  </div>
               
               </div>
               <div class="datatable-wrapper table-responsive">
                  <table id="datatable" class="display compact table table-striped table-bordered">
                     <thead>
                        <tr>
                           <th width="5%">#</th>
                           <th width="45%">Title</th>
                           <th width="15%">Date</th>
                           <th width="15%">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($list as $key => $data)
                        <tr>
                           <th class="p-1">&nbsp;{{++$key}}</th>
                           <th>{{$data->title}}</th>
                           
                           <th>{{$data->created_at}}</th>
                           
                           <th>
                              <?php for($i=0;$i<$infoLen;$i++){ 
                                 if($Info[$i] == 'edit') {  ?>
                                    <a class="btn btn-sm btn-primary shadow-none" href="{{url('user/edit-infographic')}}/{{$data->id}}" role="button">Edit</a>
                                <?php } } ?> 

                                &nbsp;

                                <?php for($i=0;$i<$infoLen;$i++){ 
                                if($Info[$i] == 'delete') {  ?>
                                    <a class="btn btn-sm btn-danger shadow-none" href="{{url('user/user-view')}}/{{$data->id}}" role="button">Delete</a>
                                <?php } } ?>              
                            
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
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
@endsection