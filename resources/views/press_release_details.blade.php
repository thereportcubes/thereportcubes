@extends('layout/header')
@section('title','Upcoming Report')
@section('content')

<?php  
//echo $report->title;
    // if(isset($infographic) && $infographic->img_alt_tag != ''){
    //     $res = $infographic->img_alt_tag;
    // }
    // else{
    if(!empty($report)){
        $exp_arr = explode('Market', $report->title);
        $res = $exp_arr[0]."Market";
    } else {
        $res = 'Market';
    }
    //}

?>

<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
         <h2 class="mb-0 mini-banner-title">Press Release Details</h2>
         </div>
      </div>
   </div>
</section>

<section class="main-content mb-5 mt-5">
   <div id="main" class="center products-wrapper">
      <div id="breadCrumbs">
         <div class="container-breadcrumb">
            <div class="breadCrumbs clearfix">
               <ul>
                     <li><a href="{{url('/')}}"> <span><i class="fa fa-home"></i> Home</span> <span class="arrow">/</span> </a></li>
                     <li>  <a href="{{url('/press-release')}}"> <span>Press Release</span><span class="arrow">/</span>  </a>  </li>
                     <li>  <a href="javascript:void()"> <span>{{$press->heading}}</span>   </a>  </li>
                     
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="container mt-5">
      <div class="row">
         <div class="col-md-9 sm-100">
          <div class="product-item-small product-item-mobile  press-item col-md-9" style="width:100%">
                           @if($press)
                        <span class="date"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($press->created_at)->format('d M Y') }} </span>
                        <div class="product-item-content" style=" margin-top: 15px;">
                           <div class="content margin-zero" style="text-align: justify;">
                              <h1 class="title f-arial"><a href="#" style="color:var(--primary-color);">{{$press->heading}}</a></h1>
                              <p style="margin-bottom: 10px;"><?php echo $press->description; ?></p>
                                <!-- <p class="fw-600"> {{ $press->heading }}</p> -->
                             <!-- <p>@php echo $press->description @endphp</p> -->
                          @if($infographic_image !="")<img loading="lazy" src="{{ asset($infographic_image) }}" style="max-width:100% !important;" alt="{{$res}}" />@endif
                         <p>@php echo $press->description2 @endphp</p>
                        @endif
                              <div class="press-btn-div mt-1">
                                 <ul class="press-btn-list">
                                    <li ><a class="press-btn"  onclick="add_to_cart()">Buy Now</a></li>
                                    <li ><a class="press-btn" href="{{url('/report-store')}}/{{$report_url}}">View Report</a></li>
                                    <li ><a class="press-btn" href="{{ url('/request-sample') }}/{{$report_url}}">Request Sample</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
         </div>
        
         <div class="col-md-3 sm-100 ">
               <div class="right-sidebar when-scroll">
                   <h6 class="fw-600 blue-title-bg text-center">PURCHASE OPTIONS <i class="fa fa-info-circle"></i></h6>
                  <div class=" side">
                    <!--  <div class="d-flex justify-content-between orders  mb-2 ">
                     <div class="form-check">
                        <input class="radio radio-btn" type="radio" value="<?php  echo ($report->excel_data_pack !='') ? $report->excel_data_pack.'-excel_data_pack' : $report->excel_data_pack.'-excel_data_pack' ?>" id="flexCheckDefault" checked name="price_type"  data-id="{{ @$report->id }}" >
                        <label class="form-check-label" for="flexCheckDefault">
                           Excel Data Pack
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              Only market data will be provided in the excel spreadsheet.<span
                                 class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($report->special_excel_data_pack !='' )
                           <s> USD  {{$report->excel_data_pack}} </s> <br> {{'USD ' .$report->excel_data_pack}} 
                           
                           @else 
                           USD  {{$report->excel_data_pack}}
                           @endif
                        </p>
                     </div>

                  </div> -->

                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class=" single_user_license" name="price_type" type="radio" value="<?php  echo ($report->special_single_licence_price !='') ? $report->special_single_licence_price.'-single_licence_price' : $report->single_licence_price.'-single_licence_price' ?> " id="flexCheckDefault" checked data-id="{{ @$report->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                           Single User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format without printing rights. It is advised for a
                              single user.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($report->special_single_licence_price !='' )
                              <s> USD  {{$report->single_licence_price}} </s> <br> {{'USD ' .$report->special_single_licence_price}} 
                              
                              @else 
                              USD  {{$report->single_licence_price}}
                           @endif   
                        </p>
                     </div>
                  </div>

                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class="" type="radio" value="<?php echo ($report->special_multi_user_price !='') ? $report->special_multi_user_price.'-multi_user_price' : $report->multi_user_price.'-multi_user_price' ?> " id="flexCheckDefault" name="price_type" data-id="{{ @$report->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                           Multi User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format with printing rights. It is advised for up
                              to five users.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($report->special_multi_user_price !='' )
                              <s> USD  {{$report->multi_user_price}} </s> <br> {{'USD ' .$report->special_multi_user_price}} 
                              
                              @else 
                              USD  {{$report->multi_user_price}}
                           @endif
                        </p>
                     </div>
                  </div>


                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class="" type="radio" value="<?php echo ($report->special_custom_report_price !='') ? $report->special_custom_report_price.'-custom_report_price' : $report->custom_report_price.'-custom_report_price' ?> " id="flexCheckDefault" name="price_type" data-id="{{ @$report->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                           Enterprise License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format with printing rights and excel sheet. It is
                              advised for companies where multiple users would like to access the report from
                              multiple locations<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($report->special_custom_report_price !='' )
                              <s> USD  {{$report->custom_report_price}} </s> <br> {{'USD ' .$report->special_custom_report_price}} 
                              
                              @else 
                              USD  {{$report->custom_report_price}}
                           @endif
                        </p>
                     </div>
                  </div>   
               </div>
                <input type="hidden" name="idH" value="{{$report->id}}" id="idH" />
                  <div class="">
                     <button type="button" class="addtocart  max-100" onclick="add_to_cart()"><i class="fa"> </i> ADD TO BASKET</button>
                  </div>
                   <div class="">
                      <a href="{{ url('/request-sample') }}/{{$report_url}}" class="quote  max-100">NEED A QUOTE</a> 
                  </div>
                                       <div class="licence_right fullReportRight full mt-3" >
<h3>Buy Chapters or Sections</h3>
<div class="why_c_us_inner " style="padding-top: 15px;">
<p>
Avail customized purchase options to meet your exact research needs:
</p><ul style="margin-left: 26px;">
<li>Buy sections of this report</li>
<li>Buy country level reports</li>
<li>Request for historical data</li>
<li>Request discounts available for Start-Ups &amp; Universities</li>
</ul>
<p></p>
</div>
<a href="{{ url('/request-sample') }}/{{$report_url}}"><input type="button" value="Request for Special Pricing" class="buy_now1 buy_now_3"></a>
</div>
              
               </div>
            </div>
      </div>
   </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script>
      function add_to_cart(){
      
      let report_type_price = $("input[name='price_type']:checked").val();
      
      if(report_type_price == "" || report_type_price === 'undefined'){
         alert('Please Select At-least One Licence Price');
         return false;
      }
      let id = $("input[name='price_type']:checked").attr('data-id');
        $.ajax({
         url : '{{route("add-to-cart-new") }}' ,
         type: 'get',
         data: {'id':id, report_type_price: report_type_price},
         dataType: "JSON",
success: function(response){
    if(response.status == true){
    window.location = "{{ url('/shopping-basket') }}";
 }else{
     alert("Already in Cart");
 }
 }
      }); 

   }
   </script>
@endsection