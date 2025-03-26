@extends('layout/header')
@section('title','Thankyou')
@section('content')

<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
         <h1 class="mb-0 mini-banner-title">Thank You</h1>
         </div>
      </div>
   </div>
</section>

<section class="">
   <div class="container mt-5 mb-5">
      <div class="row box-shadow px-4">
      
         <div class="col-md-12 text-center">
            <div class="card px-2 py-3 mb-4 mt-4">
               <h2 class="fw-800 mb-4">Payment Cancel</h2>
                <p class="ms-2">
                     Payment has been canceled, try again.
                </p>
               <div class="col-md-12 "><a href="{{url('/')}}" class="">Go back to Home Page</a> </div>
               
            </div>
         </div>

         
         
      </div>

      

   </div>
   </section>

@endsection