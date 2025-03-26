<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\employee;
use App\Models\User;
use App\Models\Seo_Pages;
use App\Models\Blog;
use App\Models\Report;
use App\Models\Infographic;
use App\Models\Press;
use App\Models\Sub_Category;
use App\Models\Category;
use App\Models\Service;
use App\Models\Financial;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\Aboutus;
use App\Models\Vision;
use App\Models\Client;
use App\Models\Privacy;
use App\Models\Refund;
use App\Models\Terms;
use App\Models\Contact;
use App\Models\Career;
use App\Models\Sample_Request;
use App\Models\Applicant;
use App\Models\Seo_Pages_Master;
use Response;
use Auth;
use Hash;
use PDF;
use DB;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Export\InfographicExport;
use App\Export\BlogExport;
use App\Export\SampleExport;
use App\Export\SpeakExport;
use App\Export\RequestExport;
use App\Export\CovidExport;
use App\Export\TireExport;
use App\Export\CustomizedExport;
use App\Export\SyndicateExport;
use App\Export\ConsultingExport;
use App\Export\FullExport;
use App\Export\Infographic2Export;
use App\Export\SearchExport;
use App\Export\ContactExport;
use App\Export\ApplicantExport;
use App\Export\ReportExport;
use App\Export\PressReleaseExport;
use Image;
use App\Models\Query_Management;
use App\Import\ReportImport;
#use App\Rules\ReCaptcha;
use App\Models\Region;
use App\Models\Country;
use App\Models\City;
use App\Models\Servicesquery;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image as ImageIntervention;
class AdminController extends Controller
{

    public function checkRole(){
       if( Auth::User()->role == "member"){
            return false;
        }
        else{
            return true;
        }
    }
        
    public function login_form(Request $req)
    {
    //echo Hash::make($req->password); die;
     
     $req->validate([
      'name' =>'required',
      'password' =>'required',
      
     ]);

     $credentials = $req->only('name', 'password');

      if (Auth::attempt($credentials)) {

        if(Auth::user()->role == "admin"){
            $req->session()->regenerate();
            return redirect('TRC/11/dashboard');
        }
        else if(Auth::user()->role == "member"){
            $req->session()->regenerate();
            return redirect('user/dashboard');
        }
        else{
          return redirect()->back()->with('error','Login details wrong');
        }          
      }
      else{
        return redirect()->back()->with('error','Login details wrong');
      }

   }

   public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function logout(Request $req) {
     Auth::logout();
     return redirect('/TRC/11/');
    }

    public function dash_index(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/');
      }
      else{
        return view('admin.dashboard');
      }
    }
    
     /** Market Advisor new functions */

    public function infographic(){
         if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
        return view('admin.infographic');
      }
    }

    public function save_infographic(Request $req){

        $info = new Infographic;
        
        $status = 0;
        $imageName = "";
        
        if(isset($req->active_inactive)){
          $status = 1;
        }
        
        if(isset($req->infographic_img))
          //$imageName = time().'.'.$req->infographic_img->extension();  
          $imageName = $req->infographic_img->getClientOriginalName();
          $req->infographic_img->move(public_path('uploads/infographic/'), $imageName); 
        
        if(!empty($req->img_alt_tag)){
            $img_alt_tag = $req->img_alt_tag;
        }
        else if(isset($req->title)){
              $string = $req->title;
              $string = str_replace(array('[\', \']'), '', $string);
              $string = preg_replace('/\[.*\]/U', '', $string);
              $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
              $string = htmlentities($string, ENT_COMPAT, 'utf-8');
              $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
              $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
              $img_alt_tag =  trim($string, '-');
        } 
        else{
            $img_alt_tag = "";
        }
    
        $info->title              = $req->title;
        $info->image              = 'uploads/infographic/'.$imageName;
        $info->img_alt_tag        = $img_alt_tag;
        $info->status             = $status;
        $info->report_link        = $req->report_link;
        $info->slug               = $req->slug;
        $info->created_at         = $req->infographic_post_date;
        
        $info->save();

        //Save into seo_content table
        $seo_content = new Seo_Pages;
        $info_id = $info->id;

        $seo_content->parent_id = $info_id;
        $seo_content->seo_title = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_keyword;
        $seo_content->page_type = "infographics";

        $seo_content->save();

        
        return redirect()->back()->with('success', 'Information saved successfully');
    }

    public function infographic_list(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      $list = Infographic::orderBy('created_at','DESC')->get();
      return view('admin.all-infographic',compact('list'));
      }
    }
    
    
    public function save_edit_infographic(Request $req){
      
      $info = new Infographic;
      
      $id = request()->segment(4);
      $status = 0;
         $imageName = $req->infographic_img_H;
     
      if(isset($req->active_inactive)){
        $status = 1;
      }
     
      if(isset($req->infographic_img)){
        $imageName = time().'.'.$req->infographic_img->extension();  
       $req->infographic_img->move(public_path('uploads/infographic/'), $imageName); 
      }

      $info->title              = $req->title;
      $info->image               = 'uploads/infographic/'.$imageName;

      $info->title              = $req->title;
      $info->image              = $imageName;
      $info->img_alt_tag        = $req->img_alt_tag;
      $info->status             = $status;
      $info->report_link        = $req->report_link;
      $info->slug               = $req->slug;
      $info->created_at         = $req->infographic_post_date;
      
      $info->seo_title          = $req->seo_title;
      $info->seo_description    = $req->seo_description;
      $info->seo_keyword        = $req->seo_keyword;

      $info = $info->toArray();
      
      $res = Infographic::where('id',$id)->update($info);
      return redirect()->back()->with('success', 'Details updated successfully!');
    }
    
    public function filter_infographic(Request $req){
      
      $report = [];
      $search = $req->search;
      $startDate = "";
      $endDate = "";
      
       if(!empty($req->start_date)){
          $startDate = $req->start_date;
       }
       if(!empty($req->end_date)){
          $endDate = $req->end_date;
       }
    
      $query = Infographic::query();
    
      if(!empty($startDate) && !empty($endDate) ){
          $query->whereDate('infographic.created_at','>=',$startDate)->whereDate('infographic.created_at','<=',$endDate);
          $startDate = "";
          $endDate = "";
      }
    
      if(!empty($startDate) ){
          $endDate = date('Y-m-d');
    
          $query->whereDate('infographic.created_at','>=',$startDate)->whereDate('infographic.created_at','<=',$endDate);
          $endDate = "";
      }
    
      if(!empty($endDate)){
          $startDate = date('Y-m-d');
    
          $query->whereDate('infographic.created_at','>=',$startDate)->whereDate('infographic.created_at','<=',$endDate);
          $startDate = "";
      }
      
      if(!empty($search) ){  
          $query->where('title', 'LIKE', "%{$search}%");
      }

      $list = $query->select('infographic.*')->get();
    
      return view('admin.all-infographic',compact('list'));
    }

    public function filter_report(Request $req){

      $report = [];
      $search = $req->search;
      $startDate = "";
      $endDate = "";
      
       if(!empty($req->start_date)){
          $startDate = $req->start_date;
       }
       if(!empty($req->end_date)){
          $endDate = $req->end_date;
       }
    
      $query = Report::query();
    
      if(!empty($startDate) && !empty($endDate) ){
          $query->whereDate('reports.report_post_date','>=',$startDate)->whereDate('reports.report_post_date','<=',$endDate);
          $startDate = "";
          $endDate = "";
      }
    
      if(!empty($startDate) ){
          $endDate = date('Y-m-d');
    
          $query->whereDate('reports.report_post_date','>=',$startDate)->whereDate('reports.report_post_date','<=',$endDate);
          $endDate = "";
      }
    
      if(!empty($endDate)){
          $startDate = date('Y-m-d');
    
          $query->whereDate('reports.report_post_date','>=',$startDate)->whereDate('reports.report_post_date','<=',$endDate);
          $startDate = "";
      }
      
      if(!empty($search) ){  
          $query->where('title', 'LIKE', "%{$search}%")->orWhere('report_code', 'LIKE', "%{$search}%");
      }

      $list = $query->select('reports.*')->get();
    
      return view('admin.all-reports',compact('list'));
    }

    public function filter_blog(Request $req){

      $report = [];
      $search = $req->search;
      $startDate = "";
      $endDate = "";
      
       if(!empty($req->start_date)){
          $startDate = $req->start_date;
       }
       if(!empty($req->end_date)){
          $endDate = $req->end_date;
       }
    
      $query = Blog::query();
    
      if(!empty($startDate) && !empty($endDate) ){
          $query->whereDate('blog.created_at','>=',$startDate)->whereDate('blog.created_at','<=',$endDate);
          $startDate = "";
          $endDate = "";
      }
    
      if(!empty($startDate) ){
          $endDate = date('Y-m-d');
    
          $query->whereDate('blog.created_at','>=',$startDate)->whereDate('blog.created_at','<=',$endDate);
          $endDate = "";
      }
    
      if(!empty($endDate)){
          $startDate = date('Y-m-d');
    
          $query->whereDate('blog.created_at','>=',$startDate)->whereDate('blog.created_at','<=',$endDate);
          $startDate = "";
      }
      
      if(!empty($search) ){  
          $query->where('title', 'LIKE', "%{$search}%");
      }

      $list = $query->select('blog.*')->get();
    
      return view('admin.all-blogs',compact('list'));
    }

    public function edit_infographic($id){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
        $list = Infographic::where('id',$id)->first();
        return view('admin.edit_infographic',compact('list'));
      }
    }

    

     /** BLOG */

     public function blog_form(){
         if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
        return view('admin.add_blog');
      }
    }

    public function save_blog(Request $req){

      $blog = new Blog;

      $status = 0;     
      if(isset($req->active_inactive)){
        $status = 1;
      }        
      
      $blog->title              = $req->title;
      $blog->description        = $req->descr;
      $blog->post_date          = $req->infographic_post_date;
      $blog->status             = $status;
      //$blog->blog_order         = $req->blog_order;
      $blog->slug               = $req->slug;
      $blog->seo_title          = $req->seo_title;
      $blog->seo_description    = $req->seo_description;
      $blog->seo_keyword        = $req->seo_keyword;
         
      $blog->save();
      
      return redirect()->back()->with('success', 'Blog saved successfully');
  }

  public function blog_list(){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
    $list = Blog::orderBy('id','DESC')->get();
    return view('admin.all-blogs',compact('list'));
      }
  }
  public function edit_blog($id){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
        $list = Blog::where('id',$id)->first();
        return view('admin.edit_blog',compact('list'));
      }
  }

  public function save_edit_blog(Request $req){
      
    $blog = new Blog;
    $id = request()->segment(4);

    $status = 0;     
    if(isset($req->active_inactive)){
      $status = 1;
    }        
    
    $blog->title              = $req->title;
    $blog->description        = $req->descr;
    $blog->post_date          = $req->infographic_post_date;
    $blog->status             = $status;
    //$blog->blog_order         = $req->blog_order;
    $blog->slug               = $req->slug;
    $blog->seo_title          = $req->seo_title;
    $blog->seo_description    = $req->seo_description;
    $blog->seo_keyword        = $req->seo_keyword;

    $blog = $blog->toArray();
    
    $res = Blog::where('id',$id)->update($blog);
    return redirect()->back()->with('success', 'Blog details updated successfully!');
  }

  public function delete_blog(Request $req){
      
    $delid = $req->rowId;
    $info = Blog::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
  }

    public function  delete_infographic(Request $req){
      
    $delid = $req->rowId;
    $info = Infographic::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
  }
  /* REPORT UPLOAD */

  public function report_upload_form(){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
    $category = Category::get();
        $region = Region::get();
        return view("admin.report_upload", compact("category","region"));
      }
  }
  public function save_report(Request $req){
    $report = new Report;

    $segment_img = "";
    $imageName = "";
    $active_inactive = 1; 
    $upcomingstatus = 0;
    $offer = 0;
    $page_url = "";
    $info_id = 0;
    $review_count = "";
    $review_value = "";
    
    if(isset($req->review_count)){
        $review_count = $req->review_count;
    }
    if(isset($req->review_value)){
        $review_value = $req->review_value;
    }
    
    if(isset($req->upcomingactive_inactive)){
      $upcomingstatus = 1;
    }
    
    if(isset($req->segment_img)){
      $segment_img = time().'s.'.$req->segment_img->extension();  
      //$segment_img = $req->segment_img->getClientOriginalName();
      $req->segment_img->move(public_path('uploads/report_image/segment_image/'), $segment_img); 
    } 
    
    if(isset($req->page_url) &&  $req->page_url != ''){
        $page_url = $req->page_url;
    }
    else if(isset($req->title)){
      $string = $req->title;
      $string = str_replace(array('[\', \']'), '', $string);
      $string = preg_replace('/\[.*\]/U', '', $string);
      $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
      $string = htmlentities($string, ENT_COMPAT, 'utf-8');
      $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
      $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
      $page_url =  trim($string, '-');
      $page_url = strtolower($page_url).".html" ;
    } 
    
    
    if(isset($req->infographic_img)){
        
        //$imageName = time().'r.'.$req->infographic_img->extension();  
        $imageName = $req->infographic_img->getClientOriginalName();
        $req->infographic_img->move(public_path('uploads/infographic/'), $imageName); 
      
        /*Save record into infographic table*/
      
        $info = new Infographic ;
      
        $info->title              = $req->title;
        $info->image              = 'uploads/infographic/'.$imageName;
        $info->img_alt_tag        = $req->infographic_title;
        $info->status             = '0';
        $info->infographic_order  = '1';
        $info->report_link        = $page_url;
        $info->slug               = $page_url;
        $info->created_at         = date('Y-m-d');
        $info->seo_title          = $req->seo_title;
        $info->seo_keyword        = $req->seo_key_words;
        $info->seo_description    = $req->seo_description;
        
        $info->save();
        $infographic_id = $info->id;
        
        $info_id = 1;
    } 
    else{
        $infographic_id = 0;
    }
    
    
    /** FAQS */

    $Ques = $req->faqs_ques;
    $Ans = $req->faqs_ans;

    if(!empty($Ques)){
      $Faqs = json_encode(array('ques'=>$Ques,'ans'=>$Ans));
    }else{
      $Faqs = '';
    }
    
  
      $report->cat_id                     = $req->category_id;
      $report->sub_cat_id                 = $req->subcategory_id;
      $report->region_id                   = $req->region_id;
      $report->country_id                   = $req->country_id;
      $report->title                      = $req->title;
      $report->heading2                   = $req->heading2;
      $report->created_by                 = "1";
      $report->no_of_page                 =  $req->no_of_page;
      $report->report_code                =  $req->report_code;
      $report->single_licence_price       =  $req->single_user_license;
      $report->multi_user_price           = $req->group_user_license;
      $report->excel_data_pack            = $req->excel_data_pack;
      $report->special_excel_data_pack    = $req->special_excel_data_pack;
      $report->image                      = $imageName;
      $report->decription                 = $req->Description;
      $report->description_last           = $req->Description2;
      $report->companies_mentioned        = $req->companies_mentioned;
      $report->infographic                = $infographic_id;
      $report->table_of_content           = $req->table_of_content;
      // $report->segmentaion                = 'uploads/report_image/segment_image/'.$segment_img;
      $report->custom_report_price        = $req->group_user_license_2;
      $report->report_post_date           = $req->report_post_date;
      $report->active_inactive            = $active_inactive;
      $report->upcomingstatus             = $upcomingstatus;
      $report->special_single_licence_price = $req->special_single_licence_price;
      $report->special_multi_user_price   = $req->special_multi_user_price;
      $report->special_custom_report_price =  $req->special_custom_report_price;
      // $report->segmentation_alt_tag       = $req->segmentation_alt_tag;
      $report->page_url                   = $page_url;	
      $report->schema_desc                = $req->schema_desc;
      $report->reviewcount                = $review_count;
      $report->rating_value               = $review_value;      
      $report->offer                      = $offer;
      $report->faqs                       = $Faqs;

      $item = $report->save();
      $report_id = $report->id;
      
      /** SeoContent */

      $seo_content = new Seo_Pages;
      
      $seo_content->parent_id = $report_id;
      $seo_content->seo_title = $req->seo_title;
      $seo_content->seo_description = $req->seo_description;
      $seo_content->seo_key_words = $req->seo_key_words;
      $seo_content->page_type = "report";

      $seo_content->save();
      
      if(isset($req->infographic_img)){
        
        /* save seo content */
        $seo_content2 = new Seo_Pages;
      
          $seo_content2->parent_id = $infographic_id;
          $seo_content2->seo_title = $req->seo_title;
          $seo_content2->seo_description = $req->seo_description;
          $seo_content2->seo_key_words = $req->seo_key_words;
          $seo_content2->page_type = "infographics";
    
          $seo_content2->save();
      }


      /** Faqs  */      

      // for($i=0; $i<count($faqs_ques); $i++){
      //   $datasaves=[		
      //     'report_id'=>$report_id,
      //     'question'=>$faqs_ques[$i],
      //     'answer' =>$req->faqs_ans[$i],
      //     'created_at'  => date('Y-m-d H:i:s')
      //   ];
        
      //   DB::table('report_faqs')->insert($datasaves);
      // }
    
      return redirect()->back()->with('success', 'Report saved successfully');
  }

  public function showCategory(Request $req){
    $cat_id = $req->cat_id; 
		$data = DB::table('sub_category')->where('cat_id',$cat_id)->get();  

    $re = "";
		$re .= "<option value=''>Sub-Category</option>";
		foreach($data as $key=>$st)
		{
			$re  .= "<option value='". $st->id."'>" . $st->sub_cat_name. "</option>";
		}
		
		$res = "<select>";		
		$res .= $re;
		$res .= "</select>";

		return $res;
	}

  public function report_list(){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
    $list = Report::select('title','report_code','active_inactive','report_post_date','id')
                    //->join('category','category.id','=','reports.cat_id')
                    //->join('sub_category','sub_category.id','=','category.id')
                    ->orderBy('id','desc')
                    ->get();
    
    return view('admin.all-reports',compact('list'));
      }
  }

  public function edit_report($id){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $infographic_data = "";
          $region = Region::get();
        $country = Country::get();
        $category = Category::get();
        $list = Report::where('id',$id)->first();
        $sub_category = Sub_Category::where('cat_id',$list->cat_id)->get();
        
        if($list->infographic > 0){
            $infographic_data = Infographic::where('id',$list->infographic)->first();
        }
        
        //$faqs = DB::table('report_faqs')->where('report_id',$id)->get();
        $seo_content = Seo_Pages::where('parent_id',$id)->where('page_type','report')->limit(1)->orderBy('id','DESC')->first();
        //print_r($faqs); die;
        return view('admin.edit_report',compact('list','category','sub_category','seo_content','infographic_data',"region","country"));
      }
  }
  
  


  public function update_report(Request $req){
    
    $report = new Report;

    $id = $req->report_id;

    $segment_img = "";
    $imageName = "";
    $active_inactive = 0; 
    $upcomingstatus = 0;
    $offer = 0;
    $page_url = "";
    $info_id = 0;
    
    $review_count = "";
    $review_value = "";
    
    if(isset($req->review_count)){
        $review_count = $req->review_count;
    }
    if(isset($req->review_value)){
        $review_value = $req->review_value;
    }

    
    if(isset($req->upcomingactive_inactive)){
      $upcomingstatus = 1;
    }
    if(isset($req->active_inactive)){
      $active_inactive = 1;
    }
    
    if(isset($req->infographic_img)){
      $imageName1 = $req->infographic_img->getClientOriginalName();
      //$imageName1 = time().'r.'.$req->infographic_img->extension();  
      $req->infographic_img->move(public_path('uploads/infographic/'), $imageName1); 
      $imageName = 'uploads/infographic/'.$imageName1;
      
       /* update infographic*/
       
       $report_data = Report::where('id', $id)->first();
       
       if($report_data->infographic >0){
           
            $info = new Infographic;
            $info->image = $imageName;
            $res2 = Infographic::where('id',$report_data->infographic)->update($info->toArray());
       }
       else{
           
            $info = new Infographic ;
      
            $info->title              = $req->title;
            $info->image              = 'uploads/infographic/'.$imageName1;
           $info->img_alt_tag        = $req->infographic_title;
            $info->status             = '0';
            $info->infographic_order  = '1';
            $info->report_link        = $req->page_url;
            $info->slug               = $req->page_url;
            $info->created_at         = date('Y-m-d');
            $info->seo_title          = $req->seo_title;
            $info->seo_keyword        = $req->seo_key_words;
            $info->seo_description    = $req->seo_description;
           // $info->img_alt_tag        = $req->seo_title;
            
            $info->save();
            $infographic_id = $info->id;
            
            
            /* Update Infographic ID */
             $report2 = new Report;
            $report2->infographic   = $infographic_id;
            $report2 = $report2->toArray();
            $res = Report::where('id',$id)->update($report2);
            
            /* save seo content */
            $seo_content2 = new Seo_Pages;
      
          $seo_content2->parent_id = $infographic_id;
          $seo_content2->seo_title = $req->seo_title;
          $seo_content2->seo_description = $req->seo_description;
          $seo_content2->seo_key_words = $req->seo_key_words;
          $seo_content2->page_type = "infographics";
    
          $seo_content2->save();
       }
    }
    else{
        $imageName = $req->infographic_img_H;
    }
    
    if(isset($req->segment_img)){
       $segment_img = time().'s.'.$req->segment_img->extension();  
       $req->segment_img->move(public_path('uploads/report_image/segment_image/'), $segment_img);
       $segment_img = 'uploads/report_image/segment_image/'.$segment_img;
    } 
    else{
        $segment_img = $req->segment_img_H;
    }
    
    if(isset($req->page_url) &&  $req->page_url != ''){
        $page_url = $req->page_url;
    }
    else if(isset($req->title)){
      $string = $req->title;
      $string = str_replace(array('[\', \']'), '', $string);
      $string = preg_replace('/\[.*\]/U', '', $string);
      $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
      $string = htmlentities($string, ENT_COMPAT, 'utf-8');
      $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
      $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
      $page_url =  trim($string, '-');
      $page_url = strtolower($page_url).".html" ;
    }    
    
    /** FAQS */

    $Ques = $req->faqs_ques;
    $Ans = $req->faqs_ans;

    if(!empty($Ques)){
      $Faqs = json_encode(array('ques'=>$Ques,'ans'=>$Ans));
    }else{
      $Faqs = '';
    }
    
  
      $report->cat_id                     = $req->category_id;
      $report->sub_cat_id                 = $req->subcategory_id;
       $report->region_id = $req->region_id;
        $report->country_id = $req->country_id;
      $report->title                      = $req->title;
      $report->heading2                   = $req->heading2;
      $report->created_by                 = "1";
      $report->no_of_page                 =  $req->no_of_page;
      $report->report_code                =  $req->report_code;
      $report->single_licence_price       =  $req->single_user_license;
      $report->multi_user_price           = $req->group_user_license;
      $report->excel_data_pack            = $req->excel_data_pack;
      $report->special_excel_data_pack    = $req->special_excel_data_pack;
      $report->image                      = $imageName;
      $report->decription                 = $req->Description;
      $report->description_last           = $req->Description2;
      $report->table_of_content           = $req->table_of_content;
      $report->companies_mentioned = $req->companies_mentioned;
      // $report->segmentaion                = $segment_img;
      $report->custom_report_price        = $req->group_user_license_2;
      $report->report_post_date           = $req->report_post_date;
      $report->active_inactive            = $active_inactive;
      $report->upcomingstatus             = $upcomingstatus;
      $report->special_single_licence_price = $req->special_single_licence_price;
      $report->special_multi_user_price   = $req->special_multi_user_price;
      $report->special_custom_report_price =  $req->special_custom_report_price;
      // $report->segmentation_alt_tag       = $req->segmentation_alt_tag;
      $report->page_url                   = $req->page_url;	
      $report->schema_desc                = $req->schema_desc;
      $report->reviewcount                = $review_count;
      $report->rating_value               = $review_value;  
      $report->offer                      = $offer;
      $report->faqs                       = $Faqs;

      $report = $report->toArray();
      $res = Report::where('id',$id)->update($report);
      $report_id = $id;

      /** SeoContent */

      $seo_content = new Seo_Pages;
      
      $seo_content->seo_title = $req->seo_title;
      $seo_content->seo_description = $req->seo_description;
      $seo_content->seo_key_words = $req->seo_key_words;    

      $res2 = Seo_Pages::where('parent_id',$id)->where('page_type','report')->update($seo_content->toArray());

    
      return redirect()->back()->with('success', 'Report Updated successfully');
  }

  public function delete_report(Request $req){
    $delid = $req->rowId;
    $info = Report::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
  }

    public function press_release(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
        return view('admin.add_press');
      }
    }

    public function press_release_list(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      $list = Press::orderBy('id','desc')->get();
      return view('admin.press_release_list',compact('list'));
      }
    }

    public function filter_press(Request $req){

      $report = [];
      $search = $req->search;
      $startDate = "";
      $endDate = "";
      
       if(!empty($req->start_date)){
          $startDate = $req->start_date;
       }
       if(!empty($req->end_date)){
          $endDate = $req->end_date;
       }
    
      $query = Press::query();
    
      if(!empty($startDate) && !empty($endDate) ){
          $query->whereDate('press_release.created_date_time','>=',$startDate)->whereDate('press_release.created_date_time','<=',$endDate);
          $startDate = "";
          $endDate = "";
      }
    
      if(!empty($startDate) ){
          $endDate = date('Y-m-d');
    
          $query->whereDate('press_release.created_date_time','>=',$startDate)->whereDate('press_release.created_date_time','<=',$endDate);
          $endDate = "";
      }
    
      if(!empty($endDate)){
          $startDate = date('Y-m-d');
    
          $query->whereDate('press_release.created_date_time','>=',$startDate)->whereDate('press_release.created_date_time','<=',$endDate);
          $startDate = "";
      }
    
      if(!empty($search) ){  
          $query->where('heading', 'LIKE', "%{$search}%");
      }
       
      $list = $query->select('press_release.*')->get();
    
      return view('admin.press_release_list',compact('list'));
    }

   public function save_press_release(Request $req){
    $info = new Press;

    $info->heading            = $req->heading;        
    $info->post_date          = $req->post_date;
    $info->description        = $req->description;
    $info->description2       = $req->description2;
    $info->press_release_url  = $req->press_release_url;
    $info->button_refrence    = $req->report_url;

    // Handle the image upload
  if(isset($req->press_image)) {
        $image = $req->file('press_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/press_release'), $imageName);
        $info->image = $imageName;
        $info->image_alt = $req->image_alt; // Save the alt text
    }

    $info->save();
    $press_id = $info->id;

    /** SeoContent */
    $seo_content = new Seo_Pages;          
    $seo_content->seo_title = $req->seo_title;
    $seo_content->seo_description = $req->seo_description;
    $seo_content->seo_key_words = $req->seo_keyword;  
    $seo_content->parent_id = $press_id; 
    $seo_content->page_type = 'press_release';  
    $seo_content->save();        

    return redirect()->back()->with('success', 'Information saved successfully');
}


    public function edit_press_release($id){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      $list = Press::where('id',$id)->first();
        $button_ref ='';
      $parent_id =\DB::table('press_release')->where('press_release_url', $list->press_release_url)->first(); 
      if(!is_null($parent_id)){
      $button_ref = $parent_id->button_refrence;
      if($button_ref !=""){
         $but_ref = explode('/',$button_ref);
         $report =\DB::table('reports')->where('page_url',$but_ref['4'])->first(); 
        // print_r($but_ref); die;
      }
      $seo_content =\DB::table('seo_content')->where('parent_id',$parent_id->id)->where('page_type','press_release')->orderBy('id','DESC')->first(); 
      // $seo_content = Seo_Pages::where('parent_id',$id)->where('page_type','press_release')->first();
      }else{
          $seo_content =\DB::table('seo_content')->where('page_type','press_release')->orderBy('id','DESC')->first(); 
      }
      return view('admin.edit_press_release',compact('list','seo_content'));
  }
}


  public function save_edit_press_release(Request $req){
      
    $info = new Press;
    $id = request()->segment(4);    

    $info->heading            = $req->heading;   
    $info->post_date          = $req->post_date;
    $info->description        = $req->description;
    $info->description2       = $req->description2;
    $info->press_release_url  = $req->press_release_url;
    $info->button_refrence    = $req->report_url;
    $info->image_alt =        $req->image_alt;
    
      if(isset($req->press_image)){
        $image = $req->file('press_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/press_release'), $imageName);
        $info->image = $imageName;
         // Save the alt text
    }else{
      $info->image =$req->press_image_H;
     
    }

    $info = $info->toArray();    
    $res = Press::where('id',$id)->update($info);

    /** SeoContent */

    $seo_content = new Seo_Pages;
      
    $seo_content->seo_title = $req->seo_title;
    $seo_content->seo_description = $req->seo_description;
    $seo_content->seo_key_words = $req->seo_keyword;    

    $res2 = Seo_Pages::where('parent_id',$id)->where('page_type','press_release')->update($seo_content->toArray());

    return redirect()->back()->with('success', 'Details updated successfully!');
  }

  public function delete_press_release(Request $req){
    $delid = $req->rowId;
    $info = Press::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
  }

  # Service
  public function services_list(){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $list = Service::get();
         return view('admin.services_list',compact('list'));
      }
    
  }

  public function services(){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
    return view('admin.services'); 
      }
  }

  public function save_services(Request $req){

    $info = new Service;
        $imageName = "";

        if(isset($req->services_image))
        {
          $imageName = time().'.'.$req->services_image->extension();  
          $req->services_image->move(public_path('uploads/services/'), $imageName); 
          //$datas->image = $imageName;
        }

        $info->service_name         = $req->service_name;
        $info->services_image       = $imageName;
        $info->services_desc        = $req->services_desc;
        
        $info->save();
        
        return redirect()->back()->with('success', 'Information saved successfully');

  }

  public function delete_services(Request $req){
    $delid = $req->rowId;
    $info = Service::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
  }

  public function edit_services($id){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
    $list = Service::where('id',$id)->first();
    return view('admin.edit_services',compact('list'));
      }
   }

public function save_edit_services(Request $req){
      
  $info = new Service;
  $id = request()->segment(4);
  $imageName = "";
  $imageName = $req->infographic_img_H;
 
  if(isset($req->services_image)){
    $imageName = time().'.'.$req->services_image->extension();  
    $req->services_image->move(public_path('uploads/services/'), $imageName); 
  }

  $info->service_name       = $req->service_name;
  $info->services_image     = $imageName;
  $info->services_desc      = $req->services_desc;

  $info = $info->toArray();
  
  $res = Service::where('id',$id)->update($info);
  return redirect()->back()->with('success', 'Details updated successfully!');
}

/** Users */
public function users_list(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = User::orderBy('id','desc')->get();
  return view('admin.all_users',compact('list'));
      }
}

/** Seo */

public function seo_page(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.add_page_seo');
      }
}

public function seo_pages_list(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $pages = Seo_Pages_Master::get();
          //$list = Seo_Pages::orderBy('id','desc')->get();
          return view('admin.all_seo_pages',compact('pages'));
      }
}

public function save_seo_pages(Request $req){
  $seo = new Seo_Pages;

  $seo->page_type         = $req->page_category;
  $seo->seo_title         = $req->seo_title;
  $seo->seo_description   = $req->seo_description;
  $seo->seo_key_words     = $req->seo_key_words;
  $seo->static_pages      ='1';
  
  $seo->save();
  return redirect()->back()->with('success', 'Content saved successfully');

}

public function edit_seo_page($id){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $list = Seo_Pages_Master::where('id',$id)->first();  
          $seo_content = Seo_Pages::where('page_type',$list->page_key)->first(); 
          //$list = Seo_Pages::where('id',$id)->first();  
          return view('admin.edit_seo_page',compact('list','seo_content'));
      }
}

    public function update_seo_page(Request $req){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
        }
        else{
          $seo = Seo_Pages::where('page_type',$req->page_category)->where('static_pages','1')->first();
          $seo->static_pages      ='1';
          $seo->page_type         = $req->page_category;
          $seo->seo_title         = $req->seo_title;
          $seo->seo_description   = $req->seo_description;
          $seo->seo_key_words     = $req->seo_key_words;
          
         
          $seo->save();
        
        return redirect()->back()->with('success', 'Details updated successfully!');
      }
    }
  
 public function financial_list(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Financial::get();
  return view('admin.finance_list',compact('list'));
      }
 }

 public function financial_research(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.add_finance_research');
      }
 }

 public function save_financial_research(Request $req){

  $info = new Financial;

        $imageName = "";
        $imageName2 = "";
        $imageName3 = "";
        $imageName4 = "";
        $imageName5 = "";
        $imageName6 = "";
        $imageName7 = "";
        $imageName8 = "";
        
        if(isset($req->financial_image))
        {
          $imageName = time().'1.'.$req->financial_image->extension();  
          $req->financial_image->move(public_path('uploads/financial/'), $imageName); 
        }

        if(isset($req->ideation_implementation_image1))
        {
          $imageName2 = time().'2.'.$req->ideation_implementation_image1->extension();  
          $req->ideation_implementation_image1->move(public_path('uploads/financial/'), $imageName2); 
        }

        if(isset($req->ideation_implementation_image2))
        {
          $imageName3 = time().'3.'.$req->ideation_implementation_image2->extension();  
          $req->ideation_implementation_image2->move(public_path('uploads/financial/'), $imageName3); 
        }

        if(isset($req->ideation_implementation_image3))
        {
          $imageName4 = time().'4.'.$req->ideation_implementation_image3->extension();  
          $req->ideation_implementation_image3->move(public_path('uploads/financial/'), $imageName4); 
        }

        if(isset($req->image_slider1))
        {
          $imageName5 = time().'5.'.$req->image_slider1->extension();  
          $req->image_slider1->move(public_path('uploads/financial/'), $imageName5); 
        }

        if(isset($req->image_slider2))
        {
          $imageName6 = time().'6.'.$req->image_slider2->extension();  
          $req->image_slider2->move(public_path('uploads/financial/'), $imageName6); 
        }

        if(isset($req->image_slider3))
        {
          $imageName7 = time().'7.'.$req->image_slider3->extension();  
          $req->image_slider3->move(public_path('uploads/financial/'), $imageName7); 
        }

        if(isset($req->image_slider4))
        {
          $imageName8 = time().'8.'.$req->image_slider4->extension();  
          $req->image_slider4->move(public_path('uploads/financial/'), $imageName8); 
        }


        $info->financial_heading              = $req->title;
        $info->financial_image                = $imageName;
        $info->analytics_description          = $req->Description;
        $info->ideation_implementation_image1 = $imageName2;
        $info->Description_ideal_impletation1 = $req->Description2;
        $info->ideation_implementation_image2 = $imageName3;
        $info->Description_ideal_impletation2 = $req->impletation2;
        $info->ideation_implementation_image3 = $imageName4;
        $info->Description_ideal_impletation3 = $req->impletation3;
        $info->Description_slider1            = $req->slider1;
        $info->image_slider1                  = $imageName5;
        $info->Description_slider2            = $req->slider2;
        $info->image_slider2                  = $imageName6;
        $info->Description_slider3            = $req->slider3;
        $info->image_slider3                  = $imageName7;
        $info->Description_slider4            = $req->slider4;
        $info->image_slider4                  = $imageName8;
        
        $info->save();
        
        return redirect()->back()->with('success', 'Information saved successfully');
 
 }

 public function edit_financial_research($id){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Financial::where('id',$id)->first();
  return view('admin.edit_financial_research',compact('list'));
      }
 }

public function save_edit_financial_research(Request $req){

  $info = new Financial;
      $id = request()->segment(4);
      $imageName = $req->infographic_img_H;

        $imageName = "";
        $imageName2 = "";
        $imageName3 = "";
        $imageName4 = "";
        $imageName5 = "";
        $imageName6 = "";
        $imageName7 = "";
        $imageName8 = "";
        
        if(isset($req->financial_image))
        {
          $imageName = time().'.'.$req->financial_image->extension();  
          $req->financial_image->move(public_path('uploads/financial/'), $imageName); 
        }

        if(isset($req->ideation_implementation_image1))
        {
          $imageName2 = time().'.'.$req->ideation_implementation_image1->extension();  
          $req->ideation_implementation_image1->move(public_path('uploads/financial/'), $imageName2); 
        }

        if(isset($req->ideation_implementation_image2))
        {
          $imageName3 = time().'.'.$req->ideation_implementation_image2->extension();  
          $req->ideation_implementation_image2->move(public_path('uploads/financial/'), $imageName3); 
        }

        if(isset($req->ideation_implementation_image3))
        {
          $imageName4 = time().'.'.$req->ideation_implementation_image3->extension();  
          $req->ideation_implementation_image3->move(public_path('uploads/financial/'), $imageName4); 
        }

        if(isset($req->image_slider1))
        {
          $imageName5 = time().'.'.$req->image_slider1->extension();  
          $req->image_slider1->move(public_path('uploads/financial/'), $imageName5); 
        }

        if(isset($req->image_slider2))
        {
          $imageName6 = time().'.'.$req->image_slider2->extension();  
          $req->image_slider2->move(public_path('uploads/financial/'), $imageName6); 
        }

        if(isset($req->image_slider3))
        {
          $imageName7 = time().'.'.$req->image_slider3->extension();  
          $req->image_slider3->move(public_path('uploads/financial/'), $imageName7); 
        }

        if(isset($req->image_slider4))
        {
          $imageName8 = time().'.'.$req->image_slider4->extension();  
          $req->image_slider4->move(public_path('uploads/financial/'), $imageName8); 
        }


        $info->financial_heading              = $req->title;
        $info->financial_image                = $imageName;
        $info->analytics_description          = $req->Description;
        $info->ideation_implementation_image1 = $imageName2;
        $info->Description_ideal_impletation1 = $req->Description2;
        $info->ideation_implementation_image2 = $imageName3;
        $info->Description_ideal_impletation2 = $req->impletation2;
        $info->ideation_implementation_image3 = $imageName4;
        $info->Description_ideal_impletation3 = $req->impletation3;
        $info->Description_slider1            = $req->slider1;
        $info->image_slider1                  = $imageName5;
        $info->Description_slider2            = $req->slider2;
        $info->image_slider2                  = $imageName6;
        $info->Description_slider3            = $req->slider3;
        $info->image_slider3                  = $imageName7;
        $info->Description_slider4            = $req->slider4;
        $info->image_slider4                  = $imageName8;
          $info = $info->toArray();
  
        $res = Financial::where('id',$id)->update($info);
        return redirect()->back()->with('success', 'Details updated successfully!');
   
}

   public function delete_financial_research(Request $req){
    $delid = $req->rowId;
    $info = Financial::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
   }


    public function industries_list(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      $list = Category::get();
      return view('admin.industries_list',compact('list'));
      }
    }

    public function industries(){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      return view('admin.industries');
      }
    }

    public function save_industries(Request $req){

      $info = new Category;
        $imageName = "";
        $imageName1 = "";

        if(isset($req->cat_hover_image))
        {
          $imageName = time().'.'.$req->cat_hover_image->extension();  
          $req->cat_hover_image->move(public_path('uploads/category/'), $imageName); 
          //$datas->image = $imageName;
        }

        if(isset($req->cat_image))
        {
          $imageName1 = time().'.'.$req->cat_image->extension();  
          $req->cat_image->move(public_path('uploads/category/'), $imageName1); 
          //$datas->image = $imageName;
        }

        $info->category_url         = $req->category_url;
        $info->cat_name             = $req->cat_name;
        $info->cat_hover_image      = $imageName;
        $info->cat_image            = $imageName1;

        $info->save();
        $parent_id = $info->id;
        
        /** SeoContent */
        $seo_content = new Seo_Pages;
        
        $seo_content->parent_id     = $parent_id;
        $seo_content->seo_title     = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words;
        $seo_content->page_type     = 'category';
        
        $seo_content->save();
        
        return redirect()->back()->with('success', 'Information saved successfully');

    }

    public function edit_industries(Request $req){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
         
            $list = Category::where('id',request()->segment(4))->first();
            $seo_content = Seo_Pages::where('parent_id',request()->segment(4))->where('page_type','category')->first();
            
            return view('admin.edit_industries',compact('list','seo_content'));
      }
    }

    public function save_edit_industries(Request $req){

      $info = new Category;
        $id = request()->segment(4);
        $imageName = $req->infographic_img_H;
        $imageName = "";
        $imageName1 = "";

        if(isset($req->cat_hover_image))
        {
          $imageName = time().'.'.$req->cat_hover_image->extension();  
          $req->cat_hover_image->move(public_path('uploads/category/'), $imageName); 
        }

        if(isset($req->cat_image))
        {
          $imageName1 = time().'.'.$req->cat_image->extension();  
          $req->cat_image->move(public_path('uploads/category/'), $imageName1); 
        }

        $info->category_url         = $req->category_url;
        $info->cat_name             = $req->cat_name;
        $info->cat_hover_image      = $imageName;
        $info->cat_image            = $imageName1;

        $info = $info->toArray();
        
        $res = Category::where('id',$id)->update($info);
        
        /** SeoContent */

        $seo_content = new Seo_Pages;
      
        $seo_content->seo_title = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words;    

        $res2 = Seo_Pages::where('parent_id',$id)->where('page_type','category')->update($seo_content->toArray());
      
        return redirect()->back()->with('success', 'Details updated successfully!');
    }

    public function delete_industries(Request $req){
        $delid = $req->rowId;
        $info = Category::where('id',$delid)->delete();
        echo "Record Deleted Successfully";
    }
  

    public function sub_industries_list(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $data = Sub_Category::select('sub_category.id','sub_category.sub_cat_name','category.cat_name')
          ->join('category', 'category.id', '=', 'sub_category.cat_id')
          ->get();
          return view('admin.sub_industries_list',compact('data'));
      }
    }

    public function sub_industries(Request $req){
       if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
        $category = Category::get();
        return view('admin.sub_industries',compact('category'));
      }
    }

    public function save_sub_industries(Request $req){

        $info = new Sub_Category;
        
        $info->cat_id               = $req->cat_id;
        $info->sub_cat_name         = $req->sub_cat_name;
        $info->page_url         = $req->category_url;
        
        $info->save();
        $parent_id = $info->id;
        
        /** SeoContent */
        $seo_content = new Seo_Pages;
        
        $seo_content->parent_id     = $parent_id;
        $seo_content->seo_title     = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words; 
        $seo_content->page_type     = 'sub_ctegory';
        
        $seo_content->save();

        return redirect()->back()->with('success', 'Information saved successfully');

    }

    public function edit_sub_industries(Request $req){
       if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $id = $req->id;
          
          $category = Category::get();
          $list = Sub_Category::where('id',$id)->get();
          $seo_content = Seo_Pages::where('parent_id',request()->segment(4))->where('page_type','sub_ctegory')->first();
          
          return view('admin.edit_sub_industries',compact('list','category','seo_content'));
      }
    }

    public function save_edit_sub_industries(Request $req){
        
        $info = new Sub_Category;
        $id = request()->segment(4);

        $info->cat_id           = $req->cat_id;
        $info->sub_cat_name     = $req->sub_cat_name;
        $info->page_url         = $req->category_url;
       
        $info = $info->toArray();
        $res = Sub_Category::where('id',$id)->update($info);
        
        /** SeoContent */

        $seo_content = new Seo_Pages;
      
        $seo_content->seo_title = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words;    

        $res2 = Seo_Pages::where('parent_id',$id)->where('page_type','sub_ctegory')->update($seo_content->toArray());
        
        return redirect()->back()->with('success', 'Details updated successfully!');
    }

    public function delete_sub_industries(Request $req){
      $delid = $req->rowId;
      $info = Sub_category::where('id',$delid)->delete();
      echo "Record Deleted Successfully";
     }


  public function add_member(){
     if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
    return view('admin.add-member');
      }
  }

  public function add_member_form(Request $req){
    //dd($req); 
    $users= new User;

    $users->name    = $req->name;
    $users->phone   = $req->phone;
    $users->email   = $req->email;
    $users->password= $req->password;
    $users->role    = "member";
    $users->user_role    = "2";
    $users->created_by  = (Auth::user()->id);
    $users->created_at  = date('Y-m-d H:i:s');
    $users->password= Hash::make($req->password);
    $users->save();

    $user_id = $users->id;

    /** User Permission */
    $Info = $req->info;
    $Blogs = $req->blogs;
    $Report = $req->report;
    $Press = $req->press;

    if(!empty($Info) || !empty($Blogs) || !empty($Report) || !empty($Press)){
      $page_permission = json_encode(array('Info'=>$Info,'Blogs'=>$Blogs,'Report'=>$Report,'Press'=>$Press));
    }else{
      $page_permission = '';
    }

    $array = [
      'user_id'           =>  $user_id,
      'pages_permission'  =>  $page_permission,
      'created_at'        =>  date('Y-m-d H:i:s')
    ];
    $res = DB::table('user_permissions')->insert($array);

    return redirect()->back()->with('success', 'Memebr details successfully Added!');
  }

public function all_member()
{
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = User::select('*')
                ->where('role','member')
                ->orderBy('id','desc')
                ->get();
  return view('admin.all-member',compact('list'));
      }
}

public function edit_member($id)
{
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $user = User::where('id',$id)->first();
  return view('admin.edit-member',compact('user','id'));
      }
}
    
public function update_member(Request $request){

  $id = $request->idH;
  $updArray = array(
    "name" => $request->name,
    "phone" => $request->phone,
    "email" => $request->email           
  );

  $upd = User::where('id',$id)->update($updArray);

  /** User Permission */
  $Info = $request->info;
  $Blogs = $request->blogs;
  $Report = $request->report;
  $Press = $request->press;

  if(!empty($Info) || !empty($Blogs) || !empty($Report) || !empty($Press)){
    $page_permission = json_encode(array('Info'=>$Info,'Blogs'=>$Blogs,'Report'=>$Report,'Press'=>$Press));
  }else{
    $page_permission = '';
  }

  $array = [
    'pages_permission'  =>  $page_permission,
    'created_at'        =>  date('Y-m-d H:i:s')
  ];
  $res = DB::table('user_permissions')->where('user_id',$id)->update($array);

  return redirect()->back()->with('success', 'Member details updated successfully!');

}

public function delete_member(Request $req){
  $delid = $req->rowId;
  $info = User::where('id',$delid)->where('role','member')->delete();
  echo "Record Deleted Successfully";
}

public function member_view($id)
    {
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      $list = User::select('*')
      ->where(
          [
            ['role','member'],
            ['id',$id]
          ])->first();
      return view('admin.member-view-wallet',compact('list'));
      }
      
    }
##### Banner

    public function banner(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      return view('admin.banner');
      }
    }

    public function save_banner(Request $req){
      $info = new Banner;
      $bannerMobileImage = $imageName = "";
  
      // Ensure the uploads directory exists
      $destinationPath = public_path('uploads/banner/');
      if (!file_exists($destinationPath)) {
          mkdir($destinationPath, 0777, true);
      }
  
      // Process Desktop Image (Resize to 1200x400)
      if ($req->hasFile('banner_image')) {
          $imageName = time() . '_desktop.' . $req->banner_image->extension();
          $image = ImageIntervention::make($req->file('banner_image'))
                        ->resize(1200, 400) // Resize to 1200x400
                        ->save($destinationPath . $imageName);
      }
  
      // Process Mobile Image (Resize to 600x300)
      if ($req->hasFile('banner_mobile_image')) {
          $bannerMobileImage = time() . '_mobile.' . $req->banner_mobile_image->extension();
          $image = ImageIntervention::make($req->file('banner_mobile_image'))
                        ->resize(600, 300) // Resize to 600x300
                        ->save($destinationPath . $bannerMobileImage);
      }
  
      // Save Data to Database
      $info->banner_order        = $req->banner_order;
      $info->banner_image        = $imageName;
      $info->banner_mobile_image = $bannerMobileImage;
      $info->redirect_url        = $req->alt_tag;
      $info->banner_title        = $req->banner_title;
      $info->banner_desc         = $req->Description;
      $info->save();
  
        return redirect()->back()->with('success', 'Information saved successfully');
    }

    public function banner_list(){
        if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      $list = Banner::get();
      return view('admin.banner_list',compact('list'));
      }
     }

     public function delete_banner(Request $req){
      $delid = $req->rowId;
      $info = Banner::where('id',$delid)->delete();
      echo "Record Deleted Successfully";
     }

     public function edit_banner($id){
        if($this->checkRole() === false){
            Auth::logout();
            return redirect('/TRC/11/login');
        } else {
            $list = Banner::where('id',$id)->first();
            return view('admin.edit_banner',compact('list'));
        }
     }

    public function save_edit_banner(Request $req){
        $info = new Banner;
        $id = request()->segment(4);
        $imageName = "";
        if(isset($req->banner_image)){
            $imageName = time().'.'.$req->banner_image->extension();  
            $req->banner_image->move(public_path('uploads/banner/'), $imageName); 
            //$datas->image = $imageName;
            $info->banner_image      = $imageName;
        }
        if(isset($req->banner_mobile_image)){
            $bannerMobileImage = time().'.'.$req->banner_mobile_image->extension();  
            $req->banner_mobile_image->move(public_path('uploads/banner/'), $bannerMobileImage); 
            $info->banner_mobile_image  = $bannerMobileImage;
        }
        $info->banner_order      = $req->banner_order;
        $info->banner_title      = $req->banner_title;
        $info->redirect_url      = $req->alt_tag;
        $info->banner_desc      = $req->Description;
        $info = $info->toArray();
        $res = Banner::where('id',$id)->update($info);
        return redirect()->back()->with('success', 'Details updated successfully!');
    }

##### Testimonial
  public function testimonial(){
      if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
    return view('admin.testimonial');
      }
  }

  public function save_testimonial(Request $req){
    $info = new Testimonial;
        $imageName = "";

        if(isset($req->image))
        {
          $imageName = time().'.'.$req->image->extension();  
          $req->image->move(public_path('uploads/testimonial/'), $imageName); 
          //$datas->image = $imageName;
        }

        $info->client_name      = $req->client_name;
        $info->title            = $req->title;
        $info->client_country   = $req->client_country;
        $info->description      = $req->Description;
        $info->image            = $imageName;

        $info->save();
        
        return redirect()->back()->with('success', 'Information saved successfully');

  }

 public function testimonial_list(){
     if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Testimonial::get();
  return view('admin.testimonial_list',compact('list'));
      }
 }

 public function delete_testimonial(Request $req){
  $delid = $req->rowId;
  $info = Testimonial::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

 public function edit_testimonial($id){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Testimonial::where('id',$id)->first();
  return view('admin.edit_testimonial',compact('list'));
      }
 }

 public function save_edit_testimonial(Request $req){
  $info = new Testimonial;
    $id = request()->segment(4);

    $imageName = "";

    if(isset($req->image))
    {
      $imageName = time().'.'.$req->image->extension();  
      $req->image->move(public_path('uploads/testimonial/'), $imageName); 
      //$datas->image = $imageName;
    }

    $info->client_name      = $req->client_name;
    $info->title            = $req->title;
    $info->client_country   = $req->client_country;
    $info->Description      = $req->Description;
    $info->image            = $imageName;

    $info = $info->toArray();
    
    $res = Testimonial::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

# About Us
public function aboutus(Request $req){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.aboutus');
      }
}

public function save_aboutus(Request $req){
      $info = new Aboutus;
      
      $info->heading      = $req->heading;
      $info->descritpion  = $req->Description;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');

}

public function edit_aboutus($id){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Aboutus::where('id',$id)->first();
  return view('admin.edit_aboutus',compact('list'));
      }
 }

 public function save_edit_aboutus(Request $req){
  $info = new Aboutus;
    $id = request()->segment(4);

    $info->heading      = $req->heading;
    $info->descritpion  = $req->Description;

    $info = $info->toArray();
    
    $res = Aboutus::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function aboutus_list(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Aboutus::get();
  return view('admin.aboutus_list',compact('list'));
      }
}

public function delete_aboutus(Request $req){
  $delid = $req->rowId;
  $info = Aboutus::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

# Vision & Mission
public function vision(Request $req){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.vision');
      }
}

public function save_vision(Request $req){
      $info = new Vision;
      
      $imageName = "";
      
        if(isset($req->image))
        {
          $imageName = time().'.'.$req->image->extension();  
          $req->image->move(public_path('uploads/vision/'), $imageName); 
          //$datas->image = $imageName;
        }
      $info->image         = $imageName;
      $info->heading      = $req->heading;
      //$info->content      = $req->content;
      $info->content      = $req->Description;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');

}

public function edit_vision($id){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Vision::where('id',$id)->first();
  return view('admin.edit_vision',compact('list'));
      }
 }

 public function save_edit_vision(Request $req){
  $info = new Vision;
    $id = request()->segment(4);
    $imageName = "";
      
    if(isset($req->image))
    {
      $imageName = time().'.'.$req->image->extension();  
      $req->image->move(public_path('uploads/vision/'), $imageName); 
      //$datas->image = $imageName;
    }
  $info->image         = $imageName;
  $info->heading      = $req->heading;
  $info->content      = $req->Description;

    $info = $info->toArray();
    
    $res = Vision::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function vision_list(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Vision::get();
  return view('admin.vision_list',compact('list'));
      }
}

public function delete_vision(Request $req){
  $delid = $req->rowId;
  $info = Vision::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

# Our Clients
public function client(Request $req){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.client');
      }
}

public function save_client(Request $req){
      $info = new Client;
      
      $imageName = "";
      
        if(isset($req->client_image))
        {
          $imageName = time().'.'.$req->client_image->extension();  
          $req->client_image->move(public_path('uploads/clients/'), $imageName); 
          //$datas->image = $imageName;
        }
      $info->client_image  = $imageName;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');

}

public function edit_client($id){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Client::where('id',$id)->first();
  return view('admin.edit_client',compact('list'));
      }
 }

 public function save_edit_client(Request $req){
    $info = new Client;
    $id = request()->segment(4);
    $imageName = "";
      
    if(isset($req->client_image))
    {
      $imageName = time().'.'.$req->client_image->extension();  
      $req->client_image->move(public_path('uploads/clients/'), $imageName); 
      //$datas->image = $imageName;
    }
    else{
      $imageName = $req->hidden_testimonial_image;
    }
    $info->client_image         = $imageName;

    $info = $info->toArray();
    
    $res = Client::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function client_list(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Client::get();
  return view('admin.client_list',compact('list'));
      }
}

public function delete_client(Request $req){
  $delid = $req->rowId;
  $info = Client::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

# Privacy Policy
public function privacy(Request $req){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.privacy');
      }
}

public function save_privacy(Request $req){
      $info = new Privacy;
      
      $info->heading      = $req->heading;
      $info->content      = $req->Description;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');

}

public function edit_privacy($id){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Privacy::where('id',$id)->first();
  return view('admin.edit_privacy',compact('list'));
      }
 }

 public function save_edit_privacy(Request $req){
    $info = new Privacy;
    $id = request()->segment(4);
  
    $info->heading      = $req->heading;
    $info->content      = $req->Description;

    $info = $info->toArray();
    
    $res = Privacy::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function privacy_list(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Privacy::get();
  return view('admin.privacy_list',compact('list'));
      }
}

public function delete_privacy(Request $req){
  $delid = $req->rowId;
  $info = Privacy::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

# Refund Policy
public function refund(Request $req){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.refund');
      }
}

public function save_refund(Request $req){
      $info = new Refund;
      
      $info->content      = $req->Description;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');

}

public function edit_refund($id){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Refund::where('id',$id)->first();
  return view('admin.edit_refund',compact('list'));
      }
 }

 public function save_edit_refund(Request $req){
    $info = new Refund;
    $id = request()->segment(4);
  
    $info->content      = $req->Description;

    $info = $info->toArray();
    
    $res = Refund::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function refund_list(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Refund::get();
  return view('admin.refund_list',compact('list'));
      }
}

public function delete_refund(Request $req){
  $delid = $req->rowId;
  $info = Refund::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

# Terms & Conditions
public function terms(Request $req){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.terms');
      }
}

public function save_terms(Request $req){
      $info = new Terms;
      
      $info->content      = $req->Description;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');

}

public function edit_terms($id){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Terms::where('id',$id)->first();
  return view('admin.edit_terms',compact('list'));
      }
 }

 public function save_edit_terms(Request $req){
    $info = new Terms;
    $id = request()->segment(4);
  
    $info->content      = $req->Description;

    $info = $info->toArray();
    
    $res = Terms::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function terms_list(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Terms::get();
  return view('admin.terms_list',compact('list'));
      }
}

public function delete_terms(Request $req){
  $delid = $req->rowId;
  $info = Terms::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

 # Contact Us
public function contactus(Request $req){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  return view('admin.contactus');
      }
}

public function save_contactus(Request $req){
      $info = new Contact;
      
      $info->company_name      = $req->company_name;
      $info->busniess_email      = $req->busniess_email;
      $info->contact_number1      = $req->contact_number1;
      $info->contact_number2      = $req->contact_number2;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');

}

public function edit_contactus($id){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Contact::where('id',$id)->first();
  return view('admin.edit_contactus',compact('list'));
      }
 }

 public function save_edit_contactus(Request $req){
    $info = new Contact;
    $id = request()->segment(4);
  
      $info->company_name      = $req->company_name;
      $info->busniess_email      = $req->busniess_email;
      $info->contact_number1      = $req->contact_number1;
      $info->contact_number2      = $req->contact_number2;

    $info = $info->toArray();
    
    $res = Contact::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function contactus_list(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Contact::get();
  return view('admin.contactus_list',compact('list'));
      }
}

public function delete_contactus(Request $req){
  $delid = $req->rowId;
  $info = Contact::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
 }

public function sample_request(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
        //$list = Sample_Request::where('report_type_request','request_sample')->get();
        $list = Sample_Request::where('report_type_request','=','Request-Sample')->orderBy('id','DESC')->get();
        return view('admin.sample_request',compact('list'));
      }
}

public function filter_sample(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Sample_Request::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('report_title', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('report_sample_request.*')->get();

  return view('admin.sample_request',compact('list'));
}

public function speak_analyst(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Sample_Request::where('report_type_request','=','Talk to Our Consultant')->get();
  return view('admin.speak_analyst',compact('list'));
      }
}

public function request_customization(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = sample_request::where('report_type_request','Request Customization')->get();
  return view('admin.request_customization',compact('list'));
      }
}

public function covid_impact(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $list = sample_request::where('report_type_request','covid')->get();
          return view('admin.covid_impact',compact('list'));
      }
}

public function tire_exim(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $list = sample_request::where('report_type_request','Sample Request Tire')->get();
          return view('admin.tire_exim',compact('list'));
      }
}

public function filter_tire(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Sample_Request::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('report_title', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('report_sample_request.*')->get();

  return view('admin.tire_exim',compact('list'));
}

# jbwefkje

public function customized_res(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Sample_Request::where('report_title','Customized Research')->get();
  return view('admin.customized_res',compact('list'));
      }
}

public function filter_customized(Request $req){

    $report = [];
    $search = $req->search;
    $startDate = "";
    $endDate = "";
    
     if(!empty($req->start_date)){
        $startDate = $req->start_date;
     }
     if(!empty($req->end_date)){
        $endDate = $req->end_date;
     }

    $query = Sample_Request::query();

    if(!empty($startDate) && !empty($endDate) ){
        $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
        $startDate = "";
        $endDate = "";
    }

    if(!empty($startDate) ){
        $endDate = date('Y-m-d');

        $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
        $endDate = "";
    }

    if(!empty($endDate)){
        $startDate = date('Y-m-d');

        $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
        $startDate = "";
    }

    if(!empty($search) ){  
        $query->where('report_title', 'LIKE', "%{$search}%");
    }
     
    $list = $query->select('report_sample_request.*')->where('report_title','Customized Research')->get();

    return view('admin.customized_res',compact('list'));
}

public function syndicate_res(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Servicesquery::orderBy('id', 'desc')->get();

  return view('admin.syndicate_res',compact('list'));
      }
}

public function filter_syndicate(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Sample_Request::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('report_title', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('report_sample_request.*')->where('report_title','Syndicated Research')->get();

  return view('admin.syndicate_res',compact('list'));
}

public function consulting_res(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = sample_request::where('report_title','Consulting Research')->get();
  return view('admin.consulting_res',compact('list'));
      }
}

public function filter_consulting(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Sample_Request::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('report_title', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('report_sample_request.*')->where('report_title','Consulting Research')->get();

  return view('admin.consulting_res',compact('list'));
}

public function full_analyst(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = sample_request::where('report_title','Full Time Analyst')->get();
  return view('admin.full_analyst',compact('list'));
      }
}

public function filter_full(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Sample_Request::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('report_title', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('report_sample_request.*')->where('report_title','Full Time Analyst')->get();

  return view('admin.full_analyst',compact('list'));
}

public function infographics_enq(){
    if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $list = Query_Management::where('type','1')->orderBy('id','desc')->get();
          return view('admin.infographics_enquiry',compact('list'));
      }
}

public function filter_infographics_enq(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Sample_Request::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('full_name', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('report_sample_request.*')->get();

  return view('admin.infographics_enquiry',compact('list'));
}

public function search_query(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  //$list = sample_request::get();
     $list = Sample_Request::where('report_type_request','=','search_data_not_found')->orderBy('id','DESC')->get();
  return view('admin.search_query',compact('list'));
      }
}

public function filter_search(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Sample_Request::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('report_sample_request.created_date_time','>=',$startDate)->whereDate('report_sample_request.created_date_time','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('full_name', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('report_sample_request.*')->get();

  return view('admin.search_query',compact('list'));
}

public function contactus_enq(){
  if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
          $list = Contact::orderBy('id','DESC')->get();
          return view('admin.contactus_enq_list',compact('list'));
      }
}

public function filter_contactus_enq(Request $req){

  $report = [];
  $search = $req->search;
  $startDate = "";
  $endDate = "";
  
   if(!empty($req->start_date)){
      $startDate = $req->start_date;
   }
   if(!empty($req->end_date)){
      $endDate = $req->end_date;
   }

  $query = Contact::query();

  if(!empty($startDate) && !empty($endDate) ){
      $query->whereDate('contact_us.created_at','>=',$startDate)->whereDate('contact_us.created_at','<=',$endDate);
      $startDate = "";
      $endDate = "";
  }

  if(!empty($startDate) ){
      $endDate = date('Y-m-d');

      $query->whereDate('contact_us.created_at','>=',$startDate)->whereDate('contact_us.created_at','<=',$endDate);
      $endDate = "";
  }

  if(!empty($endDate)){
      $startDate = date('Y-m-d');

      $query->whereDate('contact_us.created_at','>=',$startDate)->whereDate('contact_us.created_at','<=',$endDate);
      $startDate = "";
  }

  if(!empty($search) ){  
      $query->where('company_name', 'LIKE', "%{$search}%");
  }
   
  $list = $query->select('contact_us.*')->get();

  return view('admin.contactus_enq_list',compact('list'));
}

public function career_list(){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Career::get();
  return view('admin.career_list',compact('list'));
      }
}

public function add_career(Request $req){
  return view('admin.add_career_content');
}

public function save_career(Request $req){
  $info = new Career;
      
      $info->heading                 = $req->heading;
      $info->roles_responsibilities  = $req->Description;

      $info->save();
      
      return redirect()->back()->with('success', 'Information saved successfully');
}

public function edit_career($id){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Career::where('id',$id)->first();
  return view('admin.edit_career',compact('list'));
      }
}

public function save_edit_career(Request $req){
  $info = new Career;
    $id = request()->segment(4);

    $info->heading                 = $req->heading;
    $info->roles_responsibilities  = $req->Description;

    $info = $info->toArray();
    
    $res = Career::where('id',$id)->update($info);
    return redirect()->back()->with('success', 'Details updated successfully!');
}

public function delete_career(Request $req){
  $delid = $req->rowId;
  $info = Career::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
}

// public function filter_info(Request $req){
//   //echo "vkdjvhwecbw";
// }

public function applicants(Request $request){
   if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
  $list = Applicant::paginate(3000000); 
  return view('admin.applicants',compact('list'));
      }
}

// public function applicants(Request $request){
//   $search = $request['search'] ?? "";
//   if ($search != ""){
//     // where 
//     $list = Applicant::where('name','LIKE', "%$search%")->orwhere('email','LIKE', "%$search%")->get();
//   } else {
//     $list = Applicant::paginate(3);
//   }
//   //$list = Applicant::paginate(3); 
//   return view('admin.applicants',compact('list','search'));
// }

public function delete_applicants(Request $req){
  $delid = $req->rowId;
  $info = Applicant::where('id',$delid)->delete();
  echo "Record Deleted Successfully";
}

######################### END ############################################

    public function register(){
        return view('register');
    }

    public function login(){
        return view('admin.login');
    }

    // public function dash_index(){
    //   return view('admin.dashboard');
    // }

    public function profile($id){
       if($this->checkRole() === false){
          Auth::logout();
          return redirect('/TRC/11/login');
      }
      else{
      $user = User::select('*')->where('id',$id)->first();
      return view('admin.admin-profile',compact('user'));
      }
    }

    public function update_profile(Request $request){
      $id = $request->id;
        $updArray = array(
          "name" => $request->name,
          "phone" => $request->phone,
          "email" => $request->email,
          "dob" => $request->dob,
          "gender" => $request->gender,
          "address" => $request->address,
          "city" => $request->city,
          "state" => $request->state,         
        );

        $upd = User::where('id',$id)->update($updArray);

        return redirect()->back()->with('success', 'Admin details updated successfully!');
      
    }

    
    public function fileExport(Request $request) 
    {
      
      // $report = [];
      // $search = request()->query('search');
      // $startDate = "";
      // $endDate = "";
     
      // if(!empty($request->query('start_date'))){
      //   $startDate = $request->query('start_date');
      // }
      // if(!empty( $request->query('end_date') )){
      //   $endDate = $request->query('end_date');
      // }
     
      // $query = Infographic::query();

    
      // if(!empty($startDate) && !empty($endDate) ){
      //     $query->whereDate('infographic.created_at','>=',$startDate)->whereDate('infographic.created_at','<=',$endDate);
      //     $startDate = "";
      //     $endDate = "";
      // }
    
      // if(!empty($startDate) ){
      //     $endDate = date('Y-m-d');
    
      //     $query->whereDate('infographic.created_at','>=',$startDate)->whereDate('infographic.created_at','<=',$endDate);
      //     $endDate = "";
      // }
    
      // if(!empty($endDate)){
      //     $startDate = date('Y-m-d');
    
      //     $query->whereDate('infographic.created_at','>=',$startDate)->whereDate('infographic.created_at','<=',$endDate);
      //     $startDate = "";
      // }
      
      // if(!empty($search) ){  
      //     $query->where('title', 'LIKE', "%{$search}%");
      // }

        //$list = $query->select('infographic.*')->get();
        
        //return Excel::download($list, 'infographic-collection.xlsx');

        //return $this->exportToExcel($list);
        return Excel::download(new InfographicExport(), 'infographic-collection.xlsx');
    } 

    public function blog_export(){
      return Excel::download(new BlogExport, 'Blogs.xlsx');
    }
    public function report_export(){
      return Excel::download(new ReportExport, 'Report.xlsx');
    }

    private function exportToExcel($data)
    {
        // Transform the data into a collection
        $collection = collect($data);

        // Define the Excel file name
        $fileName = 'infographic-collection.xlsx';

        // Use Laravel Excel to export the collection to Excel
        return Excel::download(new InfographicExport($collection), $fileName);
    }

    public function sample_export() 
    {
        return Excel::download(new SampleExport, 'sample-collection.xlsx');
    }
    
    public function speak_export() 
    {
        return Excel::download(new SpeakExport, 'speak-analyst-collection.xlsx');
    }

    public function request_export()
    {
        return Excel::download(new RequestExport, 'request-customization.xlsx');
    }

    public function covid_export()
    {
        return Excel::download(new CovidExport, 'covid-impact.xlsx');
    }

    public function tire_export()
    {
        return Excel::download(new TireExport, 'request-tire-exim.xlsx');
    }

    public function customized_export()
    {
        return Excel::download(new CustomizedExport, 'customized-research-exim.xlsx');
    }

    public function syndicate_export()
    {
        return Excel::download(new SyndicateExport, 'syndicate-research-exim.xlsx');
    }

    public function consulting_export()
    {
        return Excel::download(new ConsultingExport, 'consulting-research-exim.xlsx');
    }

    public function full_export()
    {
        return Excel::download(new FullExport, 'fulltime-analyst-exim.xlsx');
    }

    public function infographics_enq_export()
    {
        return Excel::download(new Infographic2Export, 'infographics-query-exim.xlsx');
    }

    public function search_export()
    {
        return Excel::download(new SearchExport, 'search-query-exim.xlsx');
    }

    public function contactus_export()
    {
        return Excel::download(new ContactExport, 'contactus-list-exim.xlsx');
    }

    public function applicants_export()
    {
        return Excel::download(new ApplicantExport, 'career-applicant-exim.xlsx');
    }
    
    public function press_export(){
        return Excel::download(new PressReleaseExport, 'press-release-export.xlsx');
    }
    
    public function uploadReportImports(Request $request){
      $request->validate([
          'file' => 'required|mimes:xls,xlsx',
      ]);

      $file = $request->file('file');

      Excel::import(new ReportImport, $file);
 
      return redirect()->back()->with('success', 'Report Data uploaded successfully!');

    }

     # Region
    public function region()
    {   
        return view("admin.region");
    }

    public function save_region(Request $req)
    {
        $info = new Region();

        $info->page_url = $req->page_url;
        $info->region_name = $req->region_name;

         $info->save();
         $parent_id = $info->id;
                /** SeoContent */
        $seo_content = new Seo_Pages;
        
        $seo_content->parent_id     = $parent_id;
        $seo_content->seo_title     = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words;
        $seo_content->page_type     = 'region';
        $seo_content->save();

        return redirect()
            ->back()
            ->with("success", "Information saved successfully");
    }

    public function region_list()
    {
        $list = Region::orderBy("id", "DESC")->get();
        return view("admin.region_list", compact("list"));
    }

    public function edit_region(Request $req)
    {
        $data = Region::where("id", $req->id)->first();
         $seo_content = Seo_Pages::where('parent_id',request()->segment(4))->where('page_type','region')->first();
        return view("admin.edit_region", compact("data","seo_content"));
    }

    public function save_edit_region(Request $req)
    {
        $info = new Region();
        $id = request()->segment(4);

        $info->page_url = $req->page_url;
        $info->region_name = $req->region_name;
        $info = $info->toArray();

        $res = Region::where("id", $id)->update($info);
         $seo_content = new Seo_Pages;
      
        $seo_content->seo_title = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words;    

        $res2 = Seo_Pages::where('parent_id',$id)->where('page_type','region')->update($seo_content->toArray());
        return redirect()
            ->back()
            ->with("success", "Details updated successfully!");
    }

    public function delete_region(Request $req)
    {
        $delid = $req->rowId;
        $info = Region::where("id", $delid)->delete();
        echo "Record Deleted Successfully";
    }

    #Country Regionwise
    public function country()
    {   
        $region = Region::get();
        return view("admin.countries",compact('region'));
    }

    public function save_country(Request $req)
    {
        $info = new Country();

        $info->page_url = $req->country_url;
        $info->country_name = $req->country_name;
        $info->region_id = $req->region_id;

        $info->save();
         $parent_id = $info->id;
          $seo_content = new Seo_Pages;
        
        $seo_content->parent_id     = $parent_id;
        $seo_content->seo_title     = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words;
        $seo_content->page_type     = 'country';
        $seo_content->save();

        return redirect()
            ->back()
            ->with("success", "Country saved successfully");

    }
    
    public function country_list()
    {
        $list = Country::select(
            "country.*",
            "region.region_name"
        )
        ->join("region", "region.id", "=", "country.region_id")
        ->get();
        return view("admin.country_list", compact("list"));

        //$list = Country::orderBy("id", "DESC")->get();
        //return view("admin.country_list", compact("list"));
    }

    public function edit_country(Request $req)
    {
        $data = Country::where("id", $req->id)->first();
        $region = Region::get();
        $seo_content = Seo_Pages::where('parent_id',request()->segment(4))->where('page_type','country')->first();
        return view("admin.edit_country", compact("data","region","seo_content"));
    }

    public function save_edit_country(Request $req)
    {
        $info = new Country();
        $id = request()->segment(4);
        
        $info->page_url = $req->country_url;
        $info->country_name = $req->country_name;
        $info->region_id = $req->region_id;
        $info = $info->toArray();
        $res = Country::where("id", $id)->update($info);
        $seo_content = new Seo_Pages;
      
        $seo_content->seo_title = $req->seo_title;
        $seo_content->seo_description = $req->seo_description;
        $seo_content->seo_key_words = $req->seo_key_words;    

        $res2 = Seo_Pages::where('parent_id',$id)->where('page_type','country')->update($seo_content->toArray());
        return redirect()
            ->back()
            ->with("success", "Details updated successfully!");
    }

    public function delete_country(Request $req)
    {
        $delid = $req->rowId;
        $info = Country::where("id", $delid)->delete();
        echo "Record Deleted Successfully";
    }
  public function showCountry(Request $req)
    {
        $region_id = $req->region_id;
        $data = DB::table("country")
            ->where("region_id", $region_id)
            ->get();

        $re = "";
        $re .= "<option value=''>Country</option>";
        foreach ($data as $key => $st) {
            $re .=
                "<option value='" .
                $st->id .
                "'>" .
                $st->country_name .
                "</option>";
        }

        $res = "<select>";
        $res .= $re;
        $res .= "</select>";

        return $res;
    }

  public function delete_user(Request $req){
    $delid = $req->rowId;
    $info = User::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
  }


    public function upload(Request $request)
    {
  

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ckeditor_image'), $filename);

            $url = asset('uploads/ckeditor_image/' . $filename);

            return response()->json([
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => $url,
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'No file uploaded.'],
            
        ]);
    }


///City Module start from hee
      public function city()
    {   
        $region = Region::get();
        return view("admin.city",compact('region'));
    }

    public function save_city(Request $req)
    {
        $info = new City();

        $info->page_url = $req->city_url;
        $info->country_id = $req->country_id;
        $info->region_id = $req->region_id; 
         $info->city_name = $req->city_name;

        $info->save();

        return redirect()
            ->back()
            ->with("success", "City saved successfully");

    }
    
  public function city_list()
{
    $list = City::select(
        "city.*",
        "region.region_name",
        "country.country_name"
    )
    ->join("region", "region.id", "=", "city.region_id")
    ->join("country", "country.id", "=", "city.country_id")
    ->get();
    return view("admin.city_list", compact("list"));

    //$list = Country::orderBy("id", "DESC")->get();
    //return view("admin.country_list", compact("list"));
}

    public function edit_city(Request $req)
    {
        $data = City::where("id", $req->id)->first();
        $region = Region::get();
         $country = Country::get();
        return view("admin.edit_city", compact("data","region",'country'));
    }

    public function save_edit_city(Request $req)
    {
        $info = new City();
        $id = request()->segment(4);
        
        $info->page_url = $req->page_url;
        $info->country_id = $req->country_id;
        $info->region_id = $req->region_id;
         $info->city_name = $req->city_name;
        

        $info = $info->toArray();

        $res = City::where("id", $id)->update($info);
        return redirect()
            ->back()
            ->with("success", "Details updated successfully!");
    }

    public function delete_city(Request $req)
    {
        $delid = $req->rowId;
        $info = City::where("id", $delid)->delete();
        echo "Record Deleted Successfully";
    }
  public function showcity(Request $req)
    {
        $region_id = $req->region_id;
        $data = DB::table("country")
            ->where("region_id", $region_id)
            ->get();

        $re = "";
        $re .= "<option value=''>Country</option>";
        foreach ($data as $key => $st) {
            $re .=
                "<option value='" .
                $st->id .
                "'>" .
                $st->country_name .
                "</option>";
        }

        $res = "<select>";
        $res .= $re;
        $res .= "</select>";

        return $res;
    }


public function change_password(){
    return view("admin.change_password");

}

public function submitResetPasswordForm(Request $request)
{
    $request->validate([
        'password' => 'required',
       
    ]);

    // Check if the user is authenticated
    // if (!Auth::check()) {
    //     return redirect('/login')->with('error', 'You must be logged in to reset your password!');
    // }

    // Get the authenticated user
    $user = Auth::user();

    // Update the user's password
    $user->password = Hash::make($request->password);
    $user->save();

   return redirect()
            ->back()
            ->with("success", "Your password has been changed!");
}
}






  

