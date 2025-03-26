@extends('layout/header')
@section('title','Upcoming Report')

@section('content')



<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">Services</h1>
         </div>
      </div>
   </div>
</section>

<section class="main-content mb-5 mt-5">
   <div class="container">
      <div class="row">

         <div class="col-md-12 mb-25">
            <h4 class="fw-800 mb-4">Services</h4>
         </div>

      </div>

      <div class="row infographics">
      @foreach($services as $service)
         <div class="col-md-3">
            <div class="info-box box-shadow">
               <a href="javascript:void()" class="black">
                  <div class="info-img pb-2">
                     <img src="{{url('public/')}}/{{$service->services_image}}" class="img-fluid" alt="{{$service->service_name}}">
                  </div>
                  <div class="info-content">
                     <p class="fs-15 mb-2"><strong>{{$service->service_name}}</strong></p>
                     <p><?php echo $service->services_desc; ?></p>
                     <p class="mb-0">
                        <button name="enquiry" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalService" style="cursor:pointer">Enquiry Now</button>
                     </p>
                  </div>
               </a>
            </div>
         </div>
         
         @endforeach

      </div>
      
   </div>
</section>

<!-- Register Model -->
   
   <div class="modal fade" id="exampleModalService" tabindex="-1" aria-labelledby="exampleModalsRegisterLabel" aria-hidden="true" style="z-index:9999999999!important">
      <div class="modal-dialog">
         <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalsRegisterLabel">Enquiry Now</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="alert-success col-md-12 mb-2" id="service_msg" style="display:none;padding:10px;border-radius: 5px;">      
                     </div>
                     
                     <div class="col-md-12 mb-3">
                           <input type="text" name="first_name" id="full_name" class="form-control" placeholder="Enter Full Name*" required>
                     </div>
                     <div class="col-md-12 mb-3">
                           <input type="text" name="comp_name" id="comp_name" class="form-control" placeholder="Company name*">
                     </div>
                     <div class="col-md-12 mb-3">
                           <input type="email" name="buss_email" id="buss_email" class="form-control" placeholder="Business Email*">
                     </div>
                     <div class="col-md-12 mb-3">
                           <input type="text" name="phone_number" id="phone4" class="form-control" placeholder="Phone*">                           
                     </div>
                     <div class="col-sm-12 mb-3">
                     <select class="form-select form-control" name="industry" id="industry" style="width: 100%;">
                        <option>Select industry</option>
                        @if(count($industry) > 0)
                           @foreach($industry as $p)
                              <option value="{{$p->cat_name}}">{{$p->cat_name}}</option>
                           @endforeach
                        @endif
                     </select>
                  </div>
                     <div class="col-sm-12 mb-3">
                        <textarea
                           name="message"
                           id="message"
                           cols="30"
                           rows="2"
                           class="form-control"
                           placeholder="Message"
                           ></textarea>
                     </div>
                     <!-- <div class="col-md-12 ">
                        <p class="mb-2 fs-14">Captcha:</p>
                        <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                        <input class="form-control d-none" data-recaptcha="true"  data-error="Please complete the Captcha">
                        <div class="help-block with-errors"></div>
                     </div> -->
                     <div class="col-12">
                              <div class="captcha">
                                 <button type="button" class="btn btn-info" class="reload" id="reload">
                                       &#x21bb;
                                 </button>&nbsp;&nbsp;
                                 <span>{!! captcha_img() !!}</span>														  
                              </div>
                           </div>
                           <div class="col-12 mt-2">
                              <label class="form-label" for="form3Example4">Captcha*</label>
                              <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter Captcha" required />              
                           </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="col-md-12">
                     <button type="button" name="service_btn" class="btn btn-primary service_btn">Submit</button>
                  </div>
               </div>
         </div>
      </div>
   </div>

   
   <script>
      var input = document.querySelector("#phone4");
      window.intlTelInput(input, {
         separateDialCode: true,
         excludeCountries: ["il"],
         preferredCountries: ["in","ru", "jp", "pk", "no"]
      });
   </script>

   <script>
      $(document).ready(function() {
         $('.service_btn').on('click', function(event) {
            
            event.preventDefault();
            let full_name = $("#full_name").val();
            let comp_name = $("#comp_name").val();
            let buss_email = $("#buss_email").val();
            let phone_no = $("#phone4").val();
            let industry = $("#industry").val();
            let message = $("#message").val();
            let country_code = $(".iti__selected-dial-code option:selected").val();
            
            if(full_name == "" || comp_name == "" || buss_email == "" || phone_no == "" ){
                $("#service_msg").css('display','block')
                $("#service_msg").html('Sorry!! All Fields are required.');
            }
            else{
                $.ajax({
                      headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: '{{url("/service-query")}}',
                      type: 'post',
                      data: {"full_name":full_name, "comp_name":comp_name, "buss_email":buss_email, "phone_no":phone_no, "country_code":country_code, "industry":industry, "message":message},
                      success: function(response) {
                         window.location = "{{ url('/thankyou') }}";
                      },
                      
                });
            }
         });
      });
   </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	
	<script type="text/javascript">
      let base_url_ser = {!! json_encode(url('/')) !!};
		$('#reload').click(function () {
			$.ajax({
				type: 'GET',
				url: base_url_ser + '/reload-captcha',
				success: function (data) {
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>

@endsection

