@extends('layout/header_new')
@section('title','Market Advisor')
@section('content')
<style>
	.accordion .card-header:after {
        font-family: 'FontAwesome';  
        content: "\f068";
        float: left; 
        margin-right:10px;
    }
    .accordion .card-header.collapsed:after {
        content: "\f067"; 
    }
</style>
<section class="pay-option mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <p class="mb-1 ml-3">Hello {{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
                    <p class="mb-1 ml-3">Welcome to Your Account ({{auth()->user()->email}})</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="true">ORDERS</button>
                            <button class="nav-link" id="nav-details-tab" data-bs-toggle="tab" data-bs-target="#nav-details" type="button" role="tab" aria-controls="nav-details" aria-selected="false">DETAILS</button>
                            <!-- <button class="nav-link" id="nav-inquires-tab" data-bs-toggle="tab" data-bs-target="#nav-inquires" type="button" role="tab" aria-controls="nav-inquires" aria-selected="false">INQUIRIES</button> -->
                           <!-- <button class="nav-link" id="nav-interest-tab" data-bs-toggle="tab" data-bs-target="#nav-interest" type="button" role="tab" aria-controls="nav-interest" aria-selected="false">INTERESTS</button>-->
                            <button class="nav-link" id="nav-logout-tab" data-bs-toggle="tab" data-bs-target="#nav-logout" type="button" role="tab" aria-controls="nav-logout" aria-selected="false">LOGOUT</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active mt-5" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                            @if($orders->count()==0)
                            <div class="col-md-12">
                                <strong>Orders</strong>
                                <p>You currently do not have any recent orers</p>
                            </div>
                            @else
                            <div class="col-md-12 mt-4">
                                <strong>Orders</strong>
                                <table class="table table-bordered table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Product Type</th>
                                            <th>Product Price</th>
                                            <th>Product Licence</th>
                                            <th>Payment Mode</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->product_type}}</td>
                                            <td>{{$order->product_price}}</td>
                                            <td>{{$order->product_licence_type}}</td>
                                            <td>{{$order->payment_mode}}</td>
                                            <td>{{$order->created_date_time}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane fade mt-5" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                            <div class="row">
                                <div class="col-8 mt-2"><strong>Details</strong></div>
                                <div class="col-4 mt-2"><button class="btns btn-primary expand_all" type="button">Expand All</button></div>
                                <div class="col-12 mt-2 mb-2">Please update your details using the form below</div>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header collapsed  collapseBtn"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <a class="card-title">
                                            Change Password
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="cols-12 mt-2">
                                                    <input type="password" name="current_password" id="current_password" placeholder="Current Password" class="form-control" autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="cols-12 mt-2">
                                                    <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="cols-12 mt-2">
                                                    <input type="password" name="new_confirm_password" id="new_confirm_password" placeholder="Confirm New Password" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="cols-12 mt-2">
                                                    <button class="btns btn-primary" type="button" id="changePassBtn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header collapsed  collapseBtn"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <a class="card-title">
                                            Contact & Billing Information
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <form method="post" action="{{url('save_cart_payment')}}" id="payForm">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5 class="mb-0">Enter your Billing Details</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Company Name *</p>
                                                            <input type="text" class="form-control" name="billing_company_name" id="billing_company_name" placeholder="Company Name" required value="{{$users->company_name}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Contact Person Name *</p>
                                                            <input type="text" class="form-control" placeholder="Contact Person Name *" name="billing_name" id="billing_name" required value="{{$users->first_name}} {{$users->last_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Designation *</p>
                                                            <input type="text" class="form-control" placeholder="Designation *" name="billing_designation" id="billing_designation" required value="{{$users->company_name}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Email *</p>
                                                            <input type="text" class="form-control" placeholder="Email *" required name="billing_email" id="billing_email" value="{{$users->email}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Phone *</p>
                                                            <input type="text" class="form-control" placeholder="Phone *" name="billing_tel" id="billing_tel" required value="{{$users->phone}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Address *</p>
                                                            <input type="text" class="form-control" placeholder="Billing Address *" name="billing_address" id="billing_address" required value="{{$users->address1}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">City</p>
                                                            <input type="text" class="form-control" placeholder="Enter city" name="billing_city" id="billing_city" required value="{{$users->city1}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Zip Code *</p>
                                                            <input type="text" class="form-control" placeholder="Enter Zip Code *" required name="billing_zip" id="billing_zip" value="{{$users->zip_code1}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Country *</p>
                                                            <select class="form-select" id="billing_country" onchange="selectCountry($(this).val())" name="billing_country" required>
                                                                <option value="">Select Country</option>
                                                                <option value="Andorra">AD-ANDORRA (+376)</option>

                                                                <option value="United arab emirates">AE-UNITED ARAB EMIRATES (+971)</option>

                                                                <option value="Afghanistan">AF-AFGHANISTAN (+93)</option>

                                                                <option value="Antigua and barbuda">AG-ANTIGUA AND BARBUDA (+1268)</option>

                                                                <option value="Anguilla">AI-ANGUILLA (+1264)</option>

                                                                <option value="Albania">AL-ALBANIA (+355)</option>

                                                                <option value="Armenia">AM-ARMENIA (+374)</option>

                                                                <option value="Netherlands antilles">AN-NETHERLANDS ANTILLES (+599)</option>

                                                                <option value="Angola">AO-ANGOLA (+244)</option>

                                                                <option value="Antarctica">AQ-ANTARCTICA (+672)</option>

                                                                <option value="Argentina">AR-ARGENTINA (+54)</option>

                                                                <option value="American samoa">AS-AMERICAN SAMOA (+1684)</option>

                                                                <option value="Austria">AT-AUSTRIA (+43)</option>

                                                                <option value="Australia">AU-AUSTRALIA (+61)</option>

                                                                <option value="Aruba">AW-ARUBA (+297)</option>

                                                                <option value="Azerbaijan">AZ-AZERBAIJAN (+994)</option>

                                                                <option value="Bosnia and herzegovina">BA-BOSNIA AND HERZEGOVINA (+387)</option>

                                                                <option value="Barbados">BB-BARBADOS (+1246)</option>

                                                                <option value="Bangladesh">BD-BANGLADESH (+880)</option>

                                                                <option value="Belgium">BE-BELGIUM (+32)</option>

                                                                <option value="Burkina faso">BF-BURKINA FASO (+226)</option>

                                                                <option value="Bulgaria">BG-BULGARIA (+359)</option>

                                                                <option value="Bahrain">BH-BAHRAIN (+973)</option>

                                                                <option value="Burundi">BI-BURUNDI (+257)</option>

                                                                <option value="Benin">BJ-BENIN (+229)</option>

                                                                <option value="Saint barthelemy">BL-SAINT BARTHELEMY (+590)</option>

                                                                <option value="Bermuda">BM-BERMUDA (+1441)</option>

                                                                <option value="Brunei darussalam">BN-BRUNEI DARUSSALAM (+673)</option>

                                                                <option value="Bolivia">BO-BOLIVIA (+591)</option>

                                                                <option value="Brazil">BR-BRAZIL (+55)</option>

                                                                <option value="Bahamas">BS-BAHAMAS (+1242)</option>

                                                                <option value="Bhutan">BT-BHUTAN (+975)</option>

                                                                <option value="Botswana">BW-BOTSWANA (+267)</option>

                                                                <option value="Belarus">BY-BELARUS (+375)</option>

                                                                <option value="Belize">BZ-BELIZE (+501)</option>

                                                                <option value="Canada">CA-CANADA (+1)</option>

                                                                <option value="Cocos (keeling) islands">CC-COCOS (KEELING) ISLANDS (+61)</option>

                                                                <option value="Congo, the democratic republic of the">CD-CONGO, THE DEMOCRATIC REPUBLIC OF THE (+243)</option>

                                                                <option value="Central african republic">CF-CENTRAL AFRICAN REPUBLIC (+236)</option>

                                                                <option value="Congo">CG-CONGO (+242)</option>

                                                                <option value="Switzerland">CH-SWITZERLAND (+41)</option>

                                                                <option value="Cote d ivoire">CI-COTE D IVOIRE (+225)</option>

                                                                <option value="Cook islands">CK-COOK ISLANDS (+682)</option>

                                                                <option value="Chile">CL-CHILE (+56)</option>

                                                                <option value="Cameroon">CM-CAMEROON (+237)</option>

                                                                <option value="China">CN-CHINA (+86)</option>

                                                                <option value="Colombia">CO-COLOMBIA (+57)</option>

                                                                <option value="Costa rica">CR-COSTA RICA (+506)</option>

                                                                <option value="Cuba">CU-CUBA (+53)</option>

                                                                <option value="Cape verde">CV-CAPE VERDE (+238)</option>

                                                                <option value="Christmas island">CX-CHRISTMAS ISLAND (+61)</option>

                                                                <option value="Cyprus">CY-CYPRUS (+357)</option>

                                                                <option value="Czech republic">CZ-CZECH REPUBLIC (+420)</option>

                                                                <option value="Germany">DE-GERMANY (+49)</option>

                                                                <option value="Djibouti">DJ-DJIBOUTI (+253)</option>

                                                                <option value="Denmark">DK-DENMARK (+45)</option>

                                                                <option value="Dominica">DM-DOMINICA (+1767)</option>

                                                                <option value="Dominican republic">DO-DOMINICAN REPUBLIC (+1809)</option>

                                                                <option value="Algeria">DZ-ALGERIA (+213)</option>

                                                                <option value="Ecuador">EC-ECUADOR (+593)</option>

                                                                <option value="Estonia">EE-ESTONIA (+372)</option>

                                                                <option value="Egypt">EG-EGYPT (+20)</option>

                                                                <option value="Eritrea">ER-ERITREA (+291)</option>

                                                                <option value="Spain">ES-SPAIN (+34)</option>

                                                                <option value="Ethiopia">ET-ETHIOPIA (+251)</option>

                                                                <option value="Finland">FI-FINLAND (+358)</option>

                                                                <option value="Fiji">FJ-FIJI (+679)</option>

                                                                <option value="Falkland islands (malvinas)">FK-FALKLAND ISLANDS (MALVINAS) (+500)</option>

                                                                <option value="Micronesia, federated states of">FM-MICRONESIA, FEDERATED STATES OF (+691)</option>

                                                                <option value="Faroe islands">FO-FAROE ISLANDS (+298)</option>

                                                                <option value="France">FR-FRANCE (+33)</option>

                                                                <option value="Gabon">GA-GABON (+241)</option>

                                                                <option value="United kingdom">GB-UNITED KINGDOM (+44)</option>

                                                                <option value="Grenada">GD-GRENADA (+1473)</option>

                                                                <option value="Georgia">GE-GEORGIA (+995)</option>

                                                                <option value="Ghana">GH-GHANA (+233)</option>

                                                                <option value="Gibraltar">GI-GIBRALTAR (+350)</option>

                                                                <option value="Greenland">GL-GREENLAND (+299)</option>

                                                                <option value="Gambia">GM-GAMBIA (+220)</option>

                                                                <option value="Guinea">GN-GUINEA (+224)</option>

                                                                <option value="Equatorial guinea">GQ-EQUATORIAL GUINEA (+240)</option>

                                                                <option value="Greece">GR-GREECE (+30)</option>

                                                                <option value="Guatemala">GT-GUATEMALA (+502)</option>

                                                                <option value="Guam">GU-GUAM (+1671)</option>

                                                                <option value="Guinea-bissau">GW-GUINEA-BISSAU (+245)</option>

                                                                <option value="Guyana">GY-GUYANA (+592)</option>

                                                                <option value="Hong kong">HK-HONG KONG (+852)</option>

                                                                <option value="Honduras">HN-HONDURAS (+504)</option>

                                                                <option value="Croatia">HR-CROATIA (+385)</option>

                                                                <option value="Haiti">HT-HAITI (+509)</option>

                                                                <option value="Hungary">HU-HUNGARY (+36)</option>

                                                                <option value="Indonesia">ID-INDONESIA (+62)</option>

                                                                <option value="Ireland">IE-IRELAND (+353)</option>

                                                                <option value="Israel">IL-ISRAEL (+972)</option>

                                                                <option value="Isle of man">IM-ISLE OF MAN (+44)</option>

                                                                <option value="India">IN-INDIA (+91)</option>

                                                                <option value="Iraq">IQ-IRAQ (+964)</option>

                                                                <option value="Iran, islamic republic of">IR-IRAN, ISLAMIC REPUBLIC OF (+98)</option>

                                                                <option value="Iceland">IS-ICELAND (+354)</option>

                                                                <option value="Italy">IT-ITALY (+39)</option>

                                                                <option value="Jamaica">JM-JAMAICA (+1876)</option>

                                                                <option value="Jordan">JO-JORDAN (+962)</option>

                                                                <option value="Japan">JP-JAPAN (+81)</option>

                                                                <option value="Kenya">KE-KENYA (+254)</option>

                                                                <option value="Kyrgyzstan">KG-KYRGYZSTAN (+996)</option>

                                                                <option value="Cambodia">KH-CAMBODIA (+855)</option>

                                                                <option value="Kiribati">KI-KIRIBATI (+686)</option>

                                                                <option value="Comoros">KM-COMOROS (+269)</option>

                                                                <option value="Saint kitts and nevis">KN-SAINT KITTS AND NEVIS (+1869)</option>

                                                                <option value="Korea democratic peoples republic of">KP-KOREA DEMOCRATIC PEOPLES REPUBLIC OF (+850)</option>

                                                                <option value="Korea republic of">KR-KOREA REPUBLIC OF (+82)</option>

                                                                <option value="Kuwait">KW-KUWAIT (+965)</option>

                                                                <option value="Cayman islands">KY-CAYMAN ISLANDS (+1345)</option>

                                                                <option value="Kazakstan">KZ-KAZAKSTAN (+7)</option>

                                                                <option value="Lao peoples democratic republic">LA-LAO PEOPLES DEMOCRATIC REPUBLIC (+856)</option>

                                                                <option value="Lebanon">LB-LEBANON (+961)</option>

                                                                <option value="Saint lucia">LC-SAINT LUCIA (+1758)</option>

                                                                <option value="Liechtenstein">LI-LIECHTENSTEIN (+423)</option>

                                                                <option value="Sri lanka">LK-SRI LANKA (+94)</option>

                                                                <option value="Liberia">LR-LIBERIA (+231)</option>

                                                                <option value="Lesotho">LS-LESOTHO (+266)</option>

                                                                <option value="Lithuania">LT-LITHUANIA (+370)</option>

                                                                <option value="Luxembourg">LU-LUXEMBOURG (+352)</option>

                                                                <option value="Latvia">LV-LATVIA (+371)</option>

                                                                <option value="Libyan arab jamahiriya">LY-LIBYAN ARAB JAMAHIRIYA (+218)</option>

                                                                <option value="Morocco">MA-MOROCCO (+212)</option>

                                                                <option value="Monaco">MC-MONACO (+377)</option>

                                                                <option value="Moldova, republic of">MD-MOLDOVA, REPUBLIC OF (+373)</option>

                                                                <option value="Montenegro">ME-MONTENEGRO (+382)</option>

                                                                <option value="Saint martin">MF-SAINT MARTIN (+1599)</option>

                                                                <option value="Madagascar">MG-MADAGASCAR (+261)</option>

                                                                <option value="Marshall islands">MH-MARSHALL ISLANDS (+692)</option>

                                                                <option value="Macedonia, the former yugoslav republic of">MK-MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF (+389)</option>

                                                                <option value="Mali">ML-MALI (+223)</option>

                                                                <option value="Myanmar">MM-MYANMAR (+95)</option>

                                                                <option value="Mongolia">MN-MONGOLIA (+976)</option>

                                                                <option value="Macau">MO-MACAU (+853)</option>

                                                                <option value="Northern mariana islands">MP-NORTHERN MARIANA ISLANDS (+1670)</option>

                                                                <option value="Mauritania">MR-MAURITANIA (+222)</option>

                                                                <option value="Montserrat">MS-MONTSERRAT (+1664)</option>

                                                                <option value="Malta">MT-MALTA (+356)</option>

                                                                <option value="Mauritius">MU-MAURITIUS (+230)</option>

                                                                <option value="Maldives">MV-MALDIVES (+960)</option>

                                                                <option value="Malawi">MW-MALAWI (+265)</option>

                                                                <option value="Mexico">MX-MEXICO (+52)</option>

                                                                <option value="Malaysia">MY-MALAYSIA (+60)</option>

                                                                <option value="Mozambique">MZ-MOZAMBIQUE (+258)</option>

                                                                <option value="Namibia">NA-NAMIBIA (+264)</option>

                                                                <option value="New caledonia">NC-NEW CALEDONIA (+687)</option>

                                                                <option value="Niger">NE-NIGER (+227)</option>

                                                                <option value="Nigeria">NG-NIGERIA (+234)</option>

                                                                <option value="Nicaragua">NI-NICARAGUA (+505)</option>

                                                                <option value="Netherlands">NL-NETHERLANDS (+31)</option>

                                                                <option value="Norway">NO-NORWAY (+47)</option>

                                                                <option value="Nepal">NP-NEPAL (+977)</option>

                                                                <option value="Nauru">NR-NAURU (+674)</option>

                                                                <option value="Niue">NU-NIUE (+683)</option>

                                                                <option value="New zealand">NZ-NEW ZEALAND (+64)</option>

                                                                <option value="Oman">OM-OMAN (+968)</option>

                                                                <option value="Panama">PA-PANAMA (+507)</option>

                                                                <option value="Peru">PE-PERU (+51)</option>

                                                                <option value="French polynesia">PF-FRENCH POLYNESIA (+689)</option>

                                                                <option value="Papua new guinea">PG-PAPUA NEW GUINEA (+675)</option>

                                                                <option value="Philippines">PH-PHILIPPINES (+63)</option>

                                                                <option value="Pakistan">PK-PAKISTAN (+92)</option>

                                                                <option value="Poland">PL-POLAND (+48)</option>

                                                                <option value="Saint pierre and miquelon">PM-SAINT PIERRE AND MIQUELON (+508)</option>

                                                                <option value="Pitcairn">PN-PITCAIRN (+870)</option>

                                                                <option value="Puerto rico">PR-PUERTO RICO (+1)</option>

                                                                <option value="Portugal">PT-PORTUGAL (+351)</option>

                                                                <option value="Palau">PW-PALAU (+680)</option>

                                                                <option value="Paraguay">PY-PARAGUAY (+595)</option>

                                                                <option value="Qatar">QA-QATAR (+974)</option>

                                                                <option value="Romania">RO-ROMANIA (+40)</option>

                                                                <option value="Serbia">RS-SERBIA (+381)</option>

                                                                <option value="Russian federation">RU-RUSSIAN FEDERATION (+7)</option>

                                                                <option value="Rwanda">RW-RWANDA (+250)</option>

                                                                <option value="Saudi arabia">SA-SAUDI ARABIA (+966)</option>

                                                                <option value="Solomon islands">SB-SOLOMON ISLANDS (+677)</option>

                                                                <option value="Seychelles">SC-SEYCHELLES (+248)</option>

                                                                <option value="Sudan">SD-SUDAN (+249)</option>

                                                                <option value="Sweden">SE-SWEDEN (+46)</option>

                                                                <option value="Singapore">SG-SINGAPORE (+65)</option>

                                                                <option value="Saint helena">SH-SAINT HELENA (+290)</option>

                                                                <option value="Slovenia">SI-SLOVENIA (+386)</option>

                                                                <option value="Slovakia">SK-SLOVAKIA (+421)</option>

                                                                <option value="Sierra leone">SL-SIERRA LEONE (+232)</option>

                                                                <option value="San marino">SM-SAN MARINO (+378)</option>

                                                                <option value="Senegal">SN-SENEGAL (+221)</option>

                                                                <option value="Somalia">SO-SOMALIA (+252)</option>

                                                                <option value="Suriname">SR-SURINAME (+597)</option>

                                                                <option value="Sao tome and principe">ST-SAO TOME AND PRINCIPE (+239)</option>

                                                                <option value="El salvador">SV-EL SALVADOR (+503)</option>

                                                                <option value="Syrian arab republic">SY-SYRIAN ARAB REPUBLIC (+963)</option>

                                                                <option value="Swaziland">SZ-SWAZILAND (+268)</option>

                                                                <option value="Turks and caicos islands">TC-TURKS AND CAICOS ISLANDS (+1649)</option>

                                                                <option value="Chad">TD-CHAD (+235)</option>

                                                                <option value="Togo">TG-TOGO (+228)</option>

                                                                <option value="Thailand">TH-THAILAND (+66)</option>

                                                                <option value="Tajikistan">TJ-TAJIKISTAN (+992)</option>

                                                                <option value="Tokelau">TK-TOKELAU (+690)</option>

                                                                <option value="Timor-leste">TL-TIMOR-LESTE (+670)</option>

                                                                <option value="Turkmenistan">TM-TURKMENISTAN (+993)</option>

                                                                <option value="Tunisia">TN-TUNISIA (+216)</option>

                                                                <option value="Tonga">TO-TONGA (+676)</option>

                                                                <option value="Turkey">TR-TURKEY (+90)</option>

                                                                <option value="Trinidad and tobago">TT-TRINIDAD AND TOBAGO (+1868)</option>

                                                                <option value="Tuvalu">TV-TUVALU (+688)</option>

                                                                <option value="Taiwan, province of china">TW-TAIWAN, PROVINCE OF CHINA (+886)</option>

                                                                <option value="Tanzania, united republic of">TZ-TANZANIA, UNITED REPUBLIC OF (+255)</option>

                                                                <option value="Ukraine">UA-UKRAINE (+380)</option>

                                                                <option value="Uganda">UG-UGANDA (+256)</option>

                                                                <option value="United states">US-UNITED STATES (+1)</option>

                                                                <option value="Uruguay">UY-URUGUAY (+598)</option>

                                                                <option value="Uzbekistan">UZ-UZBEKISTAN (+998)</option>

                                                                <option value="Holy see (vatican city state)">VA-HOLY SEE (VATICAN CITY STATE) (+39)</option>

                                                                <option value="Saint vincent and the grenadines">VC-SAINT VINCENT AND THE GRENADINES (+1784)</option>

                                                                <option value="Venezuela">VE-VENEZUELA (+58)</option>

                                                                <option value="Virgin islands, british">VG-VIRGIN ISLANDS, BRITISH (+1284)</option>

                                                                <option value="Virgin islands, u.s.">VI-VIRGIN ISLANDS, U.S. (+1340)</option>

                                                                <option value="Viet nam">VN-VIET NAM (+84)</option>

                                                                <option value="Vanuatu">VU-VANUATU (+678)</option>

                                                                <option value="Wallis and futuna">WF-WALLIS AND FUTUNA (+681)</option>

                                                                <option value="Samoa">WS-SAMOA (+685)</option>

                                                                <option value="Kosovo">XK-KOSOVO (+381)</option>

                                                                <option value="Yemen">YE-YEMEN (+967)</option>

                                                                <option value="Mayotte">YT-MAYOTTE (+262)</option>

                                                                <option value="South africa">ZA-SOUTH AFRICA (+27)</option>

                                                                <option value="Zambia">ZM-ZAMBIA (+260)</option>

                                                                <option value="Zimbabwe">ZW-ZIMBABWE (+263)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-primary btn-payment submitbtn" id="billingBtn">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                             <!--    <div class="card">
                                    <div class="card-header collapsed collapseBtn"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" >
                                        <a class="card-title">
                                            Contact & Billing Information
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                        <form method="post" action="{{url('save_cart_payment')}}" id="payForm">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5 class="mb-0">Delivery Address</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Phone *</p>
                                                            <input type="text" class="form-control" placeholder="Phone *" name="shiping_tel" id="shiping_tel" required value="{{$users->phone_number}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Address *</p>
                                                            <input type="text" class="form-control" placeholder="Billing Address *" name="shiping_address" id="shiping_address" required value="{{$users->address2}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">City</p>
                                                            <input type="text" class="form-control" placeholder="Enter city" name="shiping_city" id="shiping_city" required value="{{$users->city2}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Zip Code *</p>
                                                            <input type="text" class="form-control" placeholder="Enter Zip Code *" required name="shiping_zip" id="shiping_zip" value="{{$users->zip2}}" //>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <p class="mb-1">Country *</p>
                                                            <select class="form-select" id="shiping_country" onchange="selectCountry($(this).val())" name="shiping_country" required>
                                                                <option value="">Select Country</option>
                                                                <option value="Andorra">AD-ANDORRA (+376)</option>

                                                                <option value="United arab emirates">AE-UNITED ARAB EMIRATES (+971)</option>

                                                                <option value="Afghanistan">AF-AFGHANISTAN (+93)</option>

                                                                <option value="Antigua and barbuda">AG-ANTIGUA AND BARBUDA (+1268)</option>

                                                                <option value="Anguilla">AI-ANGUILLA (+1264)</option>

                                                                <option value="Albania">AL-ALBANIA (+355)</option>

                                                                <option value="Armenia">AM-ARMENIA (+374)</option>

                                                                <option value="Netherlands antilles">AN-NETHERLANDS ANTILLES (+599)</option>

                                                                <option value="Angola">AO-ANGOLA (+244)</option>

                                                                <option value="Antarctica">AQ-ANTARCTICA (+672)</option>

                                                                <option value="Argentina">AR-ARGENTINA (+54)</option>

                                                                <option value="American samoa">AS-AMERICAN SAMOA (+1684)</option>

                                                                <option value="Austria">AT-AUSTRIA (+43)</option>

                                                                <option value="Australia">AU-AUSTRALIA (+61)</option>

                                                                <option value="Aruba">AW-ARUBA (+297)</option>

                                                                <option value="Azerbaijan">AZ-AZERBAIJAN (+994)</option>

                                                                <option value="Bosnia and herzegovina">BA-BOSNIA AND HERZEGOVINA (+387)</option>

                                                                <option value="Barbados">BB-BARBADOS (+1246)</option>

                                                                <option value="Bangladesh">BD-BANGLADESH (+880)</option>

                                                                <option value="Belgium">BE-BELGIUM (+32)</option>

                                                                <option value="Burkina faso">BF-BURKINA FASO (+226)</option>

                                                                <option value="Bulgaria">BG-BULGARIA (+359)</option>

                                                                <option value="Bahrain">BH-BAHRAIN (+973)</option>

                                                                <option value="Burundi">BI-BURUNDI (+257)</option>

                                                                <option value="Benin">BJ-BENIN (+229)</option>

                                                                <option value="Saint barthelemy">BL-SAINT BARTHELEMY (+590)</option>

                                                                <option value="Bermuda">BM-BERMUDA (+1441)</option>

                                                                <option value="Brunei darussalam">BN-BRUNEI DARUSSALAM (+673)</option>

                                                                <option value="Bolivia">BO-BOLIVIA (+591)</option>

                                                                <option value="Brazil">BR-BRAZIL (+55)</option>

                                                                <option value="Bahamas">BS-BAHAMAS (+1242)</option>

                                                                <option value="Bhutan">BT-BHUTAN (+975)</option>

                                                                <option value="Botswana">BW-BOTSWANA (+267)</option>

                                                                <option value="Belarus">BY-BELARUS (+375)</option>

                                                                <option value="Belize">BZ-BELIZE (+501)</option>

                                                                <option value="Canada">CA-CANADA (+1)</option>

                                                                <option value="Cocos (keeling) islands">CC-COCOS (KEELING) ISLANDS (+61)</option>

                                                                <option value="Congo, the democratic republic of the">CD-CONGO, THE DEMOCRATIC REPUBLIC OF THE (+243)</option>

                                                                <option value="Central african republic">CF-CENTRAL AFRICAN REPUBLIC (+236)</option>

                                                                <option value="Congo">CG-CONGO (+242)</option>

                                                                <option value="Switzerland">CH-SWITZERLAND (+41)</option>

                                                                <option value="Cote d ivoire">CI-COTE D IVOIRE (+225)</option>

                                                                <option value="Cook islands">CK-COOK ISLANDS (+682)</option>

                                                                <option value="Chile">CL-CHILE (+56)</option>

                                                                <option value="Cameroon">CM-CAMEROON (+237)</option>

                                                                <option value="China">CN-CHINA (+86)</option>

                                                                <option value="Colombia">CO-COLOMBIA (+57)</option>

                                                                <option value="Costa rica">CR-COSTA RICA (+506)</option>

                                                                <option value="Cuba">CU-CUBA (+53)</option>

                                                                <option value="Cape verde">CV-CAPE VERDE (+238)</option>

                                                                <option value="Christmas island">CX-CHRISTMAS ISLAND (+61)</option>

                                                                <option value="Cyprus">CY-CYPRUS (+357)</option>

                                                                <option value="Czech republic">CZ-CZECH REPUBLIC (+420)</option>

                                                                <option value="Germany">DE-GERMANY (+49)</option>

                                                                <option value="Djibouti">DJ-DJIBOUTI (+253)</option>

                                                                <option value="Denmark">DK-DENMARK (+45)</option>

                                                                <option value="Dominica">DM-DOMINICA (+1767)</option>

                                                                <option value="Dominican republic">DO-DOMINICAN REPUBLIC (+1809)</option>

                                                                <option value="Algeria">DZ-ALGERIA (+213)</option>

                                                                <option value="Ecuador">EC-ECUADOR (+593)</option>

                                                                <option value="Estonia">EE-ESTONIA (+372)</option>

                                                                <option value="Egypt">EG-EGYPT (+20)</option>

                                                                <option value="Eritrea">ER-ERITREA (+291)</option>

                                                                <option value="Spain">ES-SPAIN (+34)</option>

                                                                <option value="Ethiopia">ET-ETHIOPIA (+251)</option>

                                                                <option value="Finland">FI-FINLAND (+358)</option>

                                                                <option value="Fiji">FJ-FIJI (+679)</option>

                                                                <option value="Falkland islands (malvinas)">FK-FALKLAND ISLANDS (MALVINAS) (+500)</option>

                                                                <option value="Micronesia, federated states of">FM-MICRONESIA, FEDERATED STATES OF (+691)</option>

                                                                <option value="Faroe islands">FO-FAROE ISLANDS (+298)</option>

                                                                <option value="France">FR-FRANCE (+33)</option>

                                                                <option value="Gabon">GA-GABON (+241)</option>

                                                                <option value="United kingdom">GB-UNITED KINGDOM (+44)</option>

                                                                <option value="Grenada">GD-GRENADA (+1473)</option>

                                                                <option value="Georgia">GE-GEORGIA (+995)</option>

                                                                <option value="Ghana">GH-GHANA (+233)</option>

                                                                <option value="Gibraltar">GI-GIBRALTAR (+350)</option>

                                                                <option value="Greenland">GL-GREENLAND (+299)</option>

                                                                <option value="Gambia">GM-GAMBIA (+220)</option>

                                                                <option value="Guinea">GN-GUINEA (+224)</option>

                                                                <option value="Equatorial guinea">GQ-EQUATORIAL GUINEA (+240)</option>

                                                                <option value="Greece">GR-GREECE (+30)</option>

                                                                <option value="Guatemala">GT-GUATEMALA (+502)</option>

                                                                <option value="Guam">GU-GUAM (+1671)</option>

                                                                <option value="Guinea-bissau">GW-GUINEA-BISSAU (+245)</option>

                                                                <option value="Guyana">GY-GUYANA (+592)</option>

                                                                <option value="Hong kong">HK-HONG KONG (+852)</option>

                                                                <option value="Honduras">HN-HONDURAS (+504)</option>

                                                                <option value="Croatia">HR-CROATIA (+385)</option>

                                                                <option value="Haiti">HT-HAITI (+509)</option>

                                                                <option value="Hungary">HU-HUNGARY (+36)</option>

                                                                <option value="Indonesia">ID-INDONESIA (+62)</option>

                                                                <option value="Ireland">IE-IRELAND (+353)</option>

                                                                <option value="Israel">IL-ISRAEL (+972)</option>

                                                                <option value="Isle of man">IM-ISLE OF MAN (+44)</option>

                                                                <option value="India">IN-INDIA (+91)</option>

                                                                <option value="Iraq">IQ-IRAQ (+964)</option>

                                                                <option value="Iran, islamic republic of">IR-IRAN, ISLAMIC REPUBLIC OF (+98)</option>

                                                                <option value="Iceland">IS-ICELAND (+354)</option>

                                                                <option value="Italy">IT-ITALY (+39)</option>

                                                                <option value="Jamaica">JM-JAMAICA (+1876)</option>

                                                                <option value="Jordan">JO-JORDAN (+962)</option>

                                                                <option value="Japan">JP-JAPAN (+81)</option>

                                                                <option value="Kenya">KE-KENYA (+254)</option>

                                                                <option value="Kyrgyzstan">KG-KYRGYZSTAN (+996)</option>

                                                                <option value="Cambodia">KH-CAMBODIA (+855)</option>

                                                                <option value="Kiribati">KI-KIRIBATI (+686)</option>

                                                                <option value="Comoros">KM-COMOROS (+269)</option>

                                                                <option value="Saint kitts and nevis">KN-SAINT KITTS AND NEVIS (+1869)</option>

                                                                <option value="Korea democratic peoples republic of">KP-KOREA DEMOCRATIC PEOPLES REPUBLIC OF (+850)</option>

                                                                <option value="Korea republic of">KR-KOREA REPUBLIC OF (+82)</option>

                                                                <option value="Kuwait">KW-KUWAIT (+965)</option>

                                                                <option value="Cayman islands">KY-CAYMAN ISLANDS (+1345)</option>

                                                                <option value="Kazakstan">KZ-KAZAKSTAN (+7)</option>

                                                                <option value="Lao peoples democratic republic">LA-LAO PEOPLES DEMOCRATIC REPUBLIC (+856)</option>

                                                                <option value="Lebanon">LB-LEBANON (+961)</option>

                                                                <option value="Saint lucia">LC-SAINT LUCIA (+1758)</option>

                                                                <option value="Liechtenstein">LI-LIECHTENSTEIN (+423)</option>

                                                                <option value="Sri lanka">LK-SRI LANKA (+94)</option>

                                                                <option value="Liberia">LR-LIBERIA (+231)</option>

                                                                <option value="Lesotho">LS-LESOTHO (+266)</option>

                                                                <option value="Lithuania">LT-LITHUANIA (+370)</option>

                                                                <option value="Luxembourg">LU-LUXEMBOURG (+352)</option>

                                                                <option value="Latvia">LV-LATVIA (+371)</option>

                                                                <option value="Libyan arab jamahiriya">LY-LIBYAN ARAB JAMAHIRIYA (+218)</option>

                                                                <option value="Morocco">MA-MOROCCO (+212)</option>

                                                                <option value="Monaco">MC-MONACO (+377)</option>

                                                                <option value="Moldova, republic of">MD-MOLDOVA, REPUBLIC OF (+373)</option>

                                                                <option value="Montenegro">ME-MONTENEGRO (+382)</option>

                                                                <option value="Saint martin">MF-SAINT MARTIN (+1599)</option>

                                                                <option value="Madagascar">MG-MADAGASCAR (+261)</option>

                                                                <option value="Marshall islands">MH-MARSHALL ISLANDS (+692)</option>

                                                                <option value="Macedonia, the former yugoslav republic of">MK-MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF (+389)</option>

                                                                <option value="Mali">ML-MALI (+223)</option>

                                                                <option value="Myanmar">MM-MYANMAR (+95)</option>

                                                                <option value="Mongolia">MN-MONGOLIA (+976)</option>

                                                                <option value="Macau">MO-MACAU (+853)</option>

                                                                <option value="Northern mariana islands">MP-NORTHERN MARIANA ISLANDS (+1670)</option>

                                                                <option value="Mauritania">MR-MAURITANIA (+222)</option>

                                                                <option value="Montserrat">MS-MONTSERRAT (+1664)</option>

                                                                <option value="Malta">MT-MALTA (+356)</option>

                                                                <option value="Mauritius">MU-MAURITIUS (+230)</option>

                                                                <option value="Maldives">MV-MALDIVES (+960)</option>

                                                                <option value="Malawi">MW-MALAWI (+265)</option>

                                                                <option value="Mexico">MX-MEXICO (+52)</option>

                                                                <option value="Malaysia">MY-MALAYSIA (+60)</option>

                                                                <option value="Mozambique">MZ-MOZAMBIQUE (+258)</option>

                                                                <option value="Namibia">NA-NAMIBIA (+264)</option>

                                                                <option value="New caledonia">NC-NEW CALEDONIA (+687)</option>

                                                                <option value="Niger">NE-NIGER (+227)</option>

                                                                <option value="Nigeria">NG-NIGERIA (+234)</option>

                                                                <option value="Nicaragua">NI-NICARAGUA (+505)</option>

                                                                <option value="Netherlands">NL-NETHERLANDS (+31)</option>

                                                                <option value="Norway">NO-NORWAY (+47)</option>

                                                                <option value="Nepal">NP-NEPAL (+977)</option>

                                                                <option value="Nauru">NR-NAURU (+674)</option>

                                                                <option value="Niue">NU-NIUE (+683)</option>

                                                                <option value="New zealand">NZ-NEW ZEALAND (+64)</option>

                                                                <option value="Oman">OM-OMAN (+968)</option>

                                                                <option value="Panama">PA-PANAMA (+507)</option>

                                                                <option value="Peru">PE-PERU (+51)</option>

                                                                <option value="French polynesia">PF-FRENCH POLYNESIA (+689)</option>

                                                                <option value="Papua new guinea">PG-PAPUA NEW GUINEA (+675)</option>

                                                                <option value="Philippines">PH-PHILIPPINES (+63)</option>

                                                                <option value="Pakistan">PK-PAKISTAN (+92)</option>

                                                                <option value="Poland">PL-POLAND (+48)</option>

                                                                <option value="Saint pierre and miquelon">PM-SAINT PIERRE AND MIQUELON (+508)</option>

                                                                <option value="Pitcairn">PN-PITCAIRN (+870)</option>

                                                                <option value="Puerto rico">PR-PUERTO RICO (+1)</option>

                                                                <option value="Portugal">PT-PORTUGAL (+351)</option>

                                                                <option value="Palau">PW-PALAU (+680)</option>

                                                                <option value="Paraguay">PY-PARAGUAY (+595)</option>

                                                                <option value="Qatar">QA-QATAR (+974)</option>

                                                                <option value="Romania">RO-ROMANIA (+40)</option>

                                                                <option value="Serbia">RS-SERBIA (+381)</option>

                                                                <option value="Russian federation">RU-RUSSIAN FEDERATION (+7)</option>

                                                                <option value="Rwanda">RW-RWANDA (+250)</option>

                                                                <option value="Saudi arabia">SA-SAUDI ARABIA (+966)</option>

                                                                <option value="Solomon islands">SB-SOLOMON ISLANDS (+677)</option>

                                                                <option value="Seychelles">SC-SEYCHELLES (+248)</option>

                                                                <option value="Sudan">SD-SUDAN (+249)</option>

                                                                <option value="Sweden">SE-SWEDEN (+46)</option>

                                                                <option value="Singapore">SG-SINGAPORE (+65)</option>

                                                                <option value="Saint helena">SH-SAINT HELENA (+290)</option>

                                                                <option value="Slovenia">SI-SLOVENIA (+386)</option>

                                                                <option value="Slovakia">SK-SLOVAKIA (+421)</option>

                                                                <option value="Sierra leone">SL-SIERRA LEONE (+232)</option>

                                                                <option value="San marino">SM-SAN MARINO (+378)</option>

                                                                <option value="Senegal">SN-SENEGAL (+221)</option>

                                                                <option value="Somalia">SO-SOMALIA (+252)</option>

                                                                <option value="Suriname">SR-SURINAME (+597)</option>

                                                                <option value="Sao tome and principe">ST-SAO TOME AND PRINCIPE (+239)</option>

                                                                <option value="El salvador">SV-EL SALVADOR (+503)</option>

                                                                <option value="Syrian arab republic">SY-SYRIAN ARAB REPUBLIC (+963)</option>

                                                                <option value="Swaziland">SZ-SWAZILAND (+268)</option>

                                                                <option value="Turks and caicos islands">TC-TURKS AND CAICOS ISLANDS (+1649)</option>

                                                                <option value="Chad">TD-CHAD (+235)</option>

                                                                <option value="Togo">TG-TOGO (+228)</option>

                                                                <option value="Thailand">TH-THAILAND (+66)</option>

                                                                <option value="Tajikistan">TJ-TAJIKISTAN (+992)</option>

                                                                <option value="Tokelau">TK-TOKELAU (+690)</option>

                                                                <option value="Timor-leste">TL-TIMOR-LESTE (+670)</option>

                                                                <option value="Turkmenistan">TM-TURKMENISTAN (+993)</option>

                                                                <option value="Tunisia">TN-TUNISIA (+216)</option>

                                                                <option value="Tonga">TO-TONGA (+676)</option>

                                                                <option value="Turkey">TR-TURKEY (+90)</option>

                                                                <option value="Trinidad and tobago">TT-TRINIDAD AND TOBAGO (+1868)</option>

                                                                <option value="Tuvalu">TV-TUVALU (+688)</option>

                                                                <option value="Taiwan, province of china">TW-TAIWAN, PROVINCE OF CHINA (+886)</option>

                                                                <option value="Tanzania, united republic of">TZ-TANZANIA, UNITED REPUBLIC OF (+255)</option>

                                                                <option value="Ukraine">UA-UKRAINE (+380)</option>

                                                                <option value="Uganda">UG-UGANDA (+256)</option>

                                                                <option value="United states">US-UNITED STATES (+1)</option>

                                                                <option value="Uruguay">UY-URUGUAY (+598)</option>

                                                                <option value="Uzbekistan">UZ-UZBEKISTAN (+998)</option>

                                                                <option value="Holy see (vatican city state)">VA-HOLY SEE (VATICAN CITY STATE) (+39)</option>

                                                                <option value="Saint vincent and the grenadines">VC-SAINT VINCENT AND THE GRENADINES (+1784)</option>

                                                                <option value="Venezuela">VE-VENEZUELA (+58)</option>

                                                                <option value="Virgin islands, british">VG-VIRGIN ISLANDS, BRITISH (+1284)</option>

                                                                <option value="Virgin islands, u.s.">VI-VIRGIN ISLANDS, U.S. (+1340)</option>

                                                                <option value="Viet nam">VN-VIET NAM (+84)</option>

                                                                <option value="Vanuatu">VU-VANUATU (+678)</option>

                                                                <option value="Wallis and futuna">WF-WALLIS AND FUTUNA (+681)</option>

                                                                <option value="Samoa">WS-SAMOA (+685)</option>

                                                                <option value="Kosovo">XK-KOSOVO (+381)</option>

                                                                <option value="Yemen">YE-YEMEN (+967)</option>

                                                                <option value="Mayotte">YT-MAYOTTE (+262)</option>

                                                                <option value="South africa">ZA-SOUTH AFRICA (+27)</option>

                                                                <option value="Zambia">ZM-ZAMBIA (+260)</option>

                                                                <option value="Zimbabwe">ZW-ZIMBABWE (+263)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-primary btn-payment submitbtn" id="shippingBtn">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="tab-pane fade mt-5" id="nav-inquires" role="tabpanel" aria-labelledby="nav-inquires-tab">
                            <div class="col-md-8">
                                <strong>Inquiries</strong>
                                @if($inquiries->count()==0)
                                    <p>You currently do not have any enquiry submitted with Research and Markets</p>
                                @endif
                            </div>
                            <div class="col-md-4"><button type="button" id="btnEnquiry" data-bs-toggle="modal" data-bs-target="#enqueryModals" style="cursor:pointer" class="btn btn-primary">Submit Enquiry</button> </div>
                            @if($inquiries->count()>0)
                            <div class="col-md-12 mt-4">
                                <strong>Inquiries</strong>
                                <table class="table table-striped table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Question</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inquiries as $inquiry)
                                        <tr>
                                            <td>{{$inquiry->id}}</td>
                                            <td>{{$inquiry->question}}</td>
                                            <td>{{$inquiry->created_at}}</td>
                                            <td><a href="javascript:"  data-id="{{$inquiry->id}}" data-bs-toggle="modal" data-bs-target="#enqueryModals" style="cursor:pointer" onclick="$('#qid').val({{$inquiry->id}}); $('#question').val('{{$inquiry->question}}')">Edit</a> | <a href="javascript:" class="delQuestion" data-id="{{$inquiry->id}}">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane fade mt-5" id="nav-interest" role="tabpanel" aria-labelledby="nav-interest-tab">
                            <div class="row">
                                <div class="col-8 mt-2"><strong>Details</strong></div>
                                <div class="col-4 mt-2"><button class="btns btn-primary expand_all" type="button">Expand All</button></div>
                                <div class="col-12 mt-2 mb-2">Please update your details using the form below</div>
                            </div>
                            <div class="container">
                                <div id="accordionInt" class="accordion">
                                    <div class="card mb-0">
                                        <div class="card-header collapsed collapseBtn"  data-toggle="collapse" data-target="#collapseIntOne" aria-expanded="true" aria-controls="collapseIntOne">
                                            <a class="card-title">
                                                Categories
                                            </a>
                                        </div>
                                        <div id="collapseIntOne" class="card-body collapse" data-parent="#accordionInt" >
                                            <ul class="list-group">
                                                @php
                                                   $cat = '';
                                                @endphp

                                                 @foreach($categories as $category)
                                                  @if($category->cat_name != $cat)
                                                    @if($cat !='')  
                                                        </ul>
                                                        </li>
                                                    @endif
                                                    <li class="list-group-item">{{$category->cat_name}}
                                                        <ul class="list-group">
                                                         @php
                                                   $cat = $category->cat_name;
                                                @endphp   
                                                  @endif
                                                        <li class="list-group-item">{{$category->sub_cat_name}}</li>
                                                  @endforeach
                                                    </ul>
                                                    </li>
                                                    
                                             
                                            </ul>

                                        </div>
                                        <div class="card-header collapsed collapseBtn"  data-toggle="collapse" data-target="#collapseIntTwo" aria-expanded="true" aria-controls="collapseIntTwo">
                                            <a class="card-title">
                                              Companies
                                            </a>
                                        </div>
                                        <div id="collapseIntTwo" class="card-body collapse" data-parent="#accordionInt" >
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                                craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </p>
                                        </div>
                                        <div class="card-header collapsed collapseBtn"  data-toggle="collapse" data-target="#collapseIntThree" aria-expanded="true" aria-controls="collapseIntThree">
                                            <a class="card-title">
                                              Tags
                                            </a>
                                        </div>
                                        <div id="collapseIntThree" class="collapse" data-parent="#accordionInt" >
                                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                                aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-5" id="nav-logout" role="tabpanel" aria-labelledby="nav-logout-tab">

                            <div class="col-md-12">
                                <strong>Log out of your account</strong>
                                <p>Please confirm that you want to logout from your account</p>
                            </div>
                            <div class="col-md-6" style="text-align:right;">
                                <a class="dropdown-item" href="{{ route('user/logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    <button type="button" style="cursor:pointer" class="btn btn-primary">{{ __('Logout') }}</button>
                                </a>
                                <form id="logout-form" action="{{ route('user/logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
    <div class="modal fade" id="enqueryModals" tabindex="-1" aria-labelledby="enqueryModalsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enqueryModalsLabel">Ask A Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="alert-success col-md-12 mb-2" id="reg_msg" style="display:none;padding:10px;border-radius: 5px;">      
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <p class="mb-0">Your Question:</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="hidden" id="qid" />
                            <textarea name="question" id="question" placeholder="Question" rows="6" cols="55"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12" style="text-align:right;">
                        <button type="button" name="questionBtn" id="questionBtn" class="btn btn-primary">Send Qustion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    var bill_country = '{{$users->country}}';
    var ship_country = '{{$users->country2}}';
</script>
@endsection