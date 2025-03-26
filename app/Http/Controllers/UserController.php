<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\User;
use App\Models\Seo_Pages;
use App\Models\Blog;
use App\Models\Report;
use App\Models\Infographic;
use App\Models\Press;
use App\Models\Sub_Category;
use App\Models\Category;
use App\Models\Inquiry;
use Response;
use Auth;
use PDF;
use DB;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Export\InfographicExport;
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
use Image;
use App\Import\ReportImport;
use App\Models\My_Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function checkRole(){
        //echo Auth::User()->role;
       if( Auth::User()->role == "admin"){
            Auth::logout();
            return redirect('/admin/login');
        } 
    }
	
  public function dash_index(){
        $this->checkRole();
        $user_id = Auth::User()->id;
        if( Auth::User()->role == "user"){
            $orders = My_Order::where('user_id', $user_id)->get();
            $inquiries = Inquiry::where('user_id', $user_id)->get();
            $users = User::where('id', $user_id)->first();
            $categories = DB::table('category')
            ->select('category.id','category.cat_name','sub_category.sub_cat_name')
            ->join('sub_category','sub_category.cat_id','=','category.id')
            ->orderBy('category.cat_name', 'ASC')
            ->get();
            return view('user.user_dashboard', compact('orders', 'users', 'inquiries', 'categories'));
        } else {
            return view('user.dashboard');
       }
  }
    
  public function logout(Request $req) {
        $role = Auth::User()->role;
        Auth::logout();
        if($role =='user'){
            return redirect('/signin');
        } else {
            return redirect('/admin/login');
        }
  }

  /** Market Advisor new functions */

  public function infographic(){
      $this->checkRole();
    return view('user.infographic');
  }

  public function save_infographic(Request $req){

        $info = new Infographic;
        
        $status = 0;
        $imageName = "";
        
        if(isset($req->active_inactive)){
          $status = 1;
        }
        
        // if(isset($req->infographic_img))
        // {
        //   $image = $req->infographic_img;
        //   //$imageName = time().'.'.$req->infographic_img->extension();  
        //   $imageName = time().'.webp';           

        //   $img = Image::make($image->path());
          
        //   $destinationPathThumbnail = public_path('/uploads/infographic');

        //   $img->resize(300, 200, function ($constraint) {
        //     $constraint->aspectRatio();
        //   })->encode('webp')->save($destinationPathThumbnail.'/'.$imageName );
          
        // }
        
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
        $info->image              = $imageName;
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
        $this->checkRole();
        $list = Infographic::get();
        return view('user.all-infographic',compact('list'));
    }

 

  public function edit_infographic($id){
      $this->checkRole();
      $list = Infographic::where('id',$id)->first();
      return view('user.edit_infographic',compact('list'));
  }

 public function save_edit_infographic(Request $req){
      
      $info = new Infographic;
      
      $id = request()->segment(3);
      $status = 0;
      $imageName = "";
      //$imageName = $req->infographic_img_H;
     
      if(isset($req->active_inactive)){
        $status = 1;
      }
     
    //   if(isset($req->infographic_img)){
    //     $imageName = time().'.'.$req->infographic_img->extension();  
    //     $req->infographic_img->move(public_path('uploads/infographic/'), $imageName); 
    //   }

      $info->title              = $req->title;
      //$info->image              = $imageName;
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

    /** BLOG */

  public function blog_form(){
      $this->checkRole();
    return view('user.add_blog');
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
      $this->checkRole();
    $list = Blog::get();
    return view('user.all-blogs',compact('list'));
  }
  public function edit_blog($id){
      $this->checkRole();
    $list = Blog::where('id',$id)->first();
    return view('user.edit_blog',compact('list'));
  }

  public function save_edit_blog(Request $req){
      
    $blog = new Blog;
    $id = request()->segment(3);

    $status = 0;     
    if(isset($req->active_inactive)){
      $status = 1;
    }        
    
    $blog->title              = $req->title;
    $blog->description        = $req->descr;
    //$blog->post_date          = $req->infographic_post_date;
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

  /* REPORT UPLOAD */

public function save_report(Request $req){
    $report = new Report;

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
        $info->img_alt_tag        = $req->title;
        $info->status             = '0';
        $info->infographic_order  = '1';
        $info->report_link        = $page_url;
        $info->slug               = $page_url;
        $info->created_at         = date('Y-m-d');
        $info->seo_title          = $req->seo_title;
        $info->seo_keyword        = $req->seo_key_words;
        $info->seo_description    = $req->seo_description;
        $info->img_alt_tag        = $req->seo_title;
        
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
      $report->infographic                = $infographic_id;
      $report->table_of_content           = $req->table_of_content;
      $report->segmentaion                = 'uploads/report_image/segment_image/'.$segment_img;
      $report->custom_report_price        = $req->group_user_license_2;
      $report->report_post_date           = $req->report_post_date;
      $report->active_inactive            = $active_inactive;
      $report->upcomingstatus             = $upcomingstatus;
      $report->special_single_licence_price = $req->special_single_licence_price;
      $report->special_multi_user_price   = $req->special_multi_user_price;
      $report->special_custom_report_price =  $req->special_custom_report_price;
      $report->segmentation_alt_tag       = $req->segmentation_alt_tag;
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
  public function report_upload_form(){
      $this->checkRole();
    $category = Category::get();
    return view('user.report_upload',compact('category'));
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
        
      $imageName1 = time().'r.'.$req->infographic_img->extension();  
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
            $info->img_alt_tag        = $req->title;
            $info->status             = '0';
            $info->infographic_order  = '1';
            $info->report_link        = $req->page_url;
            $info->slug               = $req->page_url;
            $info->created_at         = date('Y-m-d');
            $info->seo_title          = $req->seo_title;
            $info->seo_keyword        = $req->seo_key_words;
            $info->seo_description    = $req->seo_description;
            $info->img_alt_tag        = $req->seo_title;
            
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
      $report->segmentaion                = $segment_img;
      $report->custom_report_price        = $req->group_user_license_2;
      $report->report_post_date           = $req->report_post_date;
      $report->active_inactive            = $active_inactive;
      $report->upcomingstatus             = $upcomingstatus;
      $report->special_single_licence_price = $req->special_single_licence_price;
      $report->special_multi_user_price   = $req->special_multi_user_price;
      $report->special_custom_report_price =  $req->special_custom_report_price;
      $report->segmentation_alt_tag       = $req->segmentation_alt_tag;
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


public function  delete_infographic(Request $req){
      
    $delid = $req->rowId;
    $info = Infographic::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
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
    
      return view('user.all-reports',compact('list'));
    }
    
    public function report_list(){
        $list = Report::select('title','report_code','report_post_date','id')
                    ->orderBy('id','desc')
                    ->get();
    
        return view('user.all-reports',compact('list'));
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
    
      return view('user.all-blogs',compact('list'));
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
    
      return view('user.all-infographic',compact('list'));
    }

  public function edit_report($id){
    $category = Category::get();
    $list = Report::where('id',$id)->first();
    $sub_category = Sub_Category::where('cat_id',$list->cat_id)->get();
    //$faqs = DB::table('report_faqs')->where('report_id',$id)->get();
    $seo_content = Seo_Pages::where('parent_id',$id)->where('page_type','report')->limit(1)->orderBy('id','DESC')->first();
    //print_r($faqs); die;
    $infographic_data =[];
     if($list->infographic > 0){
            $infographic_data = Infographic::where('id',$list->infographic)->first();
        }
    return view('user.edit_report',compact('list','category','sub_category','seo_content', 'infographic_data'));
  }


 

  public function delete_report(Request $req){
    $delid = $req->rowId;
    $info = Report::where('id',$delid)->delete();
    echo "Record Deleted Successfully";
  }

  public function press_release(){
      $this->checkRole();
    return view('user.add_press');
  }

  public function press_release_list(){
      $this->checkRole();
    $list = Press::orderBy('id','desc')->get();
    return view('user.press_release_list',compact('list'));
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
  
    return view('user.press_release_list',compact('list'));
  }

  public function save_press_release(Request $req){

      $info = new Press;
      
      $info->heading            = $req->heading;        
      $info->post_date          = $req->post_date;
      $info->description        = $req->description;
      $info->description2       = $req->description2;
      $info->press_release_url  = $req->press_release_url;
      $info->button_refrence    = $req->report_url;
              
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
      $this->checkRole();
    $list = Press::where('id',$id)->first();
    $seo_content = Seo_Pages::where('parent_id',$id)->where('page_type','press_release')->first();
    return view('user.edit_press_release',compact('list','seo_content'));
  }


  public function save_edit_press_release(Request $req){
      
    $info = new Press;
    $id = request()->segment(3);    

    $info->heading            = $req->heading;   
    $info->post_date          = $req->post_date;
    $info->description        = $req->description;
    $info->description2       = $req->description2;
    $info->press_release_url  = $req->press_release_url;
    $info->button_refrence    = $req->report_url;

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


  public function profile($id){
    $user = User::select('*')->where('id',$id)->first();
    return view('user.user-profile',compact('user'));
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

      return redirect()->back()->with('success', 'User details updated successfully!');
    
  }

    
  public function fileExport() 
  {
      return Excel::download(new InfographicExport, 'infographic-collection.xlsx');
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
  
    public function uploadReportImports(Request $request){
      $request->validate([
          'file' => 'required|mimes:xls,xlsx',
      ]);

      $file = $request->file('file');

      Excel::import(new ReportImport, $file);
 
      return redirect()->back()->with('success', 'Report Data uploaded successfully!');

    }
    
    public function change_passwprd(Request $request){
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return response()->json([
            "status" => true,
            "msg" => 'password changed successfully'
        ]);
        /*$request->validate([
        'current_password' =>'required',
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
      $id = Auth::id();
      $users = User::where('id', $id)->first();
      echo $users->password.'===='. $request->current_password;die;
      if (Hash::make($request->current_password) != $users->password) {
        return response()->json([
            "status" => false, 
            "msg" => 'Invalid current Password'
        ]);
      } else {
        User::where('id', $id)->update(['password' => Hash::make($request->password)]);
        return response()->json([
            "status" => true,
            "msg" => 'password changed successfully'
        ]);
      } */
    }
    
    public function update_user_info(Request $request) {
         $data =  $request->except(['_token']);
         $id = Auth::id();
         if(!empty($data['billing_name'])){
            $nameArr = explode(' ', trim($data['billing_name']));
            $data['first_name'] = $nameArr[0];
            $data['last_name'] = $nameArr[1]??'';
            unset($data['billing_name']);
         }
         User::where('id','=',$id)->update($data);
         return response()->json([
            "status" => true,
            "msg" => 'User info updated successfully'
        ]);

    }
    public function save_inquiry(Request $request) {
        $request->validate(['question' =>'required']);
        $data =  $request->except(['_token']);
        if($data['id']>0){
           Inquiry::where('id','=',$data['id'])->update($data); 
        } else {
            $info = new Inquiry();
            $info->question = $data['question'];
            $info->user_id = Auth::id();
            $info->created_at = date('Y-m-d H:i:s');
            $info->modified = date('Y-m-d H:i:s');
            $info->user_id = Auth::id();
            $info->save();
        }
        return response()->json([
            "status" => true,
            "msg" => 'Inquiry sent successfully'
        ]);
    }
    public function del_inquiry(Request $request){
        $data =  $request->except(['_token']);
        $obj = Inquiry::find($data['id']);
        $obj->delete();
         return response()->json([
            "status" => true,
            "msg" => 'Inquiry deleted successfully'
        ]);
    }
    
}
