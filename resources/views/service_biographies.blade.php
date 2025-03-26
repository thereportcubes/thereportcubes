@extends('layout.header')
@yield('title')
@section('content')
 <link rel="stylesheet" media="all" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" media="all" href="{{asset('css/custom.css')}}">
   
   <link rel="stylesheet" media="all" href="{{asset('css/ab-product.css')}}"> 
<main>
   <div id="about-us" class="ab-body ab-page-about">
      <section class="ab-about-hero ab-bg-subtle-gray ab-section" style="padding: 40px 0px !important;">
            <div class="ab-wrapper">
               <div class="ab-row ab-row-gap-huge">
                  <div class="ab-col ab-col-desktop-12 ab-col-tablet-12" style="text-align: left;">
                        <h1 class="ab-large-title ab-color-primary">Biographies</h1>
                        <p class="ab-small-title" style="margin-bottom: 10px;">What are biographies?</p>
                        
                        <p class="ab-p" >Biographies are detailed accounts of a person's life, typically written by someone else. They provide a narrative that encompasses various aspects of the individual's life, including personal experiences, achievements, challenges, and significant events. Biographies can cover the entire lifespan of the person or focus on specific periods or aspects of their life. The aim is to offer readers insight into the subject's character, contributions, and the context in which they lived.
                           </p>

                        <p class="ab-p">Biographies serve as a valuable genre, offering readers the opportunity to explore the richness and complexity of human experiences, motivations, and achievements. Whether in written or visual form, biographies contribute to the broader understanding of individuals and their impact on the world.</p>
                  </div>
                  
               </div>
            </div>
      </section>
      
      @include('layout.why_us')

   </div>
</main>
@endsection