<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="p:domain_verify" content="0a7235980daba36e90ce92b06e4bb6ea"/>
 
   
      <meta name="author" content="Report Cube">
      
   <script type="application/ld+json">
    {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "The Report Cube",
    "url": "https://www.thereportcubes.com/",
    "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.thereportcubes.com/search?searchform={search_term_string}",
    "query-input": "required name=search_term_string"
    }
    }
</script>

<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "qdc5x79krv");
</script>


<script type="application/ld+json">
    {
    "@context" : "http://schema.org",
    "@type" : "Organization",
    "name" : "The Report Cube",
    "description" : "The Report cube is a leading market research and business consulting company that offers market research reports, syndicated services, customized services, competitive, company profile and biographies.",
    "image" : "https://www.thereportcubes.com/public/img/rcube-logo.png",
    "alternateName" : "Report Cube",
    "telephone" : "+971 564468112",
    "email" : "sales@thereportcubes.com",
    "address" : {
    "@type" : "PostalAddress",
    "streetAddress" : "C/Burjuman Business Tower - Dubai - United Arab Emirates",
    "addressLocality" : " Dubai",
    "addressRegion" : "GCC",
    "addressCountry" : "UAE",
    "postalCode" : " 121828"
    },
    "url" : "https://www.thereportcubes.com/",
    "sameAs" : [
    "https://www.facebook.com/people/The-Report-Cube/61561130759640/",
    "https://x.com/thereportcube",
    "https://www.linkedin.com/company/the-report-cube/"
    ]
    }
</script>
 

  <?php 
   $seo_data = "";
   $seo_slug_url = "";

   $seo_slug_url_type = request()->segment(1);
   
   $seo_slug_url = request()->segment(2);
  if(in_array($seo_slug_url_type, ['request-sample'])){
        echo '<meta name="robots" content="noindex, follow" />';
   } else {
       echo '<meta name="robots" content="index, follow" />';
   }
   if($seo_slug_url_type == "infographics" &&  $seo_slug_url !=""){
      
      $parent_id =\DB::table('infographic')->where('slug',$seo_slug_url)->first();      
      
if(!is_null($parent_id)){
   ?>
      <title><?php echo @$parent_id->seo_title ;?></title>
      <meta name="description" content="<?php echo @$parent_id->seo_description ; ?>" />
      <meta name="keywords" content="<?php echo @$parent_id->seo_keyword ; ?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo @$parent_id->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo @$parent_id->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo @$parent_id->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo @$parent_id->seo_description ;?>" />
      <base href="{{url()->current()}}">

      <script type="application/ld+json">  
      {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
         "itemListElement": [                                       
                              {
                                 "@type": "ListItem",
                                 "position": 1,
                                 "item": {
                                    "@type": "webpage",
                                    "@id": "{{url('/')}}",
                                    "name": "Home"
                                 }
                              },
                              {
                                    "@type": "ListItem",
                                    "position": 2,
                                    "item": {
                                          "@type": "webpage",
                                          "@id": "{{url('/infographics')}}",
                                          "name": "Infographics"
                                    }
                              },
                              {
                                    "@type": "ListItem",
                                    "position": 3,
                                    "item": {
                                          "@type": "webpage",
                                          "@id": "{{url('/infographics')}}/{{request()->segment(2)}}",
                                          "name": "{{$parent_id->title}}"
                                    }
                              }
                           ]
      }

   </script>

   <?php }}

   else if($seo_slug_url_type == "infographics" && $seo_slug_url ==""){ ?>
      
      <title>Market Research Reports Infographics - Report Cube</title>
      <meta name="keywords" content="Market Research Infographics, Market Research Reports Infographics, Infographics">
      <meta name="description" content="Report Cube anticipate market growth, analysis, demand and mention in the form of infographics for across sectors like Aerospace and Defense, Automotive, Building, Construction, Metals and Mining, Chemicals, Energy, healthcare, Food and Beverages etc." />
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="Market Research Reports Infographics - Report Cube" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="Report Cube  anticipate market growth, analysis, demand and mention in the form of infographics for across sectors like Aerospace and Defense, Automotive, Building, Construction, Metals and Mining, Chemicals, Energy, healthcare, Food and Beverages etc."/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="Market Research Reports Infographics - Report Cube" />
      <meta name="twitter:description" content="Report Cube anticipate market growth, analysis, demand and mention in the form of infographics for across sectors like Aerospace and Defense, Automotive, Building, Construction, Metals and Mining, Chemicals, Energy, healthcare, Food and Beverages etc." />
      <base href="{{url()->current()}}">

      <script type="application/ld+json">  
      {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
         "itemListElement": [                                       
                              {
                                 "@type": "ListItem",
                                 "position": 1,
                                 "item": {
                                    "@type": "webpage",
                                    "@id": "{{url('/')}}",
                                    "name": "Home"
                                 }
                              },
                              {
                                    "@type": "ListItem",
                                    "position": 2,
                                    "item": {
                                          "@type": "webpage",
                                          "@id": "{{url('/infographics')}}",
                                          "name": "Infographics"
                                    }
                              }
                           ]
      }

   </script>

   <?php } 

   else if($seo_slug_url_type == "press-release" && $seo_slug_url != ""){ 
    $button_ref ='';
      $parent_id =\DB::table('press_release')->where('press_release_url',$seo_slug_url)->first(); 
      if(!is_null($parent_id)){
      $button_ref = $parent_id->button_refrence;
      if($button_ref !=""){
         $but_ref = explode('/',$button_ref);
         $report =\DB::table('reports')->where('page_url',$but_ref['4'])->first(); 
        // print_r($but_ref); die;
      }
      $seo_data =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','press_release')->orderBy('id','DESC')->first(); 
      } else {
          $seo_data =\DB::table('seo_content')->where('page_type','press_release')->orderBy('id','DESC')->first(); 
      }
      
   ?>
      <title><?php echo $seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="news" />
      <meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}">

      <script type="application/ld+json">  
      {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
         "itemListElement": [                                       
               {
                  "@type": "ListItem",
                  "position": 1,
                  "item": {
                     "@type": "webpage",
                     "@id": "{{url('/')}}",
                     "name": "Home"
                  }
               },
               {
                     "@type": "ListItem",
                     "position": 2,
                     "item": {
                           "@type": "webpage",
                           "@id": "{{url('/press-release')}}",
                           "name": "Press Release"
                     }
               },
               {
                     "@type": "ListItem",
                     "position": 3,
                     "item": {
                           "@type": "webpage",
                           "@id": "{{url('/press-release')}}/{{request()->segment(2)}}",
                           "name": "{{@$report->title}}"
                     }
               }
            ]
      }

   </script>

   <?php } 
   
    else if($seo_slug_url_type == "press-release" && $seo_slug_url == ""){ 
    $parent_id = \DB::table('seo_pages')->where('page_key','press_release')->first();
    $seo_content = \DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','press_release')->first();
   ?>
      <title><?php echo $seo_content->seo_title; ?></title>
      <meta name="description" content="<?php echo $seo_content->seo_description; ?>" />
      <meta name="keywords" content="<?php echo $seo_content->seo_key_words; ?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="news" />
      <meta property="og:title" content="<?php echo $seo_content->seo_title; ?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo $seo_content->seo_description; ?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo $seo_content->seo_title; ?>" />
      <meta name="twitter:description" content="<?php echo $seo_content->seo_description; ?>" />
      <base href="{{url()->current()}}">

      <script type="application/ld+json">  
      {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
         "itemListElement": [                                       
               {
                  "@type": "ListItem",
                  "position": 1,
                  "item": {
                     "@type": "webpage",
                     "@id": "{{url('/')}}",
                     "name": "Home"
                  }
               },
               {
                     "@type": "ListItem",
                     "position": 2,
                     "item": {
                           "@type": "webpage",
                           "@id": "{{url('/press-release')}}",
                           "name": "Press Release"
                     }
               }
               
            ]
      }

   </script>

   <?php } 

   else if($seo_slug_url_type == "contact-us" && $seo_slug_url == ""){ 
      
      $seo_data =\DB::table('seo_content')->where('page_type','contact_us')->orderBy('id','DESC')->first(); 
   ?>         
   
      <title><?php echo $seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}">

      <script type="application/ld+json">  
         {
         "@context": "https://schema.org",
         "@type": "BreadcrumbList",
            "itemListElement": [
                                             
                                 {
                                    "@type": "ListItem",
                                    "position": 1,
                                    "item": {
                                       "@type": "webpage",
                                       "@id": "{{url('/')}}",
                                       "name": "Home"
                                    }
                                 },
                                 {
                                 "@type": "ListItem",
                                 "position": 2,
                                 "item": {
                                       "@type": "webpage",
                                       "@id": "{{url('/contact-us')}}",
                                       "name": "Indexphp"
                                    }
                                 }
                     ]
         }
      </script>
   
   <?php } 
   
   else if($seo_slug_url_type == "" && $seo_slug_url == ""){ 
      $seo_data =\DB::table('seo_content')->where('page_type','home')->orderBy('id','DESC')->first(); 
   ?>
         
   
      <title><?php echo $seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}">
      
   
   

   
   
   <?php } else if($seo_slug_url_type == "about-us" && $seo_slug_url == ""){ 
      
      $seo_data =\DB::table('seo_content')->where('page_type','about_us')->orderBy('id','DESC')->first(); 
   ?>         
   
      <title><?php echo $seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}" >
   
   <?php } else if($seo_slug_url_type == "careers" && $seo_slug_url == ""){ 
      
      $seo_data =\DB::table('seo_content')->where('page_type','careers')->orderBy('id','DESC')->first(); 
   ?>         
   
      <title><?php echo @$seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo @$seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo @$seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo @$seo_data->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo @$seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo @$seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo @$seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}">
   
   <?php }   else if($seo_slug_url_type == "report-store" && $seo_slug_url != "" ){ 
       
       
        $report_slug_check = \DB::table('reports')->where('page_url',$seo_slug_url)->count();
        $report_slug_category_check = \DB::table('category')->where('category_url',$seo_slug_url)->count();
        $report_slug_subcategory_check = \DB::table('sub_category')->where('page_url',$seo_slug_url)->count();
        $report_slug_region_check = \DB::table('region')->where('page_url',$seo_slug_url)->count();
        $report_slug_country_check = \DB::table('country')->where('page_url',$seo_slug_url)->count();
        
        if($report_slug_check > 0) {
            $parent_id = \DB::table('reports')->where('page_url',$seo_slug_url)->first();
            $seo_data =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','report')->orderBy('id','DESC')->first();
            ?>
                <script type="application/ld+json">
            	{
            		"@context": "https://schema.org/",
            		"@type": "Dataset",
            		"name": "{{@$seo_data->seo_title}}",
            
               		"description": ["<?php echo @$seo_data->seo_description ;?>"],	
            		"url": "https://thereportcubes.com/report-store/{{@$parent_id->page_url}}",
            		"sameAs": "https://thereportcubes.com/report-store/{{@$parent_id->page_url}}",
            		"license": "https://thereportcubes.com/privacy-policy",
            		"keywords": ["<?php echo @$seo_data->seo_key_words ;?>"],
            		"temporalCoverage": "2024-32",
            		"spatialCoverage": "Global",
            		"creator": {
            			"@type": "Organization",
            			"url": "https://thereportcubes.com/",
            			"name": "The Report Cube",
            			"logo": {
            				"@type": "ImageObject",
            				"url": "{{asset('img/rcube-logo.png')}}"
            			}
            		}
            	}
            </script>
            <?php 
        }
        else if($report_slug_category_check > 0){  
            $parent_id = \DB::table('category')->where('category_url',$seo_slug_url)->first();
            $seo_data =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','category')->orderBy('id','DESC')->first();
        }
        else if($report_slug_subcategory_check > 0){
            $parent_id = \DB::table('sub_category')->where('page_url',$seo_slug_url)->first();
            $seo_data =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','sub_ctegory')->orderBy('id','DESC')->first();
        } else if($report_slug_region_check > 0){
            $parent_id = \DB::table('region')->where('page_url',$seo_slug_url)->first();
            $seo_data =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','region')->orderBy('id','DESC')->first();
        } else if($report_slug_country_check > 0){
            $parent_id = \DB::table('country')->where('page_url',$seo_slug_url)->first();
            $seo_data =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','country')->orderBy('id','DESC')->first();
        }
        
    ?>         
   
      <title><?php echo @$seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo @$seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo @$seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo @$seo_data->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo @$seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo @$seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo @$seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}" >

      
    <script type="application/ld+json">  
              {
              "@context": "https://schema.org",
              "@type": "BreadcrumbList",
                 "itemListElement": [
                                                  
                    {
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                          "@type": "webpage",
                          "@id": "{{url('/')}}",
                          "name": "Home"
                       }
                    },
                             
                    {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                          "@type": "webpage",
                          "@id": "{{url('/report-store')}}",
                          "name": "Report Store"
                       }
                    },
                             
                    {
                    "@type": "ListItem",
                    "position": 3,
                    "item": {
                          "@type": "webpage",
                          "@id": "{{url('/report-store')}}/{{$seo_slug_url}}",
                          "name": "{{$seo_slug_url}}"
                       }
                    }
                                               
                 ]
              }
        
            </script>

    

   
    <?php if($report_slug_check > 0) { 
            
        $datas = \DB::table('reports')->where('page_url',$seo_slug_url)->first();
        $faqs = json_decode($datas->faqs);  
        $size = count((array)$faqs->ques);
        $m=1;
        if($size>0){
    ?>
    
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                <?php 
                    for($i=0 ; $i<$size; $i++) { 
                        if($faqs->ques[$i] !=""){ 
                    ?>
                    {
                        "@type": "Question",
                        "name": "Q. {{ $faqs->ques[$i] }}",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "A. {{ $faqs->ans[$i] }}"
                        }
                    }<?php if($i<$size-1) { echo ","; } ?>
                <?php } } ?>
                
            ]
        }
        </script>
    <?php } } ?>
    
    <?php 
    if (strpos(@$parent_id->title, 'Global') !== false  && @$parent_id->report_post_date > '2020-12-31') { 
     
      $newprice = "";
      if($parent_id->single_licence_price){
         $newprice = str_replace(',','',$parent_id->single_licence_price);
      }
   
   ?>
   <script type="application/ld+json">  
      {
         "@context": "https://schema.org/",
         "@type": "Product",
         "name": "{{@$parent_id->title}}",
         "image": [

         "{{asset('img/rcube-logo.png')}}"
         ],
         "description": "{{@$parent_id->schema_desc}}",
         "sku" : "{{@$parent_id->report_code}}",
         "mpn": "{{@$parent_id->report_code}}",
         "brand": 
         {
            "@type": "brand",
            "name": "Report Cube"
         },
         "review": 
         {
            "@type": "Review",
            "reviewRating": 
            {
            "@type": "Rating",
            "ratingValue": "{{@$parent_id->rating_value}}",
            "bestRating": "5"
            },
            "author": 
            {
            "@type": "Organization",
            "name": " The Report Cube"
            }
         },
         "aggregateRating": 
         {
            "@type": "AggregateRating",
            "ratingValue": "{{@$parent_id->rating_value}}",
            "reviewCount": "{{@$parent_id->reviewcount}}"
         },
         "offers": 
         {
            "@type": "Offer",
            "url": "{{url('/report-store')}}/{{$seo_slug_url}}",
            "priceCurrency": "USD",
            "price": "{{@$newprice}}",
            "priceValidUntil": "2024/01/31",
            "itemCondition": "https://schema.org/NewCondition",
            "availability": "https://schema.org/InStock",
            "seller": {
            "@type": "Organization",
            "name": "The Report Cube"
         }
      }
      }
   </script>

   <?php } 
   
   } else if($seo_slug_url_type == "report-store" && $seo_slug_url == ""){       
      $seo_data =\DB::table('seo_content')->where('page_type','report_stores')->orderBy('id','DESC')->first(); 
   ?>         
   
      <title><?php echo $seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="website" />
      <meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
      <meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}" >

      <script type="application/ld+json">  
      {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
         "itemListElement": [
                                          
            {
            "@type": "ListItem",
            "position": 1,
            "item": {
                  "@type": "webpage",
                  "@id": "{{url('/')}}",
                  "name": "Home"
               }
            },
                     
            {
            "@type": "ListItem",
            "position": 2,
            "item": {
                  "@type": "webpage",
                  "@id": "{{url('/report-store')}}",
                  "name": "Report Store"
               }
            }                        
         ]
      }

   </script>
   
   <?php } else if($seo_slug_url_type == "privacy-policy" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','privacy_policy')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/privacy-policy')}}",
                           "name": "Privacy Policy"
                       }
                     }
     ]
}

</script>


<?php } else if($seo_slug_url_type == "terms-conditions" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','terms_condition')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/terms-condition')}}",
                           "name": "Terms Condition"
                       }
                     }
     ]
}

</script>

<?php  } else if($seo_slug_url_type == "refund-policy" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','refund_policy')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/refund-policy')}}",
                           "name": "Terms Condition"
                       }
                     }
     ]
}

</script>

<?php  } else if($seo_slug_url_type == "syndicated-research" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','syndicated_research')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/services')}}",
                           "name": "Services"
                       }
                     }
     ]
}

</script>

<?php } else if($seo_slug_url_type == "customized-research" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','customized_research')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/services')}}",
                           "name": "Services"
                       }
                     }
     ]
}

</script>

<?php } else if($seo_slug_url_type == "competitive-analysis" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','competitive_analysis')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/services')}}",
                           "name": "Services"
                       }
                     }
     ]
}

</script>

<?php } else if($seo_slug_url_type == "company-profile" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','company_profile')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/services')}}",
                           "name": "Services"
                       }
                     }
     ]
}

</script>

<?php } else if($seo_slug_url_type == "biographies" && $seo_slug_url == ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','biographies')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/services')}}",
                           "name": "Services"
                       }
                     }
     ]
}

</script>

<?php }  else if($seo_slug_url_type == "search" && $seo_slug_url !== ""){ 

$seo_data =\DB::table('seo_content')->where('page_type','search_page')->orderBy('id','DESC')->first(); 

?>         

<title><?php echo $seo_data->seo_title ;?></title>
<meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
<meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta property="og:image" content="{{asset('img/rcube-logo.png')}}" />
<meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
<meta property="og:url" content="{{url()->current()}}">

<meta name="twitter:card" content="{{asset('img/rcube-logo.png')}}" />
<meta name="twitter:site" content="The Report Cube" />
<meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
<meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
<base href="{{url()->current()}}" >


<script type="application/ld+json">  
{
"@context": "https://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
                           
          {
                   "@type": "ListItem",
                   "position": 1,
                   "item": {
                       "@type": "webpage",
                       "@id": "{{url('/')}}",
                       "name": "Home"
                   }
                 },
                                {
                       "@type": "ListItem",
                       "position": 2,
                       "item": {
                           "@type": "webpage",
                           "@id": "{{url('/services')}}",
                           "name": "Services"
                       }
                     }
     ]
}

</script>

<?php } else if($seo_slug_url_type == "request-sample" && $seo_slug_url !== ""){ 

      $seo_page_url_request = request()->segment(2);
      $parent_id =\DB::table('reports')->where('page_url',$seo_page_url_request)->first();      
      $seo_data =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','report')->orderBy('id','DESC')->first(); 
   
   ?>         
   
      <title><?php echo $seo_data->seo_title ;?></title>
      <meta name="description" content="<?php echo $seo_data->seo_description ;?>" />
      <meta name="keywords" content="<?php echo $seo_data->seo_key_words ;?>">
      <link rel="canonical" href="{{url()->current()}}" />

      <meta property="og:type" content="news" />
      <meta property="og:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta property="og:image" content="https://www.thereportcubes.com/public/img/rcube-logo.png" />
      <meta property="og:description" content="<?php echo $seo_data->seo_description ;?>"/>
      <meta property="og:url" content="{{url()->current()}}">

      <meta name="twitter:card" content="https://www.thereportcubes.com/public/img/rcube-logo.png" />
      <meta name="twitter:site" content="The Report Cube" />
      <meta name="twitter:title" content="<?php echo $seo_data->seo_title ;?>" />
      <meta name="twitter:description" content="<?php echo $seo_data->seo_description ;?>" />
      <base href="{{url()->current()}}" >

      <script type="application/ld+json">  
      {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
         "itemListElement": [
                                          
            {
            "@type": "ListItem",
            "position": 1,
            "item": {
                  "@type": "webpage",
                  "@id": "{{url('/')}}",
                  "name": "Home"
               }
            },
                     
            {
            "@type": "ListItem",
            "position": 2,
            "item": {
                  "@type": "webpage",
                  "@id": "{{url('/report-store')}}",
                  "name": "Report store"
               }
            }                        
         ]
      }

   </script>
   
   <?php }?>

   
   
   <!--~~~~~~~~~~~~~FontAwesome CDN Link~~~~~~~~~~~~-->
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
   <!-- <link rel="stylesheet" media="all" href="{{asset('css/bootstrap.min.css')}}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link fetchpriority="high" rel="stylesheet" media="all" href="{{asset('css/style.css')}}">
   <link rel="stylesheet" media="all" href="{{asset('css/customstyle.css')}}">
   <link rel="icon" href="{{asset('img/favicon_new.ico')}}"/>
   <link  rel="stylesheet" media="all" href="{{asset('css/ab-custom.css')}}?v=5245">
  
   
      <style type="text/css">
      
      
    .cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f1f1f1;
        padding: 10px;
        text-align: center;
    }
    .iti--separate-dial-code{
         width:100%!important;
      }
   </style>

</head>

<body >
   <?php
   $allcategory = \DB::table('category')->orderBy('cat_name', 'ASC')->get();

   ?>
   <!-- top bar section -->
     <section class="navbar-area ">
     

<div id="top-nav-container"> 
    <span class="top-nav-shape"></span>
    <div class="center clearfix">
        <ul class="text-right right">
            <li class="hide-phonemin">
                <a href="mailto:sales@thereportcubes.com"> 
                    <i class="fa fa-envelope" aria-hidden="true"></i> sales@thereportcubes.com
                </a>
            </li>

            @if (Auth::check())
               <li class="hide-phonemin" style="cursor:pointer">
                  <a href="#"  >Welcome, {{auth()->user()->first_name}} {{auth()->user()->last_name}} </a><!-- Display user's name -->
                </li>
            
            @else
                <li class="hide-phonemin" style="cursor:pointer">
                    <a href="{{ url('signin') }}">Sign-in/Register</a> <!-- Sign-in/Register link -->
                </li>
            @endif
             <li class="hide-phonemin">
                        <div id="google_translate_element" style="color:#0000"></div>
                  </li>
            <li class="hide-phonemin">
                <div class="gtranslate_wrapper"></div>  
            </li>
          
        </ul>
    </div>
</div>
 



     
      <div class="logo-search-icons">
         <div class="container">
            <div class="row align-items-center ">
               <div class="col-md-2  hide-on-mobile">
                  <a class="navbar-brand d-inline-block hide-on-mobile" href="{{url('/')}}" rel="noopener noreferrer"  aria-label="logo">
                      <img src="{{asset('img/rcube-logo.png')}}"  class="img-fluid lazy" alt="The Report Cube- Market Research Company" width="160" height="50"  style="margin-top: -50px !important;" /></a>
               </div>

               <div class="col-md-10">
                  <nav class="navbar navbar-expand-lg navbar-light white-bg pt-2 pb-1 "
                        >
                            <div class="container">
                                <a class="navbar-brand hide-on-desktop" href="https://thereportcubes.com/"
                                    rel="noopener noreferrer" aria-label="logo">
                                    <img src="{{asset('img/rcube-logo.png')}}" class="img-fluid lazy"
                                        alt=" The Report Cube- Market Research Company" width="160" height="50" /></a>

                                        <div class=" align-self-end molile-view d-none">
                                           <ul class="navbar-nav mobile-icon" >
                                    <li class="nav-item list-unstyled d-inline-block ps-2 fs-13 black"
                                       data-bs-toggle="modal" data-bs-target="#exampleModals" style="cursor:pointer">
                                       <span class="nav-link "><i class="fa fa-search"></i></span>
                                    </li>
                                    <li class="nav-link list-unstyled d-inline-block ps-3  blue cart_counter"><a class=""
                                          href="https://www.thereportcubes.com/shopping-basket" rel="noopener noreferrer"
                                          aria-label="cart"><i class="fs-20 fa fa-shopping-cart"
                                             style="color:black"></i></a>
                                               @if(count((array) session('cart')) > 0 )
               
                        <div class="cart_count" data-toggle="dropdown" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" >{{ count((array) session('cart')) }}</div>
                        <div class="dropdown-menu" style="width:250px;">               
                           @if(session('cart'))
                              @foreach(session('cart') as $id => $details)
                                 <div class="row cart-detail" style="width:210px; padding:0 5px;">
                                    <div class="col-lg-2 col-sm-2 col-2 cart-detail-img">
                                          <img src ="{{url('public/img/1.png')}}" data-src="{{ url('public/img/market_research_consulting.webp')}}" width="30" height="30" class="lazy" />
                                    </div>
                                    <div class="col-lg-10 col-sm-10 col-10 cart-detail-product">
                                          <p style="font-size:11px;">{{ $details['name'] }} <br>
                                          <span class="price text-primary fw-600" style="font-size:11px;"> USD {{ $details['price'] }}</span> <span class="count fw-600" style="font-size:11px;"> Qty: {{ $details['quantity'] }}</span>
                                       </p>
                                    </div>
                                 </div>
                              @endforeach
                           @endif

                           <div class="row total-header-section" style="min-width:210px; padding:0 5px;">
                              <div class="col-lg-6 col-sm-6 col-6">
                                 <!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger text-danger">{{ count((array) session('cart')) }}</span> -->
                              </div>
                              @php $total = 0 @endphp
                              @foreach((array) session('cart') as $id => $details)
                                 @if(strpos($details['price'], ',') !== false)
                                    @php 
                                       $price = str_replace(',','',$details['price']);
                                    @endphp
                                    
                                 @else
                                    @php $price = $details['price']; @endphp
                                 @endif
                                 
                                 @php 
                                    $price = intval($price);
                                    $total += $price * $details['quantity'];
                                 @endphp
                                 
                              @endforeach
                              <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                 <p class="fw-600">Total: <span class="text-primary"><?php echo "USD ".number_format($total) ?></span></p>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                 <a href="{{url('shopping-basket')}}" class="btn btn-warning btn-sm" rel="noopener noreferrer"  aria-label="View"View>View</a>
                              </div>
                           </div>
                        </div>
                     @endif
                                    </li>
                                 </ul>
                                 </div>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle  " rel="noopener noreferrer"
                                                href="javascript:void()" id="navbarDropdown"
                                                role="button" aria-expanded="false" aria-label="Research Report">
                                                What We Do
                                            </a>
                                            <ul class="dropdown-content" aria-labelledby="navbarDropdown" style="list-style: none;">
                                                <li><a class="dropdown-item"
                                                        href="{{url('syndicated-research')}}"
                                                        rel="noopener noreferrer" aria-label="Cart Name">Syndicated Research</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                     href="{{url('customized-research')}}"
                                                        rel="noopener noreferrer" aria-label="Cart Name">Customized Research</a></li>
                                                <li><a class="dropdown-item"
                                                       href="{{url('competitive-analysis')}}"
                                                        rel="noopener noreferrer" aria-label="Cart Name">Competitive Analysis</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{url('company-profile')}}"
                                                        rel="noopener noreferrer" aria-label="Cart Name">Company Profile</a></li>
                                             <li><a class="dropdown-item"
                                                        href="{{url('biographies')}}"
                                                        rel="noopener noreferrer" aria-label="Cart Name">Biographies</a></li>

                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " aria-current="page"
                                                href="{{url('about-us')}}" rel="noopener noreferrer"
                                                aria-label="Upcoming">About-Us</a>
                                        </li>
                                       <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" rel="noopener noreferrer" href="{{url('report-store')}}" id="navbarDropdown2" role="button" aria-expanded="false" aria-label="Research Report">
                                       Report Store
                                    </a>
                                    <ul class="dropdown-content" aria-labelledby="navbarDropdown2" style="width:241px; list-style:none">
                                       @foreach($allcategory as $cat)
                                       <li class="nav-item dropdown">
                                          <a class="dropdown-item dropdown-toggle" href="{{ url('report-store') }}/{{$cat->category_url}}" id="categoryDropdown{{ $cat->id }}" role="button" aria-expanded="false" aria-label="{{ $cat->cat_name }}">
                                             {{ $cat->cat_name }}
                                          </a>
                                          @php
                                          $allsub_category = \DB::table('sub_category')->where('cat_id', $cat->id)->get();
                                          @endphp

                                          @if(count($allsub_category) > 0)
                                          <ul class="dropdown-content sub-dropdown " aria-labelledby="categoryDropdown{{ $cat->id }}" style="width:200px; list-style:none">
                                             @foreach($allsub_category as $sub_cat)
                                             <li>
                                                <a class="dropdown-item" href="{{ url('report-store') }}/{{$sub_cat->page_url}}" style="padding:6px 14px;" rel="noopener noreferrer" aria-label="{{ $sub_cat->sub_cat_name }}">
                                                   {{ $sub_cat->sub_cat_name }}
                                                </a>
                                             </li>
                                             @endforeach
                                          </ul>
                                          @endif
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                
                                    <!--     <li class="nav-item">
                                            <a class="nav-link " href="{{url('ongoing-report')}}"
                                                rel="noopener noreferrer" aria-label="press release">On-Going-Reports</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link " href="{{url('press-release')}}"
                                                rel="noopener noreferrer" aria-label="Infographics">Press-Release</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="{{url('contact-us')}}">Contact Us</a>
                                        </li>
                                       <div class="mobile-v d-block">
                                      <li class="nav-item  list-unstyled d-inline-block ps-2 fs-13 black" data-bs-toggle="modal" data-bs-target="#exampleModals" style="cursor:pointer">
                                    <span class="nav-link "><i class="fa fa-search"></i></span>
                                 </li>
                                
                                       <li class="nav-link list-unstyled d-inline-block ps-3  blue cart_counter"><a class="" href="{{url('shopping-basket')}}" rel="noopener noreferrer"  aria-label="cart"><i
                              class="fs-20 fa fa-shopping-cart" style="color:black"></i></a>
                          

                        @if(count((array) session('cart')) > 0 )
               
                        <div class="cart_count" data-toggle="dropdown" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" >{{ count((array) session('cart')) }}</div>
                        <div class="dropdown-menu" style="width:220px; margin-left: -130px; top: 32px;">               
                           @if(session('cart'))
                              @foreach(session('cart') as $id => $details)
                                 <div class="row cart-detail" style="width:210px; padding:0 5px;">
                                    <div class="col-lg-2 col-sm-2 col-2 cart-detail-img">
                                          <img src ="{{url('public/img/1.png')}}" data-src="{{ url('public/img/market_research_consulting.webp')}}" width="30" height="30" class="lazy" />
                                    </div>
                                    <div class="col-lg-10 col-sm-10 col-10 cart-detail-product">
                                          <p style="font-size:11px;">{{ $details['name'] }} <br>
                                          <span class="price text-primary fw-600" style="font-size:11px;"> USD {{ $details['price'] }}</span> <span class="count fw-600" style="font-size:11px;"> Qty: {{ $details['quantity'] }}</span>
                                       </p>
                                    </div>
                                 </div>
                              @endforeach
                           @endif

                           <div class="row total-header-section" style="min-width:210px; padding:0 5px;">
                              <div class="col-lg-6 col-sm-6 col-6">
                                 <!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger text-danger">{{ count((array) session('cart')) }}</span> -->
                              </div>
                              @php $total = 0 @endphp
                              @foreach((array) session('cart') as $id => $details)
                                 @if(strpos($details['price'], ',') !== false)
                                    @php 
                                       $price = str_replace(',','',$details['price']);
                                    @endphp
                                    
                                 @else
                                    @php $price = $details['price']; @endphp
                                 @endif
                                 
                                 @php 
                                    $price = intval($price);
                                    $total += $price * $details['quantity'];
                                 @endphp
                                 
                              @endforeach
                              <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                 <p class="fw-600">Total: <span class="text-primary"><?php echo "USD ".number_format($total) ?></span></p>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                 <a href="{{url('shopping-basket')}}" class="btn btn-warning btn-sm" rel="noopener noreferrer"  aria-label="View"View>View</a>
                              </div>
                           </div>
                        </div>
                     @endif
                     </li>
                  </div>
                  </ul>
                </div>
            </div>
         </nav>
      </div>
    </div>
   </div>
</div>
<div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalsLabel" aria-hidden="true">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalsLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{url('search/search-result')}}" method="get" class="search" id="mainsearch">
                     @csrf

                     <div id="errors-list"></div>

                     <div class="col-md-12 mb-3">
                        <p class="mb-0">Search</p>
                        <input type="text" name="search_form"  id="navsearch"  class="form-control"placeholder="Search market reports "  required autofocus id="search_1234">
                         
                           <input type="hidden" name="ac" class="autocomplete" disabled="" value="">   
                                   

                     <div class="col-md-12 mt-2">
                        <button type="submit" name="login_btn" class="ab-button ab-button-primary ab-button-small">Search</button>
                     </div>
                     <div id="search_result_data2" class="search_result_data2" style="display:none"></div>
                  </form>
                </div>
               
            </div>
        </div>
    </div>
     
   </section>
   
@yield('content')

@extends('layout/footer')