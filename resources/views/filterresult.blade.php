 @if(!is_null($data) && count($data) > 0)
                 @if(count($data)>0)
                        @foreach($data as $d)
                       
                         <div class="product-item-small product-item-mobile clearfix report_store">
                              <div class="product-item-content">
                                 <div class="ab-product-thumbnail-book-binder left report_store">
                                    <div class="product-img-box">
                                       <span class="image-report" style="color:#fff;top: 7px;left: 3px;font-size: 6px;">Report</span>
                                       <h4 class="image-title" style="color: #000;top: 20px;font-size: 9px;text-align: left;width: 60px;left: 5px;">
                                       <?php echo substr(html_entity_decode(strip_tags($d->title)),0,30); ?></h4>                      
                                       </h4>
                                       <!-- <span class="imag-pages" style="color: #fff;font-size: 4px;left: 5px;bottom: 5px;">@php echo ($d->no_of_page) ? $d->no_of_page : '0' @endphp pages</span> -->
                                       <span class="book-years" style="color: ;font-size: 8px;right: 18px;bottom: 3px;">{{ Carbon\Carbon::parse($d->report_post_date)->format('M Y') }}</span>
                                    </div>
                                    <img loading="lazy" class="nonGenericproductSmallImage"src="{{asset('img/reportimg.jpg')}}"  width="60" height="86"alt="<?php echo substr(html_entity_decode(strip_tags($d->title)),0,30); ?>">
                                 </div>
                                 <div class="content" style="text-align: left; margin-right: 10px;">
                                    <h3 class="title f-arial"><a href="{{ url('report-store') }}/{{($d->page_url)}}" style="color:var(--primary-color);">{{$d->title}}</a></h3>
                                    <p style="margin-bottom: 10px;"><?php echo substr(html_entity_decode(strip_tags($d->decription)),0,260); ?></p><br>
                                    <ul class="product-item-list">
                                    
                                       <li> @php echo ($d->no_of_page) ? $d->no_of_page : '0' @endphp Pages </li>
                                       <li id="publicationDateItemId_related_products_5807230" class="publicationDateItem"><i class="fa fa-calendar" aria-hidden="true" style="color:#c00000"></i> {{ Carbon\Carbon::parse($d->report_post_date)->format('M Y') }}</li>
                                       <li>
                                           Report Format : &nbsp;
                                             <!-- <img alt="PDF Icon" src="{{asset('/assets/images/icon-PDF.webp')}}"  width="25" alt="pdf">   -->
                                             <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/pdf.png')}}" alt="Forbes Logo">
                                            <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/ppt.png')}}" alt="Forbes Logo">
                                            <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/xls.png')}}" alt="Forbes Logo">
                                        </li>
                                        <li class=""><i class="fa fa-download" aria-hidden="true" style="color:#c00000"></i><a style="color:#666;"href="{{ url('/request-sample') }}/{{$d->page_url}}"> download sample</a></li>
                                       <li class="last"><a  class="report-read-more"href="{{ url('report-store') }}/{{($d->page_url)}}">Read More</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div> 
                        @endforeach
      
                     @endif
                         @endif
                     

                  