@extends('admin/header')
@section('title','Edit New Infographic')
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
                                Infographic
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Edit Infographic</li>
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
                                <div class="col-md-10"><h4 class="card-title">Edit Infographic</h4></div>
                                <div class="col-md-2">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                <strong>Success!</strong> {{ session()->get('success') }}
                            </div><br>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                <strong>Warning!</strong> {{ session()->get('error') }}
                            </div><br>
                        @endif
                        <form action="{{url('TRC/11/update-infographic')}}/{{request()->segment(4)}}" method="post" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Title</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="Enter Title" required value="{{$list->title}}">
                                </div>
                               
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Image Alt Tag</label>
                                    <input type="text" name="img_alt_tag" class="form-control" id="inputEmail4" placeholder="Image Alt Tag" value="{{$list->img_alt_tag}}">
                                     <input type="hidden" name="infographic_img_H" class="form-control" id="inputEmail4" placeholder="Image Alt Tag" value="{{$list->image}}"> 
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="page">Infographic Post Date</label>
                                    <input type="date" name="infographic_post_date" required id = "infographic_post_date" class="form-control" value="{{$list->created_at}}">
                                </div>
                                <!--
                                <div class="form-group col-md-6">
                                    <label for="page">Infographic Status</label>
                                    <input type="checkbox" name = "active_inactive" id = "active_inactive" checked data-toggle="toggle" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger">
                                </div>!-->
                                
                                <div class="form-group col-md-6">
                                    <label for="page">Infographic Status</label>
                                    <div class="checkbox checbox-switch switch-success">
                                        <label>
                                            <input type="checkbox" name="active_inactive" checked data-toggle="toggle" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger" value="{{$list->title}}">
                                            <span></span>
                                            
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="page">Report Url</label>
                                    <input type="text" name="report_link"  placeholder="Summary Report Link" class="form-control" id="Summary Report Link" value="{{$list->report_link}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Infographic Url</label>
                                    <input type="text" name="slug"  placeholder="Infographic Url" class="form-control" id="Inforaphic Url" value="{{$list->slug}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Title</label>
                                    <input type="text" name="seo_title"  placeholder=" seo title" class="form-control" id="seo_title" value="{{$list->seo_title}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Description</label>
                                    <textarea name="seo_description" rows="4" cols="50" class="form-control">{{$list->seo_description}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="page">Seo Key Words</label>
                                    <textarea name="seo_keyword" rows = "4" cols="50" class="form-control">{{$list->seo_keyword}}</textarea>
                                </div>
                                
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Update</button>
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
           