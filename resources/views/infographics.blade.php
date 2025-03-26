@extends('layout.header')
@yield('title')
@section('content') 
<main class="background-gray">
 <section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
               <h1 class="mb-0 mini-banner-title">Infographics</h1>
               <h2 style="font-size: 18px; padding-bottom: 2px; color: white;">The Report Cube Infographics: Transforming Numbers into Visual Stories</h2>
               </div>
         </div>
      </section>
      <div class="banner-triangle"></div>
   </section>

   <section class="ab-home-news ab-section">
      <div class="ab-wrapper">
         
         <div class="ab-news-grid ab-row ab-row-v-padding">
            @foreach($infographic as $pr)
            <div class="ab-col ab-col-desktop-3 ab-col-tablet-3 ab-col-phone-12" >
               <a href="{{url('infographics')}}/{{$pr->report_link}}" class="" style="background-color:#fff; color:#454748; min-height:200px;">
                  <div class="" >
                   <img src="{{ asset($pr->image) }}" alt="{{$pr->img_alt_tag}}" style="min-height:150px; min-width:100%"  class="img img-responsive" />
                  </div>
                  <div class="ab-news-grid-item-text" style="min-height: 170px">
                     
                     <div class="ab-news-grid-item-title"><?php echo substr($pr->title,0,80); ?></div>
                     <div class="ab-news-grid-item-date"><i class="fa fa-calendar" aria-hidden="true" style="color:#c00000"></i> {{ Carbon\Carbon::parse($pr->created_at)->format('M Y') }}</div>
                  </div>
              
               </a>
            </div>
            
            @endforeach

            
         </div>

         <ul class="pagination clearfix" id="paginationBottom">
               <li class="page-count"><strong><span>{{count($infographic)}}</span> Results</strong> (Page 1 of {{ ceil(count($infographic)/10)}} ) </li>

               <li class="pager-btn-container">
                  {{ $infographic->links('custom_pagination') }}
               </li>
            </ul>

            
      </div>
   </section>
</div>
@endsection

