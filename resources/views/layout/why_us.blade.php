<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<section class="custom-container ab-about-hero text-justify" style="padding: 30px 0px !important;">    
    <div class="ab-row ab-row-gap-huge">
    <h2 class=" text-center ab-col-desktop-12 ab-color-primary mb-1">Why Us?</h2>

    <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" >
        <img src="{{asset('assets/images/icons/Handshake.png')}}" class="why_icon">
        
        <div class="ab-about-hero-description mt-1 text-justify" >
            <h4 class="mb-2">Expertise</h4>
            <p class="ab-p" >Our team of seasoned researchers, analysts, and data scientists brings a wealth of experience to the table. We've worked across diverse industries and have a deep understanding of market dynamics and trends.
            </p>                    
        </div>
    </div>
    
    <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" >
        <img src="{{asset('assets/images/icons/Handshake.png')}}" class="why_icon">
        
        <div class="ab-about-hero-description mt-1">
            <h4 class="mb-2">Cutting-Edge Technology</h4>
            <p class="ab-p" >We leverage the latest technology and methodologies to gather, process, and interpret data. This ensures the most accurate and up-to-date insights for your business.
            </p>                    
        </div>
    </div>

    <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" >
        <img src="{{asset('assets/images/icons/icon-document.png')}}" class="why_icon">
        
        <div class="ab-about-hero-description text-justify" >
            <h4 class="mb-2">Dedication to Excellence</h4> 
            <p class="ab-p" >Quality is non-negotiable for us. Our commitment to excellence is reflected in every research project we undertake. We meticulously validate our findings, providing you with trustworthy and valuable information.
            </p>                    
        </div>
    </div>

    <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" >
        <img src="{{asset('assets/images/icons/icon-document.png')}}" class="why_icon">
        
        <div class="ab-about-hero-description text-justify">
            <h4 class="mb-2">Client-Centric Approach</h4> 
            <p class="ab-p" >We consider our clients as partners. Your success is our success, and we maintain open lines of communication to ensure that your goals and expectations are met.
            </p>                    
        </div>
    </div>          
    
    </div>
    
</section>

<section class="ab-about-hero ab-bg-subtle-gray ab-section">
    <div class="ab-wrapper">
    <div class="ab-row ab-row-gap-huge">
        
            <div class="ab-col ab-col-desktop-6 ab-col-tablet-12 text-left" >
                
                <h3 class="mb-2 ab-color-primary">Our Offerings</h3>
                <ul class="offerring-ul" style="list-style:circle">
                    <li>  Market Research Reports</li>
                    <li>  Customized Research</li>
                    <li>  Competitive Analysis</li>
                    <li>  Consumer Behavior Studies</li>
                    <li>  Surveys and Questionnaires</li>
                    <li>  Focus Groups</li>
                    <li>  Data Collection and Analysis</li>
                    <li>  Trend Analysis</li>
                    <li>  Brand and Reputation Assessment</li>
                    <li>  Market Entry and Expansion Studies</li>
                    <li>  Product Testing and Evaluation</li>
                    <li> Ad Testing</li>
                    <li> Feasibility Studies</li>
                    <li> Public Opinion Research</li>
                    <li> Industry and Market Assessments</li>
                    <li> Data Visualization and Reporting</li>
                    <li> Consulting and Strategy Development</li>
                    <li> Value Chain Analysis</li>
                    <li> Portfolio and Acquisition Assessment</li>
                    <li> Biographies</li>
                </ul>
                
            </div>
           <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-left" style="box-shadow: grey 0px 0px 10px; ">
                <div from="custom-research" class="" style="padding:20px 10px;">
                <h3 class="mb-2 ab-color-primary">Enquiry Form</h3>
                <div class="contact-form-wrap">
                     <a name="formsub">&nbsp;</a>
                    <form class="contact-form" action="{{url('Submitenquery#formsub')}}" method="post">
                        @csrf
                        <div class="custom-form-grp">
                            <input type="text" name="name" class="form-group" placeholder="Name" id="contact_name" required value="{{old('name')}}">
                        </div>
                        
                        <div class="custom-form-grp">
                            <input type="email" name="contact_email" class="form-group" placeholder="Business Email" id="contact_email" required value="{{old('contact_email')}}" >
                        </div>
                        
                        <div class="custom-form-grp">
                            <input type="text" name="contact_phone" class="form-group mobivali" placeholder="Phone" id="contact_phone" required value="{{old('contact_phone')}}">
                        </div>                          
                        
                        <div class="custom-form-grp">
                            <input type="text" name="budget" class="form-group" placeholder="Budget" id="budget" value="{{old('budget')}}">
                        </div>
                       
                        <div class="custom-form-grp">
                            <textarea name="contact_message" rows="4" class="form-group" placeholder="Please tell us your business objectives and our experts will find solutions that work." id="contact_message" required>{{old('contact_message')}}</textarea>
                        </div>
                         <div class="custom-form-grp">
                              <!--<div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}">
                           </div>
                           <div class="col-12 mt-2">
                             
                           @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                </div>-->
                                 <div class="cf-turnstile"
     data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}"
     data-callback="onTurnstileSuccess"
></div>
                             </div>
                     </div>
                </div>


                        <button class="ab-button ab-button-primary ab-button-small " type="submit">Submit </button>
                        
                    </form>
                </div>
                </div>
           
            </div>
        
    </div>
    </div>
</section>
