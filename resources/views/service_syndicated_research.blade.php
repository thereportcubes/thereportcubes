@extends('layout.header')
@yield('title')
@section('content')

<main>

   <div id="about-us" class="ab-body ab-page-about">
      <section class="ab-about-hero ab-bg-subtle-gray ab-section">
            <div class="ab-wrapper">
               <div class="ab-row ab-row-gap-huge">
                  <div class="ab-col ab-col-desktop-12 ab-col-tablet-12" style="text-align: left;">
                     <h1 class="ab-large-title ab-color-primary">Syndicated Research</h1>
                     <p class="ab-p mb-4" ><b>Syndicated Research </b> is a tailor made solution and a powerful tool that leverages the collective knowledge and resources of multiple experts to provide a robust and insightful analysis of a specific subject.</p>
                     </div>
                  
               </div>
            </div>
                     <div class="syndicate-background"><img loading="lazy" src="{{asset('/assets/images/product_images/syndicate_research2.png')}}" width="70%"/ alt="syndicated research"></div>
                     <div class="ab-wrapper">
                     <p class="mt-4 ab-p" ><b>What is syndicated research?</b><br>
                        Syndicated market research is a ready-made report about a specific industry or a market with a pre-defined table of content. The findings are typically compiled into reports that provide a comprehensive overview of the market, including trends, opportunities, challenges, and other relevant information.</p>
</div>

                  
      </section>

      @include('layout.why_us')

   </div>
</main>
@endsection