@extends('admin/header')
@section('title','App Setting')
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
                                        <h1>App Setting</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="{{url('TRC/11/dashboard')}}"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                   Setting
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">App</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-lg-12"><div class=" col-xl-12   col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">General Settings</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form -->
                                <form>
                                    <div class="mb-3 mb-4">
                                        <label for="siteName" class="form-label">App Name
												<small class="text-muted">(Enter your App name below)</small>
											</label>
                                        <input class="form-control" id="siteName" placeholder="Your Site " type="text" required="">
                                        <small>The App title might be the name of your company or
												organization, or a brief description of the
												organization, or a combination of the two.
											</small>
                                    </div>
                                    <div class="mb-3 mb-4">
                                        <label for="siteDescription" class="form-label">App Description
												<small class="text-muted">(Enter your App description below)</small>
											</label>
                                        <textarea class="form-control" id="siteDescription" placeholder="Site Description " required="" rows="4"></textarea>
                                        <small>The App title might be the name of your company or
												organization, or a brief description of the
												organization, or a combination of the two.
											</small>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1 text-dark">Logo</p>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="inputLogo">
                                            <label class="input-group-text" for="inputLogo">Upload</label>
                                          </div>
                                          <small class="text-muted">(Upload your App logo - 120 x 40 )</small>

                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1 text-dark">Favicon <small class="text-muted">(Upload your App favicon - Standard for most
                                            desktop browsers. 32×32)</small></p>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="inputfavicon">
                                            <label class="input-group-text" for="inputfavicon">Upload</label>
                                          </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary">
											Update Settings
										</button>
                                </form>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">Currency Settings</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <form>
                                    <div class="dropdown bootstrap-select form-control" style="width: 100%;"><select class="selectpicker" data-width="100%">
											<option value="">Select</option>
											<option value="₹ Indian">₹ Indian</option>
											<option value="$ USD">$ USD</option>
											<option value="€ Euro">€ Euro</option>
											<option value="£ British Pound">£ British Pound</option>
										</select> <div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                    <button type="submit" class="btn btn-primary mt-3">
											Update Setting
										</button>
                                </form>
                            </div>
                        </div>
                        <!-- Card -->
                      <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">Social Media Links</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <form>
                                   <div class="form-group">
	<label class="control-label" for="email">
		Facebook URL
	</label>
	<input class="form-control" id="email" name="email" type="text"/>
</div>
                           <div class="form-group">
	<label class="control-label" for="email">
		Twitter URL
	</label>
	<input class="form-control" id="email" name="email" type="text"/>
</div>
                           <div class="form-group">
	<label class="control-label" for="email">
		LinkedIn URL
	</label>
	<input class="form-control" id="email" name="email" type="text"/>
</div>
                           <div class="form-group">
	<label class="control-label" for="email">
		YouTube URL
	</label>
	<input class="form-control" id="email" name="email" type="text"/>
</div>
                           <div class="form-group">
	<label class="control-label" for="email">
		Instagram URL
	</label>
	<input class="form-control" id="email" name="email" type="text"/>
</div>
                                    <button type="submit" class="btn btn-primary mt-3">
											Update Setting
										</button>
                                </form>
                            </div>
                        </div>
                    </div> 
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
    @endsection