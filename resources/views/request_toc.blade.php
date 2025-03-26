@extends('layout/header')
@section('title','Upcoming Report')
@section('content')
<style>
   #more {display: none;}
   #Content li:before {
      content: "";
   }
</style>


<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">Market Research Reports</h1>
         </div>
      </div>
   </div>
</section>
<!-- mini banner end -->
<section class="main-content mb-5 mt-5">
   <div class="container">
      <div class="row">
         <div class="col-md-9 sm-100">
            @if(isset($datas))
            
            <div class="box-shadow">
               <div class="row mb-3 category-box">
                  <div class=" col-md-3">
                     <img src="{{url('public/img/market_research_consulting.webp')}}" class="img-fluid" alt="">
                  </div>
                  <div class="col-md-9">
                     <a class="fw-600 d-block blue pb-2">{{($datas->title !='') ? $datas->title : "" }}</a>
                        <p class="fs-14 mb-2">
                           <?php echo ($datas->heading2 !="") ? substr($datas->heading2,0,180) : ''; ?> 
                           <span id="dots">...</span> 
                           
                           <span id="more"> 
                              <?php echo ($datas->heading2 !="") ? substr($datas->heading2,181,2000) : "" ; ?>
                           </span>
                           <a href="javascript:void()" onclick="myFunction()" id="myBtn2" class="read-more-small-btn"> Read more</a>
                        </p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <ul class="catefory-list ps-0 mb-0">
                        <li>
                           <label><i class="fa fa-industry" aria-hidden="true"></i></label>
                           <span>
                           {{$datas->cat_name}}</span>
                        </li>
                        <li>
                           <label> <i class="fa fa-calendar" aria-hidden="true"></i></label>
                           <span>{{ ($datas->created_at !='') ? Carbon\Carbon::parse($datas->created_at)->format('M Y') : "" }}</span>
                        </li>
                        <li>
                           <label>Pages</label>
                           <span>{{ ($datas->no_of_page !='') ? $datas->no_of_page : ""}}</span>
                        </li>
                        <li>
                           <img src="{{url('public/img/new.jpg')}}" width="130" height="30">
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            
            @endif
            <div class="box-shadow">
               <ul class="nav nav-tabs tab-area when-scroll upcomming-report" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a href="{{url('report-store')}}/{{$datas->page_url}}"><button class="nav-link " 
                        >Overview</button></a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a href="{{url('query/request-toc')}}/{{request()->segment(3)}}"><button class="nav-link active"  >Request TOC/
                     Proposal</button></a>
                  </li>
               </ul>
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade " id="Overview" role="tabpanel"
                     aria-labelledby="Overview-tab">
                     <div class="tabs-content">
                        <?php echo $datas->decription ; ?>
                       
                     </div>
                  </div>
                  <div class="tab-pane fade show active" id="Content" role="tabpanel" aria-labelledby="Content-tab">
                     <div class="p-4">
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
                        <form action="{{ url('request-toc') }}" method="post">
                        @csrf
                        <input type="hidden" name="request_title" value="{{$datas->title}}" />
                           <div class="mb-3">
                              <p class="mb-2 fs-14">Full Name*:</p>
                              <input type="text" name="full_name" class="form-control" placeholder="Enter Your Name">
                           </div>
                           <div class="mb-3">
                              <p class="mb-2 fs-14">Company Name*:</p>
                              <input type="text" name="company_name" class="form-control" placeholder="Enter your company name">
                           </div>
                           <div class="mb-3">
                              <p class="mb-2 fs-14">Business Email*:</p>
                              <input type="email" name="busniess_email" class="form-control" placeholder="Enter your business email">
                           </div>
                           <div class="mb-3">
                              <p class="mb-2 fs-14">Contact Number*:</p>
                              <input type="text" name="contact_number" class="form-control" id="phone_upcoming" placeholder="Phone Number">
                           </div>
                           <div class="mb-3">
                              <p class="mb-2 fs-14">Message:</p>
                              <textarea name="message" id="" cols="30" rows="4" class="form-control"
                                 placeholder="Type your message here..."></textarea>
                           </div>

                           <!-- <div class="mb-3">
                              <p class="mb-2 fs-14">Captcha:</p>
                              <div class="g-recaptcha" data-sitekey="6Ldncs8oAAAAAJZ7C_pvRTzTqa1RwZKNW0jfJ-Y2" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                              <input class="form-control d-none" data-recaptcha="true"  data-error="Please complete the Captcha">
                              <div class="help-block with-errors"></div>
                           </div> -->

                           <div class="col-5 mb-4">
                              <!--<div class="captcha">
                                 <button type="button" class="btn btn-info" class="reload" id="reload_toc">
                                       &#x21bb;
                                 </button>&nbsp;&nbsp;
                                 <span>{!! captcha_img() !!}</span>														  
                              </div>-->
                              <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                           </div>
                           <div class="col-12">
                              <!-- <label class="form-label" for="form3Example4">Captcha*</label> -->
                              <!--<input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter Captcha" required />              
                           </div>
                           @if ($errors->has('captcha'))
                              <span class="text-danger">
                                    <strong>{{ $errors->first('captcha') }}</strong>
                              </span>
                           @endif-->
                           @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                           </div>
                           <div class="text-center pt-4">
                              <button type="submit" class="btns btn-primary">Submit Request</button>
                           </div>
                           <input type="hidden" name="country_name" id="country-name"  value="United States" />
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 sm-100 ">
            <div class="right-sidebar when-scroll">
               <div class="box-shadow ">
                  <h6 class="fw-600 blue-title-bg">Place an order</h6>

                  <div class="d-flex justify-content-between orders fs-14 mb-3">
                     <div class="form-check">
                        <input class="form-check-input excel_data_pack" type="radio" value="{{$datas->excel_data_pack.'-excel_data_pack'}}" id="flexCheckDefault" checked name="price_type" >
                        <label class="form-check-label" for="flexCheckDefault">
                           Excel Data Pack
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext"> 
                              Only market data will be provided in the excel spreadsheet.<span
                                 class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">USD {{$datas->excel_data_pack}}</p>
                     </div>
                  </div>

                  <div class="d-flex justify-content-between orders fs-14 mb-3">
                     <div class="form-check">
                        <input class="form-check-input single_user_license" name="price_type" type="radio" value="{{$datas->single_licence_price.'-single_licence_price'}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                           Single User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext"> 
                              The report will be delivered in PDF format without printing rights. It is advised for a
                              single user.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">USD {{$datas->single_licence_price}}</p>
                     </div>
                  </div>

                  <div class="d-flex justify-content-between orders fs-14 mb-3">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{$datas->multi_user_price.'-multi_user_price'}}" id="flexCheckDefault" name="price_type">
                        <label class="form-check-label" for="flexCheckDefault">
                           Multi User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext"> 
                              The report will be delivered in PDF format with printing rights. It is advised for up
                              to five users.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">USD {{$datas->multi_user_price}}</p>
                     </div>
                  </div>


                  <div class="d-flex justify-content-between orders fs-14 mb-3">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{$datas->custom_report_price.'-custom_report_price'}} " id="flexCheckDefault" name="price_type">
                        <label class="form-check-label" for="flexCheckDefault">
                           Enterprise License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext"> 
                              The report will be delivered in PDF format with printing rights and excel sheet. It is
                              advised for companies where multiple users would like to access the report from
                              multiple locations<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">USD {{$datas->custom_report_price}}</p>
                     </div>
                  </div>

                  <input type="hidden" name="idH" value="{{$datas->id}}" id="idH" />

                  <button type="button" class="btn btn-primary small-btn max-100" onclick="add_to_cart()">Buy Now</button>
               </div>
               <div class="btn-groups">
                  <a href="{{ url('query/request-toc') }}/{{request()->segment(3)}}" class="btn btn-primary small-btn d-inline-block max-100 color-one"><i
                     class="fa fa-hand-pointer" aria-hidden="true"></i>
                  Request
                  Sample</a>
                  <a href="{{ url('query/request-toc') }}/{{request()->segment(3)}}" class="btn btn-primary small-btn d-inline-block max-100 color-two"><i
                     class="fa fa-hand-pointer" aria-hidden="true"></i> Talk to our Consultant</a>
                  <a href="{{ url('query/request-toc') }}/{{request()->segment(3)}}" class="btn btn-primary small-btn d-inline-block max-100 color-three"><i
                     class="fa fa-hand-pointer" aria-hidden="true"></i> Request Customization</a>
               </div>
               <!-- <div class="box-shadow">
                  <h6 class="fw-600 blue-title-bg">Related Reports</h6>
                  <ul class="mb-0 ps-0 related-report">
                     @foreach($related_reports as $rep)
                        <li class="list-unstyled fs-14 pb-2">
                           <a href="{{url('report-store')}}/{{$rep->page_url}}"><i class="fa fa-handshake" aria-hidden="true"></i> {{ $rep->title}} </a>
                        </li>
                     @endforeach
                  </ul>
               </div> -->

               <div class="box-shadow">
                  <h6 class="fw-600 blue-title-bg">Why Choose Us</h6>
                  <ul class="mb-0 ps-0 related-report">
                     
                        <li class="list-unstyled fs-14 pb-2">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Free 20% Customization
                        </li>
                        <li class="list-unstyled fs-14 pb-2">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Pool of Best Industry Minds
                        </li>
                        <li class="list-unstyled fs-14 pb-2">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Knowledge Partner to Fortune Brands
                        </li>
                        <li class="list-unstyled fs-14 pb-2">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Real-Time Client Support
                        </li>
                        <li class="list-unstyled fs-14 pb-2">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Comprehensive Insights on Niche Areas
                        </li>
                     
                  </ul>
               </div> 

            </div>
         </div>
      </div>
   </div>
</section>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{url('public/js/intlTelInput.min.js')}}"></script>
<script>
   var input = document.querySelector("#phone_upcoming");
   input.setAttribute('placeholder', ' ');
   const countryNameElement = document.querySelector("#country-name");
   const iti = window.intlTelInput(input, {
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      separateDialCode: true,
      initialCountry: "US",
   });
   
 
   function updateCountryName() {
      const selectedCountryData = iti.getSelectedCountryData();
      //const selectedCountryName = selectedCountryData.name;
      const selectedCountryName = selectedCountryData.name.replace(/\s*\([^)]*\)/, '');
      countryNameElement.value = selectedCountryName;
      
   }

   input.addEventListener("countrychange", updateCountryName); 
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
</script>

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
      dataType: "text",
      success: function(response){
         //location.reload(true)
         window.location = "{{ url('/cart') }}";
      }
   }); 

}
</script>
<!-- plugins -->
<script src="{{url('public/assets/js/vendors.js')}}"></script>


    <!-- custom app -->
    <script src="{{url('public/assets/js/app.js')}}"></script>
	
	<script type="text/javascript">
      let base_url_toc = {!! json_encode(url('/')) !!};
		$('#reload_toc').click(function () {
			$.ajax({
				type: 'GET',
				url: base_url_toc + '/reload-captcha',
				success: function (data) {
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>
@endsection