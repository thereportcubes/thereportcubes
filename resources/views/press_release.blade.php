@extends('layout.header')
@yield('title')
@section('content')

<main class="background-gray">
 <section class="mini-banner">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
         <h1 class="mb-0 mini-banner-title">Press Releases</h1>
         <h2 style="font-size: 18px; padding-bottom: 2px; color: white;">The Report Cube Solution to stay updated in the market with the latest releases published</h2> 
         </div>
      </div>
   </div>
</section>
   <section class="on-going-report ab-section ">
      <div class="ab-wrapper">
         <div class=" product-list-spacing-mobile">
            <div id="product--related-products" class="ab-product-content-section ab-product-content-related-items">
               <div class="relatedProducts">
                  <div class="relatedProductsList" style=" margin-top: 50px;">
                     @if(count($press) > 0)
                        @foreach($press as $p)
                        @php
                                     $button_ref = $p->button_refrence;
                                     $but_ref = explode('/', $button_ref);
                                     $report_url1 = $but_ref[4] ?? '';
                                       @endphp
                           <div class="product-item-small product-item-mobile  press-item">
                           <span class="date"><i class="fa fa-calendar"></i> {{ Carbon\Carbon::parse($p->post_date)->format('d M Y') }} </span>
                           <div class="product-item-content" style=" margin-top: 15px;">
                              <div class="content margin-zero" style="text-align: left;">
                                 <h3 class="title"><a href="{{url('press-release')}}/{{$p->press_release_url}}" style="color:var(--primary-color);">{{$p->heading}}</a></h3>
                                 <p style="margin-bottom: 10px;"><?php echo truncate_html($p->description, 250) ?>
                                 </p>
                                 <div class="press-btn-div">
                                    <ul class="press-btn-list">
                                       <li ><a class="press-btn" href="{{url('press-release')}}/{{$p->press_release_url}}">Read More</a></li>
                                       <li ><a class="press-btn" href="{{url('/report-store')}}/{{$report_url1}}">View Report</a></li>
                                       <li ><a class="press-btn" href="{{ url('/request-sample') }}/{{$report_url1}}">Request Sample</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           </div>
                        @endforeach
                     @endif
                     
                     <ul class="pagination clearfix" id="paginationBottom">
                        <li class="page-count"><strong><span>{{count($press)}}</span> Results</strong>(Page {{ $press->currentPage() }} of {{ $press->lastPage() }})  </li>

                        <li class="pager-btn-container">
                           {{ $press->links('custom_pagination') }}
                        </li>
                     </ul>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<?php 
function truncate_html($string, $length, $postfix = '', $isHtml = true) {
    $string = trim($string);
    $postfix = (strlen(strip_tags($string)) > $length) ? $postfix : '';
    $i = 0;
    $tags = []; // change to array() if php version < 5.4

    if($isHtml) {
        preg_match_all('/<[^>]+>([^<]*)/', $string, $tagMatches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        foreach($tagMatches as $tagMatch) {
            if ($tagMatch[0][1] - $i >= $length) {
                break;
            }

            $tag = substr(strtok($tagMatch[0][0], " \t\n\r\0\x0B>"), 1);
            if ($tag[0] != '/') {
                $tags[] = $tag;
            }
            elseif (end($tags) == substr($tag, 1)) {
                array_pop($tags);
            }

            $i += $tagMatch[1][1] - $tagMatch[0][1];
        }
    }

    return substr($string, 0, $length = min(strlen($string), $length + $i)) . (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '') . $postfix;
}
?>
@endsection