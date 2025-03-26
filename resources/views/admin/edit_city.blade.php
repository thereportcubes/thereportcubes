@extends('admin/header')
@section('title','Edit City')
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
                        City
                        </li>
                        <li class="breadcrumb-item active text-primary" aria-current="page"> Edit City</li>
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
                        <div class="col-md-10">
                           <h4 class="card-title">Edit City</h4>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  @if(session()->has('success'))
                  <div class="alert-success" style="padding:18px;border-radius: 5px;">
                     <strong>Success!</strong> {{ session()->get('success') }}
                  </div>
                  <br>
                  @endif
                  @if(session()->has('error'))
                  <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                     <strong>Warning!</strong> {{ session()->get('error') }}
                  </div>
                  <br>
                  @endif
                  <form action="{{url('TRC/11/save_edit_city')}}/{{request()->segment(4)}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="form-group col-md-6">
                                    <label for="region"> Region</label>
                                    <select onchange ="getCountryData()"  name="region_id" class="form-control" id="region" >
                                        <option value="">Select Region</option>
                                        @foreach($region as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == $data->region_id) {{"selected"}} @endif>{{$cat->region_name}}</option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Country">Country</label>
                                    <select name="country_id" class="form-control" id="country" >
                                        <option value=''>Country</option>
                                        @foreach($country as $key=>$sc)
                                        <option value="{{$sc->id}}" @if($sc->id == $data->country_id) {{"selected"}} @endif>{{$sc->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        <div class="form-group col-md-6">
                           <label>City Name</label>
                           <input type="text" class="form-control" id="city_name" name = "city_name" required value="{{$data->city_name}}">
                        </div>
                        <div class="form-group col-md-6">
                           <label>City Url</label>
                           <input type="text" class="form-control" id="page_url" name = "page_url" required value="{{$data->page_url}}">
                        </div>  
                        <div class="form-group text-center">
                           <label></label>
                           <button type="submit" name = "create_cat" id = "create_cat" class="btn btn-warning">Update <i class="glyphicon glyphicon-send"></i></button>
                        </div>
                        <div class="form-group text-center">
                        </div>
                        <div class="form-group col-md-6 text-center">
                        </div>
                     </div>
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

<script>
     function getCountryData()
    {
        $("#region").val();
        $.ajax(
        {
            url : '{{route("TRC/11/showCountry") }}' ,
            data: "region_id="+$("#region").val(),
            type: 'GET',
            success: function (resp) 
            {
                $("#country").html(resp);
            }
        });
    }
   </script>
@endsection