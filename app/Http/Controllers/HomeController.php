<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use DB;
use App\Models\Testimonial;
use App\Models\Press;
use App\Models\Infographic;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\Contact;
use App\Models\Applicant;
use App\Mail\ContactMail;
use App\Mail\RequestMail;
use App\Mail\CareerMail;
use App\Mail\ExportMail;
use App\Mail\SearchMail;
use Mail;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Country;
use App\Models\Report;
use App\Models\client;
use App\Models\Sample_Request;
use App\Models\Service;
use Validator;
use Str;
use App\Models\Query_Management;
use App\Rules\ReCaptcha;
use App\Models\Region;
use App\Models\Servicesquery;

use \Cache;

class HomeController extends Controller
{    

    public function home(){
      
        $data_banner =Banner::orderBy('id','DESC')->select('banner_image', 'banner_title', 'banner_desc', 'redirect_url', 'banner_mobile_image')->limit(1)->get();  
        $testimonials = Testimonial::orderBy('id','DESC')->limit(4)->get();
        $report_data = Report::orderBy('report_post_date','DESC')
                       ->limit(6)
                        ->where('active_inactive','=','1')
                        ->get();
        $press_release = Press::orderBy('id','DESC')->limit(4)->get();
        // $blogs = Blog::orderBy('id','DESC')->limit(3)->get();
        $services = Service::orderBy('id','DESC')->limit(4)->get();
         $clients =  DB::table('our_client')->orderBy('id', 'DESC')->limit(15)->get();
         
        return view('home',compact('testimonials','report_data','press_release','services', 'data_banner','clients'));
    } 

    public function upcoming_report(){
        $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('upcomingstatus','=','1')->paginate(10);
                     
        /* wrong pagination redirect to 404 page */
        $no_of_page = 0;
        
        $url = request()->fullUrl();
        if (Str::contains($url, '?')) {
            
            if( request()->has('page') && request()->query('page') != ""){
                $no_of_page = request()->query('page');
            }
            else{
                $no_of_page = 999999;
            }
        }
        
        if($no_of_page > $datas->lastPage() ){
            abort(404, 'Page not found');
        }
        
        return view('upcoming_report',compact('datas'));
    }

    public function upcoming_report_details($page_url){
      $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('upcomingstatus','=','1')
                     ->where('reports.page_url',$page_url)
                     ->first();
      
      $related_reports = Report::select('reports.title','reports.page_url','reports.id','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->orderBy('id','DESC')
                     ->where('cat_id',$datas->cat_id)
                     ->limit(4)
                     ->get();

      return view('upcoming_report_details',compact('datas','related_reports'));
    }
      public function on_going_report(){
        $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('upcomingstatus','=','0')->paginate(10);
                     
        /* wrong pagination redirect to 404 page */
        $no_of_page = 0;
        
        $url = request()->fullUrl();
        if (Str::contains($url, '?')) {
            
            if( request()->has('page') && request()->query('page') != ""){
                $no_of_page = request()->query('page');
            }
            else{
                $no_of_page = 999999;
            }
        }
        
        if($no_of_page > $datas->lastPage() ){
            abort(404, 'Page not found');
        }
        
        return view('ongoing-reports',compact('datas'));
    }

    public function save_request_toc(Request $req){

      /*$rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }*/
      $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
      $request = new Sample_Request;

      $request->full_name = $req->full_name;
      $request->company_name  = $req->company_name;
      $request->busniess_email = $req->busniess_email;
      $request->contact_number = $req->contact_number;
      $request->message = $req->message;
      $request->report_type_request = "Request Sample";
      $request->report_title = $req->request_title;

      $res = $request->save();
      if($res){

        /* Send mail */
       
        $mailData = [
          'title' => 'Request Sample-'.$req->request_title ,
          'body' => "true",
          'body_type' => 'request_user',
          'name'    => $req->full_name
        ];

        $mailData2 = [
          'title' => 'Request Sample-'.$req->request_title ,
          'body' => [
                    "Name" => $req->full_name,
                    "Company Name" => $req->company_name,
                    "Business Email" => $req->busniess_email,
                    "Contact_No" => $req->contact_number,
                    "Country_Name"  => $req->country_name,
                    "Message" => $req->message,
                    ],
          'body_type' => 'request'
        ];

        Mail::to($req->busniess_email)->send(new RequestMail($mailData));
        Mail::to("inbound@thereportcubes.com")->send(new RequestMail($mailData2));

        return redirect()->to('/thankyou');
      }
  }
    

    public function read_more(){
      return view('read_more');
    }

    public function infographics(){
        $infographic = Infographic::orderBy('created_at','desc')->paginate(12);
      
        /* wrong pagination redirect to 404 page */
        $no_of_page = 0;
        
        $url = request()->fullUrl();
        if (Str::contains($url, '?')) {
            
            if( request()->has('page') && request()->query('page') != ""){
                $no_of_page = request()->query('page');
            }
            else{
                $no_of_page = 9999;
            }
        }
        
        if($no_of_page > $infographic->lastPage() ){
           abort(404, 'Page not found');
        }
        
        return view('infographics',compact('infographic'));
    }
    
    public function infographics_details($slug){
      if( $slug === "infographics.xml"){
        $infographics = Infographic::orderBy('id','DESC')->get();
        return response()->view("xml.infographics",compact('infographics'))->header('Content-Type', 'text/xml');  
      }
      else{
        $infographic = Infographic::where('slug',$slug)->first();
        if(is_null($infographic)){
            abort(404);
        }
        $report = Report::where('page_url',$slug)->first();
        return view('infographics_details',compact('infographic','report'));
      }      
    }

    
    public function press_release(){
    $press = Press::orderBy('id','DESC')->paginate(10);
    
    // Wrong pagination redirect to 404 page
    $no_of_page = 0;
    
    $url = request()->fullUrl();
    if (Str::contains($url, '?')) {
        if( request()->has('page') && request()->query('page') != ""){
            $no_of_page = request()->query('page');
        }
        else{
            $no_of_page = 9999;
        }
    }
    
    if($no_of_page > $press->lastPage() ){
        abort(404, 'Page not found');
    }
    
    // Fetching report_url
    $report_url = '';
    $button_ref='';
    if (!empty($press) && $press->isNotEmpty()) {
        $button_ref = $press->first()->button_refrence;
        $but_ref = explode('/',$button_ref);
        $report_url = $but_ref['4'];
    }
    
    return view('press_release', compact('press', 'report_url','button_ref'));
}

    public function press_release_details($press_release_url){
      if( $press_release_url === "press-release.xml"){
          $items = Press::orderBy('id','DESC')->get();
          return response()->view("xml.press-release",compact('items'))->header('Content-Type', 'text/xml');  
      }
      else{
        $report = $button_ref=$infographic=$report_url = $infographic_image = "";
        $press = Press::where('press_release_url',$press_release_url)->first();
        if(!is_null($press)){
            $button_ref = $press->button_refrence;
           $but_ref = explode('/',$button_ref);
           $report_url = $but_ref['4'];
           $report = Report::where('page_url',$but_ref['4'])->first();  
           
        }else {
                    abort(404);

        }
        
        if($report_url != ""){
            $infographic = Infographic::where('report_link',$report_url)->first();
        }
        if(!empty($infographic)){
          $infographic_image = $infographic->image;
        }
  
        return view('press_release_details',compact('press','report','button_ref','report_url','infographic_image','infographic')); 
      }
      
    }

    public function research_report_main(){
        
       
        $category = Category::orderBy('cat_name','ASC')->get();
        $sub_category = Sub_Category::get();
        $region = Region::orderBy('region_name','ASC')->get();
        $data = Report::select('reports.*','category.cat_name')
                        ->where('upcomingstatus','0')
                        ->where('active_inactive','1')
                        ->join('category','category.id','=','reports.cat_id')
                        ->orderBy('report_post_date','DESC')
                        ->paginate(10);
                        
        /* wrong pagination redirect to 404 page */
        $no_of_page = 0;
        
        $url = request()->fullUrl();
        if (Str::contains($url, '?')) {
            
            if( request()->has('page') && request()->query('page') != ""){
                $no_of_page = request()->query('page');
            }
            else{
                $no_of_page = 9999;
            }
        }
        
        if($no_of_page > $data->lastPage() ){
           abort(404, 'Page not found');
        }
        
        return view('research_report_main',compact('category','sub_category','data','region'));
      
    }

    public function research_report(){
     
      return view('categoryresearch_report');
    }


    public function research_report_details($page_url){

      
      $report_slug_check = Report::where('page_url',$page_url)->count();
      $report_slug_category_check = Category::where('category_url',$page_url)->count();
      $report_slug_subcategory_check = Sub_Category::where('page_url',$page_url)->count();
       $report_slug_region_check = Region::where('page_url',$page_url)->count();
        $report_slug_country_check = Country::where('page_url',$page_url)->count();
       $sub_category = Sub_Category::select('*')->where('page_url',$page_url)->first();
      $infographic_image = "";
$sub_category_h2 = $sub_category->h2??'';
      if($report_slug_check > 0) {
        
        $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('reports.page_url',$page_url)
                     ->first();
                     if(is_null($datas)){
                         abort(404, 'Page not found');
                     }
        if($datas->infographic >0){
          $infographic_image = Infographic::select('image','img_alt_tag')->where('id',$datas->infographic)->first();
        }

        $new_catid = $datas->cat_id; 
        
        $related_reports = Report::select('reports.title','reports.no_of_page','reports.single_licence_price','reports.page_url','reports.id','category.cat_name')
                                ->leftJoin('category','category.id','=','reports.cat_id')
                                ->orderBy('id','DESC')
                                ->where('cat_id',$new_catid)
                                ->limit(4)
                                ->get();
       // echo $datas->upcomingstatus; die;

        if($datas->upcomingstatus == '1' ){         
          return view('research_report_details',compact('datas','related_reports', 'sub_category_h2'));
        }
        else{ 
               
          return view('research_report_details',compact('datas','related_reports','infographic_image', 'sub_category_h2'));
        }
        
      }
      else if($report_slug_category_check > 0){          

          $category = Category::select('*')->where('category_url',$page_url)->first();
          $sub_category = Sub_Category::select('*')->where('cat_id',$category->id)->get();
    
          $sidebar_category = Category::orderBy('cat_name','ASC')->get();
          $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name','ASC')->get();
           $region= Region::orderBy('region_name','ASC')->get();
          $data = Report::where('cat_id',$category->id)->where('upcomingstatus','0')->orderBy('id','DESC')->paginate(10);
    
          return view('categoryresearch_report',compact('category','sub_category','data','sidebar_category','sidebar_sub_category','region'));
                                
          //return view('research_report',compact('datas','related_reports','category'));
      }

      else if($report_slug_subcategory_check > 0){          

        $sub_category = Sub_Category::select('*')->where('page_url', $page_url)->get();
    

         $subcat_id = $sub_category[0]->id;
        $category_id = $sub_category[0]->cat_id;
        $subcat_name = $sub_category[0]->sub_cat_name;
$sub_category_h2 = $sub_category[0]->h2;
        $category = Category::orderBy('cat_name', 'ASC')->where('id', $category_id)->first();
        $sidebar_category = Category::orderBy('cat_name', 'ASC')->get();
        $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name', 'ASC')->get();

    $data = Report::where('sub_cat_id', $subcat_id)->orderBy('id', 'DESC')->paginate(10);
$region = Region::orderBy('region_name', 'ASC')->get();
return view('subresearch_report', compact('category', 'sub_category', 'data', 'sidebar_category', 'sidebar_sub_category', 'region', 'subcat_id','subcat_name', 'sub_category_h2'));
       
      }
       else if($report_slug_region_check > 0){          
         $sub_category = Region::select('*')->where('page_url',$page_url)->get();
    $subcat_id = $sub_category[0]->id;
    $catgeory_id = $sub_category[0]->region_id;
   
    $rigion1 = Region::where('page_url',$page_url)->first(); 
    
    $sidebar_category = Category::orderBy('cat_name','ASC')->get();
    $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name','ASC')->get();
    $region= Region::orderBy('region_name','ASC')->get();
    
    $data = Report::where('region_id',$subcat_id)->orderBy('id','DESC')->paginate(10);

    return view('regionreport',compact('rigion1','sub_category','data','sidebar_category','sidebar_sub_category','region'));
       
      }else if($report_slug_country_check > 0){          

        $sub_category = Country::select('*')->where('page_url', $page_url)->get();
    

        $subcat_id = $sub_category[0]->id;
        $category_id = $sub_category[0]->region_id;
        $subcat_name = $sub_category[0]->country_name;
        $subcat_name_h2 = $sub_category[0]->H2_tag;
        $category = Region::orderBy('region_name', 'ASC')->where('id', $category_id)->first();
        $sidebar_category = Category::orderBy('cat_name', 'ASC')->get();
        $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name', 'ASC')->get();

    $data = Report::where('country_id', $subcat_id)->orderBy('id', 'DESC')->paginate(10);
$region = Region::orderBy('region_name', 'ASC')->get();
return view('country_report', compact('category', 'sub_category', 'data', 'sidebar_category', 'sidebar_sub_category', 'region', 'subcat_id','subcat_name', 'subcat_name_h2'));
       
      }
      elseif(strpos($page_url,'.xml')){
        
        $newCategoryArr = explode('.',$page_url);
        $category = Category::select('*')->where('category_url',$newCategoryArr[0])->first();
        $data = Report::where('cat_id',$category->id)->where('upcomingstatus','0')->orderBy('id','DESC')->get();

        return response()->view("xml.research_library",compact('data'))->header('Content-Type', 'text/xml'); 
      }
      else{
          abort(404, 'Page not found');
      }
      /*
      elseif(               
                $page_url == "chemicals.xml" || 
                $page_url == "buildings-construction-metals-mining.xml" || 
                $page_url == "automotive.xml" || 
                $page_url == "aerospace-defense.xml" || 
                $page_url == "energy.xml" ||
                $page_url == "environment.xml" ||
                $page_url == "fmcg.xml" ||
                $page_url == "fintech.xml" ||
                $page_url == "food-beverages.xml" ||
                $page_url == "healthcare.xml" ||
                $page_url == "ict-electronics.xml" ||
                $page_url == "tires.xml"    
      ){
          $newCategoryArr = explode('.',$page_url);
          $category = Category::select('*')->where('category_url',$newCategoryArr[0])->first();
          $data = Report::where('cat_id',$category->id)->where('upcomingstatus','0')->orderBy('id','DESC')->get();

          return response()->view("xml.research_library",compact('data'))->header('Content-Type', 'text/xml'); 
      }*/
      
    }

    public function export_import(){
      return view('export_import');
    }

    public function terms_conditions(){
      return view('terms_conditions');
    }
    public function refund(){
      return view('refund');
    }
    public function privacy_policy(){
      return view('privacy_policy');
    }
    public function about(){
      return view('about');
    }

    public function contact(){
      $industry = Category::orderBy('id','desc')->get();
      return view('contact_us',compact('industry'));
    }

   public function save_contact(Request $req)
    {
        $validator = $req->validate([
           // 'g-recaptcha-response' => ['required', new ReCaptcha],
           'name'=>'required|',
           'comp_name'=>'required|',
           'country_name'=>'required|',
           'phone'=>'required|',
           'message'=>'required|',
            'business_email' => 'required|email|max:255',
            'privacy_policy'=>'required|',
          
        ]);

   

        $contact = new Contact; 

        $contact->name = $req->name;
        $contact->company_name = $req->comp_name;
        $contact->busniess_email = $req->business_email;
        $contact->contact_number = $req->phone;
        $contact->country = $req->country_name; 
        $contact->message = $req->message;

        if ($contact->save()) {

            /* Send mail */
            $mailData = [
                'title' => 'Thanks For Contacting Us!',
                'body' => "true",
                'body_type' => 'user',
                'name' => $req->name
            ];

            $mailData2 = [
                'title' => '',
                'body' => [
                    "Name" => $req->name,
                    "Company Name" => $req->comp_name,
                    "Business Email" => $req->business_email,
                    "Country Name" => $req->country_name,
                    "Contact No." => $req->phone,
                    "Message" => $req->message,
                ],
                'body_type' => 'client'
            ];

            Mail::to($req->business_email)->send(new ContactMail($mailData));
            Mail::to("inbound@thereportcubes.com")->send(new ContactMail($mailData2));

            return redirect()->to('/thankyou');
        }

        return back()->with('error', 'Failed to save contact information. Please try again.');
    }


    public function blogs(){
        
        $blog = Blog::orderBy('id','desc')->paginate(9);
        
        /* wrong pagination redirect to 404 page */
        $no_of_page = 0;
        
        $url = request()->fullUrl();
        if (Str::contains($url, '?')) {
            
            if( request()->has('page') && request()->query('page') != ""){
                $no_of_page = request()->query('page');
            }
            else{
                $no_of_page = 999999;
            }
        }
        
        if($no_of_page > $blog->lastPage() ){
            abort(404, 'Page not found');
        }
        
        
        return view('blogs',compact('blog'));
    }

    public function blog_details($slug){

      //$blog = Blog::where('slug',$slug)->first();
      //return view('blog_details',compact('blog'));

      if( $slug === "blogs.xml"){
        $blog = Blog::orderBy('id','DESC')->get();
        return response()->view("xml.blogs",compact('blog'))->header('Content-Type', 'text/xml');  
      }
      else{
        $blog = Blog::where('slug',$slug)->first();
         if(is_null($blog)){ 
            abort(404, 'Page not found');
        } else {
            return view('blog_details',compact('blog'));
        }
      }

    }
    public function career(){

      return view('career');
    }

    public function services(){
        $services = Service::get();
        $industry = Category::orderBy('id','desc')->get();
        return view('services',compact('services','industry'));
    }

    public function save_career(Request $req){

      /*$rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }*/
      $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);

      $info = new Applicant;         
    
      $info->name               = $req->name;
      $info->email               = $req->email;
      $info->phone               = $req->phone;
      $info->position_apply_for  = $req->position_apply_for;
      $info->Experiance            = $req->experiance;
      $info->Location              = $req->location;
      $info->ctc                 = $req->ctc;
      $info->notice_period       = $req->notice_period;
      $info->message             = $req->message;     

      $res = $info->save();
      if($res){

        /* Send mail */
       
        $mailData = [
          'title' => 'Thanks For Your Interest !',
          'body' => "true",
          'body_type' => 'user',
          'name'    => $req->name
        ];

        $mailData2 = [
          'title' => 'Job Application',
          'body' => [
                      "Name" => $req->name,
                      "Email" => $req->email,
                      "Phone" => $req->phone,
                      "Position" => $req->position_apply_for,
                      "Experience" => $req->Experiance,
                      "Location" => $req->Location,
                      "CTC" => $req->ctc,
                      "Notice" => $req->notice_period,
                      "Message" => $req->message,
                    ],
          'body_type' => 'client'
        ];

        Mail::to($req->email)->send(new CareerMail($mailData));
        Mail::to("hr@marknteladvisors.com")->send(new CareerMail($mailData2));

        return redirect()->to('/thankyou');
      }
  }


    public function request_research(Request $req){
        $info = new Sample_Request;
      
        $info->report_type_request = $req->report_type_request;
        $info->full_name       = $req->full_name;
        $info->company_name    = $req->company_name;
        $info->busniess_email  = $req->busniess_email;
        $info->contact_number  = $req->contact_number;
        $info->message         = $req->message;
        $info->report_title    = "";
                
        $info->save();
        
        return redirect()->back()->with('success', 'Information saved successfully');
    }

    // public function save_export_import(Request $req){
    //   $info = new Sample_Request;
    
    //   $info->report_type_request = $req->report_type_request;
    //   $info->full_name       = $req->full_name;
    //   $info->company_name    = $req->company_name;
    //   $info->busniess_email  = $req->busniess_email;
    //   $info->contact_number  = $req->contact_number;
    //   $info->message         = $req->message;
    //   $info->data_type       = $req->data_type;
    //   $info->start_date      = $req->from_date;
    //   $info->end_date        = $req->end_date;
    //   $info->country         = $req->country;
    //   $info->hs_code         = $req->hs_code;
    //   $info->report_title    = "export-import";
                   
    //   $info->save();
      
    //   return redirect()->back()->with('success', 'Information saved successfully');
    // }

    public function save_export_import(Request $req){

     /* $rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }*/
      $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
      $info = new Sample_Request;
    
      $info->report_type_request = 'Sample Request Tire';
      $info->full_name       = $req->full_name;
      $info->company_name    = $req->company_name;
      $info->busniess_email  = $req->busniess_email;
      $info->contact_number  = $req->contact_number;
      $info->message         = $req->message;
      $info->data_type       = $req->data_type;
      $info->start_date      = $req->from_date;
      $info->end_date        = $req->end_date;
      $info->country         = $req->country;
      $info->hs_code         = $req->hs_code;
      $info->report_title    = "Exim Sample Request";

      $res = $info->save();
      if($res){

        /* Send mail */
       
        $mailData = [
          'title' => 'EXIM Request Sample-Exim Sample Request',
          'body' => "true",
          'body_type' => 'user',
          'full_name' => $req->full_name
        ];

        $mailData2 = [
          'title' => 'EXIM Request Sample-Exim Sample Request',
          'body' => [
                      "Name" => $req->full_name,
                      "Company Name" => $req->company_name,
                      "Business Email" => $req->busniess_email,
                      "Contact_No" => $req->contact_number,
                      "Message" => $req->message,
                      "Data_Type" => $req->data_type,
                      "Start_Date" => $req->from_date,
                      "End_Date" => $req->end_date,
                      "Country_Name" => $req->country_name,
                      "Selected_Country"  => $req->country,
                      "HS_Code" => $req->hs_code,
                      "Report_Title" => "export-import"
                    ],
          'body_type' => 'client'
        ];

        Mail::to($req->busniess_email)->send(new ExportMail($mailData));
        Mail::to("inbound@thereportcubes.com")->send(new ExportMail($mailData2));

        return redirect()->to('/thankyou');
      }
  }

    public function research_library_categorywise($category_url){
      $category = Category::select('*')->where('category_url',$category_url)->first();
      $sub_category = Sub_Category::select('*')->where('cat_id',$category->id)->get();

      $sidebar_category = Category::orderBy('cat_name','ASC')->get();
      $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name','ASC')->get();
      $region= Region::orderBy('region_name','ASC')->get();
      $data = Report::where('cat_id',$category->id)->where('upcomingstatus','0')->orderBy('id','DESC')->paginate(10);

      return view('categoryresearch_report',compact('category','sub_category','data','sidebar_category','sidebar_sub_category','region'));
    }

    public function research_library_subcategorywise($subcat_slug){

        $sub_category = Sub_Category::select('*')->where('page_url',$subcat_slug)->get();

        $subcat_id = $sub_category[0]->id;
        $catgeory_id = $sub_category[0]->cat_id;
       
        $category = Sub_Category::where('page_url',$subcat_slug)->first(); 
        $region= Region::orderBy('region_name','ASC')->get();
        $sidebar_category = Category::orderBy('cat_name','ASC')->get();
        $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name','ASC')->get();
        
        $data = Report::where('sub_cat_id',$subcat_id)->orderBy('id','DESC')->paginate(10);

        return view('subresearch_report',compact('category','sub_category','data','sidebar_category','sidebar_sub_category','region'));
    }

    public function register(Request $request)
    {      
        $user = new User; 
        $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $user->name = $request->fname;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->phone =$request->mob;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->user_role = '11';
        $user->created_by = '11';
        $user->created_date_time = date("Y-m-d H:i:s");
        $user->save();

        echo "User Registration Successfully.";
        
    }

    public function login(Request $req)
    {

      $req->validate([
        'email' =>'required',
        'password' =>'required',
        'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);

      if (Auth::attempt($req->only(["email", "password"]))) {
        return response()->json([
            "status" => true, 
            "redirect" => url("shopping-basket")
        ]);
      } else {
        return response()->json([
            "status" => false,
            "errors" => ["Invalid credentials"]
        ]);
      }

    }

    public function search_result($slug){
      $datas = [];      

      $resultA = Report::select('reports.*','category.cat_name')
                          ->where('page_url', $slug)
                          ->leftJoin('category','category.id','=','reports.cat_id')
                          ->first();

      $resultB = Press::select('press_release.*','category.cat_name')
                          ->where('press_release_url', $slug)
                          ->leftJoin('category','category.id','=','press_release.cat_id')
                          ->first();

      if($resultA != ''){        
        $datas = $resultA;

        $related_reports = Report::select('reports.title','reports.page_url','reports.id','category.cat_name')
                                ->leftJoin('category','category.id','=','reports.cat_id')
                                ->orderBy('id','DESC')
                                ->where('cat_id',$datas->cat_id)
                                ->where('upcomingstatus','0')                     
                                ->limit(4)
                                ->get();

        return view('research_report_details',compact('datas','related_reports'));
      }
      if($resultB != ''){
        $press = $resultB;

        //$related_reports = Report::select('reports.title','reports.page_url','reports.id','category.cat_name')->leftJoin('category','category.id','=','reports.cat_id')->orderBy('id','DESC')->where('cat_id',$datas->cat_id)->limit(4)->get();

        return view('press_release_details',compact('press'));
      }
      
    }

    public function request_sample($page_url){

      $res = Report::where('reports.page_url',$page_url)->count();

      if($res > 0){
        $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('reports.page_url',$page_url)
                     ->where('upcomingstatus',0)
                     ->get();
        if(count($datas) <= 0){
           abort(404, 'Page not found');
        }
        else{
             $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('reports.page_url',$page_url)
                     ->where('upcomingstatus',0)
                     ->first();
            $related_reports = Report::select('reports.title','reports.page_url','reports.id','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->orderBy('id','DESC')
                     ->where('cat_id',$datas->cat_id)
                     ->limit(4)
                     ->get();
        }
        
      }
      else{
        
        $datas = Press::select('press_release.heading as title, press_release.id')
                     ->where('press_release.press_release_url',$page_url)
                     ->first();

        $related_reports = Press::select('press_release.heading as title','press_release.press_release_url','press_release.id','category.cat_name')
                     ->leftJoin('category','category.id','=','press_release.cat_id')
                     ->orderBy('id','DESC')
                     ->where('cat_id',$datas->cat_id)
                     ->limit(4)
                     ->get();
      }
     
      ///print_r($datas); die;
      return view('request_sample',compact('datas','related_reports'));

    }
    
    public function page_not_found(){
       abort(404, 'Page not found');
    }
    public function save_request_infographic(Request $req){

      /*$rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];*/
      $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
      /*$validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }
        */
        $request = new Query_Management;         
  
        $request->type = '1';
        $request->subject = 'Infographics for ' . $req->request_title;
        $request->name = $req->full_name;
        $request->company_name  = $req->company_name;
        $request->degingnation = "";
        $request->busniess_email = $req->busniess_email;
        $request->contact_number = $req->contact_number;
        $request->country = $req->country_name;
        $request->message = $req->message;
        
        $res = $request->save();
        if($res){
          
          $mailData = [
            'title' => 'Infographics for ' . $req->request_title ,
            'body' => "true",
            'body_type' => 'request_user',
            'name' => $req->full_name
          ];
    
          $mailData2 = [
            'title' => 'Infographics for ' . $req->request_title ,
            'body' => [
                        "Name" => $req->full_name,
                        "Company Name" => $req->company_name,
                        "Business Email" => $req->busniess_email,
                        "Contact_No" => $req->contact_number,
                        "Country_Name"  => $req->country_name,
                        "Message" => $req->message
                      ],
            'body_type' => 'request'
          ];
    
          Mail::to($req->busniess_email)->send(new RequestMail($mailData));
          Mail::to("inbound@thereportcubes.com")->send(new RequestMail($mailData2));
    
          return redirect()->to('/thankyou');
        }
      
    }

    public function save_request_blog(Request $req){

      /*$rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }*/
      $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
        
        $request = new Query_Management;         
  
        $request->type = '3';
        $request->subject = 'Blog for ' . $req->request_title;
        $request->name = $req->full_name;
        $request->company_name  = $req->company_name;
        $request->degingnation = "";
        $request->busniess_email = $req->busniess_email;
        $request->contact_number = $req->contact_number;
        $request->country = $req->country_name;
        $request->message = $req->message;
        
        $res = $request->save();
        if($res){
            
          $mailData = [
            'title' => 'Blog for ' . $req->request_title ,
            'body' => "true",
            'body_type' => 'request_user',
            'name' => $req->full_name
          ];
    
          $mailData2 = [
            'title' => 'Blog Request ',
            'body' => [
                        "Name" => $req->full_name,
                        "Company Name" => $req->company_name,
                        "Business Email" => $req->busniess_email,
                        "Contact_No" => $req->contact_number,
                        "Country_Name"  => $req->country_name,
                        "Message" => $req->message
                      ],
            'body_type' => 'request'
          ];
    
          Mail::to($req->busniess_email)->send(new RequestMail($mailData));
          Mail::to("inbound@thereportcubes.com")->send(new RequestMail($mailData2));
    
          return redirect()->to('/thankyou');
      
        }
    }

    public function save_request_sample(Request $req){

     /* $rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }
*/
        /*$req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);*/
      $request = new Sample_Request;         
  
      $request->full_name = $req->full_name;
      $request->company_name  = $req->company_name;
      $request->busniess_email = $req->busniess_email;
      $request->contact_number = $req->phone;
      $request->message = $req->message;
      $request->country = $req->country_name;
      $request->report_title = $req->request_title;
      $request->report_type_request = "Request-Sample";
        $request->email_from  = " sales@thereportcubes.com";
        $request->email_to  = $req->busniess_email;

      $res = $request->save();
      if($res){

        /* Send mail */
       
        $mailData = [
          'title' => 'Request Sample-' .$req->request_title ,
          'body' => "true",
          'body_type' => 'request_user',
          'name' => $req->full_name
        ];

        $mailData2 = [
          'title' => 'Request Sample-' .$req->request_title ,
          'body' => [
                      "Name" => $req->full_name,
                      "Company Name" => $req->company_name,
                      "Business Email" => $req->busniess_email,
                      "Contact_No" => $req->phone,
                      "Country_Name"  => $req->country_name,
                      "Message" => $req->message,
                      "Request Type" => "request_sample_mail",
                    ],
          'body_type' => 'request'
        ];

        Mail::to($req->busniess_email)->send(new RequestMail($mailData));
        Mail::to("inbound@thereportcubes.com")->send(new RequestMail($mailData2));

        return redirect()->to('/thankyou');
      }
  }

    public function talk_to_our($page_url){
      $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('reports.page_url',$page_url)
                     ->first();

      $related_reports = Report::select('reports.title','reports.page_url','reports.id','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->orderBy('id','DESC')
                     ->where('cat_id',$datas->cat_id)
                     ->limit(4)
                     ->get();
      return view('talk_to_our',compact('datas','related_reports'));
    }

    public function save_talk_to_our(Request $req){
    /*
      $rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }*/
        $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
      $request = new Sample_Request;         
    
      $request->full_name = $req->full_name;
      $request->company_name  = $req->company_name;
      $request->busniess_email = $req->busniess_email;
      $request->contact_number = $req->phone;
      $request->message = $req->message;
      $request->country = $req->country_name;
      $request->report_title = $req->request_title;
      $request->report_type_request = "Talk to Our Consultant";

      $res = $request->save();
      if($res){

        /* Send mail */
       
        $mailData = [
          'title' => 'Talk to Our Consultant-' .$req->request_title ,
          'body' => "true",
          'body_type' => 'request_user',
          'name' => $req->full_name
        ];

        $mailData2 = [
          'title' => 'Talk to Our Consultant-' .$req->request_title ,
          'body' => [
                      "Name" => $req->full_name,
                      "Company Name" => $req->company_name,
                      "Business Email" => $req->busniess_email,
                      "Contact_No" => $req->phone,
                      "Country_Name"  => $req->country_name,
                      "Message" => $req->message,
                      "Request Type" => "talk-to-our-consultant",
                    ],
          'body_type' => 'request'
        ];

        Mail::to($req->busniess_email)->send(new RequestMail($mailData));
        Mail::to("inbound@thereportcubes.com")->send(new RequestMail($mailData2));

        return redirect()->to('/thankyou');
      }
  }


    public function request_customization($page_url){
      $datas = Report::select('reports.*','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->where('reports.page_url',$page_url)
                     ->first();

      $related_reports = Report::select('reports.title','reports.page_url','reports.id','category.cat_name')
                     ->leftJoin('category','category.id','=','reports.cat_id')
                     ->orderBy('id','DESC')
                     ->where('cat_id',$datas->cat_id)
                     ->limit(4)
                     ->get();
      return view('request_customization',compact('datas','related_reports'));
    }

    public function save_request_customization(Request $req){
      /*$rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }*/
      $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
      $request = new Sample_Request;         
    
      $request->full_name = $req->full_name;
      $request->company_name  = $req->company_name;
      $request->busniess_email = $req->busniess_email;
      $request->contact_number = $req->phone;
      $request->message = $req->message;
      $request->country = $req->country_name;
      $request->report_title = $req->request_title;
      $request->report_type_request = "Request Customization";

      $res = $request->save();
      if($res){

        /* Send mail */
       
        $mailData = [
          'title' => 'Request Customization-' .$req->request_title ,
          'body' => "true",
          'body_type' => 'request_user',
          'name' => $req->full_name
        ];

        $mailData2 = [
          'title' => 'Request Customization-' .$req->request_title ,
          'body' => [
                      "Name" => $req->full_name,
                      "Company Name" => $req->company_name,
                      "Business Email" => $req->busniess_email,
                      "Contact_No" => $req->phone,
                      "Country_Name"  => $req->country_name,
                      "Message" => $req->message,
                      "Request Type" => "request-customization",
                    ],
          'body_type' => 'request'
        ];

        Mail::to($req->busniess_email)->send(new RequestMail($mailData));
        Mail::to("inbound@thereportcubes.com")->send(new RequestMail($mailData2));

        return redirect()->to('/thankyou');
      }
  } 

    public function request_toc($page_url){
      $datas = Report::select('reports.*','category.cat_name')
              ->leftJoin('category','category.id','=','reports.cat_id')
              ->where('reports.page_url',$page_url)
              ->where('upcomingstatus',1)
              ->first();
            if(is_null($datas)){
            abort(404, 'Page not found');
        }
      $related_reports = Report::select('reports.title','reports.page_url','reports.id','category.cat_name')
              ->leftJoin('category','category.id','=','reports.cat_id')
              ->orderBy('id','DESC')
              ->where('cat_id',$datas->cat_id)
              ->limit(4)
              ->get();

      return view('request_toc',compact('datas','related_reports'));
    }

    public function report_all_amounts(Request $request){
      $report_id = $request->rid;
      $result = Report::select('single_licence_price','multi_user_price','excel_data_pack','custom_report_price')
                          ->where('id', $report_id)
                          ->first();
      echo $result; 
    }

    // public function save_service_query(Request $req){
    //     $info = new Sample_Request;
      
    //     $info->report_type_request = $req->report_type_request;
    //     $info->full_name       = $req->full_name;
    //     $info->company_name    = $req->comp_name;
    //     $info->busniess_email  = $req->buss_email;
    //     $info->contact_number  = $req->phone_no;
    //     $info->message         = $req->message;
    //     $info->country         = $req->country_code;
    //     $info->email_from       = "sales@marknteladvisors.com";
    //     $info->email_to        = $req->buss_email;
    //     $info->report_title        = $req->industry;
    //     $info->report_type_request   = $req->industry;
    //     $info->created_date_time   = date('Y-m-d H:i:s');
                
    //     $info->save();
        
    //     return "true";
    // }

    public function thankyou(Request $request){
      return view('thankyou', ['title' => (str_contains($request->url(), 'success-thankyou')) ? 'Success Thank You' : 'Thank You']);
    }

    public function save_service_query(Request $req){

     /* $rules = [
        'captcha' => 'required|captcha',
      ];
      $messages = [
          'captcha.required' => 'Please enter the captcha.',
          'captcha.captcha' => 'Captcha verification failed. Please try again.',
      ];
      $validator = Validator::make($req->all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }*/
      $req->validate([
         'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
      $info = new Sample_Request;
      
      $info->report_type_request = 'search_data_not_found';
      $info->full_name           = $req->full_name;
      $info->company_name        = $req->comp_name;
      $info->busniess_email      = $req->buss_email;
      $info->contact_number      = $req->phone_no;
      $info->message             = $req->message;
      $info->country             = $req->country_name;
      $info->email_from          = " sales@thereportcubes.com";
      $info->email_to            = $req->buss_email;
      $info->report_title        = $req->search_keyword;
      $info->created_date_time   = date('Y-m-d H:i:s');

      $res = $info->save();
      if($res){

        /* Send mail */
       
        $mailData = [
          'title' => 'Enquiry Search Keyword: '.$req->search_keyword,
          'body' => "true",
          'body_type' => 'user',
          'name'    => $req->full_name
        ];

        $mailData2 = [
          'title' => 'Enquiry Search Keyword: '.$req->search_keyword,
          'body' => [
                      "Name" => $req->full_name,
                      "Company Name" => $req->company_name,
                      "Business Email" => $req->buss_email,
                      "Contact_No" => $req->phone,
                      "Message" => $req->message,
                      "Country_Name"  => $req->country_name,
                    ],
          'body_type' => 'client'
        ];

        Mail::to($req->buss_email)->send(new SearchMail($mailData));
        Mail::to("inbound@thereportcubes.com")->send(new SearchMail($mailData2));

        return redirect()->to('/thankyou');
      }
  }
    public function signin(Request $request){
        if($request->getRequestUri() =='/signup'){
            abort(404, 'Page not found');
        }

    return view('signin');
  }

  public function research_library_country($subcat_slug){

    $sub_category = Country::select('*')->where('page_url',$subcat_slug)->get();

    $subcat_id = $sub_category[0]->id;
    $catgeory_id = $sub_category[0]->region_id;
   
    $category = Country::where('page_url',$subcat_slug)->first(); 
    
    $sidebar_category = Category::orderBy('cat_name','ASC')->get();
    $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name','ASC')->get();
    $region= Region::orderBy('region_name','ASC')->get();
    
    $data = Report::where('country_id',$subcat_id)->orderBy('id','DESC')->paginate(10);

    return view('country_report',compact('category','sub_category','data','sidebar_category','sidebar_sub_category','region'));
}

 public function research_library_region($subcat_slug){

    $sub_category = Region::select('*')->where('page_url',$subcat_slug)->get();

    $subcat_id = $sub_category[0]->id;
    $catgeory_id = $sub_category[0]->region_id;
   
    $rigion1 = Region::where('page_url',$subcat_slug)->first(); 
    
    $sidebar_category = Category::orderBy('cat_name','ASC')->get();
    $sidebar_sub_category = Sub_Category::orderBy('sub_cat_name','ASC')->get();
    $region= Region::orderBy('region_name','ASC')->get();
    
    $data = Report::where('region_id',$subcat_id)->orderBy('id','DESC')->paginate(10);

    return view('regionreport',compact('rigion1','sub_category','data','sidebar_category','sidebar_sub_category','region'));
}

public function updateResults(Request $request)
{
    // Retrieve selected categories, regions, main categories, and countries from the request
    $selectedCategories = $request->input('categories', []);
    $selectedRegions = $request->input('regions', []);
    $selectedMainCategories = $request->input('maincategory', []);
    $selectedCountries = $request->input('countries', []);

    // Fetch sub-categories based on the selected main categories
    if ($selectedMainCategories) {
        $subCategoriesFromMain = \DB::table('sub_category')->whereIn('cat_id', $selectedMainCategories)->pluck('id')->toArray();
        $selectedCategories = array_merge($selectedCategories,);
    }

    // Fetch countries based on the selected regions
    if ($selectedRegions) {
        $countriesFromRegion = \DB::table('country')->whereIn('region_id', $selectedRegions)->pluck('id')->toArray();
        if($countriesFromRegion){
        $selectedCountries = array_merge($selectedCountries);
   
    }
    }

    // Perform logic to fetch updated results based on the selected categories, regions, main categories, and countries
    $query = Report::query()->orderBy('id', 'desc');

    if ($selectedCategories) {
        $query->whereIn('sub_cat_id', $selectedCategories);
    }

     if ($selectedCountries && empty($selectedRegions)) {
        $query->whereIn('country_id', $selectedCountries);
    }

   if ($selectedCountries && $selectedRegions) {
        $query->where(function ($query) use ($selectedCountries, $selectedRegions) {
            $query->whereIn('region_id', $selectedRegions)
                  ->where(function ($query) use ($selectedCountries) {
                      $query->whereIn('country_id', $selectedCountries)
                            ->orWhereNull('country_id'); // Allow reports without country_id
                  });
        });
}
    if ($selectedRegions && empty($selectedCountries)) {
        $query->whereIn('region_id', $selectedRegions);
           
    }
       if (!empty($selectedCategories) && !empty($selectedCountries)) {
    $query->where(function ($query) use ($selectedCountries, $selectedRegions) {
        $query->whereIn('country_id', $selectedCountries)
              ->orWhereIn('region_id', $selectedRegions);
    })
    ->whereIn('sub_cat_id', $selectedCategories)
     ->get();
}

  $data = $query->get();
    // Return the updated results as JSON
    $html = view('filterresult', compact('data'))->render();

    return response()->json([
        'html' => $html,
        'selectedRegions' => $selectedRegions,
        'selectedCategories' => $selectedCategories,
        'selectedMainCategories' => $selectedMainCategories,
        'selectedCountries' => $selectedCountries,
    ]);
}

  
}
