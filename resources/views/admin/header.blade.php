<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title')</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc.">
      <meta name="author" content="Potenza Global Solutions">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- app favicon -->
      <link rel="shortcut icon" href="{{asset('img/favicon_new.ico')}}">
      <!-- google fonts -->
      <link href="{{asset('asset/dist/css?family=Roboto:300,400,500,700')}}" rel="stylesheet">
      <!-- {{url('../../dist/css?family=Roboto:300,400,500,700')}} -->
      <!-- plugin stylesheets -->
      <link rel="stylesheet" type="text/css" href="{{asset('dist/css/vendors.css')}}">
      <!-- app style -->
      <link rel="stylesheet" type="text/css" href="{{asset('dist/css/style.css')}}">
      <!--<link rel="stylesheet" type="text/css" href="{{url('public/dist/css/style2.css')}}"> !-->
      <link rel="stylesheet" type="text/css" href="{{asset('dist/css/custom.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   </head>
   <body>
      <!-- begin app -->
      <div class="app">
         <!-- begin app-wrap -->
         <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
               <div class="h-100 d-flex justify-content-center">
                  <div class="align-self-center">
                  <img src="{{asset('dist/img/loader/loader.svg')}}" alt="loader">
                  </div>
               </div>
            </div>
            <!-- end pre-loader -->
            
            <header class="app-header top-bar">
               <!-- begin navbar -->
               <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.min.css">
               <nav class="navbar navbar-expand-md">
                  <!-- begin navbar-header -->
                  <div class="navbar-header d-flex align-items-center">
                     <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                     <a class="navbar-brand" href="{{route('TRC/11/dashboard')}}">
                     <img src="{{asset('dist/img/rcube-logo.png')}}" class="img-fluid logo-desktop" alt="logo">
                     <img src="{{asset('dist/img/logo-icon.png')}}" class="img-fluid logo-mobile" alt="logo">
                     </a>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ti ti-align-left"></i>
                  </button>
                  <!-- end navbar-header -->
                  <!-- begin navigation -->
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <div class="navigation d-flex">
                        <ul class="navbar-nav nav-left">
                           <li class="nav-item">
                              <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                              <i class="ti ti-align-right"></i>
                              </a>
                           </li>
                           <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                              <a href="javascript:void(0)" class="nav-link expand">
                              <i class="icon-size-fullscreen"></i>
                              </a>
                           </li>
                        </ul>
                        <ul class="navbar-nav nav-right ml-auto">
                           <li class="nav-item">
                              <a class="nav-link search" href="javascript:void(0)">
                              <i class="ti ti-search"></i>
                              </a>
                              <div class="search-wrapper">
                                 <div class="close-btn">
                                    <i class="ti ti-close"></i>
                                 </div>
                                 <div class="search-content">
                                    <form>
                                       <div class="form-group">
                                          <i class="ti ti-search magnifier"></i>
                                          <input type="text" class="form-control autocomplete" placeholder="Search Here" id="autocomplete-ajax" autofocus="autofocus">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </li>
                           <li class="nav-item dropdown user-profile">
                              <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="{{url('public/dist/img/avtar/02.jpg')}}" alt="avtar-img">
                              <span class="bg-success user-status"></span>
                              </a>
                              <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                 <div class="bg-gradient px-4 py-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                       <div class="mr-1">
                                          <h4 class="text-white mb-0">{{Auth::User()->name}}</h4>
                                          <small class="text-white">{{Auth::User()->email}}</small>
                                       </div>
                                       <a href="{{url('TRC/11/logout')}}" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i class="zmdi zmdi-power"></i></a>
                                    </div>
                                 </div>
                                 <div class="p-4">
                                    <a class="dropdown-item d-flex nav-link" href="#">
                                       <i class="ti ti-user pr-2 text-success"></i>My Profile
                                    </a>
                                    <a class="dropdown-item d-flex nav-link" href="{{route('change-password')}}">
                                       <i class="ti ti-settings pr-2 text-success"></i>Change Password
                                    </a>
                                    <a class="dropdown-item d-flex nav-link" href="{{url('TRC/11/logout')}}">
                                       <i class=" ti ti-settings pr-2 text-info"></i>Logout
                                    </a>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- end navigation -->
               </nav>
               <!-- end navbar -->
            </header>

            <!-- begin app-container -->
            <div class="app-container">
               <!-- begin app-nabar -->

                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.min.css">
                    
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                        <li class="{{ (request()->is('TRC/11/dashboard') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('TRC/11/dashboard')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-dashboard"></i>
                                 <span class="nav-title">Dashboard</span>
                                 </a>                                
                              </li>
                              <li class="{{ (request()->is('TRC/11/infographic-list') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('TRC/11/infographic_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-list"></i>
                                    <span class="nav-title">Inforgraphic</span>
                                 </a>                                
                              </li>
                              
                            <!--   <li class="{{ (request()->is('TRC/11/blog-list') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('TRC/11/blog_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-book"></i>
                                 <span class="nav-title">Blog</span>
                                 </a>                                
                              </li> -->

                              <li class="{{ (request()->is('TRC/11/report-list') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('TRC/11/report_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-list"></i>
                                 <span class="nav-title">Report Upload</span>
                                 </a>                                
                              </li>

                              <li class="{{ (request()->is('TRC/11/press_release_list') ) ? 'active' : '' }}">
                                 <a class="" href="{{url('TRC/11/press_release_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-notepad"></i>
                                 <span class="nav-title">Press Release Upload</span>
                                 </a>                                
                              </li>

                              <li class="{{ (request()->is('TRC/11/industries') ||  request()->is('TRC/11/sub_industries') ) ? 'active' : '' }}">
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-book"></i><span class="nav-title">Report Store</span></a>
                                 <ul aria-expanded="false">
                                    <li class="{{ (request()->is('TRC/11/industries') ) ? 'active' : '' }}"> <a href="{{url('TRC/11/industries')}}"><i class="ti-control-record"></i> Industries</a> </li>
                                    <li class="{{ (request()->is('TRC/11/sub_industries') ) ? 'active' : '' }}"> <a href="{{url('TRC/11/sub_industries')}}"><i class="ti-control-record"></i> Sub Industries</a> </li>
                                    <li class="{{ (request()->is('TRC/11/region') ) ? 'active' : '' }}"> <a href="{{url('TRC/11/region')}}"><i class="ti-control-record"></i> Region</a> </li>
                                    <li class="{{ (request()->is('TRC/11/country') ) ? 'active' : '' }}"> <a href="{{url('TRC/11/country')}}"><i class="ti-control-record"></i> Country</a> </li> 
                                       <!-- <li class="{{ (request()->is('TRC/11/city_list') ) ? 'active' : '' }}"> <a href="{{url('TRC/11/city_list')}}"><i class="ti-control-record"></i> City</a> </li> -->
                                 </ul>
                              </li>

                           <!--    <li class="{{ (request()->is('TRC/11/services_list') ) ? 'active' : '' }}">
                                 <a class="" href="{{url('TRC/11/services_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-list"></i>
                                 <span class="nav-title">Services</span>
                                 </a>                                
                              </li> -->

                              <li class="{{ (request()->is('TRC/11/seo-pages') ) ? 'active' : '' }}">
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-pencil"></i><span class="nav-title">Seo Website </span></a>
                                 <ul aria-expanded="false">
                                    <li> <a href="{{url('TRC/11/seo-pages')}}"><i class="ti-control-record"></i> Pages</a> </li>
                                 </ul>
                              </li>

                              <!-- <li class="">
                                 <a class="" href="{{url('TRC/11/financial_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-rocket"></i>
                                 <span class="nav-title">Financial Research</span>
                                 </a>                                
                              </li> -->

                              <li class="{{ ( request()->is('TRC/11/banner_list') || request()->is('TRC/11/testimonial_list') ) ? 'active' : '' }}">
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-settings"></i><span class="nav-title">Web-Site Management</span></a>
                                 <ul aria-expanded="false">
                                    <li class="{{ (request()->is('TRC/11/banner_list') ) ? 'active' : '' }}"> <a href="{{url('TRC/11/banner_list')}}"><i class="ti-control-record"></i> Banner</a> </li>
                                    <li class="{{ (request()->is('TRC/11/testimonial_list') ) ? 'active' : '' }}" > <a href="{{url('TRC/11/testimonial_list')}}"><i class="ti-control-record"></i> Testimonial</a> </li>
                                   <!--  <li> <a href="{{url('TRC/11/aboutus_list')}}"> <i class="ti-control-record"></i> About Us</a> </li>
                                    <li> <a href="{{url('TRC/11/vision_list')}}"><i class="ti-control-record"></i> Vision & Mission</a> </li> -->
                                    <li> <a href="{{url('TRC/11/client_list')}}"><i class="ti-control-record"></i> Our Client</a> </li>
                                   <!--  <li> <a href="{{url('TRC/11/privacy_list')}}"><i class="ti-control-record"></i> Privacy Policy</a> </li>
                                    <li> <a href="{{url('TRC/11/refund_list')}}"><i class="ti-control-record"></i> Refund Policy</a> </li>
                                 <li> <a href="{{url('TRC/11/terms_list')}}">Terms & Conditions</a> </li>
                                 <li> <a href="{{url('TRC/11/contactus_list')}}">Contact Us</a> </li> -->
                                 </ul>
                              </li>

                              <li class="{{ (request()->is('TRC/11/users') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('TRC/11/users_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-user"></i>
                                 <span class="nav-title">Users</span>
                                 </a>                                
                              </li>

                              <li class="{{ (request()->is('TRC/11/all-member') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('TRC/11/all_members')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-user"></i>
                                 <span class="nav-title">Members</span>
                                 </a>                                
                              </li>

                              <li>
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-control-record"></i><span class="nav-title">Report Query</span></a>
                                 <ul aria-expanded="false">
                                 <li> <a href="{{url('TRC/11/sample_request')}}">Sample Request</a> </li>
                                <!--  <li> <a href="{{url('TRC/11/speak_analyst')}}">Speak To Analyst</a> </li>
                                 <li> <a href="{{url('TRC/11/request_customization')}}">Request Customization</a> </li>
                                 <li> <a href="{{url('TRC/11/covid_impact')}}">Covid Impact</a> </li> -->
                                 </ul>
                              </li>

                              <!-- <li>
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-control-record"></i><span class="nav-title">Exim Query</span></a>
                                 <ul aria-expanded="false">
                                 <li> <a href="{{url('TRC/11/tire_exim')}}">Sample Request Tire Exim</a> </li>
                                 </ul>
                              </li> -->

                              <li>
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-control-record"></i><span class="nav-title">Service Query</span></a>
                                 <ul aria-expanded="false">
                                 <li> <a href="{{url('TRC/11/syndicate_res')}}">All services Query</a> </li>
                                <!--  <li> <a href="{{url('TRC/11/syndicate_res')}}">Syndicate Research</a> </li>
                                 <li> <a href="{{url('TRC/11/consulting_res')}}">Consulting Services</a> </li>
                                 <li> <a href="{{url('TRC/11/full_analyst')}}">Full Time Analyst</a> </li> -->
                                 </ul>
                              </li>

                              <li>
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-control-record"></i><span class="nav-title">Other Query</span></a>
                                 <ul aria-expanded="false">
                                 <!-- <li> <a href="{{url('TRC/11/tire_exim')}}">Enquiry</a> </li> -->
                                 <li> <a href="{{url('TRC/11/infographics_enq')}}">Infographics (Enquiry)</a> </li>
                                 <li> <a href="{{url('TRC/11/search_query')}}">Search Query</a> </li>
                                 <li> <a href="{{url('TRC/11/contactus_enq')}}">Contact Us</a> </li>
                                 </ul>
                              </li>

                              <!-- <li>
                                 <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                 <i class="ti-control-record"></i><span class="nav-title">HR Portal</span></a>
                                 <ul aria-expanded="false">
                                 <li> <a href="{{url('TRC/11/career_list')}}">Post Job</a> </li>
                                 <li> <a href="{{url('TRC/11/applicants')}}">Job Application</a> </li>
                                 </ul>
                              </li> -->
                             
                              
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>

               <!-- end app-navbar -->
               <!-- begin app-main -->
               @yield('content')
               <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
           
           
            <!-- end footer -->
         </div>
         <!-- end app-wrap -->
      </div>
      <!-- end app -->
      <!-- plugins -->
      <script src="{{asset('dist/js/vendors.js')}}"></script>
      <!-- custom app -->
      <script src="{{asset('dist/js/app.js')}}"></script>

      <script>
         // Flag to track whether the form is dirty (has unsaved changes)
         let formIsDirty = false;

         // Add event listeners to form elements to track changes
         const form = document.getElementById('myForm');
         form.addEventListener('input', () => {
               formIsDirty = true;
         });

         // Add event listener to form submission to reset the formIsDirty flag
         form.addEventListener('submit', () => {
               formIsDirty = false;
         });

         // Add event listener for the beforeunload event
         window.addEventListener('beforeunload', (event) => {
               if (formIsDirty) {
                  // Display a confirmation dialog
                  const confirmationMessage = 'You have unsaved changes. Are you sure you want to leave?';
                  event.returnValue = confirmationMessage; // Standard for most browsers
                  return confirmationMessage; // For some older browsers
               }
         });
      </script>
      
   </body>
</html>