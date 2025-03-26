@extends('layout.header')
@yield('title')
@section('content')
<style>
   .company_profile_ul{
      margin-left:40px; 
      list-style:circle; 
      margin-bottom:10px;
   }
   .company_overview{
      font-weight:bold;
   }
</style>



<main>
   <div id="about-us" class="ab-body ab-page-about">
      <section class="ab-about-hero ab-bg-subtle-gray ab-section">
            <div class="ab-wrapper">
               <div class="ab-row ab-row-gap-huge">
                  <div class="ab-col ab-col-desktop-12 ab-col-tablet-12" style="text-align: left;">
                     <h1 class="ab-large-title ab-color-primary">Company Profile</h1>
                     <p class="ab-small-title" style="margin-bottom: 10px;">What are company profiles?</p>

                     <p class="ab-p">A company profile is a comprehensive document that provides detailed information about a business. It serves as a snapshot or overview of the company and is often used for various purposes, including marketing, investor relations, partnerships, and supplier relationships.</p>

                     <p class="ab-p">A detailed company profile would have the following:</p>

                     
                        <span class="company_overview">1. Company Overview:</span>
                        <ul class="company_profile_ul">
                           <li>Introduction to the company, including its name, logo, and a brief history.</li>
                           <li>Mission and vision statements</li>
                           <li>Core values that guide the company's principles</li>
                        </ul>

                        <span class="company_overview">2. Leadership and Team:</span>
                        <ul class="company_profile_ul">
                           <li>Profiles of key executives and leadership team members</li>
                           <li>Overview of the overall team structure and key personnel</li>
                        </ul>

                        <span class="company_overview">3. Products or Services:</span>
                        <ul class="company_profile_ul">
                           <li>Detailed descriptions of the products or services offered.</li>
                           <li>Features, benefits, and any unique selling propositions</li>
                        </ul>

                        <span class="company_overview">4. Market and Industry Analysis:</span>
                        <ul class="company_profile_ul">
                           <li>Overview of the industry or industries in which the company operates.</li>
                           <li>Market trends, growth opportunities, and competitive analysis</li>
                        </ul>

                        <span class="company_overview">5. Target Audience:</span>
                        <ul class="company_profile_ul">
                           <li>Identification of the specific market segments or customer groups the company aims to serve.</li>
                           <li>Description of the ideal customer profile.</li>
                        </ul>

                        <span class="company_overview">6. Financial Overview:</span>
                        <ul class="company_profile_ul">
                           <li>Summary of financial performance, including revenue, profit margins, and growth trends.</li>
                           <li>Key financial ratios and indicators</li>
                        </ul>

                        <span class="company_overview">7.	Achievements and Milestones:</span>
                        <ul class="company_profile_ul">
                           <li>Highlights of notable achievements and significant milestones in the company's history</li>
                           <li>•	Recognition, awards, or certifications received.</li>
                        </ul>

                        <span class="company_overview">8.	Clients and Case Studies:</span>
                        <ul class="company_profile_ul">
                           <li>List of major clients or customers the company has served</li>
                           <li>Case studies or success stories that demonstrate the company's capabilities and impact</li>
                        </ul>

                        <span class="company_overview">9.	Partnerships and Collaborations:</span>
                        <ul class="company_profile_ul">
                           <li>Details about strategic partnerships, collaborations, or alliances with other organizations</li>
                           <li>Information on key suppliers and vendors</li>
                        </ul>

                        <span class="company_overview">10.	Social Responsibility and Sustainability:</span>
                        <ul class="company_profile_ul">
                           <li>Overview of the company's commitment to social responsibility and sustainability</li>
                           <li>Initiatives or programs related to corporate social responsibility (CSR).</li>
                        </ul>

                        <span class="company_overview">11.	Infrastructure and Facilities:</span>
                        <ul class="company_profile_ul">
                           <li>Information about the company's physical infrastructure, offices, manufacturing facilities, or distribution centers.</li>
                        </ul>

                        <span class="company_overview">12.	Technology and Innovation:</span>
                        <ul class="company_profile_ul">
                           <li>Overview of technological capabilities and innovations.</li>
                           <li>Research and development initiatives</li>
                        </ul>

                        <span class="company_overview">13.	Regulatory Compliance:</span>
                        <ul class="company_profile_ul">
                           <li>Information about compliance with industry regulations and standards.</li>
                           <li>Any certifications or accreditations obtained.</li>
                        </ul>

                        <span class="company_overview">14.	Risk Management:</span>
                        <ul class="company_profile_ul">
                           <li>Identification and assessment of key risks that may affect the business.</li>
                           <li>Strategies for risk mitigation.</li>
                        </ul>

                        <span class="company_overview">15.	Contact Information:</span>
                        <ul class="company_profile_ul">
                           <li>Address, phone numbers, email, and website details for contacting the company.</li>
                        </ul>
                           
                  </div>
                  
               </div>
            </div>
      </section>
      

      @include('layout.why_us')

   
   </div>
</main>
@endsection