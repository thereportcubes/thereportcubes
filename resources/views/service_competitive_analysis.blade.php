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
                     <h1 class="ab-large-title ab-color-primary">Competitive Analysis</h1>
                     <p class="ab-small-title" style="margin-bottom: 10px;">What is competitive analysis?</p>
                     <p class="ab-p" >Competitive analysis is the process of identifying and evaluating your competitors to understand their strengths and weaknesses relative to your own business. It involves gathering information about your competitors' products or services, market share, strategies, and overall performance in order to make informed decisions and gain a competitive advantage. Here are key aspects of competitive analysis:</p>

                     <div class="text-center"><img loading="lazy" src="{{asset('assets/images/product_images/competitive_analysis.png')}}" alt="Competitive Analysis" /></div>

                     <span class="company_overview">1.	Identifying Competitors:</span>
                     <ul class="company_profile_ul">
                        <li>Determine who your direct and indirect competitors are in the market. </li>
                        <li>Direct competitors offer similar products or services, while indirect competitors may offer different products but target similar customer needs.</li>
                     </ul>

                     <span class="company_overview">2.	Analyzing Competitor Products or Services:</span>
                     <ul class="company_profile_ul">
                        <li>Examine the features, quality, pricing, and positioning of your competitors' products or services. </li>
                        <li>Identify any unique selling points or advantages they may have.</li>
                     </ul>

                     <span class="company_overview">3.	Market Share and Positioning:</span>
                     <ul class="company_profile_ul">
                        <li>Assess the market share held by each competitor</li>
                        <li>Understand how competitors position themselves in the market and how consumers perceive them.</li>
                     </ul>

                     <span class="company_overview">4.	Strengths and Weaknesses:</span>
                     <ul class="company_profile_ul">
                        <li>Identify the strengths that make competitors successful.</li>
                        <li>Identify weaknesses that can be exploited to gain a competitive edge.</li>
                     </ul>

                     <span class="company_overview">5.	Pricing Strategies:</span>
                     <ul class="company_profile_ul">
                        <li>Analyze the pricing strategies of competitors</li>
                        <li>Understand how pricing relates to the perceived value of their products or services.</li>
                     </ul>

                     <span class="company_overview">6.	Marketing and Branding:</span>
                     <ul class="company_profile_ul">
                        <li>Evaluate competitors' marketing strategies, including advertising, promotions, and branding efforts </li>
                        <li>Understand how they communicate with their target audience</li>
                     </ul>

                     <span class="company_overview">7.	Distribution Channels:</span>
                     <ul class="company_profile_ul">
                        <li>Explore how competitors distribute their products or services</li>
                        <li>Identify the channels they use to reach customers.</li>
                     </ul>

                     <span class="company_overview">8.	SWOT Analysis:</span>
                     <ul class="company_profile_ul">
                        <li>Conduct a SWOT analysis (Strengths, Weaknesses, Opportunities, Threats) for each competitor. </li>
                        <li>This helps in summarizing key insights and understanding the competitive landscape.</li>
                     </ul>

                     <span class="company_overview">9.	Industry Trends:</span>
                     <ul class="company_profile_ul">
                        <li>Stay informed about industry trends that may impact your competitors and your own business. </li>
                        <li>Anticipate shifts in consumer preferences or technological advancements.</li>
                     </ul>

                     <span class="company_overview">10.	Benchmarking:</span>
                     <ul class="company_profile_ul">
                        <li>Use the information gathered to benchmark your own performance against competitors. </li>
                        <li>Identify areas where you can improve or differentiate your business.</li>
                     </ul>

                  </div>
                  
               </div>
            </div>
      </section>

      @include('layout.why_us')
      
   </div>
</main>
@endsection