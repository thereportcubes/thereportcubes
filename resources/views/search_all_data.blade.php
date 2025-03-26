@extends('layout/header')
@section('title','Search Results')

@section('content')

<section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="mb-0 mini-banner-title">Search Result</h1>
         </div>
      </div>
   </div>
</section>

<section class="main-content mb-5 mt-5">
      <div class="container">
         

            <div class="col-md-12 ">
               <div class="box-shadow p-0 searchpg_box">
                  <h6 class="fw-600 red-title-bg mb-0 text-center">Search Result For: "{{$search_keyword}}"</h6>
                  
                  <div class="box-content p-3">

                     @if(count($resultsA) > 0)
                        @foreach($resultsA as $report)
                          <!--   <div class="press-releas">
                                <h5>Report</h5>
                                <a href="{{url('report-store')}}/{{($report->page_url)}}" class="press-release-title d-block blue" target="_blank">{{$report->title}}</a>
                                <div>

                                    <?php echo substr(html_entity_decode(strip_tags($report->decription)),0,100); ?>
                              
                                    <span class="read-more"> &nbsp;
                                        <a href="{{url('report-store')}}/{{$report->page_url}}" class="text-warning" target="_blank">Read more</a>
                                    </span>
                                </div>

                           </div> -->
                           <div class="product-item-small product-item-mobile clearfix">
                        <div class="product-item-content">
                           <div class="ab-product-thumbnail-book-binder left">
                              <div class="product-img-box search-pg">
                                 <span class="image-report" style="color:#fff;top: 7px;left: 3px;font-size: 6px;">Report</span>
                                 <h4 class="image-title" style="color: #000;top: 20px;font-size: 9px;text-align: left;width: 60px;left: 5px;">
                                       <?php echo substr(html_entity_decode(strip_tags($report->title)),0,30); ?></h4>                      
                                       </h4>
                                 <!-- <span class="imag-pages" style="color: #000;font-size: 4px;left: 5px;bottom: 5px;">{{$report->no_of_page}} pages</span> -->
                                 <span class="book-years" style="color: ;font-size: 8px;right: 18px;bottom: 3px;">{{ Carbon\Carbon::parse($report->report_post_date)->format('M Y') }}</span>
                              </div>
                               <img loading="lazy" class="nonGenericproductSmallImage"src="{{asset('img/reportimg.jpg')}}" alt="Report"  width="60" height="86">

                           </div>
                           <div class="content" style="text-align: left; margin-right: 10px;">
                              <h3 class="title"><a href="{{url('/report-store')}}/{{$report->page_url}}" style="color:var(--primary-color);">{{$report->title}}</a></h3>
                              <p style="margin-bottom: 10px;"><?php echo ($report->heading2 !="") ? preg_replace('/\\s\\S*$/', '', substr($report->heading2, 0, 200))  : ''; ?>
                              </p> <br>
                              <ul class="product-item-list">
                                     
                                       <li> @php echo ($report->no_of_page) ? $report->no_of_page : '0' @endphp Pages </li>
                                       <li id="publicationDateItemId_related_products_5807230" class="publicationDateItem"><i class="fa fa-calendar" aria-hidden="true" style="color:#c00000"></i> {{ Carbon\Carbon::parse($report->report_post_date)->format('M Y') }}</li>
                                       <li>
                                           Report Format : &nbsp;
                                             <!-- <img alt="PDF Icon" src="{{asset('/assets/images/icon-PDF.webp')}}"  width="25" alt="pdf">   -->
                                             <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/pdf.png')}}" alt="Forbes Logo">
                                            <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/ppt.png')}}" alt="Forbes Logo">
                                            <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/xls.png')}}" alt="Forbes Logo">
                                        </li>
                                           <li class=""><i class="fa fa-download" aria-hidden="true" style="color:#c00000"></i><a style="color:#666;"href="{{ url('/request-sample') }}/{{$report->page_url}}"> download sample</a></li>
                                       <li class="last"><a  class="report-read-more"href="{{ url('report-store') }}/{{($report->page_url)}}">Read More</a></li>
                                    </ul>
                           </div>
                        </div>
                     </div>
                        @endforeach
                        
                     @endif
                     
                     
                     @if(count($resultsB) > 0)
                     
                        @foreach($resultsB as $press)
                            <div class="press-releas">
                                <h5>Press Release</h5>
                                <a href="{{url('press-release')}}/{{($press->page_url)}}" class="press-release-title d-block blue" target="_blank">{{$press->title}}</a>
                                <div>

                                    <?php echo substr(html_entity_decode(strip_tags($press->description)),0,100); ?>
                              
                                    <span class="read-more"> &nbsp;
                                        <a href="{{url('press-release')}}/{{$press->page_url}}" class="text-warning" target="_blank">Read more</a>
                                    </span>
                                </div>

                           </div>
                        @endforeach
                     @endif
                     
                  </div>
               </div>

            </div>
           
   
      </div>
   </section>

@endsection

