<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Banner;
use Auth;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    // Registration API 
    public function register(Request $request)
    {
        //echo"register-new";
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        /**Check Email is already exist or not */

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' =>'1'
        ]);
        if($user->id >0){
            $response = [
                'STATUS'    => 'Success',
                'MESSAGE'   => 'Registration successful',
                'STATUS_CODE'=> '200'
            ];
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Registration Failed, try again',
                'STATUS_CODE'=> '201'
            ];
        }      
        return response()->json($response, 201);
    }

    // Login API
    public function login(Request $request)
    { 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name]'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Login successfully'
            ];
            return response()->json($response,200); 
        } 
        else{ 
            $response = [
                'success' => false,
                'message' => 'Unauthorised users'
            ];
            return response()->json($response);
        } 
    }

    ## Profile API
    public function profile(Request $request)
    {
        $id = $request->id;
        $users = User::where('id',$id)->get();
        return response()->json(['array'=>$users]);
    }

    ## Update Profile API
    public function update_profile(Request $request)
    {
        $id = $request->id;
        $updateArray = [
            "name"             => $request->name,         
            "email"            => $request->email,
            "password"         => Hash::make($request->password),
            "phone"            =>$request->phone,
            "address"          =>$request->address
        ];
        $users = User::where('id',$id)->update($updateArray);
        
        $response = [
            'success' => true,
            'message' => 'User Profile updated successfully'
        ];

        return response()->json($response,200);

    }

    ## Forget Password API
    public function forget_pass(Request $request)
    {
        $email =  $request->email;
        $users = User::where('email',$email)->first();
        if(!empty($users)){
            $response = [
                'STATUS'    => 'Success',
                'MESSAGE'   => 'Verify Link sent to Registrered Emial.',
                'STATUS_CODE'=> '200'
            ];
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Email is wrong, try again',
                'STATUS_CODE'=> '201'
            ];
        }
        return response()->json($response,200);
    }

    public function reset_password(Request $request)
    {
        $uid = $request->user_id;
        $old = $request->password;
        $newP = $request->new_password;
        $cPass = $request->c_password; 

        $udetail = User::where('id',$uid)->first();
        $user_pass = $udetail['password'];

        if(Hash::check($old, $user_pass)){
            
            if($newP == $cPass){
                $upd = array(
                    "password" => Hash::make($newP)
                );

                $update = User::where('id',$uid)->update($upd);
                if($update){
                    $response = [
                        'STATUS'    => 'Success',
                        'MESSAGE'   => 'Password Updated Successfully.',
                        'STATUS_CODE'=> '201'
                    ];
                }
                else{
                    $response = [
                        'STATUS'    => 'Failed',
                        'MESSAGE'   => 'Something is Wrong, try again.',
                        'STATUS_CODE'=> '201'
                    ];
                }
            }
            else{
                $response = [
                    'STATUS'    => 'Failed',
                    'MESSAGE'   => 'New Password and confirm PAssword not match.',
                    'STATUS_CODE'=> '201'
                ];
            }

            
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Wrong Old Password.',
                'STATUS_CODE'=> '201'
            ];
        }
        return response()->json($response,200);
        
    }

    ## Banner API

    public function add_banner(Request $request)
    {
        $banner = new Banner;
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/banner/'), $imageName); 
        }
        $banner = new Banner;
        $banner->title = $request->input('title');
        $banner->sub_title = $request->input('sub_title');
        $banner->image = $imageName;
        $banner->save();
        $response = [
            'success' => true,
            'message' => 'Banner add successfully'
        ];
        return response()->json($banner, 201);
    }

    public function show_banner(Request $request)
    {
        $b = array();
        $b['logo'] = public_path('uploads/logo.png');
        $path = public_path('uploads/banner');
        $banners = Banner::select('title','sub_title','image as imageName')->get();
        foreach($banners as $key=>$ban){
            $b[$key]['title'] = $ban['title'];
            $b[$key]['sub_title'] = $ban['sub_title'];
            $b[$key]['image_path'] = $path.$ban['imageName'];
        }
        
        return response()->json($b);
    }

    public function Logout(){
        Session::flush();
        Auth::logout();
        $response = [
            'STATUS'    => 'Success',
            'MESSAGE'   => 'User Logout Successful.',
            'STATUS_CODE'=> '200'
        ];
        return response()->json($response);
    } 
}






