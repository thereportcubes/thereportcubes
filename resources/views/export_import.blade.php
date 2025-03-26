@extends('layout/header')
@section('content')
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">Export-Import Data</h1>
         </div>
      </div>
   </div>
</section>
<section class="main-content mb-5 mt-5">
   <div class="container">
      <form action="{{route('save_export_import')}}" method="post" >
      @csrf
         <div class="row">
        
            @if(session()->has('success'))
               <div class="alert-success" style="padding:18px;border-radius: 5px; margin-bottom:20px;">
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
            
            <div class="col-md-6 mb-25">
               
               <h4 class="fw-800 mb-4">Personal Details</h4>
               <div class="mb-3">
                  <p class="mb-2 fs-14">Full Name*:</p>
                  <input type="text" name="full_name" class="form-control" placeholder="Enter Your Name" required value="{{ old('full_name') }}" >
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">Company Name*:</p>
                  <input type="text" value="{{ old('company_name') }}" name="company_name" class="form-control" placeholder="Enter your company name" required>
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">Business Email*:</p>
                  <input type="email" name="busniess_email" value="{{ old('busniess_email') }}" class="form-control" placeholder="Enter your business email" required>
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">Contact Number*:</p>
                  <input type="text" name="contact_number" value="{{ old('contact_number') }}" class="form-control" id="phone_code" placeholder="Phone Number" required>
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">Message:</p>
                  <textarea name="message" id="" cols="30" rows="4" class="form-control"
                     placeholder="Type your message here...">{{ old('message') }}</textarea>
               </div>            
            </div>
            <div class="col-md-6">
               <h4 class="fw-800 mb-4">Export-Import Data</h4>
               <div class="mb-3">
                  <p class="mb-2 fs-14">Data Type:</p>
                  <select name="data_type" class="form-control" id="" required>
                     <option value="">Select data type</option>
                     <option value="import" {{ old('data_type') == 'import' ? 'selected' : '' }}>Import</option>
                     <option value="export" {{ old('data_type') == 'export' ? 'selected' : '' }}>Export</option>
                  </select>
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">From Date:</p>
                  <input type="date" name="from_date" class="form-control" value="{{ old('from_date') }}">
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">End Date:</p>
                  <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">Country:</p>
                  <select class="form-control frm_ctrl_new" name="country" id="imp-exp-country">
                     <option value="">Select country</option>
                     <option value="ANDORRA">AD-ANDORRA (+376)</option>
                     <option value="UNITED ARAB EMIRATES">AE-UNITED ARAB EMIRATES (+971)</option>
                     <option value="AFGHANISTAN">AF-AFGHANISTAN (+93)</option>
                     <option value="ANTIGUA AND BARBUDA">AG-ANTIGUA AND BARBUDA (+1268)</option>
                     <option value="ANGUILLA">AI-ANGUILLA (+1264)</option>
                     <option value="ALBANIA">AL-ALBANIA (+355)</option>
                     <option value="ARMENIA">AM-ARMENIA (+374)</option>
                     <option value="NETHERLANDS ANTILLES">AN-NETHERLANDS ANTILLES (+599)</option>
                     <option value="ANGOLA">AO-ANGOLA (+244)</option>
                     <option value="ANTARCTICA">AQ-ANTARCTICA (+672)</option>
                     <option value="ARGENTINA">AR-ARGENTINA (+54)</option>
                     <option value="AMERICAN SAMOA">AS-AMERICAN SAMOA (+1684)</option>
                     <option value="AUSTRIA">AT-AUSTRIA (+43)</option>
                     <option value="AUSTRALIA">AU-AUSTRALIA (+61)</option>
                     <option value="ARUBA">AW-ARUBA (+297)</option>
                     <option value="AZERBAIJAN">AZ-AZERBAIJAN (+994)</option>
                     <option value="BOSNIA AND HERZEGOVINA">BA-BOSNIA AND HERZEGOVINA (+387)</option>
                     <option value="BARBADOS">BB-BARBADOS (+1246)</option>
                     <option value="BANGLADESH">BD-BANGLADESH (+880)</option>
                     <option value="BELGIUM">BE-BELGIUM (+32)</option>
                     <option value="BURKINA FASO">BF-BURKINA FASO (+226)</option>
                     <option value="BULGARIA">BG-BULGARIA (+359)</option>
                     <option value="BAHRAIN">BH-BAHRAIN (+973)</option>
                     <option value="BURUNDI">BI-BURUNDI (+257)</option>
                     <option value="BENIN">BJ-BENIN (+229)</option>
                     <option value="SAINT BARTHELEMY">BL-SAINT BARTHELEMY (+590)</option>
                     <option value="BERMUDA">BM-BERMUDA (+1441)</option>
                     <option value="BRUNEI DARUSSALAM">BN-BRUNEI DARUSSALAM (+673)</option>
                     <option value="BOLIVIA">BO-BOLIVIA (+591)</option>
                     <option value="BRAZIL">BR-BRAZIL (+55)</option>
                     <option value="BAHAMAS">BS-BAHAMAS (+1242)</option>
                     <option value="BHUTAN">BT-BHUTAN (+975)</option>
                     <option value="BOTSWANA">BW-BOTSWANA (+267)</option>
                     <option value="BELARUS">BY-BELARUS (+375)</option>
                     <option value="BELIZE">BZ-BELIZE (+501)</option>
                     <option value="CANADA">CA-CANADA (+1)</option>
                     <option value="COCOS (KEELING) ISLANDS">CC-COCOS (KEELING) ISLANDS (+61)</option>
                     <option value="CONGO, THE DEMOCRATIC REPUBLIC OF THE">CD-CONGO, THE DEMOCRATIC REPUBLIC OF THE
                        (+243)
                     </option>
                     <option value="CENTRAL AFRICAN REPUBLIC">CF-CENTRAL AFRICAN REPUBLIC (+236)</option>
                     <option value="CONGO">CG-CONGO (+242)</option>
                     <option value="SWITZERLAND">CH-SWITZERLAND (+41)</option>
                     <option value="COTE D IVOIRE">CI-COTE D IVOIRE (+225)</option>
                     <option value="COOK ISLANDS">CK-COOK ISLANDS (+682)</option>
                     <option value="CHILE">CL-CHILE (+56)</option>
                     <option value="CAMEROON">CM-CAMEROON (+237)</option>
                     <option value="CHINA">CN-CHINA (+86)</option>
                     <option value="COLOMBIA">CO-COLOMBIA (+57)</option>
                     <option value="COSTA RICA">CR-COSTA RICA (+506)</option>
                     <option value="CUBA">CU-CUBA (+53)</option>
                     <option value="CAPE VERDE">CV-CAPE VERDE (+238)</option>
                     <option value="CHRISTMAS ISLAND">CX-CHRISTMAS ISLAND (+61)</option>
                     <option value="CYPRUS">CY-CYPRUS (+357)</option>
                     <option value="CZECH REPUBLIC">CZ-CZECH REPUBLIC (+420)</option>
                     <option value="GERMANY">DE-GERMANY (+49)</option>
                     <option value="DJIBOUTI">DJ-DJIBOUTI (+253)</option>
                     <option value="DENMARK">DK-DENMARK (+45)</option>
                     <option value="DOMINICA">DM-DOMINICA (+1767)</option>
                     <option value="DOMINICAN REPUBLIC">DO-DOMINICAN REPUBLIC (+1809)</option>
                     <option value="ALGERIA">DZ-ALGERIA (+213)</option>
                     <option value="ECUADOR">EC-ECUADOR (+593)</option>
                     <option value="ESTONIA">EE-ESTONIA (+372)</option>
                     <option value="EGYPT">EG-EGYPT (+20)</option>
                     <option value="ERITREA">ER-ERITREA (+291)</option>
                     <option value="SPAIN">ES-SPAIN (+34)</option>
                     <option value="ETHIOPIA">ET-ETHIOPIA (+251)</option>
                     <option value="FINLAND">FI-FINLAND (+358)</option>
                     <option value="FIJI">FJ-FIJI (+679)</option>
                     <option value="FALKLAND ISLANDS (MALVINAS)">FK-FALKLAND ISLANDS (MALVINAS) (+500)</option>
                     <option value="MICRONESIA, FEDERATED STATES OF">FM-MICRONESIA, FEDERATED STATES OF (+691)</option>
                     <option value="FAROE ISLANDS">FO-FAROE ISLANDS (+298)</option>
                     <option value="FRANCE">FR-FRANCE (+33)</option>
                     <option value="GABON">GA-GABON (+241)</option>
                     <option value="UNITED KINGDOM">GB-UNITED KINGDOM (+44)</option>
                     <option value="GRENADA">GD-GRENADA (+1473)</option>
                     <option value="GEORGIA">GE-GEORGIA (+995)</option>
                     <option value="GHANA">GH-GHANA (+233)</option>
                     <option value="GIBRALTAR">GI-GIBRALTAR (+350)</option>
                     <option value="GREENLAND">GL-GREENLAND (+299)</option>
                     <option value="GAMBIA">GM-GAMBIA (+220)</option>
                     <option value="GUINEA">GN-GUINEA (+224)</option>
                     <option value="EQUATORIAL GUINEA">GQ-EQUATORIAL GUINEA (+240)</option>
                     <option value="GREECE">GR-GREECE (+30)</option>
                     <option value="GUATEMALA">GT-GUATEMALA (+502)</option>
                     <option value="GUAM">GU-GUAM (+1671)</option>
                     <option value="GUINEA-BISSAU">GW-GUINEA-BISSAU (+245)</option>
                     <option value="GUYANA">GY-GUYANA (+592)</option>
                     <option value="HONG KONG">HK-HONG KONG (+852)</option>
                     <option value="HONDURAS">HN-HONDURAS (+504)</option>
                     <option value="CROATIA">HR-CROATIA (+385)</option>
                     <option value="HAITI">HT-HAITI (+509)</option>
                     <option value="HUNGARY">HU-HUNGARY (+36)</option>
                     <option value="INDONESIA">ID-INDONESIA (+62)</option>
                     <option value="IRELAND">IE-IRELAND (+353)</option>
                     <option value="ISRAEL">IL-ISRAEL (+972)</option>
                     <option value="ISLE OF MAN">IM-ISLE OF MAN (+44)</option>
                     <option value="INDIA">IN-INDIA (+91)</option>
                     <option value="IRAQ">IQ-IRAQ (+964)</option>
                     <option value="IRAN, ISLAMIC REPUBLIC OF">IR-IRAN, ISLAMIC REPUBLIC OF (+98)</option>
                     <option value="ICELAND">IS-ICELAND (+354)</option>
                     <option value="ITALY">IT-ITALY (+39)</option>
                     <option value="JAMAICA">JM-JAMAICA (+1876)</option>
                     <option value="JORDAN">JO-JORDAN (+962)</option>
                     <option value="JAPAN">JP-JAPAN (+81)</option>
                     <option value="KENYA">KE-KENYA (+254)</option>
                     <option value="KYRGYZSTAN">KG-KYRGYZSTAN (+996)</option>
                     <option value="CAMBODIA">KH-CAMBODIA (+855)</option>
                     <option value="KIRIBATI">KI-KIRIBATI (+686)</option>
                     <option value="COMOROS">KM-COMOROS (+269)</option>
                     <option value="SAINT KITTS AND NEVIS">KN-SAINT KITTS AND NEVIS (+1869)</option>
                     <option value="KOREA DEMOCRATIC PEOPLES REPUBLIC OF">KP-KOREA DEMOCRATIC PEOPLES REPUBLIC OF (+850)
                     </option>
                     <option value="KOREA REPUBLIC OF">KR-KOREA REPUBLIC OF (+82)</option>
                     <option value="KUWAIT">KW-KUWAIT (+965)</option>
                     <option value="CAYMAN ISLANDS">KY-CAYMAN ISLANDS (+1345)</option>
                     <option value="KAZAKSTAN">KZ-KAZAKSTAN (+7)</option>
                     <option value="LAO PEOPLES DEMOCRATIC REPUBLIC">LA-LAO PEOPLES DEMOCRATIC REPUBLIC (+856)</option>
                     <option value="LEBANON">LB-LEBANON (+961)</option>
                     <option value="SAINT LUCIA">LC-SAINT LUCIA (+1758)</option>
                     <option value="LIECHTENSTEIN">LI-LIECHTENSTEIN (+423)</option>
                     <option value="SRI LANKA">LK-SRI LANKA (+94)</option>
                     <option value="LIBERIA">LR-LIBERIA (+231)</option>
                     <option value="LESOTHO">LS-LESOTHO (+266)</option>
                     <option value="LITHUANIA">LT-LITHUANIA (+370)</option>
                     <option value="LUXEMBOURG">LU-LUXEMBOURG (+352)</option>
                     <option value="LATVIA">LV-LATVIA (+371)</option>
                     <option value="LIBYAN ARAB JAMAHIRIYA">LY-LIBYAN ARAB JAMAHIRIYA (+218)</option>
                     <option value="MOROCCO">MA-MOROCCO (+212)</option>
                     <option value="MONACO">MC-MONACO (+377)</option>
                     <option value="MOLDOVA, REPUBLIC OF">MD-MOLDOVA, REPUBLIC OF (+373)</option>
                     <option value="MONTENEGRO">ME-MONTENEGRO (+382)</option>
                     <option value="SAINT MARTIN">MF-SAINT MARTIN (+1599)</option>
                     <option value="MADAGASCAR">MG-MADAGASCAR (+261)</option>
                     <option value="MARSHALL ISLANDS">MH-MARSHALL ISLANDS (+692)</option>
                     <option value="MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF">MK-MACEDONIA, THE FORMER YUGOSLAV
                        REPUBLIC OF (+389)
                     </option>
                     <option value="MALI">ML-MALI (+223)</option>
                     <option value="MYANMAR">MM-MYANMAR (+95)</option>
                     <option value="MONGOLIA">MN-MONGOLIA (+976)</option>
                     <option value="MACAU">MO-MACAU (+853)</option>
                     <option value="NORTHERN MARIANA ISLANDS">MP-NORTHERN MARIANA ISLANDS (+1670)</option>
                     <option value="MAURITANIA">MR-MAURITANIA (+222)</option>
                     <option value="MONTSERRAT">MS-MONTSERRAT (+1664)</option>
                     <option value="MALTA">MT-MALTA (+356)</option>
                     <option value="MAURITIUS">MU-MAURITIUS (+230)</option>
                     <option value="MALDIVES">MV-MALDIVES (+960)</option>
                     <option value="MALAWI">MW-MALAWI (+265)</option>
                     <option value="MEXICO">MX-MEXICO (+52)</option>
                     <option value="MALAYSIA">MY-MALAYSIA (+60)</option>
                     <option value="MOZAMBIQUE">MZ-MOZAMBIQUE (+258)</option>
                     <option value="NAMIBIA">NA-NAMIBIA (+264)</option>
                     <option value="NEW CALEDONIA">NC-NEW CALEDONIA (+687)</option>
                     <option value="NIGER">NE-NIGER (+227)</option>
                     <option value="NIGERIA">NG-NIGERIA (+234)</option>
                     <option value="NICARAGUA">NI-NICARAGUA (+505)</option>
                     <option value="NETHERLANDS">NL-NETHERLANDS (+31)</option>
                     <option value="NORWAY">NO-NORWAY (+47)</option>
                     <option value="NEPAL">NP-NEPAL (+977)</option>
                     <option value="NAURU">NR-NAURU (+674)</option>
                     <option value="NIUE">NU-NIUE (+683)</option>
                     <option value="NEW ZEALAND">NZ-NEW ZEALAND (+64)</option>
                     <option value="OMAN">OM-OMAN (+968)</option>
                     <option value="PANAMA">PA-PANAMA (+507)</option>
                     <option value="PERU">PE-PERU (+51)</option>
                     <option value="FRENCH POLYNESIA">PF-FRENCH POLYNESIA (+689)</option>
                     <option value="PAPUA NEW GUINEA">PG-PAPUA NEW GUINEA (+675)</option>
                     <option value="PHILIPPINES">PH-PHILIPPINES (+63)</option>
                     <option value="PAKISTAN">PK-PAKISTAN (+92)</option>
                     <option value="POLAND">PL-POLAND (+48)</option>
                     <option value="SAINT PIERRE AND MIQUELON">PM-SAINT PIERRE AND MIQUELON (+508)</option>
                     <option value="PITCAIRN">PN-PITCAIRN (+870)</option>
                     <option value="PUERTO RICO">PR-PUERTO RICO (+1)</option>
                     <option value="PORTUGAL">PT-PORTUGAL (+351)</option>
                     <option value="PALAU">PW-PALAU (+680)</option>
                     <option value="PARAGUAY">PY-PARAGUAY (+595)</option>
                     <option value="QATAR">QA-QATAR (+974)</option>
                     <option value="ROMANIA">RO-ROMANIA (+40)</option>
                     <option value="SERBIA">RS-SERBIA (+381)</option>
                     <option value="RUSSIAN FEDERATION">RU-RUSSIAN FEDERATION (+7)</option>
                     <option value="RWANDA">RW-RWANDA (+250)</option>
                     <option value="SAUDI ARABIA">SA-SAUDI ARABIA (+966)</option>
                     <option value="SOLOMON ISLANDS">SB-SOLOMON ISLANDS (+677)</option>
                     <option value="SEYCHELLES">SC-SEYCHELLES (+248)</option>
                     <option value="SUDAN">SD-SUDAN (+249)</option>
                     <option value="SWEDEN">SE-SWEDEN (+46)</option>
                     <option value="SINGAPORE">SG-SINGAPORE (+65)</option>
                     <option value="SAINT HELENA">SH-SAINT HELENA (+290)</option>
                     <option value="SLOVENIA">SI-SLOVENIA (+386)</option>
                     <option value="SLOVAKIA">SK-SLOVAKIA (+421)</option>
                     <option value="SIERRA LEONE">SL-SIERRA LEONE (+232)</option>
                     <option value="SAN MARINO">SM-SAN MARINO (+378)</option>
                     <option value="SENEGAL">SN-SENEGAL (+221)</option>
                     <option value="SOMALIA">SO-SOMALIA (+252)</option>
                     <option value="SURINAME">SR-SURINAME (+597)</option>
                     <option value="SAO TOME AND PRINCIPE">ST-SAO TOME AND PRINCIPE (+239)</option>
                     <option value="EL SALVADOR">SV-EL SALVADOR (+503)</option>
                     <option value="SYRIAN ARAB REPUBLIC">SY-SYRIAN ARAB REPUBLIC (+963)</option>
                     <option value="SWAZILAND">SZ-SWAZILAND (+268)</option>
                     <option value="TURKS AND CAICOS ISLANDS">TC-TURKS AND CAICOS ISLANDS (+1649)</option>
                     <option value="CHAD">TD-CHAD (+235)</option>
                     <option value="TOGO">TG-TOGO (+228)</option>
                     <option value="THAILAND">TH-THAILAND (+66)</option>
                     <option value="TAJIKISTAN">TJ-TAJIKISTAN (+992)</option>
                     <option value="TOKELAU">TK-TOKELAU (+690)</option>
                     <option value="TIMOR-LESTE">TL-TIMOR-LESTE (+670)</option>
                     <option value="TURKMENISTAN">TM-TURKMENISTAN (+993)</option>
                     <option value="TUNISIA">TN-TUNISIA (+216)</option>
                     <option value="TONGA">TO-TONGA (+676)</option>
                     <option value="TURKEY">TR-TURKEY (+90)</option>
                     <option value="TRINIDAD AND TOBAGO">TT-TRINIDAD AND TOBAGO (+1868)</option>
                     <option value="TUVALU">TV-TUVALU (+688)</option>
                     <option value="TAIWAN, PROVINCE OF CHINA">TW-TAIWAN, PROVINCE OF CHINA (+886)</option>
                     <option value="TANZANIA, UNITED REPUBLIC OF">TZ-TANZANIA, UNITED REPUBLIC OF (+255)</option>
                     <option value="UKRAINE">UA-UKRAINE (+380)</option>
                     <option value="UGANDA">UG-UGANDA (+256)</option>
                     <option value="UNITED STATES">US-UNITED STATES (+1)</option>
                     <option value="URUGUAY">UY-URUGUAY (+598)</option>
                     <option value="UZBEKISTAN">UZ-UZBEKISTAN (+998)</option>
                     <option value="HOLY SEE (VATICAN CITY STATE)">VA-HOLY SEE (VATICAN CITY STATE) (+39)</option>
                     <option value="SAINT VINCENT AND THE GRENADINES">VC-SAINT VINCENT AND THE GRENADINES (+1784)
                     </option>
                     <option value="VENEZUELA">VE-VENEZUELA (+58)</option>
                     <option value="VIRGIN ISLANDS, BRITISH">VG-VIRGIN ISLANDS, BRITISH (+1284)</option>
                     <option value="VIRGIN ISLANDS, U.S.">VI-VIRGIN ISLANDS, U.S. (+1340)</option>
                     <option value="VIET NAM">VN-VIET NAM (+84)</option>
                     <option value="VANUATU">VU-VANUATU (+678)</option>
                     <option value="WALLIS AND FUTUNA">WF-WALLIS AND FUTUNA (+681)</option>
                     <option value="SAMOA">WS-SAMOA (+685)</option>
                     <option value="KOSOVO">XK-KOSOVO (+381)</option>
                     <option value="YEMEN">YE-YEMEN (+967)</option>
                     <option value="MAYOTTE">YT-MAYOTTE (+262)</option>
                     <option value="SOUTH AFRICA">ZA-SOUTH AFRICA (+27)</option>
                     <option value="ZAMBIA">ZM-ZAMBIA (+260)</option>
                     <option value="ZIMBABWE">ZW-ZIMBABWE (+263)</option>
                  </select>
               </div>
               <div class="mb-3">
                  <p class="mb-2 fs-14">HS Code/Product Description:</p>
                  <textarea name="hs_code" id="" cols="30" rows="4" class="form-control"
                     placeholder="Type your message here...">{{ old('hs_code') }}</textarea>
               </div>
            </div>
            <!-- <div class="form-group">
               <div class="g-recaptcha" data-sitekey="6Ldncs8oAAAAAJZ7C_pvRTzTqa1RwZKNW0jfJ-Y2" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
               <input class="d-none" data-recaptcha="true" data-error="Please complete the Captcha" name="verify_captcha">
               <div class="help-block with-errors"></div>
            </div> -->
            <div class="col-12 mb-4">
            <!--<div class="captcha">
               <button type="button" class="btn btn-info" class="reload" id="reload">
                     &#x21bb;
               </button>&nbsp;&nbsp;
               <span>{!! captcha_img() !!}</span>                                           
            </div>-->
             <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
            </div>
            <br>
               <div class="col-12">
                 <!-- <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter Captcha" required maxlength="5" />              
            </div>
            @if ($errors->has('captcha'))
               <span class="text-danger">
                     <strong>{{ $errors->first('captcha') }}</strong>
               </span>
            @endif -->
            @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
</div>
            <div class="col-md-12 pt-5">
               <div class="text-center">
                  <button type="submit" class="market-btn">Submit Request</button>
                  <input type="hidden" name="country_name" id="country-name"  value="United States" />
               </div>
            </div>
         </div>
      </form>
   </div>
</section>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{url('public/js/intlTelInput.min.js')}}"></script>
<script>
   var input = document.querySelector("#phone_code");
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

<!-- plugins -->
<script src="{{url('public/assets/js/vendors.js')}}"></script>

<!-- custom app -->
<script src="{{url('public/assets/js/app.js')}}"></script>

<script type="text/javascript">
  $('#reload').click(function () {
     $.ajax({
        type: 'GET',
        url: 'reload-captcha',
        success: function (data) {
           $(".captcha span").html(data.captcha);
        }
     });
  });
</script>

@endsection