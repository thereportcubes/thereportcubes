@extends('layout/header')
@section('title','Not Found')
@section('content')

<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">404 Page</h1>
         </div>
      </div>
   </div>
</section>

<section>
      <div class="container mt-5" >
       <div class="row ">
            <div class="text-center mt-4 mb-4">
                <h1>Page Not Found</h1>
                <p>Sorry, the page you are looking for could not be found.</p>
                <a href="{{url('contact-us')}}"><button class="btn btn-info">Contact-us</button></a>
            </div>
       </div>
      </div>
   </section>
@endsection