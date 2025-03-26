@extends('admin/header')
@section('title','Edit Member')
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
                        <h1>MemberShip</h1>
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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Edit Member</li>
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
            
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <div class="row">
                                <div class="col-md-10"><h4>Edit Member</h4></div>
                                <div class="col-md-2 text-right"><a href=" {{route('TRC/11/all_members')}}"><button type="button" class="btn btn-info text-right">All Members</button></a>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert-success" style="padding:18px;border-radius: 5px;">
                        <strong>Success!</strong> {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                            <strong>Warning!</strong> {{ session()->get('error') }}
                        </div>
                    @endif
                    <br>
                    <form action="{{url('TRC/11/edit-member')}}/{{$id}}" method="post">
                        <input type="hidden" name="idH" value="{{$id}}" />
                        @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Enter your full name" required value="{{$user->name}}"> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mobile no</label>
                                    <input type="text" name="phone" class="form-control" id="inputPassword4" placeholder="Enter your mobile no" required value="{{$user->phone}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter your email no" value="{{$user->email}}" required>
                                </div>                                
                            </div>                          
                            
                            <div class="card-header">
                                <div class="card-heading">
                                    <div class="row">
                                        <div class=""><h3>All Permissions</h3></div>
                                    </div>
                                </div>
                            </div>
                            <?php   
                                    $permsData = DB::table('user_permissions')->where('user_id',request()->segment(4))->first(); 
                                    $permission='';
                                    if($permsData){

                                    
                                    $permission = $permsData->pages_permission;
                                    $permission = json_decode($permission);
                                }

                                    $infoLen = 0;
                                    $blogLen = 0; 
                                    $reportLen = 0;
                                    $pressLen = 0;

                                    if(!empty($permission->Info)){
                                    $Info = $permission->Info;
                                    $infoLen = count($Info);
                                    }
                                    if(!empty($permission->Blogs)){
                                    $Blogs = $permission->Blogs;
                                    $blogLen = count($Blogs);
                                    }
                                    if(!empty($permission->Report)){
                                    $Report = $permission->Report;
                                    $reportLen = count($Report);
                                    }
                                    if(!empty($permission->Press)){
                                    $Press = $permission->Press;
                                    $pressLen = count($Press);
                                    }
                                   
                            ?>
                            <div class="form-row mt-3">
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4"><b>Infographics</b></label><br>
                                    
                                    <label><input type="checkbox" name="info[]" value="add" <?php for($i=0;$i<$infoLen;$i++){ if($Info[$i] == 'add') {echo "checked"; } } ?>>&nbsp; Add </label> <br>                                    
                                    
                                    <label><input type="checkbox" name="info[]" value="edit" <?php for($i=0;$i<$infoLen;$i++){ if($Info[$i] == 'edit') {echo "checked"; } } ?>>&nbsp; Edit </label> <br>                                   
                                  
                                    <label><input type="checkbox" name="info[]" value="delete" <?php for($i=0;$i<$infoLen;$i++){ if($Info[$i] == 'delete') {echo "checked"; } } ?>>&nbsp; Delete </label> <br>
                                   
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4"><b>Blogs</b></label><br>

                                    <label><input type="checkbox" name="blogs[]" value="add" <?php for($i=0;$i<$blogLen;$i++){ if($Blogs[$i] == 'add') {echo "checked"; } } ?>>&nbsp; Add </label> <br>                                    
                                    
                                    <label><input type="checkbox" name="blogs[]" value="edit" <?php for($i=0;$i<$blogLen;$i++){ if($Blogs[$i] == 'edit') {echo "checked"; } } ?>>&nbsp; Edit </label> <br>                                   
                                  
                                    <label><input type="checkbox" name="blogs[]" value="delete" <?php for($i=0;$i<$blogLen;$i++){ if($Blogs[$i] == 'delete') {echo "checked"; } } ?>>&nbsp; Delete </label> <br>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4"><b>Reports</b></label><br>

                                    <label><input type="checkbox" name="report[]" value="add" <?php for($i=0;$i<$reportLen;$i++){ if($Report[$i] == 'add') {echo "checked"; } } ?>>&nbsp; Add </label> <br>                                    
                                    
                                    <label><input type="checkbox" name="report[]" value="edit" <?php for($i=0;$i<$reportLen;$i++){ if($Report[$i] == 'edit') {echo "checked"; } } ?>>&nbsp; Edit </label> <br>                                   
                                  
                                    <label><input type="checkbox" name="report[]" value="delete" <?php for($i=0;$i<$reportLen;$i++){ if($Report[$i] == 'delete') {echo "checked"; } } ?>>&nbsp; Delete </label> <br>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4"><b>Press Release</b></label><br>

                                    <label><input type="checkbox" name="press[]" value="add" <?php for($i=0;$i<$pressLen;$i++){ if($Press[$i] == 'add') {echo "checked"; } } ?>>&nbsp; Add </label> <br>                                    
                                    
                                    <label><input type="checkbox" name="press[]" value="edit" <?php for($i=0;$i<$pressLen;$i++){ if($Press[$i] == 'edit') {echo "checked"; } } ?>>&nbsp; Edit </label> <br>                                   
                                  
                                    <label><input type="checkbox" name="press[]" value="delete" <?php for($i=0;$i<$pressLen;$i++){ if($Press[$i] == 'delete') {echo "checked"; } } ?>>&nbsp; Delete </label> <br>
                                </div>
                            </div> 

                            <button type="submit" class="btn btn-primary">Update Member</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
