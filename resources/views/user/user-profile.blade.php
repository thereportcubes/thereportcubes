@extends('admin/header_int')
@section('title','Admin Profile')

@section('content')

<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <!-- <div class="page-title mb-2 mb-sm-0">
                        <h1>MemberShip</h1>
                    </div> -->
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    User
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Admin Profile</li>
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
            
            <div class="col-xl-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Admin Profile</h4>
                        </div>
                    </div>
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
                    <br>   
                        <form action="{{url('admin/profile')}}/{{request()->segment(3)}}" method="post">
                        
                        @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="inputEmail4" placeholder="Enter your full name" required> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mobile no</label>
                                    <input type="number" name="phone" value="{{$user->phone}}" class="form-control" id="inputPassword4" placeholder="Enter your mobile no" required >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" id="inputEmail4" placeholder="Enter your email no" ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">DOB</label>
                                    <input type="date" name="dob" value="{{$user->dob}}" class="form-control" id="inputPassword4" placeholder="Enter your dob">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Gender</label>
                                    <select id="inputState" name="gender" class="form-control">
                                        <option value="">Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputAddress2">Full Address</label>
                                <input type="text" name="address" value="{{$user->address}}" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" >
                                </div>

                            </div>
                         
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" name="city" value="{{$user->city}}" class="form-control" id="inputCity" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">State</label>
                                    <select id="inputState" name="state" class="form-control">
                                        <option selected="">Select State</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="NNagalandL">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="West Bengal">West Bengal</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
