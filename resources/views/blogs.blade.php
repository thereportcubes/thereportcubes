@extends('layout/header')
@section('title','Blogs')
@section('content')

<section class="mini-banner-blogs">
   <div class="container">
      <div class="row">
         <div class="col-md-12 mb-4">
         <h1 class="mb-0 mini-banner-title"></h1>
         </div>
      </div>
   </div>
</section>

<section class="">
   <div class="container mt-5 mb-5">
      <div class="row box-shadow px-4">
      <h6 class="fw-600 blue-title-bg">Blogs</h6>
      @if(count($blog) > 0)
         @foreach($blog as $p)

         <div class="col-md-4">
            <div class="card px-2 py-3 mb-4 mt-4">
               <h6 class="fw-800"><?php echo substr($p->title,0,38)."...";?> </h6>
               <p>Published Date: {{ Carbon\Carbon::parse($p->created_at)->format('d M Y ') }}</p>
               <p class="ms-2" >
                  <?php echo  substr(html_entity_decode(strip_tags($p->description)),0,75); ?>
               </p>
               <!-- <a href="{{url('blog-details')}}/{{$p->id}}" class="read-more-small-btn"><button class="read-more-btn px-3 py-2 text-white mb-2 btn-default">Read More</button></a> -->
               <span class="read-more">
                  <a href="{{url('blogs')}}/{{$p->slug}}" class="read-more-large-btn">Read more</a>
               </span>
            </div>
         </div>

         @endforeach
      @endif
         
      <div class="row">
         <div class="col-md-12">
            <nav aria-label="Page navigation example">
               {{ $blog->links('custom_pagination') }}
            </nav>
         </div>
      </div>
         
      </div>

      

   </div>
   </section>

@endsection