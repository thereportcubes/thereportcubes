<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use DB;
use App\Models\Report;
use App\Models\Press;

class SearchController extends Controller
{   
    public function autocomplete(Request $request)
    {
        $data = User::select("name")
                    ->where('name', 'LIKE', '%'. $request->get('query'). '%')
                    ->get();
     
        return response()->json($data);
    }

    public function report_search(Request $request){
        /*
        $data = Report::select("*")
        ->where('title', 'LIKE', '%'. $request->get('search'). '%')
        ->get();

        $url = url('research-library'); 

        $res = [];
        $res = "<ul id='search_data'>";
        foreach($data as $val){
            $res .= '<a href="'.$url.'/'.$val->id.'"><li>'.$val->title.'</li></a>';
        }
        $res .= "</ul>";
        
        echo $res;

        */
         
        /*
        $query1 = DB::table('reports')
                ->select('id', 'title')
                ->where('title', 'LIKE', '%'. $request->get('search'). '%');

            // Query for table2
        $query2 = DB::table('press_release')
                ->select('id','heading')
                ->where('heading', 'LIKE', '%'. $request->get('search'). '%');

        $results = $query1->union($query2)->get();
       
        $res = [];
        $url = url('research-library'); 
        foreach($results as $key=>$val){
            $res .= '<a href="#"><li>aa</li></a>';
        }
        $res .= "</ul>";
        
        echo $res;
        */
        $res = [];
        $res = "<ul id='search_data'>";

        $resultsA = Report::select("reports.id","reports.title","reports.page_url")
                        ->where('title', 'LIKE', '%'. $request->get('search'). '%')
                        ->orWhere('report_code', 'LIKE', '%'. $request->get('search'). '%')
                        ->where('active_inactive','1')
                        ->get();

        if($resultsA != ''){
            $url = url('report-store/'); 
            $combinedResults = $resultsA;
            foreach($combinedResults as $val){
                $res .= '<a href="'.$url.'/'.$val->page_url.'"><li>'.$val->title.'</li></a>';
            }
            
        }

        $resultsB = Press::select("press_release.heading as title","press_release.press_release_url as page_url")
                        ->where('heading', 'LIKE', '%'. $request->get('search'). '%')
                        ->get();
        
        if($resultsB != ''){
            $url = url('press-release/');
            $combinedResults = $resultsB;
            foreach($combinedResults as $val){
                $res .= '<a href="'.$url.'/'.$val->page_url.'"><li>'.$val->title.'</li></a>';
            }
            
        }

        
        // $res = "<ul id='search_data'>";
        // foreach($combinedResults as $val){
        //     $res .= '<a href="'.$url.'/'.$val->page_url.'"><li>'.$val->title.'</li></a>';
        // }
        $res .= "</ul>";
        
        echo $res;
    }

    public function search_notfound(Request $request){
        
        $search_keyword = $request->search_form;
        
        $resultsA = [];
        $resultsB = [];
        
        $resultsA = Report::select("reports.id","reports.title","reports.page_url","reports.decription","reports.no_of_page")
                        ->where('title', 'LIKE', '%'. $search_keyword. '%')
                        ->orWhere('report_code', 'LIKE', '%'. $search_keyword. '%')
                        ->where('active_inactive','1')
                        ->orderBy('id','desc')
                        ->get();
                        
        $resultsB = Press::select("press_release.heading as title","press_release.press_release_url as page_url", "press_release.description")
                        ->where('heading', 'LIKE', '%'. $search_keyword. '%')
                        ->orderBy('id','desc')
                        ->get();
        
        
        if(count($resultsA) > 0){
            return view('search_all_data',compact('search_keyword','resultsA','resultsB'));
        }
        else if(count($resultsB) > 0){
            return view('search_all_data',compact('search_keyword','resultsA','resultsB'));
        }
        else{
            return view('search_query',compact('search_keyword'));
        }
    }
}
