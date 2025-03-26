@extends('admin/header')
@section('title','Add User')
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Add Users</li>
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
                                            <h4 class="card-title">Add Users</h4>
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
                                <form action="#" method="post">
                                    @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="title">Heading *</label>
                                                    <input type="text" name="title" value="" placeholder="Title" class="form-control" required="required"  id="title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Post Date *</label>
                                                    <input type="date" name="post_date" value="" placeholder="Press-Release Post Date" class="form-control" required="required"  id="post_date">
                                                </div>
                                                <div class="form-group">
                                                    <label for="page">Image</label>
                                                            <input type="file" name="research_img" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="Description_data"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description 2</label>
                                                    <textarea name="Description_data2"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Press Release Url *</label>
                                                    <input type="text" name="press_release_url" placeholder="press release url" class="form-control" id="press_release_url">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title"> Report Url *</label>
                                                    <input type="text" name="button_refrence" value="" placeholder="button_refrence" class="form-control" required="required"  id="title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="page">Seo Title</label>
                                                    <input type="text" name="seo_title"  placeholder=" seo title" class="form-control" id="seo_title">
                                                    
                                                    <input type="hidden" name="page_type" class="form-control" id="page_type" value = "press_release">
                                                </div>
                                                <div class="form-group">
                                                    <label for="page">Seo Description</label>
                                                    <textarea name="seo_description" rows = "4" cols="50"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="page">Seo Key Words</label>
                                                    <textarea name="seo_key_words" rows = "4" cols="50"></textarea>
                                                </div>
                                            </div>
                                            

                                            
                                            
                                            <button type="submit" class="btn btn-primary">Sign in</button>
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
           