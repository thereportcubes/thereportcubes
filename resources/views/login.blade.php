<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="https://thereportcube.com/uploads/ez_logo.png" type="image/png" sizes="16x16">
	<title>Cellecor | Log in</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/dist/css/adminlte.min.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="hold-transition login-page">
	<div class="login-box">

		<div class="login-logo">
			<a href="{{url('/login')}}"><img style="height:100px;width: auto;" src="{{asset('/assets/images/logo.png')}}"></a>
		</div>

		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h1"><b>RCUBE</b> Admin</a>
			</div>
			<div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

				<form role="form" method="POST" action="{{ route('login_form') }}">
                    @csrf
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email" name="email" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
                    <div class="input-group mb-3">
                        <div class="captcha">
                            <button type="button" class="btn btn-info" class="reload" id="reload">
                                &#x21bb;
                            </button>&nbsp;&nbsp;
                            <span>{!! captcha_img() !!}</span>
                            
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Captcha" required />
                        <div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user-secret"></span>
							</div>
						</div>
                    </div>

					<div class="row">
						
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-danger btn-block" >Sign In</button>
						</div>
						<!-- /.col -->
					</div>
					
				</form>
				
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
    
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

</body>

</html>