@extends('layout/header')
@section('title','Upcoming Report')
@section('content')
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<style>
   .iti--separate-dial-code{
      width:100%!important;
   }
   #more {display: none;}
</style>
 <link rel="stylesheet" media="all" href="{{asset('css/ab-product.css')}}"> 
<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">Market Research Report</h1>
         </div>
      </div>
   </div>
</section>

<section class="main-content mb-5 mt-5">
      <div class="container">
         <div class="row">

            <div class="col-md-9 sm-100">

               <div class="box-shadow">

                  <div class="row  category-box">
                     <div class=" col-md-3">
                          <div class="ab-product-thumbnail-book-binder left ms-2">
                           <div class="product-img-box">
                                       <span class="image-report" style="color:#fff;top: 10px;left: 3px;font-size: 8px;">Report</span>
                                       <h4 class="image-title" style="color: #000;top: 40px;font-size: 11px;text-align: left;width: 80px;left: 6px;">
                                       <?php echo substr(html_entity_decode(strip_tags($datas->title)),0,45); ?></h4>                      
                                       </h4>
                                       <span class="imag-pages" style="color: #000;font-size: 8px;left: 5px;bottom: 5px;">@php echo ($datas->no_of_page) ? $datas->no_of_page : '0' @endphp pages</span>
                                       <span class="book-years" style="color: ;font-size: 9px;right: 14px;bottom: 3px;">{{ Carbon\Carbon::parse($datas->report_post_date)->format('M Y') }}</span>
                                    </div>
                                    <img loading="lazy" class="nonGenericproductSmallImage "src="{{asset('img/reportimg.jpg')}}"  width="107px" alt="Report">
                                 </div>
                     </div>
                     <div class="col-md-9">
                        <a class="fw-600 d-block blue pt-2" href="{{ url('report-store') }}/{{($datas->page_url)}}"target="_blank"><h1 class="title_heading">{{$datas->title}}</h1></a>
                        <p class="fs-14 mb-2">
                           <h2 class="title_descr">
                              <?php echo substr($datas->heading2,0,180); ?><span id="dots">...</span><span id="more"><?php echo trim(substr($datas->heading2,180,2000));  ?>
                              </span>

                              <a href="javascript:void()" onclick="myFunction()" id="myBtn2" class="read-more-small-btn text-danger"> Read more</a>
                           </h2>
                        </p>
                         <ul id="productDetails" class="ab-product-header-info">
                            <li><i class="fa fa-industry" aria-hidden="true" style="color:#c00000"></i>{{$datas->cat_name}}</li>                
                  
               
                  <li> Pages : {{$datas->no_of_page}}  </li>
                  <li id="publicationDateItemId_5395374" class="publicationDateItem" data-result="Thursday, April 6, 2023"><i class="fa fa-calendar" aria-hidden="true" style="color:#c00000"></i>{{ Carbon\Carbon::parse($datas->report_post_date)->format('M Y') }}</li>
                    <li>
                     Report Format : &nbsp;
                     <!-- <img alt="PDF Icon" src="{{asset('/assets/images/icon-PDF.webp')}}"  width="25" alt="pdf">   -->
                     <i class="fa fa-file-pdf-o" style="color:#c00000; font-size:15px"></i>,&nbsp;<i class="fa fa-file-excel-o" style="color:#c00000; font-size:15px"></i>,&nbsp;<i class="fa fa-file-powerpoint-o" style="color:#c00000; font-size:15px"></i>
                  </li>
               </ul>
                     </div>
                  </div>

                  
               </div>


               <div class="box-shadow">
                 
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade" id="Overview" role="tabpanel"
                        aria-labelledby="Overview-tab">

                        <div class="tabs-content">
                           <?php echo $datas->decription;  ?>                          
                        </div>

                     </div>
                     <div class="tab-pane fade " id="Content" role="tabpanel" aria-labelledby="Content-tab">
                        <p><?php echo $datas->table_of_content;  ?> </p>
                     </div>
                     <div class="tab-pane fade" id="Segmentation" role="tabpanel" aria-labelledby="Segmentation-tab">
                        <img src="{{url('/')}}/{{$datas->segmentaion}}" /> 
                     </div>


                     <div class="tab-pane fade show active" id="Request" role="tabpanel" aria-labelledby="Request-tab">
                     <div class="p-4">
                        @if(session()->has('success'))
                        <div class="alert-success" style="padding:18px;border-radius: 5px;">
                           <strong>Success!</strong> {{ session()->get('success') }}
                        </div>
                        <br>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert-danger" style="padding:18px;border-radius: 5px;">
                           <strong>Warning!</strong> {{ session()->get('error') }}
                        </div>
                        <br>
                        @endif
                        <form action="{{ url('save_talk_to_our') }}" method="post">
                           @csrf
                           <input type="hidden" name="request_title" value="{{$datas->title}}" />
                        
                            <div class="row" style="align-items: center;">
                     <div class="col-md-3">
                        <p style="font-size: 16px;">Full Name<span style="color:var(--primary-color)">*</span></p>
                     </div>
                     <div class="col-md-9">
                        <input class="ab-input" type="text" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your name" required>
                     </div>
                  </div>
                  <div class="row" style="align-items: center;">
                     <div class="col-md-3">
                        <p style="font-size: 16px;">Company Name<span style="color:var(--primary-color)">*</span></p>
                     </div>
                     <div class="col-md-9">
                        <input class="ab-input" type="text" name="company_name"  placeholder="Enter your company name" value="{{ old('company_name') }}">
                     </div>
                  </div>
                       
                            <div class="row" style="align-items: center;">
                     <div class="col-md-3">
                        <p style="font-size: 16px;">Business Email<span style="color:var(--primary-color)">*</span></p>
                     </div>
                     <div class="col-md-9">
                        <input class="ab-input" type="email"  name="busniess_email" placeholder="Enter your business email" value="{{ old('busniess_email') }}">
                     </div>
                  </div>
                 <div class="row" style="align-items: center;">
                     <div class="col-md-3">
                        <p style="font-size: 16px;">country<span style="color:var(--primary-color)">*</span></p>
                     </div>
                     <div class="col-md-9">
                       
                         <select class="ab-input" id="country" name="country_name" placeholder="Select Country">
                                 <option value>Select Country</option>
                                 <option value="Afghanistan +(93)">Afghanistan +(93)</option>
                                 <option value="Albania +(355)">Albania +(355)</option>
                                 <option value="Algeria +(213)">Algeria +(213)</option>
                                 <option value="American Samoa +(1-684)">American Samoa +(1-684)</option>
                                 <option value="Andorra +(376)">Andorra +(376)</option>
                                 <option value="Angola +(244)">Angola +(244)</option>
                                 <option value="Anguilla +(1-264)">Anguilla +(1-264)</option>
                                 <option value="Antarctica +(672)">Antarctica +(672)</option>
                                 <option value="Antigua and Barbuda +(1-268)">Antigua and Barbuda +(1-268)</option>
                                 <option value="Argentina +(54)">Argentina +(54)</option>
                                 <option value="Armenia +(374)">Armenia +(374)</option>
                                 <option value="Aruba +(297)">Aruba +(297)</option>
                                 <option value="Australia +(61)">Australia +(61)</option>
                                 <option value="Austria +(43)">Austria +(43)</option>
                                 <option value="Azerbaijan +(994)">Azerbaijan +(994)</option>
                                 <option value="Bahamas +(1-242)">Bahamas +(1-242)</option>
                                 <option value="Bahrain +(973)">Bahrain +(973)</option>
                                 <option value="Bangladesh +(880)">Bangladesh +(880)</option>
                                 <option value="Barbados +(1-246)">Barbados +(1-246)</option>
                                 <option value="Belarus +(375)">Belarus +(375)</option>
                                 <option value="Belgium +(32)">Belgium +(32)</option>
                                 <option value="Belize +(501)">Belize +(501)</option>
                                 <option value="Benin +(229)">Benin +(229)</option>
                                 <option value="Bermuda +(1-441)">Bermuda +(1-441)</option>
                                 <option value="Bhutan +(975)">Bhutan +(975)</option>
                                 <option value="Bolivia +(591)">Bolivia +(591)</option>
                                 <option value="Bosnia and Herzegowina +(387)">Bosnia and Herzegowina +(387)</option>
                                 <option value="Botswana +(267)">Botswana +(267)</option>
                                 <option value="Bouvet Island +(47)">Bouvet Island +(47)</option>
                                 <option value="Brazil +(55)">Brazil +(55)</option>
                                 <option value="British Indian Ocean Territory +(246)">British Indian Ocean Territory +(246)</option>
                                 <option value="Brunei Darussalam +(673)">Brunei Darussalam +(673)</option>
                                 <option value="Bulgaria +(359)">Bulgaria +(359)</option>
                                 <option value="Burkina Faso +(226)">Burkina Faso +(226)</option>
                                 <option value="Burundi +(257)">Burundi +(257)</option>
                                 <option value="Cambodia +(855)">Cambodia +(855)</option>
                                 <option value="Cameroon +(237)">Cameroon +(237)</option>
                                 <option value="Canada +(1)">Canada +(1)</option>
                                 <option value="Cape Verde +(238)">Cape Verde +(238)</option>
                                 <option value="Cayman Islands +(1-345)">Cayman Islands +(1-345)</option>
                                 <option value="Central African Republic +(236)">Central African Republic +(236)</option>
                                 <option value="Chad +(235)">Chad +(235)</option>
                                 <option value="Chile +(56)">Chile +(56)</option>
                                 <option value="China +(86)">China +(86)</option>
                                 <option value="Christmas Island +(61)">Christmas Island +(61)</option>
                                 <option value="Cocos (Keeling) Islands +(61)">Cocos (Keeling) Islands +(61)</option>
                                 <option value="Colombia +(57)">Colombia +(57)</option>
                                 <option value="Comoros +(269)">Comoros +(269)</option>
                                 <option value="Congo Democratic Republic of +(242)">Congo Democratic Republic of +(242)</option>
                                 <option value="Cook Islands +(682)">Cook Islands +(682)</option>
                                 <option value="Costa Rica +(506)">Costa Rica +(506)</option>
                                 <option value="Cote D'Ivoire +(225)">Cote D'Ivoire +(225)</option>
                                 <option value="Croatia +(385)">Croatia +(385)</option>
                                 <option value="Cuba +(53)">Cuba +(53)</option>
                                 <option value="Cyprus +(357)">Cyprus +(357)</option>
                                 <option value="Czech Republic +(420)">Czech Republic +(420)</option>
                                 <option value="Denmark +(45)">Denmark +(45)</option>
                                 <option value="Djibouti +(253)">Djibouti +(253)</option>
                                 <option value="Dominica +(1-767)">Dominica +(1-767)</option>
                                 <option value="Dominican Republic +(1-809)">Dominican Republic +(1-809)</option>
                                 <option value="Timor-Leste +(670)">Timor-Leste +(670)</option>
<option value="Ecuador +(593)">Ecuador +(593)</option>
<option value="Egypt +(20)">Egypt +(20)</option>
<option value="El Salvador +(503)">El Salvador +(503)</option>
<option value="Equatorial Guinea +(240)">Equatorial Guinea +(240)</option>
<option value="Eritrea +(291)">Eritrea +(291)</option>
<option value="Estonia +(372)">Estonia +(372)</option>
<option value="Ethiopia +(251)">Ethiopia +(251)</option>
<option value="Falkland Islands (Malvinas) +(500)">Falkland Islands (Malvinas) +(500)</option>
<option value="Faroe Islands +(298)">Faroe Islands +(298)</option>
<option value="Fiji +(679)">Fiji +(679)</option>
<option value="Finland +(358)">Finland +(358)</option>
<option value="France +(33)">France +(33)</option>
<option value="French Guiana +(594)">French Guiana +(594)</option>
<option value="French Polynesia +(689)">French Polynesia +(689)</option>
<option value="French Southern Territories +(262)">French Southern Territories +(262)</option>
<option value="Gabon +(241)">Gabon +(241)</option>
<option value="Gambia +(220)">Gambia +(220)</option>
<option value="Georgia +(995)">Georgia +(995)</option>
<option value="Germany +(49)">Germany +(49)</option>
<option value="Ghana +(233)">Ghana +(233)</option>
<option value="Gibraltar +(350)">Gibraltar +(350)</option>
<option value="Greece +(30)">Greece +(30)</option>
<option value="Greenland +(299)">Greenland +(299)</option>
<option value="Grenada +(1-473)">Grenada +(1-473)</option>
<option value="Guadeloupe +(590)">Guadeloupe +(590)</option>
<option value="Guam +(1-671)">Guam +(1-671)</option>
<option value="Guatemala +(502)">Guatemala +(502)</option>
<option value="Guinea +(224)">Guinea +(224)</option>
<option value="Guinea-bissau +(245)">Guinea-bissau +(245)</option>
<option value="Guyana +(592)">Guyana +(592)</option>
<option value="Haiti +(509)">Haiti +(509)</option>
<option value="Heard Island and McDonald Islands +(011)">Heard Island and McDonald Islands +(011)</option>
<option value="Honduras +(504)">Honduras +(504)</option>
<option value="Hong Kong +(852)">Hong Kong +(852)</option>
<option value="Hungary +(36)">Hungary +(36)</option>
<option value="Iceland +(354)">Iceland +(354)</option>
<option value="India +(91)">India +(91)</option>
<option value="Indonesia +(62)">Indonesia +(62)</option>
<option value="Iran (Islamic Republic of) +(98)">Iran (Islamic Republic of) +(98)</option>
<option value="Iraq +(964)">Iraq +(964)</option>
<option value="Ireland +(353)">Ireland +(353)</option>
<option value="Israel +(972)">Israel +(972)</option>
<option value="Italy +(39)">Italy +(39)</option>
<option value="Jamaica +(1-876)">Jamaica +(1-876)</option>
<option value="Japan +(81)">Japan +(81)</option>
<option value="Jordan +(962)">Jordan +(962)</option>
<option value="Kazakhstan +(7)">Kaz
 
akhstan +(7)</option>
<option value="Kenya +(254)">Kenya +(254)</option>
<option value="Kiribati +(686)">Kiribati +(686)</option>
<option value="Korea, Democratic People's Republic of +(850)">Korea, Democratic People's Republic of +(850)</option>
<option value="South Korea +(82)">South Korea +(82)</option>
<option value="Kuwait +(965)">Kuwait +(965)</option>
<option value="Kyrgyzstan +(996)">Kyrgyzstan +(996)</option>
<option value="Lao People's Democratic Republic +(856)">Lao People's Democratic Republic +(856)</option>
<option value="Latvia +(371)">Latvia +(371)</option>
<option value="Lebanon +(961)">Lebanon +(961)</option>
<option value="Lesotho +(266)">Lesotho +(266)</option>
<option value="Liberia +(231)">Liberia +(231)</option>
<option value="Libya +(218)">Libya +(218)</option>
<option value="Liechtenstein +(423)">Liechtenstein +(423)</option>
<option value="Lithuania +(370)">Lithuania +(370)</option>
<option value="Luxembourg +(352)">Luxembourg +(352)</option>
<option value="Macao +(853)">Macao +(853)</option>
<option value="Macedonia, The Former Yugoslav Republic of +(389)">Macedonia, The Former Yugoslav Republic of +(389)</option>
<option value="Madagascar +(261)">Madagascar +(261)</option>
<option value="Malawi +(265)">Malawi +(265)</option>
<option value="Malaysia +(60)">Malaysia +(60)</option>
<option value="Maldives +(960)">Maldives +(960)</option>
<option value="Mali +(223)">Mali +(223)</option>
<option value="Malta +(356)">Malta +(356)</option>
<option value="Marshall Islands +(692)">Marshall Islands +(692)</option>
<option value="Martinique +(596)">Martinique +(596)</option>
<option value="Mauritania +(222)">Mauritania +(222)</option>
<option value="Mauritius +(230)">Mauritius +(230)</option>
<option value="Mayotte +(262)">Mayotte +(262)</option>
<option value="Mexico +(52)">Mexico +(52)</option>
<option value="Micronesia, Federated States of +(691)">Micronesia, Federated States of +(691)</option>
<option value="Moldova +(373)">Moldova +(373)</option>
<option value="Monaco +(377)">Monaco +(377)</option>
<option value="Mongolia +(976)">Mongolia +(976)</option>
<option value="Montserrat +(1-664)">Montserrat +(1-664)</option>
<option value="Morocco +(212)">Morocco +(212)</option>
<option value="Mozambique +(258)">Mozambique +(258)</option>
<option value="Myanmar +(95)">Myanmar +(95)</option>
<option value="Namibia +(264)">Namibia +(264)</option>
<option value="Nauru +(674)">Nauru +(674)</option>
<option value="Nepal +(977)">Nepal +(977)</option>
<option value="Netherlands +(31)">Netherlands +(31)</option>
<option value="Netherlands Antilles +(599)">Netherlands Antilles +(599)</option>
<option value="New Caledonia +(687)">New Caledonia +(687)</option>
<option value="New Zealand +(64)">New Zealand +(64)</option>
<option value="Nicaragua +(505)">Nicaragua +(505)</option>
<option value="Niger +(227)">Niger +(227)</option>
<option value="Nigeria +(234)">Nigeria +(234)</option>
<option value="Niue +(683)">Niue +(683)</option>
<option value="Norfolk Island +(672)">Norfolk Island +(672)</option>
<option value="Northern Mariana Islands +(1-670)">Northern Mariana Islands +(1-670)</option>
<option value="Norway +(47)">Norway +(47)</option>
<option value="Oman +(968)">Oman +(968)</option>
<option value="Pakistan +(92)">Pakistan +(92)</option>
<option value="Palau +(680)">Palau +(680)</option>
<option value="Panama +(507)">Panama +(507)</option>
<option value="Papua New Guinea +(675)">Papua New Guinea +(675)</option>
<option value="Paraguay +(595)">Paraguay +(595)</option>
<option value="Peru +(51)">Peru +(51)</option>
<option value="Philippines +(63)">Philippines +(63)</option>
<option value="Pitcairn +(64)">Pitcairn +(64)</option>
<option value="Poland +(48)">Poland +(48)</option>
<option value="Portugal +(351)">Portugal +(351)</option>
<option value="Puerto Rico +(1-787)">Puerto Rico +(1-787)</option>
<option value="Qatar +(974)">Qatar +(974)</option>
<option value="Reunion +(262)">Reunion +(262)</option>
<option value="Romania +(40)">Romania +(40)</option>
<option value="Russian Federation +(7)">Russian Federation +(7)</option>
<option value="Rwanda +(250)">Rwanda +(250)</option>
<option value="Saint Kitts and Nevis +(1-869)">Saint Kitts and Nevis +(1-869)</option>
<option value="Saint Lucia +(1-758)">Saint Lucia +(1-758)</option>
<option value="Saint Vincent and the Grenadines +(1-784)">Saint Vincent and the Grenadines +(1-784)</option>
<option value="Samoa +(685)">Samoa +(685)</option>
<option value="San Marino +(378)">San Marino +(378)</option>
<option value="Sao Tome and Principe +(239)">Sao Tome and Principe +(239)</option>
<option value="Saudi Arabia +(966)">Saudi Arabia +(966)</option>
<option value="Senegal +(221)">Senegal +(221)</option>
<option value="Seychelles +(248)">Seychelles +(248)</option>
<option value="Sierra Leone +(232)">Sierra Leone +(232)</option>
<option value="Singapore +(65)">Singapore +(65)</option>
<option value="Slovakia (Slovak Republic) +(421)">Slovakia (Slovak Republic) +(421)</option>
<option value="Slovenia +(386)">Slovenia +(386)</option>
<option value="Solomon Islands +(677)">Solomon Islands +(677)</option>
<option value="Somalia +(252)">Somalia +(252)</option>
<option value="South Africa +(27)">South Africa +(27)</option>
<option value="South Georgia and the South Sandwich Islands +(500)">South Georgia and the South Sandwich Islands +(500)</option>
<option value="Spain +(34)">Spain +(34)</option>
<option value="Sri Lanka +(94)">Sri Lanka +(94)</option>
<option value="Saint Helena, Ascension and Tristan da Cunha +(290)">Saint Helena, Ascension and Tristan da Cunha +(290)</option>
<option value="St. Pierre and Miquelon +(508)">St. Pierre and Miquelon +(508)</option>
<option value="Sudan +(249)">Sudan +(249)</option>
<option value="Suriname +(597)">Suriname +(597)</option>
<option value="Svalbard and Jan Mayen Islands +(47)">Svalbard and Jan Mayen Islands +(47)</option>
<option value="Swaziland +(268)">Swaziland +(268)</option>
<option value="Sweden +(46)">Sweden +(46)</option>
<option value="Switzerland +(41)">Switzerland +(41)</option>
<option value="Syrian Arab Republic +(963)">Syrian Arab Republic +(963)</option>
<option value="Taiwan +(886)">Taiwan +(886)</option>
<option value="Tajikistan +(992)">Tajikistan +(992)</option>
<option value="Tanzania, United Republic of +(255)">Tanzania, United Republic of +(255)</option>
<option value="Thailand +(66)">Thailand +(66)</option>
<option value="Togo +(228)">Togo +(228)</option>
<option value="Tokelau +(690)">Tokelau +(690)</option>
<option value="Tonga +(676)">Tonga +(676)</option>
<option value="Trinidad and Tobago +(1-868)">Trinidad and Tobago +(1-868)</option>
<option value="Tunisia +(216)">Tunisia +(216)</option>
<option value="Turkey +(90)">Turkey +(90)</option>
<option value="Turkmenistan +(993)">Turkmenistan +(993)</option>
<option value="
 
Turks and Caicos Islands +(1-649)">Turks and Caicos Islands +(1-649)</option>
<option value="Tuvalu +(688)">Tuvalu +(688)</option>
<option value="Uganda +(256)">Uganda +(256)</option>
<option value="Ukraine +(380)">Ukraine +(380)</option>
<option value="United Arab Emirates +(971)">United Arab Emirates +(971)</option>
<option value="United Kingdom +(44)">United Kingdom +(44)</option>
<option value="United States +(1)">United States +(1)</option>
<option value="United States Minor Outlying Islands +(246)">United States Minor Outlying Islands +(246)</option>
<option value="Uruguay +(598)">Uruguay +(598)</option>
<option value="Uzbekistan +(998)">Uzbekistan +(998)</option>
<option value="Vanuatu +(678)">Vanuatu +(678)</option>
<option value="Vatican City State (Holy See) +(379)">Vatican City State (Holy See) +(379)</option>
<option value="Venezuela +(58)">Venezuela +(58)</option>
<option value="Vietnam +(84)">Vietnam +(84)</option>
<option value="Virgin Islands (British) +(1-284)">Virgin Islands (British) +(1-284)</option>
<option value="Virgin Islands (U.S.) +(1-340)">Virgin Islands (U.S.) +(1-340)</option>
<option value="Wallis and Futuna Islands +(681)">Wallis and Futuna Islands +(681)</option>
<option value="Western Sahara +(212)">Western Sahara +(212)</option>
<option value="Yemen +(967)">Yemen +(967)</option>
<option value="Serbia +(381)">Serbia +(381)</option>
<option value="Zambia +(260)">Zambia +(260)</option>
<option value="Zimbabwe +(263)">Zimbabwe +(263)</option>
<option value="Aaland Islands +(358)">Aaland Islands +(358)</option>
<option value="Palestine +(970)">Palestine +(970)</option>
<option value="Montenegro +(382)">Montenegro +(382)</option>
<option value="Guernsey +(44-1481)">Guernsey +(44-1481)</option>
<option value="Isle of Man +(44-1624)">Isle of Man +(44-1624)</option>
<option value="Jersey +(44-1534)">Jersey +(44-1534)</option>
<option value="Curaçao +(599)">Curaçao +(599)</option>
<option value="Ivory Coast +(225)">Ivory Coast +(225)</option>
<option value="Kosovo +(383)">Kosovo +(383)</option>
</select>
                     </div>
                  </div>
                            <div class="row" style="align-items: center;">
                     <div class="col-md-3">
                        <p style="font-size: 16px;">Phone<span style="color:var(--primary-color)">*</span></p>
                     </div>
                     <div class="col-md-9">
                        <input class="ab-input mobivali" type="text" maxlength="13" style="height:49px;"  name="phone" value="{{ old('phone') }}" placeholder="Enter Your Phone Number">
                     </div>
                  </div>
                                              
                  <div class="row" style="align-items: center;">
                     <div class="col-md-3">
                        <p style="font-size: 16px;">Message<span style="color:var(--primary-color)">*</span></p>
                     </div>
                     <div class="col-md-9">
                        <textarea class="ab-input"  name="message" cols="10" rows="1">{{ old('message') }}</textarea> 
                     </div>
                  </div>
                          <div class="row" style="align-items: center;">
                     <div class="col-md-3">
                        
                     </div>
                     <div class="col-md-9">
                       <div class="col-12">
                            
                               <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                           </div>
                           <div class="col-12 mt-2">
                            
                           @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                           </div> 
                     </div>
                  </div>
                           <div class="text-center pt-4">
                              <button type="submit" class="btns btn-primary">Submit Request</button>
                           </div>
                           <input type="hidden" name="country_name" id="country-name"  value="United States" />
                        </form>
                     </div>  
                      </div>
                  </div>
               </div>
            </div>

          <div class="col-md-3 sm-100 ">
               <div class="right-sidebar when-scroll">
                   <h6 class="fw-600 blue-title-bg text-center">PURCHASE OPTIONS <i class="fa fa-info-circle"></i></h6>
                  <div class=" side">
                    

                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class=" single_user_license" name="price_type" type="radio" value="<?php  echo ($datas->special_single_licence_price !='') ? $datas->special_single_licence_price.'-single_licence_price' : $datas->single_licence_price.'-single_licence_price' ?> " id="flexCheckDefault" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                           Single User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format without printing rights. It is advised for a
                              single user.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($datas->special_single_licence_price !='' )
                              <s> USD  {{$datas->single_licence_price}} </s> <br> {{'USD ' .$datas->special_single_licence_price}} 
                              
                              @else 
                              USD  {{$datas->single_licence_price}}
                           @endif   
                        </p>
                     </div>
                  </div>

                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class="" type="radio" value="<?php echo ($datas->special_multi_user_price !='') ? $datas->special_multi_user_price.'-multi_user_price' : $datas->multi_user_price.'-multi_user_price' ?> " id="flexCheckDefault" name="price_type">
                        <label class="form-check-label" for="flexCheckDefault">
                           Multi User License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format with printing rights. It is advised for up
                              to five users.<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($datas->special_multi_user_price !='' )
                              <s> USD  {{$datas->multi_user_price}} </s> <br> {{'USD ' .$datas->special_multi_user_price}} 
                              
                              @else 
                              USD  {{$datas->multi_user_price}}
                           @endif
                        </p>
                     </div>
                  </div>


                  <div class="d-flex justify-content-between orders  mb-2">
                     <div class="form-check">
                        <input class="" type="radio" value="<?php echo ($datas->special_custom_report_price !='') ? $datas->special_custom_report_price.'-custom_report_price' : $datas->custom_report_price.'-custom_report_price' ?> " id="flexCheckDefault" name="price_type">
                        <label class="form-check-label" for="flexCheckDefault">
                           Enterprise License
                        </label>
                        <span class="tooltips"><i class="fa fa-info-circle"></i><span class="tooltipstext">  
                              The report will be delivered in PDF format with printing rights and excel sheet. It is
                              advised for companies where multiple users would like to access the report from
                              multiple locations<span class="caret"></span></span></span>
                     </div>
                     <div>
                        <p class="mb-0">
                           @if($datas->special_custom_report_price !='' )
                              <s> USD  {{$datas->custom_report_price}} </s> <br> {{'USD ' .$datas->special_custom_report_price}} 
                              
                              @else 
                              USD  {{$datas->custom_report_price}}
                           @endif
                        </p>
                     </div>
                  </div>   
               </div>
                <input type="hidden" name="idH" value="{{$datas->id}}" id="idH" />
                  <div class="">
                     <button type="button" class="addtocart  max-100" onclick="add_to_cart()"><i class="fa"> </i> Add To Basket</button>
                  </div>
                   <div class="">
                      <a href="{{ url('/request-sample') }}/{{request()->segment(2)}}" class="quote  max-100">NEED A QUOTE</a> 
                  </div>
                
              
               </div>
            </div>
         </div>
      </div>
   </section>
   
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
<!-- <script src="{{asset('js/intlTelInput.min.js')}}"></script> -->
<script>
   var input = document.querySelector("#phone2");
   
   input.setAttribute('placeholder', ' ');
   const countryNameElement = document.querySelector("#country-name");
   const iti = window.intlTelInput(input, {
      utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      separateDialCode: true,
      initialCountry: "US",
   });
   
 
   function updateCountryName() {
      const selectedCountryData = iti.getSelectedCountryData();
      //const selectedCountryName = selectedCountryData.name;
      const selectedCountryName = selectedCountryData.name.replace(/\s*\([^)]*\)/, '');
      countryNameElement.value = selectedCountryName;
      
   }

   input.addEventListener("countrychange", updateCountryName); 

</script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script>
      function add_to_cart(){
      
      let report_type_price = $("input[name='price_type']:checked").val();
      
      if(report_type_price == "" || report_type_price === 'undefined'){
         alert('Please Select At-least One Licence Price');
         return false;
      }
      let id = $("#idH").val();
      
      $.ajax({
			url : '{{route("add-to-cart-new") }}' ,
			type: 'get',
         data: {'id':id, report_type_price: report_type_price},
         dataType: "text",
         success: function(response){
            //location.reload(true)
            window.location = "{{ url('/shopping-basket') }}";
         }
      }); 

   }
   </script>

<!-- plugins -->
<script src="{{asset('assets/js/vendors.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- custom app -->
    <script src="{{asset('/assets/js/app.js')}}"></script>
	
	<script type="text/javascript">
      let base_url_talk = {!! json_encode(url('/')) !!};
		$('#reload').click(function () {
			$.ajax({
				type: 'GET',
				url: base_url_talk + '/reload-captcha',
				success: function (data) {
					$(".captcha span").html(data.captcha);
				}
			});
		});
	</script>

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

@endsection

