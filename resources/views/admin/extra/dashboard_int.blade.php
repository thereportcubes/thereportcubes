
@extends('admin/header_int')
@section('title','Admin || Dashboard')

@section('content')

<div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Tyche Admin Panel</h1>
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
                            <li class="breadcrumb-item active text-primary" aria-current="page">Tyche
                            </li>
                        </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
            </div>
            <!-- end row -->
            <!-- start Crypto Currency contant -->
            <div class="row crypto-currency">
            <div class="col-12">
                <div class="card card-statistics p-0 owl-wrapper">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xs-2 text-center text-xxl-left bg-primary px-3 py-3">
                        <span class="text-white">Overview</span>
                        <span class="badge badge-light-inverse ml-xxl-4">50.12%</span>
                        </div>
                        <div class="col-xs-10 py-3 py-xs-0">
                        <div class="owl-carousel owl-theme pl-4" data-nav-dots="false" data-items="5" data-xl-items="4" data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="2" data-xx-items="1">
                            <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class=""></i> Bitcoin </p>
                                <p class="d-flex align-items-center">$4,465.65 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div>
                            <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class=""></i> Ethereum </p>
                                <p class="d-flex align-items-center">$2,495.45 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div>
                            <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class=""></i> Ripple </p>
                                <p class="d-flex align-items-center">$5,654.45 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div>
                            <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class=""></i> Neo </p>
                                <p class="d-flex align-items-center">$3,652.54 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div>
                            <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class=""></i> Cardano </p>
                                <p class="d-flex align-items-center">$2,795.23 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div>
                            <!-- <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class="crypto crypto-steem text-warning font-18 mr-1"></i> Steem </p>
                                <p class="d-flex align-items-center">$1,565.32 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div>
                            <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class="crypto crypto-pac text-warning font-18 mr-1"></i> Pac </p>
                                <p class="d-flex align-items-center">$8,456.32 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div>
                            <div class="item d-flex align-items-center">
                                <p class="d-flex align-items-center mr-3"><i class="crypto crypto-lsk text-warning font-18 mr-1"></i> Lisk </p>
                                <p class="d-flex align-items-center">$4,566.23 <span class="ml-2 text-danger">-1.26% <i class="fa fa-level-down"></i></span></p>
                            </div> -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6 col-xxl-3">
                <div class="card card-statistics">
                    <div class="card-body pb-xs-0">
                        <div class="row">
                        <div class="col">
                            <!-- <div class="media">
                                <i class="crypto crypto-bch text-warning font-60 mr-4"></i>
                                <div class="media-body pb-0">
                                    <h4 class="mb-1">Bitcoin</h4>
                                    <p>$456.23 </p>
                                </div>
                            </div> -->
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="d-block">$5.456.23 </span>
                            <span class="text-warning">-2.23 <i class="fa fa-level-down"></i> </span>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col">
                            <div class="apexchart-wrapper">
                                <div id="cryptodemo2"></div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="badge badge-dark-inverse">Last <b> 04 days</b></span>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card card-statistics">
                    <div class="card-body pb-xs-0">
                        <div class="row">
                        <div class="col">
                            <div class="media">
                                <i class="crypto crypto-ltc text-cyan font-60 mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mb-1">Litecoin</h4>
                                    <p>$359.78 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="d-block">$8.633.23 </span>
                            <span class="text-cyan">-1.89 <i class="fa fa-level-down"></i> </span>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col">
                            <div class="apexchart-wrapper">
                                <div id="cryptodemo3"></div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="badge badge-dark-inverse">Last <b> 04 days</b></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-3">
                <div class="card card-statistics">
                    <div class="card-body pb-xs-0">
                        <div class="row">
                        <div class="col">
                            <div class="media">
                                <i class="crypto crypto-xrp text-info font-60 mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mb-1">Ripple</h4>
                                    <p>$4.453 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="d-block">$6.455.45 </span>
                            <span class="text-info">-4.56 <i class="fa fa-level-down"></i> </span>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col">
                            <div class="apexchart-wrapper">
                                <div id="cryptodemo4"></div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="badge badge-dark-inverse">Last <b> 03 days</b></span>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card card-statistics">
                    <div class="card-body pb-xs-0">
                        <div class="row">
                        <div class="col">
                            <div class="media">
                                <i class="crypto crypto-ada text-orange font-60 mr-4"></i>
                                <div class="media-body">
                                    <h4 class="mb-1">Cardano</h4>
                                    <p>$623.56 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="d-block">$1.658.23 </span>
                            <span class="text-orange">-6.65 <i class="fa fa-level-down"></i> </span>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <div class="col">
                            <div class="apexchart-wrapper">
                                <div id="cryptodemo5"></div>
                            </div>
                        </div>
                        <div class="col ml-auto text-right">
                            <span class="badge badge-dark-inverse">Last <b> 04 days</b></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-3 mb-30">
                <div class="card card-statistics bg-primary o-hidden mb-0 h-100">
                    <div class="card-header border-0">
                        <h4 class="card-title text-white">Depth Chart</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="p-4">
                        <div class="row align-self-center">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <span class="text-white">Total</span>
                                <h3 class="text-white mb-0">$12,456</h3>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <span class="text-white d-block">EUR <b class="text-orange">€6,320.46</b></span>
                                <span class="text-white d-block">GBP <b class="text-orange">€6,320.46</b></span>
                            </div>
                        </div>
                        </div>
                        <div class="apexchart-wrapper">
                        <div id="cryptodemo6" class="chart-fit p-absolute p-absolute-lr w-100"></div>
                        </div>
                        <div class="crypto-chart-info p-4">
                        <div class="row">
                            <div class="col-6 col-sm-4 mb-3 mb-sm-0">
                                <h6 class="text-white mb-1">Open</h6>
                                <strong class="text-white">$6,358.40</strong>
                            </div>
                            <div class="col-6 col-sm-4">
                                <h6 class="text-white mb-1">High</h6>
                                <strong class="text-white">$9,566.45</strong>
                            </div>
                            <div class="col-6 col-sm-4">
                                <h6 class="text-white mb-1">Low</h6>
                                <strong class="text-white">$1,465.45</strong>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-3 mb-30">
                <div class="card card-statistics o-hidden mb-0 h-100">
                    <div class="card-header">
                        <h4 class="card-title">Safe Deal</h4>
                    </div>
                    <div class="card-body text-center ">
                        <div class="appexchart-wrapper">
                        <div id="cryptodemo7"></div>
                        </div>
                        <div class="border-bottom pb-3 mt-3">
                        <h3 class="mb-1">3.46645465 BTC</h3>
                        <span><i class="text-danger mr-2"></i> 14 active deals</span>
                        </div>
                        <div class="mt-3">
                        <h3 class="mb-1">2.4698685 BTC</h3>
                        <span><i class="text-danger mr-2"></i> 22 unconfirmed deals</span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row crypto-currency">
            <div class="col-xxl-8">
                <div class="card card-statistics apexchart-tool-force-top">
                    <div class="card-header">
                        <h4 class="card-title">Ripple Live Chart</h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="apexchart-wrapper">
                        <div id="crypto-demo1-candlestick"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="card card-statistics apexchart-tool-force-top">
                    <div class="card-header">
                        <h4 class="card-title">Transaction</h4>
                    </div>
                    <div class="card-body">
                        <div class="bg-light p-3 rounded m-b-20">
                        <div class="d-sm-flex justify-content-between">
                            <div class="transition-left">
                                <span>Dec 12 2018</span>
                                <h5 class="mt-2 mb-0">4012001036275556</h5>
                            </div>
                            <div class="transition-right text-sm-right">
                                <strong class="text-dark d-block mb-1"> <i class="fa fa-long-arrow-right pr-2"></i> 0.567 BTC </strong>
                                <a class="text-primary" href="#!"> View more</a>
                            </div>
                        </div>
                        </div>
                        <div class="bg-light p-3 rounded m-b-20">
                        <div class="d-sm-flex justify-content-between">
                            <div class="transition-left">
                                <span>Dec 18 2018</span>
                                <h5 class="mt-2 mb-0">4012001038488884 </h5>
                            </div>
                            <div class="transition-right text-sm-right">
                                <strong class="text-dark d-block mb-1"> <i class="fa fa-long-arrow-right pr-2"></i> 1.567 LTC </strong>
                                <a class="text-primary" href="#!"> View more</a>
                            </div>
                        </div>
                        </div>
                        <div class="bg-light p-3 rounded m-b-20">
                        <div class="d-sm-flex justify-content-between">
                            <div class="transition-left">
                                <span>Dec 31 2018</span>
                                <h5 class="mt-2 mb-0">4012001038443335</h5>
                            </div>
                            <div class="transition-right text-sm-right">
                                <strong class="text-dark d-block mb-1"> <i class="fa fa-long-arrow-right pr-2"></i> 67 NEO </strong>
                                <a class="text-primary" href="#!"> View more</a>
                            </div>
                        </div>
                        </div>
                        <div class="bg-light p-3 rounded">
                        <div class="d-sm-flex justify-content-between">
                            <div class="transition-left">
                                <span>Jan 08 2019</span>
                                <h5 class="mt-2 mb-0">4012001036983332</h5>
                            </div>
                            <div class="transition-right text-sm-right">
                                <strong class="text-dark d-block mb-1"> <i class="fa fa-long-arrow-right pr-2"></i> 2.7 RIP </strong>
                                <a class="text-primary" href="#!"> View more</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- <div class="row">
            <div class="col-xxl-6 mb-30">
                <div class="card card-statistics h-100 mb-0 currency-price">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-heading">
                        <h4 class="card-title">Buy/Sell Crypto Currency</h4>
                        </div>
                        <div class="dropdown">
                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti ti-more-alt"></i>
                        </a>
                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                            <h6 class="mb-1">Action</h6>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-o pr-2"></i>View reports</a>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-edit pr-2"></i>Edit reports</a>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-bar-chart-o pr-2"></i>Statistics</a>
                            <h6 class="mb-1 mt-3">Export</h6>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export to PDF</a>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="tab nav-border-bottom">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02" role="tab" aria-controls="home-02" aria-selected="true">
                                <b>Buy Crypto </b> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab" aria-controls="profile-02" aria-selected="false"><b>Sell Crypto </b> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show pt-3" id="home-02" role="tabpanel" aria-labelledby="home-02-tab">
                                <div class="row">
                                    <div class="col-xs-6">
                                    <div class=" mb-3">
                                        <label>Select the Crypto Currency 'Minimum Velue 0.001BTC</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text px-3" for="bacs">B</label>
                                            </div>
                                            <select class="form-control" id="bacs">
                                                <option>Bitcoin</option>
                                                <option>Ethereum</option>
                                                <option>Ripple</option>
                                                <option>Neo</option>
                                                <option>Cardano</option>
                                                <option>Stellar</option>
                                                <option>RaiBlocks</option>
                                                <option>Monero</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <label>Choose Payment Method</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text px-3" for="visa1">VISA</label>
                                            </div>
                                            <select class="form-control" id="visa1">
                                                <option>VISA Card</option>
                                                <option>Credit Card</option>
                                                <option>Debit Card</option>
                                                <option>Master Card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <label>Wallet Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text px-3"><i class="ti ti-wallet"></i></label>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Mgwe7856fweF5fwfe5457KuFG" aria-label="Username">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xs-6">
                                    <div class=" mb-3">
                                        <label>Exchange Operation</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control text-primary">
                                                <option selected="">Bitcoin</option>
                                                <option>Ethereum</option>
                                                <option>Ripple</option>
                                                <option>Neo</option>
                                                <option>Cardano</option>
                                                <option>Stellar</option>
                                                <option>RaiBlocks</option>
                                                <option>Monero</option>
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Exchange Amount">
                                        </div>
                                        <div class="text-center py-2"><i class="ti ti-loop"></i></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control text-primary">
                                                <option selected="">USD</option>
                                                <option>EURO</option>
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Exchange Amount">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12">
                                    <button class="btn btn-success text-uppercase mt-1">Buy Crypto Currency</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade pt-3" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="row">
                                    <div class="col-xs-6">
                                    <div class=" mb-3">
                                        <label>Select the Crypto Currency 'Minimum Velue 0.001BTC</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text px-3" for="bacs1">B</label>
                                            </div>
                                            <select class="form-control" id="bacs1">
                                                <option>Bitcoin</option>
                                                <option>Ethereum</option>
                                                <option>Ripple</option>
                                                <option>Neo</option>
                                                <option>Cardano</option>
                                                <option>Stellar</option>
                                                <option>RaiBlocks</option>
                                                <option>Monero</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <label>Choose Payment Method</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text px-3" for="visa">VISA</label>
                                            </div>
                                            <select class="form-control" id="visa">
                                                <option>VISA Card</option>
                                                <option>Credit Card</option>
                                                <option>Debit Card</option>
                                                <option>Master Card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <label>Wallet Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text px-3"><i class="ti ti-wallet"></i></label>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Mgwe7856fweF5fwfe5457KuFG" aria-label="Username">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-xs-6">
                                    <div class=" mb-3">
                                        <label>Exchange Operation</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control text-primary">
                                                <option selected="">Bitcoin</option>
                                                <option>Ethereum</option>
                                                <option>Ripple</option>
                                                <option>Neo</option>
                                                <option>Cardano</option>
                                                <option>Stellar</option>
                                                <option>RaiBlocks</option>
                                                <option>Monero</option>
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Exchange Amount">
                                        </div>
                                        <div class="text-center py-2"><i class="ti ti-loop"></i></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control text-primary">
                                                <option selected="">USD</option>
                                                <option>EURO</option>
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Exchange Amount">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12">
                                    <button class="btn btn-danger text-uppercase mt-1">Sell Crypto Currency</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 mb-30">
                <div class="card card-statistics h-100 mb-0">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-heading">
                        <h4 class="card-title">Trade History</h4>
                        </div>
                        <div class="dropdown">
                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti ti-more-alt"></i>
                        </a>
                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                            <h6 class="mb-1">Export</h6>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export to PDF</a>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="tab nav-border-bottom">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-01-tab" data-toggle="tab" href="#home-01" role="tab" aria-controls="home-01" aria-selected="true">
                                <b>Buying</b> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-01-tab" data-toggle="tab" href="#profile-01" role="tab" aria-controls="profile-01" aria-selected="false"><b>Selling</b> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane table-responsive fade active show" id="home-01" role="tabpanel" aria-labelledby="home-01-tab">
                                <table class="table table-borderless crypto-table mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Price per Coin</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>$4948.89 </td>
                                        <td>0.123</td>
                                        <td>12/01/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$1562.45 </td>
                                        <td>1.45</td>
                                        <td>11/02/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$7856.23 </td>
                                        <td>0.12</td>
                                        <td>16/03/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$6592.36 </td>
                                        <td>1.44</td>
                                        <td>20/04/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$5894.35 </td>
                                        <td>5.12</td>
                                        <td>26/08/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$6598.89 </td>
                                        <td>6.22</td>
                                        <td>12/12/2018</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane table-responsive fade" id="profile-01" role="tabpanel" aria-labelledby="profile-01-tab">
                                <table class="table table-borderless crypto-table mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Price per Coin</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>$2248.89 </td>
                                        <td>0.143</td>
                                        <td>12/02/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$3562.45 </td>
                                        <td>1.75</td>
                                        <td>11/02/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$2856.23 </td>
                                        <td>0.42</td>
                                        <td>14/02/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$3592.36 </td>
                                        <td>1.84</td>
                                        <td>20/02/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$1894.35 </td>
                                        <td>3.12</td>
                                        <td>26/02/2018</td>
                                    </tr>
                                    <tr>
                                        <td>$4598.89 </td>
                                        <td>4.22</td>
                                        <td>28/02/2018</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div> -->
            <div class="row crypto-currency">
            <div class="col-lg-12">
                <div class="card card-statistics crypto-currency">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-heading">
                        <h4 class="card-title">Recent Orders</h4>
                        </div>
                        <div class="dropdown">
                        <a class="p-2 export-btn" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                        </a>
                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export to PDF</a>
                            <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                        <table id="datatable" class="table table-borderless crypto-table w-100">
                            <thead class="bg-light">
                                <tr>
                                    <th>Currency</th>
                                    <th>Balance</th>
                                    <th>Buying rate</th>
                                    <th>Current rate</th>
                                    <th>Profit/ loss</th>
                                    <th>Last Price</th>
                                    <th>Graph</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="crypto crypto-act text-warning"></i></td>
                                    <td>134.45</td>
                                    <td>$12,500</td>
                                    <td>$13,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$9,800.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-ada text-success"></i></td>
                                    <td>24.45</td>
                                    <td>$2,500</td>
                                    <td>$3,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$687.55 </td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-adx text-dark"></i></td>
                                    <td>144.45</td>
                                    <td>$17,500</td>
                                    <td>$14,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$872.55 </td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-ae text-info"></i></td>
                                    <td>342.45</td>
                                    <td>$72,500</td>
                                    <td>$83,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$587.55 </td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-aion text-danger"></i></td>
                                    <td>554.45</td>
                                    <td>$65,500</td>
                                    <td>$52,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$235.55 </td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-ark text-primary"></i></td>
                                    <td>256.45</td>
                                    <td>$23,500</td>
                                    <td>$72,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$827.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 86%;" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-bch text-cyan"></i></td>
                                    <td>892.45</td>
                                    <td>$45,500</td>
                                    <td>$43,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$856.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-blcn text-pink"></i></td>
                                    <td>235.45</td>
                                    <td>$56,500</td>
                                    <td>$43,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$287.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-btcz text-purple"></i></td>
                                    <td>321.45</td>
                                    <td>$523,500</td>
                                    <td>$489,623</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$523.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-burst text-primary2"></i></td>
                                    <td>289.45</td>
                                    <td>$236,852</td>
                                    <td>$123,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$289.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-cnd text-danger"></i></td>
                                    <td>185.58</td>
                                    <td>$74,500</td>
                                    <td>$65,627</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$182.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-dgb text-dark"></i></td>
                                    <td>357.28</td>
                                    <td>$53,458</td>
                                    <td>$43,368</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$50.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 98%;" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-dent text-primary"></i></td>
                                    <td>483.28</td>
                                    <td>$75,236</td>
                                    <td>$72,856</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$562.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 76%;" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-ella text-pink"></i></td>
                                    <td>158.42</td>
                                    <td>$56,289</td>
                                    <td>$52,563</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$87.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-eos text-warning"></i></td>
                                    <td>896.45</td>
                                    <td>$23,511</td>
                                    <td>$18,453</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$89.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-jpy text-info"></i></td>
                                    <td>454.42</td>
                                    <td>$82,562</td>
                                    <td>$28,454</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$289.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-krb text-danger"></i></td>
                                    <td>252.455</td>
                                    <td>$36,589</td>
                                    <td>$23,523</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$258.55 </td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-neo text-info"></i></td>
                                    <td>64.455</td>
                                    <td>$78,502</td>
                                    <td>$72,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$587.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-act text-dark"></i></td>
                                    <td>562.55</td>
                                    <td>$789,456</td>
                                    <td>$758,236</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$871.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-rads text-danger"></i></td>
                                    <td>852.45</td>
                                    <td>$35,505</td>
                                    <td>$44,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$927.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 67%;" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-smart text-warning"></i></td>
                                    <td>372.45</td>
                                    <td>$65,500</td>
                                    <td>$85,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-danger font-18"></i></span>
                                    </td>
                                    <td>$757.55</td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="crypto crypto-zen text-success"></i></td>
                                    <td>34.562</td>
                                    <td>$28,589</td>
                                    <td>$23,624</td>
                                    <td><span class="d-block">5.487% <i class="fa fa-sort-asc text-success font-18"></i></span>
                                    </td>
                                    <td>$687.55 </td>
                                    <td>
                                    <div class="progress my-3" style="height: 4px;">
                                        <div class="progress-bar" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- end Crypto Currency contant -->
        </div>
        <!-- end container-fluid --> 
    </div>
@endsection
