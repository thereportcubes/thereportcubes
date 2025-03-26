<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
  

    public function add_banner(Request $request)
    {
        $banner = new Banner;
        $banner->title = $request->input('title');
        $banner->image = $request->input('image');
        $banner->save();

        return response()->json($banner, 201);
    }

    
}

