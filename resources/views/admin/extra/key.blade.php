
@extends('admin/header')
@section('title','Key')
@section('content')
@php

$list = \DB::table('keys')->select('*')->orderBy('id','desc')->first();
$rep = \DB::table('repchas')->select('*')->orderBy('id','desc')->first();
$number = \DB::table('numbers')->select('*')->orderBy('id','desc')->first();
$mail = \DB::table('mail_config')->select('*')->orderBy('id','desc')->first();
$sms = \DB::table('sms_config')->select('*')->orderBy('id','desc')->first();

@endphp
<style>
         .payment--gateway-img img {
         width: 100%;
         height: 24px;
         -o-object-fit: contain;
         object-fit: contain;
         }
      </style>
  
               <!-- begin app-main -->
               <div class="app-main" id="main">
                  <!-- begin container-fluid -->
                  <div class="container-fluid">
                     <!-- begin row -->
                     <div class="row">
                        <div class="col-md-12 m-b-30">
                           <!-- begin page title -->
                           <div class="d-block d-sm-flex flex-nowrap align-items-center">
                              <div class="page-title mb-2 mb-sm-0">
                                 <h1>Keys </h1>
                              </div>
                              <div class="ml-auto d-flex align-items-center">
                                 <nav>
                                    <ol class="breadcrumb p-0 m-b-0">
                                       <li class="breadcrumb-item">
                                          <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                                       </li>
                                       <li class="breadcrumb-item">
                                          Dashboard
                                       </li>
                                       <li class="breadcrumb-item active text-primary" aria-current="page">Keys </li>
                                    </ol>
                                 </nav>
                              </div>
                           </div>
                           <!-- end page title -->
                        </div>
                     </div>
                     <!-- end row -->
                     <!-- start Tabs contant -->
                     <div class="row tabs-contant">
                        <div class="col-xxl-6">
                           <div class="card card-statistics">
                              <div class="card-header">
                                 <div class="card-heading">
                                    <h4 class="card-title">Keys </h4>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="tab nav-border-bottom">
                                    <ul class="nav nav-tabs" role="tablist">
                                       <li class="nav-item">
                                          <a class="nav-link active show" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="true">Payment Methods</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" id="sml-tab" data-toggle="tab" href="#sml" role="tab" aria-controls="sml" aria-selected="false">Social Media Login</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" id="mai-config-tab" data-toggle="tab" href="#mai-config" role="tab" aria-controls="mai-config" aria-selected="false">Mail Config </a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" id="sms-tab" data-toggle="tab" href="#sms" role="tab" aria-controls="sms" aria-selected="false">SMS Config </a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" id="google-map-tab" data-toggle="tab" href="#google-map" role="tab" aria-controls="google-map" aria-selected="false">Google Map APIs </a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" id="captcha-tab" data-toggle="tab" href="#captcha" role="tab" aria-controls="captcha" aria-selected="false">
                                          Recaptcha</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" id="push-tab" data-toggle="tab" href="#push" role="tab" aria-controls="push" aria-selected="false">
                                          Push Notification</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="false">
                                          Chat</a>
                                       </li>
                                    </ul>
                                    <div class="tab-content">
                                       <div class="tab-pane fade py-3 active show" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                                          <div class="row">
                                             <div class="col-md-5">
                                                <div class="card">
                                                   <div class="card-body">
                                                      <h5 class="text-uppercase mb-3">Payment Method</h5>
                                                      <form action="" method="post">
                                                      @csrf
                                                                             
                                                         <div class="form-group">
                                                            <label class="form-label text--title">
                                                            <strong>Cash on delivery</strong>
                                                            </label>
                                                         </div>
                                                         <div class="d-flex flex-wrap mb-4">
                                                            <div class="form-check mr-4">
                                                               <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                                                               <label class="form-check-label" for="gridRadios1">
                                                               Active
                                                               </label>
                                                            </div>
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                                                               <label class="form-check-label" for="gridRadios1">
                                                               Inactive
                                                               </label>
                                                            </div>
                                                         </div>
                                                         <div class="text-right">
                                                            <button type="submit" class="btn btn-primary px-5">Update</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-5">
                                                <div class="card">
                                                   <div class="card-body">
                                                   @if(session()->has('success_paypal'))
                                                      <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                                      <strong>Success!</strong> {{ session()->get('success_paypal') }}
                                                      </div>
                                                   @endif
                                                   @if(session()->has('error'))
                                                      <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                                         <strong>Warning!</strong> {{ session()->get('error') }}
                                                      </div>
                                                   @endif 

                                                <form action=" {{route('TRC/11/paypal_key')}}" method="post" >
                                                     @csrf                                                   
                                                         <h5 class="d-flex flex-wrap justify-content-between">
                                                            <span class="text-uppercase">Paypal</span>
                                                            <div class="form-group">
                                                               <div class="checkbox checbox-switch switch-success">
                                                                  <label>
                                                                  <input type="checkbox" name="switch8" checked="">
                                                                  <span></span>
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </h5>
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" name="client_id" value="{{$list2->client_id}}" placeholder="Paypal Client Id">
                                                         </div>
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" name="api_key" value="{{$list2->api_key}}" placeholder="Paypalsecret">
                                                         </div>
                                                         <div class="text-right">
                                                            <button type="submit" onclick="" class="btn btn-primary px-5">Update</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade py-3" id="sml" role="tabpanel" aria-labelledby="sml-tab">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="card">
                                                   <div class="card-body">
                                                      <div class="sml d-flex align-items-center justify-content-between"
                                                         >
                                                         <div><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-facebook"><i class="fa fa-facebook"></i></a></div>
                                                         <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            </label>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="card">
                                                   <div class="card-body">
                                                      <div class="sml d-flex align-items-center justify-content-between"
                                                         >
                                                         <div><a href="javascript:void(0)" class="btn btn-social btn-social-lg bg-googleplus"><i class="fa fa-google"></i></a></div>
                                                         <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            </label>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade py-3" id="mai-config" role="tabpanel" aria-labelledby="mai-config-tab">
                                          <div class="row gx-2 gx-lg-3">
                                             <div class="col-xl-8">
                                                <div class="card mb-3">
                                                   <div class="card-body">
                                                      <div class="position-relative">
                                                         <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                         <i class="tio-email-outlined"></i>
                                                         Test your email integration
                                                         </button>
                                                         <div class="fixed--to-right">
                                                            <i class="tio-telegram float-right"></i>
                                                         </div>
                                                      </div>
                                                      <div class="collapse" id="collapseExample">
                                                         <form class="pt-3" action="javascript:">
                                                         @csrf
                                                            <div class="row g-2">
                                                               <div class="col-sm-8">
                                                                  <div class="form-group mb-0">
                                                                     <label for="inputPassword2" class="sr-only">Mail</label>
                                                                     <input type="email" id="test-email" class="form-control" placeholder="Ex : jhon@email.com">
                                                                  </div>
                                                               </div>
                                                               <div class="col-sm-4">
                                                                  <button type="button" onclick="send_mail()" class="btn btn-primary h-100 btn-block">
                                                                  <i class="tio-telegram"></i>
                                                                  Send mail
                                                                  </button>
                                                               </div>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-12">
                                                <div class="card">
                                                   <div class="card-body">
                                                      <div class="d-flex flex-wrap">
                                                         <label class="control-label h3 mb-0 text-capitalize mr-3">Mail configuration status</label>
                                                         <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                                            <label class="form-check-label" for="defaultCheck3">
                                                            </label>
                                                         </div>
                                                      </div>
                                                      @if(session()->has('success_mail'))
                                                      <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                                      <strong>Success!</strong> {{ session()->get('success_mail') }}
                                                      </div>
                                                   @endif
                                                   @if(session()->has('error'))
                                                      <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                                         <strong>Warning!</strong> {{ session()->get('error') }}
                                                      </div>
                                                   @endif 
                                                      <form action=" {{route('TRC/11/mail')}}" method="post">
                                                         @csrf                                                    
                                                         <div class="row mt-3">
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Mailer Name</label><br>
                                                               <input type="text" placeholder="Ex : Alex" name="mailer_name" class="form-control" value="{{$mail->mailer_name}}" required="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Host</label><br>
                                                               <input type="text" class="form-control" name="host" value="{{$mail->host}}" required="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Driver</label><br>
                                                               <input type="text" class="form-control" name="driver" value="{{$mail->driver}}" required="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Port</label><br>
                                                               <input type="text" class="form-control" name="port" value="{{$mail->port}}" required="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Username</label><br>
                                                               <input type="text" placeholder="Ex : ex@yahoo.com" class="form-control" name="user_name" value="{{$mail->user_name}}" required="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Email Id</label><br>
                                                               <input type="text" placeholder="Ex : ex@yahoo.com" class="form-control" name="email_id" value="{{$mail->email_id}}" required="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Encryption</label><br>
                                                               <input type="text" placeholder="Ex : tls" class="form-control" name="encription" value="{{$mail->encription}}" required="">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                               <label class="form-label">Password</label><br>
                                                               <input type="password" class="form-control" name="password" value="{{$mail->password}}" required="">
                                                            </div>
                                                         </div>
                                                         <div class="btn--container justify-content-end">
                                                            <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                                                            <button type="submit" onclick="" class="btn btn-primary mt-2 mb-2">Update Details</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>


                                       <div class="tab-pane fade py-3" id="sms" role="tabpanel" aria-labelledby="sms-tab">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="card h-100">
                                                   <div class="card-body">
                                                   @if(session()->has('success'))
                                                      <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                                      <strong>Success!</strong> {{ session()->get('success') }}
                                                      </div>
                                                   @endif
                                                   @if(session()->has('error'))
                                                      <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                                         <strong>Warning!</strong> {{ session()->get('error') }}
                                                      </div>
                                                   @endif
                                                   <form action=" {{route('TRC/11/sms')}}" method="post" >
                                                      @csrf  
                                                      <div class="d-flex flex-wrap justify-content-between align-items-center text-uppercase mb-1">
                                                         <h5 class="text-center">Twilio sms</h5>
                                                         <div class="pl-2">
                                                            <img src="{{url('public/dist/img/twilio.png')}}" alt="public" style="height: 50px">
                                                         </div>
                                                      </div>
                                                      <span class="badge badge-soft-info mb-3 word-break">NB : #OTP# will be replace with otp</span>

                                                         <div class="d-flex flex-wrap mb-4">
                                                            <label class="form-check form--check mr-2 mr-md-4">
                                                            <input class="form-check-input" type="radio" name="status" value="1">
                                                            <span class="form-check-label text--title pl-2">Active</span>
                                                            </label>
                                                            <label class="form-check form--check">
                                                            <input class="form-check-input" type="radio" name="status" value="0" checked="">
                                                            <span class="form-check-label text--title pl-2">Inactive</span>
                                                            </label>
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="text-capitalize">Sid</label><br>
                                                            <input type="text" class="form-control" name="s_id" value="{{$sms->s_id}}" placeholder="Ex: ACbf855229b8b2e5d02cad58e116365164">
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="text-capitalize">Messaging service sid</label><br>
                                                            <input type="text" class="form-control" name="msg_s_id" value="{{$sms->msg_s_id}}" placeholder="Ex: ACbf855229b8b2e5d02cad58e116365164">
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="form-label">Token</label><br>
                                                            <input type="text" class="form-control" name="token" value="{{$sms->token}}" placeholder="Ex: ACbf855229b8b2e5d02cad58e116365164">
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="form-label">From</label><br>
                                                            <input type="text" class="form-control" name="from" value="{{$sms->from}}" placeholder="Ex: +91-46482373636">
                                                         </div>
                                                         <div class="form-group">
                                                            <label class="form-label">Otp template</label><br>
                                                            <input type="text" class="form-control" name="otp_template" value="{{$sms->otp_template}}" placeholder="Ex : Your OTP is #otp#">
                                                         </div>
                                                         <div class="text-right">
                                                            <button type="submit" onclick="" class="btn btn-primary px-lg-5">Update</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>


                                       <div class="tab-pane fade py-3" id="google-map" role="tabpanel" aria-labelledby="google-map-tab">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="card">
                                                   <div class="card-body">

                                                            @if(session()->has('success_map'))
                                                               <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                                               <strong>Success!</strong> {{ session()->get('success_map') }}
                                                               </div>
                                                            @endif
                                                            @if(session()->has('error'))
                                                               <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                                                  <strong>Warning!</strong> {{ session()->get('error') }}
                                                               </div>
                                                            @endif 

                                                         <form action=" {{route('TRC/11/add_key')}}" method="post" >
                                                            @csrf 
                                                                                                  
                                                                  <div class="form-group">
                                                                     <label class="form-label">Map api Key</label>
                                                                     <textarea name="api_key" required class="form-control">{{@$list->api_key}}</textarea>
                                                                  </div>
                                                                  <div class="btn--container justify-content-end">
                                                                     <!-- <button class="btn btn-danger" type="reset">Reset</button> -->
                                                                     <button type="submit" onclick="" class="btn btn-primary">Update Key</button>
                                                                  </div>
                                                          </form>
                                                   </div> 
                                                </div>
                                        
                                                 </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade py-3" id="captcha" role="tabpanel" aria-labelledby="captcha-tab">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="card">
                                                   <div class="card-body">
                                                   @if(session()->has('success_rep'))
                                                      <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                                      <strong>Success!</strong> {{ session()->get('success_rep') }}
                                                      </div>
                                                   @endif
                                                   @if(session()->has('error'))
                                                      <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                                         <strong>Warning!</strong> {{ session()->get('error') }}
                                                      </div>
                                                   @endif 

                                                <form action=" {{route('TRC/11/add_repcha')}}" method="post" >
                                                     @csrf      
                                                      <div class="flex-between">
                                                         <h3>Google Recapcha Information</h3>
                                                         <a class="cmn--btn btn--primary-2 btn-outline-primary-2" href="https://www.google.com/recaptcha/admin/create">
                                                         <i class="tio-info-outined"></i> Credentials SetUp
                                                         </a>
                                                      </div>
                                                      <div class="mt-4">             
                                                            <div class="mb-4">
                                                               <h4>Status</h4>
                                                            </div>
                                                            <div class="d-flex flex-wrap mb-4">
                                                               <div class="form-check mr-4">
                                                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                                                                  <label class="form-check-label" for="gridRadios1">
                                                                  Active
                                                                  </label>
                                                               </div>
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                                                                  <label class="form-check-label" for="gridRadios1">
                                                                  Inactive
                                                                  </label>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                               <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                     <label class="form-label">Site Key</label>
                                                                     <input type="text" class="form-control" name="site_key" value="{{$rep->site_key}}">
                                                                  </div>
                                                               </div>
                                                               <div class="col-sm-6">
                                                                  <div class="form-group">
                                                                     <label class="form-label">Secret Key</label>
                                                                     <input type="text" class="form-control" name="secret_key" value="{{$rep->secret_key}}">
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="text-right">
                                                               <button type="submit" onclick="" class="btn btn-primary px-5">Update</button>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade py-3" id="push" role="tabpanel" aria-labelledby="push-tab">
                                          <div class="row">
                                             <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                                                <div class="card">
                                                   <div class="card-header">
                                                      <h2>Push Messages</h2>
                                                   </div>
                                                   <div class="card-body">
                                                      <form action="" method="post" enctype="multipart/form-data">
                                                      @csrf   
                                                      
                                                         <div class="row">
                                                            <div class="col-md-6 col-12">
                                                               <div class="form-group">
                                                                  <div class="form-check">
                                                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck11">
                                                                     <label class="form-check-label" for="defaultCheck11">
                                                                     Order Pending Message
                                                                     </label>
                                                                  </div>
                                                                  <textarea name="pending_message" class="form-control">Your order has been placed successfully.</textarea>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="btn--container justify-content-end">
                                                            <button type="reset" class="btn btn-danger">Clear</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane fade py-3" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                                          <div class="row gx-2 gx-lg-3">
                                             <div class="col-md-12">
                                                <div class="card">
                                                   <div class="card-body">
                                                   @if(session()->has('success_wtsp'))
                                                      <div class="alert-success" style="padding:18px;border-radius: 5px;">
                                                      <strong>Success!</strong> {{ session()->get('success_wtsp') }}
                                                      </div>
                                                   @endif
                                                   @if(session()->has('error'))
                                                      <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                                                         <strong>Warning!</strong> {{ session()->get('error') }}
                                                      </div>
                                                   @endif 
                                                     <form action=" {{route('TRC/11/add-wtsp')}}" method="post" >
                                                     @csrf  
                                                         <div class="row">
                                                            <div class="col-md-6 col-12">
                                                               <div class="form-group">
                                                                  <div class="form-check">
                                                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck21">
                                                                     <label class="form-check-label" for="defaultCheck21">
                                                                     Whatsapp Status
                                                                     </label>
                                                                  </div>
                                                                  <label class="text-capitalize">Whatsapp Number<span class="text-danger"> (Without country code)</span></label>
                                                                  <input type="text" name="whatsapp_number" class="form-control" placeholder="Whatsapp Number" value="{{$number->whatsapp_number}}">
                                                               </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                               <div class="form-group">
                                                                  <div class="form-check">
                                                                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck21">
                                                                     <label class="form-check-label" for="defaultCheck21">
                                                                     Skype Status
                                                                     </label>
                                                                  </div>
                                                                  <label class="text-capitalize">Skype ID<span class="text-danger"></span></label>
                                                                  <input type="text" name="skype_id" class="form-control" placeholder="Skype Id" value="{{$number->skype_id}}">
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class="btn--container justify-content-end">
                                                            
                                                            <button type="submit" class="btn btn-primary">Update Details</button>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end Tabs contant -->
                  </div>
                  <!-- end container-fluid -->
               </div>
               <!-- end app-main -->
      @endsection