@extends('layout/header')
@section('title','Career')
@section('content')

<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<style>
  .iti--separate-dial-code{
      width:100%!important;
  }
</style>
    <!-- mini banner end -->
 <section class="ab-about-hero ab-bg-subtle-gray ab-section">
            <div class="ab-wrapper">
               <div class="ab-row ab-row-gap-huge">
                  <div class="ab-col ab-col-desktop-6 ab-col-tablet-12" style="text-align: left;">
                        <h1 class="ab-large-title ab-color-primary">Careers</h1>
                        
                        <div class="ab-about-hero-description" style="margin-top:30px;text-align:justify">
                           <p class="ab-p" >At The Report Cube, we believe in building a team of passionate individuals who are driven by innovation, collaboration, and a commitment to excellence. If you're looking to embark on an exciting journey with a dynamic company at the forefront of market research, you've come to the right place.

                           </p>
                           <h6 class="ab-large-title2 ab-color-primary">Why Choose The Report Cube?</h6>
                           <p class="ab-p">Working with Innovation: Join our team, that values creativity and encourages out-of-the-box thinking. We help our team to push boundaries and find a new solution to complex situations.</p>

                           <p class="ab-p">Team Work: At The Report Cube, we believe in working across teams. We foster an inclusive and supportive environment where every voice is heard and valued. We're committed to helping our employees reach their full potential.</p>

                                 <h6 class="ab-large-title2 ab-color-primary">Submit Your CV</h6>
                  <p class="ab-p">Are you ready to take the next step in your career journey? We'd love to hear from you! Share your CV with us by emailing <a href='mail:hr@thereportcubes.com'> hr@thereportcubes.com</a>
          </p>
           <p class="ab-p">Join our team at The Report Cube and be a part of something remarkable. We look forward to exploring the possibilities together!

          </p>
                        </div>
                  </div>
                  <div class="ab-col ab-col-desktop-6 ab-col-tablet-12  pt-5">
                        <div class="ab-about-hero-images">
                           <div class="ab-about-hero-images-item-1 ab-about-hero-images-items"><img loading="lazy"
                                    src="{{asset('images/Picture5.png')}}" alt="Explore Your Career With The Report Cube"
                                    width="" height="" style="width:260px !important; Height:405px !important"></div>
                           
                        </div>
                  </div>
               </div>
         
            </div>
      </section>
  <!--   <section class="careercontant main-content bg-light ">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
        <div class="career">
          <h1>Careers</h1>
          <p>At The Report Cube, we believe in building a team of passionate individuals who are driven by innovation, collaboration, and a commitment to excellence. If you're looking to embark on an exciting journey with a dynamic company at the forefront of market research, you've come to the right place</p>
          <h6>Why Choose The Report Cube?</h6>
          <p>Working with Innovation: Join our team, that values creativity and encourages out-of-the-box thinking. We help our team to push boundaries and find a new solution to complex situations.Team Work: At The Report Cube, we believe in working across teams. We foster an inclusive and supportive environment where every voice is heard and valued. We're committed to helping our employees reach their full potential.</p>
        </div>
            <div class="col-md-5">
            </div>
        </div>

        <div class="col-md-12">
          <h6>Submit Your CV</h6>
          <p>Are you ready to take the next step in your career journey? We'd love to hear from you! Share your CV with us by emailing <a href="">hr@thereportcube.com</a>

        Join our team at The Report Cube and be a part of something remarkable. We look forward to exploring the possibilities together!
</p>

        </div>
        </div>
      </div>
    </section> -->

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
<script src="{{asset('/assets/js/vendors.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- custom app -->
    <script src="{{asset('/assets/js/app.js')}}"></script>
	
	<script type="text/javascript">
      let base_url_career = {!! json_encode(url('/')) !!};
		$('#reload').click(function () {
			$.ajax({
				type: 'GET',
				url: base_url_career + '/reload-captcha',
				success: function (data) {
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>

@endsection