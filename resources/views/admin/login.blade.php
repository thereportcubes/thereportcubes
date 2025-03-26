<!DOCTYPE html>
<html lang="en">

<head>
    <title>R cube - Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc.">
    <meta name="author" content="Potenza Global Solutions">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon_new.ico')}}">
    <!-- google fonts -->
    <link href="../../css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors.css')}}">
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{asset('assets/img/loader/loader.svg')}}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h2 class="mb-2">R cube Admin Login</h2>
                                        <p>Welcome back, please login to your account.</p>
										
										@if ($errors->any())
										  <div class="alert alert-danger">
											  <ul>
												  @foreach ($errors->all() as $error)
												  <li>{{ $error }}</li>
												  @endforeach
											  </ul>
										  </div><br />
										@endif
		  
                                        @if(session()->has('error'))
                                        <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                            <strong>Error!</strong> {{ session()->get('error') }}
                                        </div>
                                        @endif
                                        

                                        <form action="{{ route('login_form') }}" class="mt-3 mt-sm-5" method="POST" >

                                        
                                        
											@csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">User Name*</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter Username" required >
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                                    </div>
                                                </div>
											<div class="col-12">
                                                    <!--<div class="captcha">
                                                        <button type="button" class="btn btn-info" class="reload" id="reload">
                                                              &#x21bb;
                                                        </button>&nbsp;&nbsp;
                                                        <span>{!! captcha_img() !!}</span>                                                        
                                                    </div>-->
                                                   <!-- <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                                                </div>
                                                <div class="col-12 mt-2">-->
                                                    <!--<label class="form-label" for="form3Example4">Captcha*</label>
                                                    <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter Captcha" required />   -->
                                                  <!--   @if ($errors->has('g-recaptcha-response'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif-->
                                                <div class="cf-turnstile"
     data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}"
     data-callback="onTurnstileSuccess"
></div>
                                                </div>
			
                                                <div class="col-12 mt-3">
                                                    <button type="submit" value="login_form()" class="btn btn-primary">Sign In</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="{{asset('/assets/img/bg/login.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

    <!-- plugins -->
    <script src="{{asset('assets/js/vendors.js')}}"></script>

    <!-- custom app -->
    <script src="{{asset('assets/js/app.js')}}"></script>
	
	<script type="text/javascript">
		$('#reload').click(function () {
			$.ajax({
				type: 'GET',
				url: 'reload-captcha',
				success: function (data) {
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>	
</body>

</html>