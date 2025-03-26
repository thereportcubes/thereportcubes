@extends('layout/header')
@section('title','Blog Details')
@section('content')
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<section class="mini-banner-blogs">
<div class="container">
      <div class="row">
         <div class="col-md-12 mb-4">
         <h1 class="mb-0 mini-banner-title"></h1>
         </div>
      </div>
   </div>
</section>

<div class="container mt-5 mb-5">
    <div class="row ">
        <div class="col-lg-8">
            <div class="box-shadow p-0">
               <h6 class="fw-600 blue-title-bg mb-3">Blogs Details</h6>
               <div class="discrip-s">                   
                  <div class="pressdiscrip-s p-3">
                     <div class="blog-titile">
                        <h6>{{$blog->title}}</h6>
                        <span>
                           <b>
                              <span style="color:#156aab;">Published Date: </span> <span style="color:#fd7a06;">{{ Carbon\Carbon::parse($blog->created_at)->format('d M Y ') }}</span>
                           </b>
                        </span>
                     </div>
                     <p><?php echo $blog->description; ?></p>
                  </div>
               </div>
            </div>
        </div>
         <div class="col-lg-4 mb-2">
            <div class="box-shadow p-0">
               
               
                  <h4 class="fw-600 blue-title-bg mb-3 text-center">Request Sample</h4>

                  @if(session()->has('success'))
                     <div class="p-3">
                        <div class="alert-success " style="padding:18px;border-radius: 5px;">
                           <strong>Success!</strong> {{ session()->get('success') }}
                        </div>
                     </div>
                  
                  @endif
                  @if(session()->has('error'))
                     <div class="p-3">
                        <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                           <strong>Warning!</strong> {{ session()->get('error') }}
                        </div>
                     </div>
                 
                  @endif
                  <form action="{{url('save-blog-request')}}" method="post" class="p-3">
                     @csrf
                     <input type hidden name="request_title" value="{{$blog->title}}" />
                     <div class="col-sm-12 mb-3">
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="Enter your Name*" required>
                     </div>
                     <div class="col-sm-12 mb-3">
                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control" placeholder="Enter your company name" required>
                     </div>

                     <div class="col-sm-12 mb-3">
                        <input type="email" name="busniess_email" value="{{ old('busniess_email') }}" class="form-control" placeholder="Enter your business email*" required> 
                     </div>
                     <div class="col-sm-12 mb-3">
                        <input  name="contact_number" value="{{ old('contact_number') }}" type="text" id="phone" class="form-control" required />
                     </div>
                     <div class="col-sm-12 mb-3">
                        <textarea name="message" id="" cols="30" rows="4" class="form-control"
                           placeholder="Type your message here...">{{ old('message') }}</textarea>
                     </div>
                     <!-- <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Ldncs8oAAAAAJZ7C_pvRTzTqa1RwZKNW0jfJ-Y2" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                        <input class="d-none" data-recaptcha="true" data-error="Please complete the Captcha" name="verify_captcha">
                        <div class="help-block with-errors"></div>
                     </div> -->
                     <div class="col-12">
                        <!--<div class="captcha">
                           <button type="button" class="btn btn-info" class="reload" id="reload">
                                 &#x21bb;
                           </button>&nbsp;&nbsp;
                           <span>{!! captcha_img() !!}</span>														  
                        </div>-->
                               <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                     </div>
                     <div class="col-12 mt-2">
                       <!-- <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter Captcha" required maxlength="5"  />              
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

                     <div class="form-group"><button class="read-more-btn px-4 py-2 text-white mt-3" type="submit" >Submit</button></div>
                     <input type="hidden" name="country_name" id="country-name"  value="United States" />
                  </form>
            </div>
         </div>
    </div>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{url('public/js/intlTelInput.min.js')}}"></script>
<script>
   var input = document.querySelector("#phone");
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

<!-- plugins -->
<script src="{{url('public/assets/js/vendors.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- custom app -->
    <script src="{{url('public/assets/js/app.js')}}"></script>
	
	<script type="text/javascript">
      let base_url_blog = {!! json_encode(url('/')) !!};
		$('#reload').click(function () {
			$.ajax({
				type: 'GET',
				url: base_url_blog + '/reload-captcha',
				success: function (data) {
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>
   
@endsection