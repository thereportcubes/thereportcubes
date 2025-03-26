@extends('layout/header')
@section('title','Upcoming Report')

@section('content')

<style>
  .modal-content {
    margin-top: 100px;
  }

  .modal-body {
    font-weight: normal;
  }
</style>

<section class="mini-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="mb-0 mini-banner-title">{{$category->cat_name}}</h1>
        <h2 style="font-size: 18px; padding-bottom: 2px; color: white;">{{$category->cat_image}}</h2>
      </div>
    </div>
  </div>
</section>


<section class="main-content mb-5 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3 sm-100">

        <div class="filter when-scroll ">
          <p style="font-size: 18px; padding-bottom: 15px; font-weight:bold; color: var(--primary-color);">Target Industry
          </p>

          @foreach($sidebar_category as $cat)
          <div class="filter-item">
            <a href="#" class="filter-cate-tilte" data-toggle="collapse" data-parent="#accordionMenu"
              aria-expanded="false" aria-controls="collapse_{{$cat->id}}">
              <input type="checkbox" name="mainecategory" value="{{$cat->id}}"
                onclick="toggleSubCategories(this, {{$cat->id}}, 'category')" {{$category->id == $cat->id ? 'checked' :
              ''}}> {{$cat->cat_name}}
            </a>
            <div id="collapse_{{$cat->id}}" class="panel-collapse in collapse" role="tabpanel"
              aria-labelledby="headingOne_{{$cat->id}}"
              style="display: {{$category->id == $cat->id ? 'block' : 'none'}};">
              <div class="panel-body">
                @php
                $sub_category = \DB::table('sub_category')->where('cat_id', $cat->id)->get();
                @endphp

                @if(count($sub_category) > 0)
                @foreach($sub_category as $sub_cat)
                <ul style="margin:0px;">
                <li>
                  <input type="checkbox" name="category" data-maincategory="{{$cat->id}}" value="{{$sub_cat->id}}"
                    onchange="updateResults()" {{$category->id == $cat->id ? 'checked' : ''}}>
                  <a href="{{url('report-store')}}/{{$sub_cat->page_url}}">{{$sub_cat->sub_cat_name}}</a>
                </li>
              </ul>
                @endforeach
                @endif
              </div>
            </div>
          </div>
          @endforeach
        <div class="filter mt-4">
          <p style="font-size: 18px; padding-bottom: 15px; color: var(--primary-color);">Target Countries</p>
          @foreach($region as $cat)
          <div class="filter-item">
            <a href="#" class="filter-cate-tilte" data-toggle="collapse" data-parent="#accordionMenu"
              aria-expanded="false" aria-controls="collapse_{{$cat->id}}">
              <input type="checkbox" name="region" value="{{ $cat->id }}"
                onclick="toggleSubCategories(this, {{$cat->id}}, 'region')"> {{$cat->region_name}}
            </a>
            <div id="collapse_{{$cat->id}}" class="panel-collapse collapse" role="tabpanel"
              aria-labelledby="heading_{{$cat->id}}" style="display:none;">
              <div class="panel-body">
                @php $country = \DB::table('country')->where('region_id',$cat->id)->get(); @endphp
                @if(count($country)>0)
                @foreach($country as $country)
                   <ul style="margin:0px;">
                <li>
                  <input type="checkbox" name="country" data-country="{{$cat->id}}" value="{{$country->id}}"
                    onchange="updateResults()">
                  <a href="{{url('report-store/')}}/{{$country->page_url}}">{{$country->country_name}}</a>
                </li>
              </ul>
                @endforeach
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
      </div>


      <div class="col-md-9">
        <div class="relatedProductsList box-shadow">
          @if(count($data)>0)
          @foreach($data as $d)
          <div class="product-item-small product-item-mobile clearfix">
            <div class="product-item-content">
              <div class="ab-product-thumbnail-book-binder left">
                <div class="product-img-box">
                  <span class="image-report" style="color:#fff;top: 7px;left: 3px;font-size: 6px;">Report</span>
                  <h4 class="image-title"
                    style="color: #000;top: 20px;font-size: 9px;text-align: left;width: 60px;left: 5px;">
                    <?php echo substr(html_entity_decode(strip_tags($d->title)),0,30); ?>
                  </h4>
                  </h4>
                  <!-- <span class="imag-pages" style="color: #fff;font-size: 4px;left: 5px;bottom: 5px;">@php echo ($d->no_of_page) ? $d->no_of_page : '0' @endphp pages</span> -->
                  <span class="book-years" style="color: ;font-size: 8px;right: 18px;bottom: 3px;">{{
                    Carbon\Carbon::parse($d->report_post_date)->format('M Y') }}</span>
                </div>
                <img loading="lazy" class="nonGenericproductSmallImage" src="{{asset('img/reportimg.jpg')}}" width="60"
                  height="86" alt="<?php echo substr(html_entity_decode(strip_tags($d->title)),0,30); ?>">
              </div>

              <div class="content" style="text-align: left; margin-right: 10px;">
                <h3 class="title f-arial"><a href="{{ url('report-store') }}/{{($d->page_url)}}"
                    style="color:var(--primary-color);">{{$d->title}}</a></h3>
                <p style="margin-bottom: 10px;">
                  <?php echo substr(html_entity_decode(strip_tags($d->decription)),0,260); ?>
                </p><br>
                <ul class="product-item-list">
                  <!-- <li><i class="fa fa-file-pdf-o" style="color:#c00000; font-size:15px"></i> Report </li> -->
                  <li> @php echo ($d->no_of_page) ? $d->no_of_page : '0' @endphp Pages </li>
                  <li id="publicationDateItemId_related_products_5807230" class="publicationDateItem"><i
                      class="fa fa-calendar" aria-hidden="true" style="color:#c00000"></i> {{
                    Carbon\Carbon::parse($d->report_post_date)->format('M Y') }}</li>
                  <li>
                    Report Format : &nbsp;
                    <!-- <img alt="PDF Icon" src="{{asset('/assets/images/icon-PDF.webp')}}"  width="25" alt="pdf">   -->
                    <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/pdf.png')}}"
                      alt="Forbes Logo">
                    <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/ppt.png')}}"
                      alt="Forbes Logo">
                    <img loading="lazy" width="13" height="13" src="{{asset('assets/icons/xls.png')}}"
                      alt="Forbes Logo">
                  </li>
                  <li class=""><i class="fa fa-download" aria-hidden="true" style="color:#c00000"></i><a
                      style="color:#666;" href="{{ url('/request-sample') }}/{{$d->page_url}}"> download sample</a></li>
                  <li class="last"><a class="report-read-more" href="{{ url('report-store') }}/{{($d->page_url)}}">Read
                      More</a></li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach
          @endif

          <ul class="pagination clearfix" id="paginationBottom">
            <li class="page-count"><strong><span>{{count($data)}}</span> Results</strong> (Page {{ $data->currentPage() }} of {{ $data->lastPage() }})  </li>

            <li class="pager-btn-container">
              {{ $data->links('custom_pagination') }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>



</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  function priceModal(id) {

    $.ajax({
      url: '{{route("report-all-amounts") }}',
      type: 'get',
      data: { 'rid': id },
      dataType: "text",
      success: function (response) {
        let res = JSON.parse(response);
        $("#idH").val(id);
        $("#excel_data_pack").html(res.excel_data_pack)
        $("#single_user_license").html(res.single_licence_price)
        $("#multi_user_license").html(res.multi_user_price)
        $("#enterprise_license").html(res.custom_report_price)

        $(".excel_data_pack").val(res.excel_data_pack + "-excel_data_pack")
        $(".single_user_license").val(res.single_licence_price + "-single_licence_price")
        $(".multi_user_license").val(res.multi_user_price + "-multi_user_price")
        $(".enterprise_license").val(res.custom_report_price + "-custom_report_price")

        $("#exampleModal").modal('show');
      }
    });
  }

  function add_to_cart() {

    let report_type_price = $("input[name='price_type']:checked").val();

    if (report_type_price == "" || report_type_price === 'undefined') {
      alert('Please Select At-least One Licence Price');
      return false;
    }
    let id = $("#idH").val();

    $.ajax({
      url: '{{route("add-to-cart-new") }}',
      type: 'get',
      data: { 'id': id, report_type_price: report_type_price },
      dataType: "JSON",
      success: function (response) {
        console.log(response);
        if (response.status == true) {
          window.location = "{{ url('/cart') }}";
        } else {
          alert("Already in Cart");
        }
      }
    });

  }


  $(document).ready(function () {
    $('.filter-cate-tilte').click(function (event) {
      event.preventDefault();


      $(this).attr('aria-expanded', function (_, attr) {
        return attr === 'true' ? 'false' : 'true';
      });

      $(this).next('.panel-collapse').slideToggle();
    });
  });
</script>
@endsection