<?php
namespace App\Helpers;
use DB;
class AppHelper
{
    public function getPAgeTitle(){
        $seo_data =DB::table('seo_content')->where('page_type','home')->orderBy('id','DESC')->first(); 
        $html = '<title>'. $seo_data->seo_title.'</title>
        <meta name="description" content="'. $seo_data->seo_description.'" />
        <meta name="keywords" content="'. $seo_data->seo_key_words.'">
        <link rel="canonical" href="'.url()->current().'" />
        <meta property="og:type" content="news" />
        <meta property="og:title" content="'.$seo_data->seo_title.'" />
        <meta property="og:image" content="'.url('public/img/logo.webp').'" />
        <meta property="og:description" content="'. $seo_data->seo_description.'"/>
        <meta property="og:url" content="'.url()->current().'">
        <meta name="twitter:card" content="'.url('public/img/logo.webp').'" />
        <meta name="twitter:site" content="Report cube" />
        <meta name="twitter:title" content="'. $seo_data->seo_title.'" />
        <meta name="twitter:description" content="'. $seo_data->seo_description.'" />
        <base href="'.url()->current().'">
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "WebSite",
                "name": "Report cube",
                "url": "https://www.marknteladvisors.com/",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://www.marknteladvisors.com/search?search={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
           }
       </script>';
       echo $html;
     }

     public function getNavMenu()
     {
        $category =DB::table('category')->orderBy('cat_name','ASC')->get(); 
        $html = '<ul class="dropdown-content" aria-labelledby="navbarDropdown">';
        if(count($category) >0) {
            foreach($category as $data) {
                $html .='<li><a class="dropdown-item" href="'.url('report-store').'/'.$data->category_url.'" rel="noopener noreferrer"  aria-label="Cart Name">'.$data->cat_name.'</a></li>';
            }
        }
        $html .= '</ul>';
        echo $html;
     }

     public function getBanner()
     {
       $data_banner =\DB::table('banner')->orderBy('id','DESC')->get(); 
       $html ='';
       foreach($data_banner as $data) { 
           $html .= 
            '<div>
                <div class="banner-with-text">
                    <div class="banner-image">
                        <img src="'.url('public/uploads/banner').'/1.png" data-src="'.url('public/uploads/banner').'/'.$data->banner_image.'" class="img-fluid lazy" alt="image-carousel">
                    </div>
                    <div class="pull-up-text">
                        <div class="banner-content">
                            <h2 class="white-color">'.$data->banner_title.'<span class="bright-span"></span></h2>
                            <h3 class="banner-title mb-4">'.$data->banner_desc.'</h3>
                            <div class="read-more" data-aos="fade-up" data-aos-duration="1500">
                                <a href="'.$data->redirect_url.'" class="btn btn-primary banner-btn" tabindex="-1" rel="noopener noreferrer" target="_blank">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        } 
        echo $html;
    }

     public static function instance(){
         return new AppHelper();
     }
}