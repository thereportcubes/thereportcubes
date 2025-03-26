@extends('user/header')
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
                           <a href="{{url('user/dashboard')}}"><i class="ti ti-home"></i></a>
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
      <?php 
            $user_id = Auth::user()->id;
            $user_perms = \DB::table('user_permissions')->where('user_id',$user_id)->first();
            $permission = $user_perms->pages_permission;
            $permission = json_decode($permission);

            $Press = $permission->Press;
            $pressLen = count($Press);
      ?>

      <div class="row">
         <div class="col-lg-12">
            <div class="card card-statistics">
            
               <div class="card-body">
                    <div class="card-heading">
                        <form action="{{route('user.filter_press')}}" method="get" enctype="multipart/form-data">
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
                        <div class="row">
                            <div class="col-md-10">&nbsp;</div>
    
                            <?php for($i=0;$i<$pressLen;$i++){ 
                                  if($Press[$i] == 'add') {  ?>
    
                                  <div class="col-md-2 text-right"><a href="{{route('user.press_release')}}"><button type="button" class="btn btn-info text-right">Add New</button></a></div>
    
                            <?php } } ?>
    
                         </div>
                    </div>
                  
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
                           <td><?php echo substr($data->heading,0,45) ?></td>                           
                           <td>{{$data->post_date}}</td>
                           <td>
                              
                              <?php for($i=0;$i<$pressLen;$i++){ 
                                 if($Press[$i] == 'edit') {  ?>
                                    <a class="btn btn-sm btn-primary shadow-none" href="{{url('user/edit_press_release')}}/{{$data->id}}" role="button">Edit</a>
                                <?php } } ?> 

                                &nbsp;

                                <?php for($i=0;$i<$pressLen;$i++){ 
                                if($Press[$i] == 'delete') {  ?>
                                    <a class="btn btn-sm btn-danger shadow-none" onClick="delRow({{$data->id}})" href="javascript:void()" role="button">Delete</a>
                                <?php } } ?>  
                           
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
   	      url : '{{route("user/delete_press_release") }}' ,
   	      type: 'get',
            data: {'rowId':val},
            dataType: "text",
   	      success: function(response){				  
               alert(response);
               var base_url = {!! json_encode(url('/')) !!}
               window.location.href= base_url + '/user/press_release_list';                
            }
         });
    }
    else{         
    }

   };

</script>

@endsection