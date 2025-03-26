@extends('layout/header')
@section('title','Upcoming Report')

@section('content')
<style>
   #more {display: none;}
</style>
 <link rel="stylesheet" media="all" href="{{asset('css/ab-product.css?v=2')}}"> 
<section class="mini-banner">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h3 class="mb-0 mini-banner-title">Report Details</h3>
            </div>
         </div>
      </div>
   </section>
   <!-- mini banner end -->
   <section class="main-content mb-5 mt-5">
        <div id="main" class="center products-wrapper">
      <div id="breadCrumbs">
         <div class="container-breadcrumb">
            <div class="breadCrumbs clearfix">
               <ul>
                  <li><a href="{{url('/')}}"> <span><i class="fa fa-home"></i> Home</span> <span class="arrow">/</span> </a></li>
                  <li><a href="{{url('/report-store')}}"> <span>Report Store</span><span class="arrow">/</span>  </a>  </li>
                  <li><a href="javascript:void()"> <span>{{$datas->title}}</span>   </a>  </li>
                  
               </ul>
            </div>
         </div>
      </div>
   </div>
      <div class="container">
         <div class="row">
            <div class="col-md-9 sm-100">
             
               <div class="box-shadow">

                  <div class="row  category-box">
                     <div class=" col-md-3">
                       
                           <div class="ab-product-thumbnail-book-binder left ms-2">
                           <div class="product-img-box details">
                                       <span class="image-report" style="color:#fff;top: 10px;left: 3px;font-size: 8px;">Report</span>
                                     <h4 class="image-title" style="color: #000;top: 40px;font-size: 11px;text-align: left;width: 80px;left: 6px;">
                                       <?php echo substr(html_entity_decode(strip_tags($datas->title)),0,45); ?></h4>                      
                                       </h4>
                                       <span class="imag-pages" style="color: #000;font-size: 8px;left: 5px;bottom: 5px;">@php echo ($datas->no_of_page) ? $datas->no_of_page : '0' @endphp pages</span>
                                       <span class="book-years" style="color: ;font-size: 9px;right: 14px;bottom: 3px;">{{ Carbon\Carbon::parse($datas->report_post_date)->format('M Y') }}</span>
                                    </div>
                                    <img loading="lazy" class="nonGenericproductSmallImage "src="{{asset('img/reportimg.jpg')}}"  width="107px" alt="<?php echo substr(html_entity_decode(strip_tags($datas->title)),0,30); ?>" >
                                 </div>
                     </div>
                     <div class="col-md-9">
                        <h1 class="ab-product-title ab-color-primary ab-small-title">{{$datas->title}}</h1>
                  
                           <h2 class="title_descr">
                              <?php echo substr($datas->heading2,0,1800); ?><span id="dots">...</span><span id="more"><?php echo trim(substr($datas->heading2,180,2000));  ?>
                              </span>

                              
                           </h2>
                    
                         <ul id="productDetails" class="ab-product-header-info">
                            <li><i class="fa fa-industry" aria-hidden="true" style="color:#c00000"></i>{{$datas->cat_name}}</li>                
                  
               
                  <li> Pages : {{$datas->no_of_page}}  </li>
                  <li id="publicationDateItemId_5395374" class="publicationDateItem" data-result="Thursday, April 6, 2023"><i class="fa fa-calendar" aria-hidden="true" style="color:#c00000"></i>{{ Carbon\Carbon::parse($datas->report_post_date)->format('M Y') }}</li>
                   
                  <li>
                    <p style="margin:0px"> Report Format : &nbsp;</p>
                     <!-- <img alt="PDF Icon" src="{{asset('/assets/images/icon-PDF.webp')}}"  width="25" alt="pdf">   -->
                    <img loading="lazy" width="5" height="5" src="{{asset('assets/icons/pdf.png')}}" alt="Forbes Logo">
                    <img loading="lazy" width="5" height="5" src="{{asset('assets/icons/ppt.png')}}" alt="Forbes Logo">
                    <img loading="lazy" width="5" height="5" src="{{asset('assets/icons/xls.png')}}" alt="Forbes Logo">
                  </li>
               </ul>
                     </div>
                  </div>

                  
               </div>
               <div class="ab-product-grid box-shadow" style="margin-bottom:0rem !important;">
                <div class="ab-product-nav" style=" margin-left:-15px;margin-top: 8px;">
            <div class="ab-product-mobile-navigation ab-product-content-navigation">
               <div class="ab-product-content-navigation-label" tabindex="0"> <span class="ab-product-content-navigation-label-current">Report Details</span> <span class="ab-product-content-navigation-label-action">Jump to:</span> </div>
               <ul class="ab-product-content-navigation-links">
                  <li><a href="#product--description" class="ab-a">Description</a></li>
                  <li><a href="#product--toc" class="ab-a">Table of Contents</a></li>
                  <li><a href="#product--adaptive" class="ab-a">Companies Mentioned</a></li>
                   <li><a href="#product--faqs" class="ab-a">Frequently Asked Questions</a></li>
                  <li><a href="#product--related-products" class="ab-a current">Related Reports</a></li>
                  <li><a href="{{ url('/request-sample') }}/{{request()->segment(2)}}" class="btn btn-primary  d-inline-block max-100 color-one mt-2">
                        Request
                        Sample</a>
                  
               </ul>
            </div>
          </div>
          <article class="ab-product-content">
            
            <div id="product--description" class="ab-product-content-section">
               <!-- <h2 class="mb-2">Description</h2> -->
               <div class="ab-product-content-summary">
                 <?php echo $datas->decription; ?>
                  <br>
                  @if($infographic_image !="")
                            @php
                                $res = "";
                                $exp_arr = explode('Market', $infographic_image->img_alt_tag); 
                                $res = $exp_arr[0]."";
                                
                            @endphp
                            <?php 
                                if($res == ""){
                                   $exp_arr =  explode('Market', $datas->title); 
                                   $res = $exp_arr[0];
                                }
                            ?>
                           <a href="{{url('/infographics')}}/{{request()->segment(2)}}" target="_blank">
                              <img src="{{ asset($infographic_image->image) }}" style="width:100%" class="img-responsive"  alt="{{$datas->title}}" loading="lazy" /></a>
                              <!--  -->
                           <br>
                           @endif
                  <p><?php echo $datas->description_last; ?></p>
               </div>
               <div class="ab-product-content-text">
                  <input id="supplierId" name="supplierId" type="hidden" value="1781"> <input id="hasExecSummary" name="hasExecSummary" type="hidden" value="True">    
                  <div class="badges-details-container">
                     <span class="tooltip-info tip-fixed tip-bottom tip-left" data-badge-id="4" style="top: 410.104px; left: 271.667px; display: none;">
                        <span class="tooltip-content">
                           <span class="title">1h Free Analyst Time</span> 
                           <p>Speak directly to the analyst to clarify any post sales queries you may have.</p>
                        </span>
                     </span>
                  </div>
                  
               </div>
               <br>
            </div>
            
            <div id="product--toc" class="ab-product-content-section ab-product-content-text">
               <div id="ab-more-content-3" class="ab-more-content " data-id="3">
                  <h2>Table of Contents</h2>
                  
                  <div class="toc-list">
                     <div class="chapter-content ml-3" id="Content">
                        <p><?php echo $datas->table_of_content; ?></p>
                     </div>                  
                     
                  </div>
               </div>
            </div>
            
            <div id="product--adaptive" class="ab-product-content-section ab-product-content-text ollist">
               <div id="ab-more-content-6" class="ab-more-content ab-product-content-section-with-read-more ab-collapsed" data-id="6" style="overflow: hidden;">
                 
                  <h2>Companies Mentioned</h2>
                  <p>{!!$datas->companies_mentioned!!} </p>
                  
                  <!-- <div class="ab-read-more"><button type="button" class="ab-read-more-button ab-button ab-button-small ab-button-gray">Read more</button></div> -->
            
               </div>
            </div>
             <div id="product--faqs" class="ab-product-content-section ab-product-content-text ollist">
               <div id="ab-more-content-6" class="ab-more-content ab-product-content-section-with-read-more ab-collapsed" data-id="6" style=" overflow: hidden;">
                  <div class="accordion" id="accordionExample">
                  <h2>Frequently Asked Questions</h2>
                  <p>   <?php $faqs = json_decode($datas->faqs);  $size = count((array)$faqs->ques); ?>
                           @if($size>0)
                           @for($i=0 ; $i<$size; $i++)
                              @if($faqs->ques[$i] !="")
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                    <button class="accordion-button <?php if($i != 0 ) {echo "collapsed";} ?>" type="button" data-bs-toggle="collapse"
                                       data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                       Q. {{ $faqs->ques[$i] }} 
                                    </button>
                                 </h2>
                                 <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if($i == 0 ) {echo "show";} ?>"
                                    aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    &nbsp;&nbsp;  A. {{ $faqs->ans[$i] }} 
                                    </div>
                                 </div>
                              </div>
                              @endif
                           @endfor
                           @endif </p>
                  </div>
                  <!-- <div class="ab-read-more"><button type="button" class="ab-read-more-button ab-button ab-button-small ab-button-gray">Read more</button></div> -->
            
               </div>
            </div>
            
         </article>
             <div class="ab-product-related product-list-spacing-mobile">
            <div id="product--related-products" class="ab-product-content-section ab-product-content-related-items">
               <div class="relatedProducts">
                  <h2 class="delta mb-2">Related Reports</h2>
                  <div class="relatedProductsList">
                      @foreach($related_reports as $rep)

                     <div class="product-item-small product-item-mobile clearfix">
                        <div class="product-item-content">
                           <!-- <div class="ab-product-thumbnail-book-binder left"><img loading="lazy" class="nonGenericproductSmallImage" src="{{asset('/assets/images/global_industrial_automation_market.webp')}}" alt="Global Industrial Automation Market Size, Trends and Growth Opportunity, by Type, by Component, by End-Use Industry, by Region, Cumulative Impact Analysis and Forecast to 2030 - Product Image" width="60" height="86" >  </div> -->

                    
                           <div class="ab-product-thumbnail-book-binder left ms-2">
                           <div class="product-img-box product-img-new-box">
                                       <span class="image-report" style="color:#fff;top: 7px;left: 3px;font-size: 6px;">Report</span>
                                       <h4 class="image-title" style="color: #000;top: -9px;font-size: 9px;text-align: left;width: 66px;left: 1px;">
                                       <?php echo substr(html_entity_decode(strip_tags($rep->title)),0,45); ?></h4>                      
                                       </h4>
                                       <!-- <span class="imag-pages" style="color: #000;font-size: 8px;left: 5px;bottom: 5px;">@php echo ($rep->no_of_page) ? $rep->no_of_page : '0' @endphp pages</span> -->
                                       <span class="book-years" style="color: ;font-size: 7px;right: 17px;bottom: -1px;">{{ Carbon\Carbon::parse($rep->report_post_date)->format('M Y') }}</span>
                                    </div>
                                    <img loading="lazy" class="nonGenericproductSmallImage "src="{{asset('img/reportimg.jpg')}}" alt="<?php echo substr(html_entity_decode(strip_tags($rep->title)),0,30); ?>" >
                                 </div>
                     
                         
                           <div class="content" style="text-align: left;">
                              <h3 class="title"><a href="{{url('report-store')}}/{{$rep->page_url}}" > {{ $rep->title}}</a></h3>
                             
                         <ul class="product-item-list">
                           <li> Pages : {{$rep->no_of_page}}  </li>
                            <li id="publicationDateItemId_5395374" class="publicationDateItem" data-result="Thursday, April 6, 2023"><i class="fa fa-calendar" aria-hidden="true" style="color:#c00000"></i> {{ Carbon\Carbon::parse($rep->report_post_date)->format('M Y') }}</li>
                   
                          <li>
                    Report Format : &nbsp;
                     <!-- <img alt="PDF Icon" src="{{asset('/assets/images/icon-PDF.webp')}}"  width="25" alt="pdf">   -->
                    <img loading="lazy" width="15" height="15" src="{{asset('assets/icons/pdf.png')}}" alt="Forbes Logo">
                    <img loading="lazy" width="15" height="15" src="{{asset('assets/icons/ppt.png')}}" alt="Forbes Logo">
                    <img loading="lazy" width="15" height="15" src="{{asset('assets/icons/xls.png')}}" alt="Forbes Logo">
                  </li>
                  
               </ul>
                           </div>
                          
                        </div>
                        <div class="product-item-price-container">
                           <span class="from">From</span>   
                           <div class="standard-price-id">
                              <input type="hidden" class="defaultCurrencyId" value="2">  <input type="hidden" class="defaultPrice" value="3450.00000000000000">  
                              <div class="product-item-price"><span class="dynPrice" style=""><span class="currency-1"  content="3396">€</span><span class="currency-2" style="" content="3450">USD {{$rep->single_licence_price}}</span><span content="USD" style="display: none;">USD</span><span class="currency-3" style="display: none" content="2945">£2,926</span><span content="GBP" style="display: none;">GBP</span></span></div>
                           </div>
                        </div>
                     </div>
                        @endforeach
                  </div>
               </div>
            </div>
         </div>
              </div> 
            
            </div>
            <div class="col-md-3 sm-100 ">
               <div class="right-sidebar when-scroll">
                   <h6 class="fw-600 blue-title-bg text-center">PURCHASE OPTIONS <i class="fa fa-info-circle"></i></h6>
                  <div class=" side">

                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class=" single_user_license" name="price_type" type="radio" value="<?php  echo ($datas->special_single_licence_price !='') ? $datas->special_single_licence_price.'-single_licence_price' : $datas->single_licence_price.'-single_licence_price' ?> " id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                           Single User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format without printing rights. It is advised for a
                              single user.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($datas->special_single_licence_price !='' )
                              <s> USD  {{$datas->single_licence_price}} </s> <br> {{'USD ' .$datas->special_single_licence_price}} 
                              
                              @else 
                              USD  {{$datas->single_licence_price}}
                           @endif   
                        </p>
                     </div>
                  </div>

                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class="" type="radio" value="<?php echo ($datas->special_multi_user_price !='') ? $datas->special_multi_user_price.'-multi_user_price' : $datas->multi_user_price.'-multi_user_price' ?> " id="flexCheckDefault" name="price_type">
                        <label class="form-check-label" for="flexCheckDefault">
                           Multi User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format with printing rights. It is advised for up
                              to five users.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($datas->special_multi_user_price !='' )
                              <s> USD  {{$datas->multi_user_price}} </s> <br> {{'USD ' .$datas->special_multi_user_price}} 
                              
                              @else 
                              USD  {{$datas->multi_user_price}}
                           @endif
                        </p>
                     </div>
                  </div>


                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class="" type="radio" value="<?php echo ($datas->special_custom_report_price !='') ? $datas->special_custom_report_price.'-custom_report_price' : $datas->custom_report_price.'-custom_report_price' ?> " id="flexCheckDefault" name="price_type">
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
                           @if($datas->special_custom_report_price !='' )
                              <s> USD  {{$datas->custom_report_price}} </s> <br> {{'USD ' .$datas->special_custom_report_price}} 
                              
                              @else 
                              USD  {{$datas->custom_report_price}}
                           @endif
                        </p>
                     </div>
                  </div>   
               </div>
                <input type="hidden" name="idH" value="{{$datas->id}}" id="idH" />
                  <div class="">
                     <button type="button" class="addtocart  max-100" onclick="add_to_cart()"><i class="fa"> </i> ADD TO BASKET</button>
                  </div>
                   <div class="">
                      <a href="{{ url('/request-sample') }}/{{request()->segment(2)}}" class="quote  max-100">NEED A QUOTE</a> 
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
<a href="{{ url('/request-sample') }}/{{request()->segment(2)}}"><input type="button" value="Request for Special Pricing" class="buy_now1 buy_now_3"></a>
</div>
              
               </div>

            </div>
         </div>
      </div>
      </div>
   </div>
   </section>
   <section class="ab-about-numbers ab-bg-subtle-gray">
         <div class="text-center center ram-about-brands ram-align-center" id="home-page-clients">
            <div class="mb-4 heading">
               <h2 class="beta ram-tiny-title">Few of Our Trusted Clients </h2>
            </div>
            <div class="clearfix">
               <ul class="clearfix">
                  <li><img loading="lazy" src="{{asset('assets/images/clients/3m.png')}}" alt="General_Electric" title="General_Electric"  style="margin-top: -21px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/ge.png')}}" alt="nokia" title="nokia"  style="margin-top: -26px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/pg.png')}}" alt="oppo" title="oppo" style="margin-top: -26px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/siemens.png')}}" alt="Samsung" title="Samsung"style="margin-top: -21px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/ongc.png')}}" alt="nokia" title="nokia" style="margin-top: -26px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/honeywell.png')}}" alt="oppo" title="oppo" = style="margin-top: -26px"></li>

               </ul>
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
      let id = $("#idH").val();
      
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

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
 $(document).ready(function () {
      // $('.ab-product-content-navigation-links li').click ( function(){
      //    $('.ab-product-content-navigation-links li').removeClass('current')
      //    $(this).addClass('current')
      // })
    $(window).scroll(function () {
        var scrollPosition = $(window).scrollTop();

        // Update active tab based on scroll position
        $('div[id^="product--"]').each(function () {
            var sectionOffset = $(this).offset().top - 30;
            console.log(sectionOffset);

            if (scrollPosition >= sectionOffset) {
                var sectionId = $(this).attr('id');
                $('a[href="#' + sectionId + '"]').parent().addClass('current').siblings().removeClass('current');
            }
        });
    });
});
</script>


@endsection

