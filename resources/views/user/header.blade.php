<!DOCTYPE html>
<html lang="en">
   <head>
      <title>@yield('title')</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="user template that can be used to build dashboards for CRM, CMS, etc.">
      <meta name="author" content="Potenza Global Solutions">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- app favicon -->
      <link rel="shortcut icon" href="{{url('public/dist/img/favicon.png')}}">
      <!-- google fonts -->
      <link href="{{url('public/dist/css?family=Roboto:300,400,500,700')}}" rel="stylesheet">
      <!-- {{url('../../dist/css?family=Roboto:300,400,500,700')}} -->
      <!-- plugin stylesheets -->
      <link rel="stylesheet" type="text/css" href="{{url('public/dist/css/vendors.css')}}">
      <!-- app style -->
      <link rel="stylesheet" type="text/css" href="{{url('public/dist/css/style.css')}}">
      <!--<link rel="stylesheet" type="text/css" href="{{url('public/dist/css/style2.css')}}"> !-->
      <link rel="stylesheet" type="text/css" href="{{url('public/dist/css/custom.css')}}">
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
                  <img src="{{url('public/dist/img/loader/loader.svg')}}" alt="loader">
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
                     <a class="navbar-brand" href="{{route('user/dashboard')}}">
                     <img src="{{url('public/dist/img/logo.png')}}" class="img-fluid logo-desktop" alt="logo">
                     <img src="{{url('public/dist/img/logo-icon.png')}}" class="img-fluid logo-mobile" alt="logo">
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
                                       <a href="{{url('user/logout')}}" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i class="zmdi zmdi-power"></i></a>
                                    </div>
                                 </div>
                                 <div class="p-4">
                                    <a class="dropdown-item d-flex nav-link" href="#">
                                       <i class="ti ti-user pr-2 text-success"></i>My Profile
                                    </a>
                                    <a class="dropdown-item d-flex nav-link" href="#">
                                       <i class="ti ti-settings pr-2 text-success"></i>Change Password
                                    </a>
                                    <a class="dropdown-item d-flex nav-link" href="{{url('user/logout')}}">
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
                    
                    <?php 
                        $user_id = Auth::user()->id;
                        $user_perms = \DB::table('user_permissions')->where('user_id',$user_id)->first();
                        $permission = $user_perms->pages_permission??'{}';
                        $permission = json_decode($permission);

                        $infoLen = 0;
                        $blogsLen = 0; 
                        $reportLen = 0;
                        $pressLen = 0;

                        if(!empty($permission->Info)){
                           $Info = $permission->Info;
                           $infoLen = count($Info);
                        }
                        if(!empty($permission->Blogs)){
                           $Blogs = $permission->Blogs;
                           $blogsLen = count($Blogs);
                        }
                        if(!empty($permission->Report)){
                           $Report = $permission->Report;
                           $reportLen = count($Report);
                        }
                        if(!empty($permission->Press)){
                           $Press = $permission->Press;
                           $pressLen = count($Press);
                        }
                        
                     ?>

                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                        <li class="{{ (request()->is('user/dashboard') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('user/dashboard')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-dashboard"></i>
                                 <span class="nav-title">Dashboard</span>
                                 </a>                                
                              </li>
                              <?php if($infoLen > 0) { ?>
                              <li class="{{ (request()->is('user/infographic-list') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('user/infographic_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-list"></i>
                                    <span class="nav-title">Inforgraphic</span>
                                 </a>                                
                              </li>
                              <?php } if($blogsLen > 0) { ?>
                              <li class="{{ (request()->is('user/blog-list') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('user/blog_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-book"></i>
                                 <span class="nav-title">Blog</span>
                                 </a>                                
                              </li>
                              <?php } if($reportLen > 0) { ?>
                              <li class="{{ (request()->is('user/report-list') ) ? 'active' : '' }}">
                                 <a class="" href="{{route('user/report_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-list"></i>
                                 <span class="nav-title">Report Upload</span>
                                 </a>                                
                              </li>
                              <?php } if($pressLen > 0) { ?>
                              <li class="{{ (request()->is('user/press_release_list') ) ? 'active' : '' }}">
                                 <a class="" href="{{url('user/press_release_list')}}" aria-expanded="false">
                                 <i class="nav-icon ti ti-notepad"></i>
                                 <span class="nav-title">Press Release Upload</span>
                                 </a>                                
                              </li>
                              <?php } ?>
                          
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
      <script src="{{url('public/dist/js/vendors.js')}}"></script>
      <!-- custom app -->
      <script src="{{url('public/dist/js/app.js')}}"></script>

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