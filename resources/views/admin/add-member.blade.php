@extends('admin/header')
@section('title','Add member')
@section('content')

<!-- begin app-main -->
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
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Add Members</li>
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
                                    <div class="col-md-10"><h3>Add Member</h3></div>
                                    <div class="col-md-2 text-right">
                                        <a href=" {{route('TRC/11/all_members')}}"><button type="button" class="btn btn-info text-right">All Members</button></a>
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

                            <form action=" {{route('TRC/11/member_form')}}" method="post">
                            @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Member Name</label>
                                        <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Enter your full name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mobile no</label>
                                        <input type="text" name="phone" class="form-control" id="inputPassword4" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Password</label>
                                        <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Enter Password" required>
                                    </div>
                                    
                                </div>  
                                <div class="card-header">
                                    <div class="card-heading">
                                        <div class="row">
                                            <div class=""><h3>Set Permission</h3></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4"><b>Infographics</b></label><br>
                                        <label><input type="checkbox" name="info[]" value="add" >&nbsp; Add </label> <br>
                                        <label><input type="checkbox" name="info[]" value="edit">&nbsp; Edit </label> <br>
                                        <label><input type="checkbox" name="info[]" value="delete">&nbsp; Delete </label> <br>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4"><b>Blogs</b></label><br>
                                        <label><input type="checkbox" name="blogs[]" value="add" >&nbsp; Add </label> <br>
                                        <label><input type="checkbox" name="blogs[]" value="edit" >&nbsp; Edit </label> <br>
                                        <label><input type="checkbox" name="blogs[]" value="delete" >&nbsp; Delete </label> <br>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label for="inputEmail4"><b>Reports</b></label><br>
                                        <label><input type="checkbox" name="report[]" value="add" >&nbsp; Add </label> <br>
                                        <label><input type="checkbox" name="report[]" value="edit" >&nbsp; Edit </label> <br>
                                        <label><input type="checkbox" name="report[]" value="delete" >&nbsp; Delete </label> <br>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label for="inputEmail4"><b>Press Release</b></label><br>
                                        <label><input type="checkbox" name="press[]" value="add" >&nbsp; Add </label> <br>
                                        <label><input type="checkbox" name="press[]" value="edit" >&nbsp; Edit </label> <br>
                                        <label><input type="checkbox" name="press[]" value="delete" >&nbsp; Delete </label> <br>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

@endsection