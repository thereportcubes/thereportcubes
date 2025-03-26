@extends('admin/header')
@section('title','Pages')
@section('content')

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
                                        <h1>Pages</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Pages</li>
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
                                            <h4 class="card-title">All Pages</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab nav-border-bottom">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true" onClick="getTitle('home','Home')">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="term-tab" data-toggle="tab" href="#term" role="tab" aria-controls="term" aria-selected="false" onClick="getTitle('terms','Terms and Conditions')">Terms & Conditions </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="privacy-tab" data-toggle="tab" href="#privacy" role="tab" aria-controls="privacy" aria-selected="false" onClick="getTitle('policy','Privacy Policy')">Privacy Policy </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false" onClick="getTitle('faq','FAQ')">FAQ </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="cpolicy-tab" data-toggle="tab" href="#cpolicy" role="tab" aria-controls="cpolicy" aria-selected="false" onClick="getTitle('cancel_policy','Cancellation Policy')">Cancellation Policy </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" id="refund-tab" data-toggle="tab" href="#refund" role="tab" aria-controls="refund" aria-selected="false" onClick="getTitle('refund_policy','Refund Policy')">Refund Policy </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="return-tab" data-toggle="tab" href="#return" role="tab" aria-controls="return" aria-selected="false" onClick="getTitle('return_policy','Return Policy')">Return Policy </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <br>
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

                                                
                                                <div class="tab-pane fade py-3 active show" id="about-tab" role="tabpanel" aria-labelledby="about-tab">
                                                    <form action=" {{route('TRC/11/add-home')}}" method="post">
                                                        @csrf
                                                        <textarea name="description" id="editor" class="descr"></textarea>
                                                        <input type='hidden' name='page_key' id="page_key" value="home" />
                                                        <input type='hidden' name='page_title' id="page_title" value="Home" />
                                                        <div class="mt-2">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
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

                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

      <script>
            $(function () {
                $.ajax({  
                    url : '{{route("admin.get_page_content") }}' ,
                    type: 'get',
                    data: {'page_key':'home'},
                    dataType: "text",
                    success: function(response){				  
                        var res =  JSON.parse(response);
                        CKEDITOR.instances['editor'].setData(res.description);
                    } 
                });
            });

            function getTitle(key, title)
            {
                CKEDITOR.instances['editor'].setData("");
                $("#page_key").val(key);
                $("#page_title").val(title);

                /** Get content using ajax */
                $.ajax({  
                    url : '{{route("admin.get_page_content") }}' ,
                    type: 'get',
                    data: {'page_key':key},
                    dataType: "text",
                    success: function(response){				  
                        var res =  JSON.parse(response);
                        $('.descr').val(res.description);
                        CKEDITOR.instances['editor'].setData(res.description);
                    } 
            });

            }
      </script>

      <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
      <script id="rendered-js">
         CKEDITOR.replace('editor'); 
         CKEDITOR.replace('editor1'); 
         CKEDITOR.replace('editor2'); 
         CKEDITOR.replace('editor3'); 
         CKEDITOR.replace('editor4'); 
         CKEDITOR.replace('editor5'); 
         CKEDITOR.replace('editor6'); 
         CKEDITOR.replace('editor7'); 
         CKEDITOR.replace('editor8'); 
         CKEDITOR.replace('editor9'); 
         CKEDITOR.replace('editor10'); 
      </script>
      
      
@endsection