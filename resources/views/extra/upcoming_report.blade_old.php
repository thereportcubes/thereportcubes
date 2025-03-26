@extends('layout/header')
@section('title','Upcoming Report')

@section('content')

<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">Upcomming Report</h1>
         </div>
      </div>
   </div>
</section>

<section class="main-content gray-bg-light pt-5 pb-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12 sm-100">
               <div class="box-shadow white-bg">
                  <div class="row align-items-center mb-3 category-box">
                     <div class="col-md-2">
                        <img src="{{url('public/img/Aerospace.jpg')}}" class="img-fluid" alt="">
                     </div>
                     <div class="col-md-10">
                        <a href="{{url('upcoming-report')}}/1" class="fw-600 d-block blue">Global Drone Inspection and Monitoring Market Research
                           Report: Forecast (2023-2028)</a>
                        <p class="fs-14 mb-2">The use of unmanned aerial vehicles, also called drones, equipped with
                           sensors, cameras, and other advanced technologies to inspect & monitor numerous assets,
                           areas, and structures is referred to as drone Inspection and Monitoring... <span
                              class="read-more">
                              <a href="{{url('upcoming-report')}}/1" class="read-more-small-btn">Read
                                 more</a>
                           </span></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="catefory-list ps-0 mb-0">
                           <li>
                              <label><i class="fa fa-industry" aria-hidden="true"></i></label>
                              <span>
                                 Aerospace &amp; Defense</span>
                           </li>
                           <li>
                              <label> <i class="fa fa-calendar" aria-hidden="true"></i></label>
                              <span>Aug 2023</span>
                           </li>
                           <li>
                              <label>Pages</label>
                              <span>193</span>
                           </li>
                           <li>
                              <label>Report Code</label>
                              <span>AD22016</span>
                           </li>
                           <li>
                              <label>USD</label>
                              <span>5,200</span>
                           </li>
                           <li class="last">
                              <div class="add-carts">
                                 <!-- <a href="#" data-toggle="modal" data-target="#placeorder"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Cart</a> -->
                                 <a class="cart-btn" href="{{url('add-to-cart/25')}}" onclick="priceModal('1539')"><i class="fa fa-cart-plus"
                                       aria-hidden="true"></i> Add Cart</a>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>

               <div class="box-shadow white-bg">
                  <div class="row align-items-center mb-3 category-box">
                     <div class=" col-md-2">
                        <img src="{{url('public/img/Aerospace.jpg')}}" class="img-fluid" alt="">
                     </div>
                     <div class="col-md-10">
                        <a href="{{url('upcoming-report')}}/1" class="fw-600 d-block blue">Global Drone Inspection and Monitoring Market Research
                           Report: Forecast (2023-2028)</a>
                        <p class="fs-14 mb-2">The use of unmanned aerial vehicles, also called drones, equipped with
                           sensors, cameras, and other advanced technologies to inspect & monitor numerous assets,
                           areas, and structures is referred to as drone Inspection and Monitoring... <span
                              class="read-more">
                              <a href="{{url('upcoming-report')}}/1" class="read-more-small-btn">Read
                                 more</a>
                           </span></p>
                     </div>


                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <ul class="catefory-list ps-0 mb-0">
                           <li>
                              <label><i class="fa fa-industry" aria-hidden="true"></i></label>
                              <span>
                                 Aerospace &amp; Defense</span>
                           </li>
                           <li>
                              <label> <i class="fa fa-calendar" aria-hidden="true"></i></label>
                              <span>Aug 2023</span>
                           </li>
                           <li>
                              <label>Pages</label>
                              <span>193</span>
                           </li>
                           <li>
                              <label>Report Code</label>
                              <span>AD22016</span>
                           </li>
                           <li>
                              <label>USD</label>
                              <span>5,200</span>
                           </li>
                           <li class="last">
                              <div class="add-carts">
                                 <!-- <a href="#" data-toggle="modal" data-target="#placeorder"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add Cart</a> -->
                                 <a class="cart-btn" href="{{url('add-to-cart/24')}}" onclick="priceModal('1539')"><i class="fa fa-cart-plus"
                                       aria-hidden="true"></i> Add Cart</a>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>


            </div>

         </div>
         <div class="row">
            <div class="col-md-12">
               <nav aria-label="Page navigation example">
                  <ul class="pagination mb-0">
                     <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                     <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </section>

@endsection

