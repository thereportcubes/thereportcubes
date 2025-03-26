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
      <link rel="shortcut icon" href="{{url('dist/img/favicon.png')}}">
      <!-- google fonts -->
      <link href="{{url('dist/css?family=Roboto:300,400,500,700')}}" rel="stylesheet">
      <!-- {{url('../../dist/css?family=Roboto:300,400,500,700')}} -->
      <!-- plugin stylesheets -->
      <link rel="stylesheet" type="text/css" href="{{url('dist/css/vendors.css')}}">
      <!-- app style -->
      <link rel="stylesheet" type="text/css" href="{{url('dist/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('dist/css/custom.css')}}">
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
                  <img src="{{url('dist/img/loader/loader.svg')}}" alt="loader">
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
                     <a class="navbar-brand" href="dashboard">
                     <img src="{{url('dist/img/logo.png')}}" class="img-fluid logo-desktop" alt="logo">
                     <img src="{{url('dist/img/logo-icon.png')}}" class="img-fluid logo-mobile" alt="logo">
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
                              <img src="{{url('dist/img/avtar/02.jpg')}}" alt="avtar-img">
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
                                    <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                    <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                    <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                    <i class=" ti ti-settings pr-2 text-info"></i> Settings
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
                            <li class="nav-static-title">Personal</li>
                            <li class="active">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-rocket"></i>
                                <span class="nav-title">Dashboards</span>
                                <span class="nav-label label label-danger">9</span>
                                </a>
                                <ul aria-expanded="false">
                                <li class="active"> <a href="{{url('TRC/11/dashboard')}}">Tych</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-control-record"></i><span class="nav-title">Members</span></a>
                                <ul aria-expanded="false">
                                <li> <a href="{{url('TRC/11/add-member')}}">Add Member</a> </li>
                                <li> <a href="{{url('TRC/11/all-member')}}">All Member</a> </li>
                                </ul>
                            </li>
                            <!-- <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-key"></i><span class="nav-title">Plan</span></a>
                                <ul aria-expanded="false">
                                <li> <a href="add-plan.php">Add Plan</a> </li>
                                <li> <a href="List-plan.php">List Plan</a> </li>
                                </ul>
                            </li> -->
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-control-record"></i><span class="nav-title">Sub. Admin</span></a>
                                <ul aria-expanded="false">
                                <li> <a href="{{url('TRC/11/add-sub')}}">Add Sub-Admin</a> </li>
                                <li> <a href="{{url('TRC/11/all-sub')}}">All Sub-Admin</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-control-record"></i><span class="nav-title">User</span></a>
                                <ul aria-expanded="false">
                                <li> <a href="{{url('TRC/11/add-user')}}">Add User</a> </li>
                                <li> <a href="{{url('TRC/11/all-user')}}">All Users</a> </li>
                                <li> <a href="{{url('TRC/11/single-user-wallet')}}">Wallet History</a> </li>
                                </ul>
                            </li>
                            
                            
                            <li>
                                <a class="has-arrow" href="{{url('TRC/11/all-page')}}" aria-expanded="false">
                                <i class="ti-control-record"></i><span class="nav-title">Pages</span></a>
                                <!-- <ul aria-expanded="false">
                                <li> <a href="{{url('TRC/11/add-page')}}">Add Page</a> </li>
                                <li> <a href="{{url('TRC/11/all-page')}}">All Pages</a> </li>
                                </ul> -->
                            </li>
                            
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-control-record"></i><span class="nav-title">3rd Party</span></a>
                                <ul aria-expanded="false">
                                <li> <a href="{{url('TRC/11/key')}}">APIs Key</a> </li>
                                <li> <a href="{{url('TRC/11/others-setting')}}">Other</a> </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-control-record"></i><span class="nav-title">Customer Wallet</span></a>
                                <ul aria-expanded="false">
                                <li> <a href="{{url('TRC/11/user-wallet')}}">Wallet</a> </li>
                                <li> <a href="{{url('TRC/11/transactions')}}">All Transactions</a> </li>
                                <li> <a href="{{url('TRC/11/by-user')}}">By User</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="ti-control-record"></i><span class="nav-title">System setup</span></a>
                                <ul aria-expanded="false">
                                <li> <a href="{{url('TRC/11/general-setting')}}">General Setting</a> </li>
                                <li> <a href="{{url('TRC/11/app-setting')}}">App Settings</a> </li>
                                </ul>
                            </li>
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
      <script src="{{url('dist/js/vendors.js')}}"></script>
      <!-- custom app -->
      <script src="{{url('dist/js/app.js')}}"></script>
   </body>
</html>