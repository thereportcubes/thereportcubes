<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use DB;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Report;
use App\Models\Press;
use App\Models\Infographic;
use App\Models\Category;

class XmlController extends Controller
{   
    public function sitemap(){
        $categorys = Category::get();        
        return response()->view('sitemap',compact('categorys'))->header('Content-Type', 'text/xml');
    }

    public function xml_press_release(){
        $items = Press::orderBy('id','DESC')->get();
        return response()->view("xml.press-release",compact('items'))->header('Content-Type', 'text/xml');  
    }

    public function xml_infographics(){
        $infographics = Infographic::orderBy('id','DESC')->get();
        return response()->view("xml.infographics",compact('infographics'))->header('Content-Type', 'text/xml'); 
    }

    public function xml_blogs(){
        $blog = Blog::orderBy('id','DESC')->get();
        return response()->view("xml.blogs",compact('blog'))->header('Content-Type', 'text/xml'); 
    }

    public function xml_others(){
        return response()->view("xml.others")->header('Content-Type', 'text/xml'); 
    }

}
