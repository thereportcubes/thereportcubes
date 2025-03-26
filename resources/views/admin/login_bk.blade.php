
<section class="vh-100">
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MarkNtel Advisors</title>
  <!--~~~~~~~~~~~~~FontAwesome CDN Link~~~~~~~~~~~~-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--~~~~~~~bootstrap css link~~~~~~~-->
  <link rel="stylesheet" href="{{url('public/dist/css/bootstrap.min.css')}}">

  <!--~~~~~~~custom css link~~~~~~~-->
  <link rel="stylesheet" href="{{url('public/dist/css/style.css')}}">

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{URL::asset('public/dist/img/login-img.PNG')}}"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form method="POST" action="{{ route('login_form') }}">
        @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">MarkNtel Advisors Admin Login</p>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0"></p>
          </div>

          @if(session()->has('success'))
            <div class="alert alert-success">
              <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                <strong>Warning!</strong> {{ session()->get('error') }}
            </div>
        @endif
        <br>
        
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-lg-start mt-4 pt-2">
          <button type="submit" value="login_form()" class="btn btn-primary">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger">Register</a></p>
          </div>

        </form>
</section>

