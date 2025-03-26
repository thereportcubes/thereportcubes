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
use App\Mail\SendMail;
use App\Models\Trade_portfolio;
use App\Models\Users_Company_Share_Ledger;
use Auth;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Fund;
use App\Models\Bank_Detail;



class AuthController extends Controller
{
    // Registration API 
    public function register(Request $request)
    {
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
            /** Token update */
            $generated_token = $user->createToken('Api Token')->plainTextToken;
            User::where('id',$user->id)->update(['remember_token' => $generated_token] );
            /** MAIL */
            $testMailData = [
                'title' => 'Registration email verification link below',
                'body' => 'This is the Registration email verification. For email varification <a href="https://tyche.dipanshutech.co.in/api/email-varification/'.$user->id.'">Click here</a>',

            ];

            Mail::to($request->email)->send(new SendMail($testMailData));
            
            $data = array(
                "Reg_image" => public_path('uploads/reg_image.png'),
                "Sussess_Msg"   => "TRegistration Successful, For email varification check your registered email.",
                'token' =>  $generated_token,
            );
            $response = [
                'STATUS'    => 'Success',
                'MESSAGE'   => 'Registration successful',
                'STATUS_CODE'=> '200',
                'DATA'      => $data
            ];
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Registration Failed, try again',
                'STATUS_CODE'=> '400'
            ];
        }      
        return response()->json($response, 400);
    }

    //Email Verifications
    public function email_varification(Request $request){
        $id = $request->id;

        $upd = User::where('id',$id)->update(['email_verified_at' => '1']);
        if($upd){
            $response = [
                'success' => true,
                'message' => 'Email Verification Successfully.',
            ];
            return response()->json($response,200); 
        }

    }

    // Login API
    public function login(Request $request)
    { 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 

            $generated_token = $user->createToken('Api Token')->plainTextToken;            
            User::where('id',$user->id)->update(['remember_token' => $generated_token] );

            $data['token'] =  $generated_token;
            
            $response = [
                'STATUS' => 'Success',
                'DATA' => $data,
                'MESSAGE' => 'User Login successfully',
                'STATUS_CODE'=> '200',
            ];
            return response()->json($response,200); 
        } 
        else{ 
            $response = [
                'STATUS' => 'Failed',
                'MESSAGE' => 'Invalid User',
                'STATUS_CODE'=> '400',
            ];
            return response()->json($response);
        } 
    }

    ## Profile API
    public function profile(Request $req)
    {
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){

            $id = $user->id;
            $users = User::where('id',$id)->get();
            $data['DATA'] = $users;

            $response = [
                'STATUS' => 'Success',
                'MESSAGE' => 'User Profile successfully',
                'STATUS_CODE'=> '200',
                'DATA'  => $data
            ];
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Invalid user',
                'STATUS_CODE'=> '400'
            ];
        }
        return response()->json($response,200);
    }

    ## Update Profile API
    public function update_profile(Request $request)
    {
        $user=User::select("id")->where('remember_token',$request->token)->first();
        
        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        
        if(isset($request->name)){
            $name = $request->name;
        }
        if(isset($request->email)){
            $email = $request->email;
        }
        if(isset($request->phone)){
            $phone = $request->phone;
        }
        if(isset($request->address)){
            $address = $request->address;
        }

                
        if(!empty($user)){

            $id = $user->id;
            $updateArray = [
                "name"             => $name,         
                "email"            => $email,
                "phone"            =>$phone,
                "address"          =>$address
            ];
            $users = User::where('id',$id)->update($updateArray);
            
            $response = [
                'STATUS' => 'Success',
                'MESSAGE' => 'User Profile updated successfully',
                'STATUS_CODE'=> '200',
            ];
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Invalid user',
                'STATUS_CODE'=> '400'
            ];
        }
        
        return response()->json($response,200);

    }

    ## Forget Password API
    public function forget_pass(Request $request)
    {
        $email =  $request->email;
        $users = User::where('email',$email)->first();
		
        $n = 6; 
        $characters = '123456789';
        $randomString = '';
    
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

		/* save otp in database */
        $otpInsert = User::where('email',$email)->update(['forget_pass_otp'=>$randomString]);

        if(!empty($users)){
            $testMailData = [
                'title' => 'Forget Password email verification link below',
                'body' => 'Dear, The OTP to reset your Tyche-App account password is '.$randomString.' Valid for the next 20 minutes only.',

            ];
            Mail::to($request->email)->send(new SendMail($testMailData));

            $response = [
                'STATUS'    => 'Success',
                'MESSAGE'   => 'Forget Password OTP sent to Registrered Email.',
                'STATUS_CODE'=> '200'
            ];
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Email is wrong, try again',
                'STATUS_CODE'=> '400'
            ];
        }
        return response()->json($response,200);
    }

    //Forget password new
    public function forget_password_new(Request $request)
    {
        $otp = $request->otp;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        if(!isset($otp)){
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'OTP can`t empty.',
                'STATUS_CODE'=> '400'
            ];

            return response()->json($response,200);
        }

        if(!isset($new_password)){
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'New Password can`t empty.',
                'STATUS_CODE'=> '400'
            ];

            return response()->json($response,200);
        }

        if(!isset($confirm_password)){
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Confirm Password can`t empty.',
                'STATUS_CODE'=> '400'
            ];

            return response()->json($response,200);
        }

        /* Match OTP first */
        $userDetail = User::where('forget_pass_otp',$otp)->first();
        if($userDetail != '')
        {
            /** get user details and generate new token and update token */
            $userNewToken = $userDetail->createToken('Api Token')->plainTextToken;
            
            $updateToken = User::where('id',$userDetail->id)->update(['remember_token' => $userNewToken]);

            if($updateToken){                

                if($new_password == $confirm_password){
                    
                      $hash_pass = Hash::make($new_password);
                   
                     $upd = User::where('id',$userDetail->id)->update(
                            [
                                'password'=>$hash_pass,
                                'otp_status'=>1
                        ]);  

                    if($upd){
                        $data = [
                            'token' => $userNewToken
                        ];

                        $response = [
                            'STATUS'    => 'Success',
                            'MESSAGE'   => 'New Password update successfully.',
                            'DATA'      => $data,
                            'STATUS_CODE'=> '200'
                        ];
                    }
                    else{
                        $response = [
                            'STATUS'    => 'Failed',
                            'MESSAGE'   => 'New Password not set, try again.',
                            'STATUS_CODE'=> '400'
                        ];
                    }
                }
            }
           
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'OTP not match.',
                'STATUS_CODE'=> '400'
            ];
        }
        
        return response()->json($response,200);
    }
	
	// Reset Password
    public function reset_password(Request $request)
    {
        $token = $request->token;
        $old = $request->password;
        $newP = $request->new_password;
        $cPass = $request->c_password; 

        $udetail = User::where('remember_token',$token)->first();
        
        if(!empty($udetail)){  
            $user_pass = $udetail['password'];
            if(Hash::check($old, $user_pass)){
            
                if($newP == $cPass){
                    $upd = array(
                        "password" => Hash::make($newP)
                    );

                    $update = User::where('id',$udetail->id)->update($upd);
                    if($update){
                        $response = [
                            'STATUS'    => 'Success',
                            'MESSAGE'   => 'Password Updated Successfully.',
                            'STATUS_CODE'=> '200'
                        ];
                    }
                    else{
                        $response = [
                            'STATUS'    => 'Failed',
                            'MESSAGE'   => 'Something is Wrong, try again.',
                            'STATUS_CODE'=> '400'
                        ];
                    }
                }
                else{
                    $response = [
                        'STATUS'    => 'Failed',
                        'MESSAGE'   => 'New Password and confirm PAssword not match.',
                        'STATUS_CODE'=> '400'
                    ];
                }

            
            }
            else{
                $response = [
                    'STATUS'    => 'Failed',
                    'MESSAGE'   => 'Wrong Old Password.',
                    'STATUS_CODE'=> '400'
                ];
            }
        }
        else{
            $response = [
                'STATUS'    => 'Failed',
                'MESSAGE'   => 'Invalid User.',
                'STATUS_CODE'=> '400'
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
        $banner->image = $imageName;
        $banner->save();
        $response = [
            'success' => true,
            'message' => 'Banner add successfully'
        ];
        return response()->json($banner, 400);
    }

    public function show_banner(Request $request)
    {
        $b = array();
        $path = public_path('uploads/banner');
        $banners = Banner::select('title','image as imageName')->get();
        foreach($banners as $key=>$ban){
            $b[$key]['title'] = $ban['title'];
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



    /** INTZAR SAIFI*/

    public function trade_portfolio(Request $req){
        $trade = new Trade_portfolio; 

        if(isset($req->trade_company_icon)){
            $iconName = time().'.'.$req->trade_company_icon->extension();  
            $req->trade_company_icon->move(public_path('uploads/trade_icon/'), $iconName); 
        }

        $trade->trade_company_name = $req->trade_company_name;
        $trade->trade_company_icon = $iconName;
        $trade->company_current_value = $req->company_current_value;
        $trade->trade_currency_type = $req->trade_currency_type;

        $trade->save();
        $response = [
            'STATUS' => "success",
            'MESSAGE' => 'Trage Portfolio added successfully',
            'STATUS_CODE'   => 200
        ];
        return response()->json($response, 400);

    }

    public function all_trade_portfolio(){
        $data = Trade_portfolio::select("*")->get();
        //$data['trade_icon_path'] = public_path('uploads/trade_icon');
        $response = [
            'STATUS' => "success",
            'MESSAGE' => 'Trade Portfolio list',
            'STATUS_CODE'   => 200,
            'DATA'  => $data
        ];
        return response()->json($response, 400);
    }

    public function trade_portfolio_search(Request $req){
        $search = $req->trade_company_name;
        $data = Trade_portfolio::select("*")
                                ->where('trade_company_name','LIKE', '%'.$search.'%')
                                ->get();
        $response = [
            'STATUS' => "success",
            'MESSAGE' => 'Trage Portfolio Search Completed.',
            'STATUS_CODE'   => 200,
            'DATA'  => $data
        ];

        return response()->json($response, 400);
    }


    public function company_share_buy(Request $req){
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $user_id = $user->id;

            /** Get Company Current Trade Value */
            $company_current_val = Trade_portfolio::select('*')
                                ->where('id',$req->company_id)
                                ->first();
            
            $user_opening_bal = User::select('opening_balance')
                                ->where('id',$user_id)
                                ->first();
            
            $user_opening_balance = $user_opening_bal->opening_balance; 
            $total_share_cost = ( $company_current_val->company_current_value * ( $req->no_of_share) ); 
        
            if( $total_share_cost <= $user_opening_balance ){

                $user_closing_balance = $user_opening_balance - $total_share_cost;

                $share_ledger = new Users_Company_Share_Ledger;

                $share_ledger->user_id = $user_id;
                $share_ledger->company_id = $req->company_id;
                $share_ledger->compnay_current_value = $company_current_val->company_current_value;
                $share_ledger->company_share_action = $req->company_share_action;
                $share_ledger->no_of_share = $req->no_of_share;
                $share_ledger->opening_balance = $user_opening_balance;
                $share_ledger->withdrawal = $total_share_cost;
                $share_ledger->deposit = 0;
                $share_ledger->closing_balance = $user_closing_balance;

                $share_ledger->save();

                /** Update User Balance*/

                $upd = User::where('id',$user_id)
                                ->update(['opening_balance'=>$user_closing_balance]);

                $response = [
                    'STATUS' => "success",
                    'MESSAGE' => 'Company Share Buy Successfully',
                    'STATUS_CODE'   => 200
                ];
            }
            else{
                $response = [
                    'STATUS' => "Failed",
                    'MESSAGE' => 'User`s Insufficient Balance.',
                    'STATUS_CODE'   => 200
                ];
            }
        }
        else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
            ];
        }
        return response()->json($response, 400);

    }

    public function company_share_sell(Request $req){
        
        /** Get Company Current Trade Value */
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $user_id = $user->id;
            $company_current_val = Trade_portfolio::select('*')
                                ->where('id',$req->company_id)
                                ->first();
            
            $user_opening_bal = User::select('opening_balance')
                                ->where('id',$user_id)
                                ->first();
            
            $user_opening_balance = $user_opening_bal->opening_balance; 
            $total_share_cost = ( $company_current_val->company_current_value * ( $req->no_of_share) ); 
        
            if( $total_share_cost >0  ){

                $user_closing_balance = $user_opening_balance + $total_share_cost;

                $share_ledger = new Users_Company_Share_Ledger;

                $share_ledger->user_id = $user_id;
                $share_ledger->company_id = $req->company_id;
                $share_ledger->compnay_current_value = $company_current_val->company_current_value;
                $share_ledger->company_share_action = $req->company_share_action;
                $share_ledger->no_of_share = $req->no_of_share;
                $share_ledger->opening_balance = $user_opening_balance;
                $share_ledger->withdrawal = 0;
                $share_ledger->deposit = $total_share_cost;
                $share_ledger->closing_balance = $user_closing_balance;

                $share_ledger->save();

                /** Update User Balance*/

                $upd = User::where('id',$user_id)
                                ->update(['opening_balance'=>$user_closing_balance]);

                $response = [
                    'STATUS' => "success",
                    'MESSAGE' => 'Company Share Sell Successfully',
                    'STATUS_CODE'   => 200
                ];
            }
            else{
                $response = [
                    'STATUS' => "Failed",
                    'MESSAGE' => 'Insufficient Share Value.',
                    'STATUS_CODE'   => 200
                ];
            }
        }
        else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
            ];
        }
        return response()->json($response, 400);

    }

    public function user_shares_ledger(){
        $data = Users_Company_Share_Ledger::select('users_company_share_ledger.compnay_current_value','users_company_share_ledger.company_share_action', 'users_company_share_ledger.no_of_share', 'users_company_share_ledger.opening_balance', 'users_company_share_ledger.withdrawal', 'users_company_share_ledger.deposit', 'users_company_share_ledger.closing_balance', 'users.name', 'trade_portfolio.trade_company_name')
                                            ->LeftJoin('users','users.id','=','users_company_share_ledger.user_id')
                                            ->LeftJoin('trade_portfolio','trade_portfolio.id','=','users_company_share_ledger.company_id')
                                            ->orderBy('users_company_share_ledger.id','desc')
                                            ->get();
        $response = [
            'STATUS' => "Success",
            'MESSAGE' => 'Users Company Share Ledgers.',
            'STATUS_CODE'   => 200,
            'DATA'  => $data
        ];

        return response()->json($response, 400);
    }

    public function companywise_user_share_ledger(Request $req){

        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $company_id = $req->company_id;

            $data = Users_Company_Share_Ledger::select('users_company_share_ledger.compnay_current_value','users_company_share_ledger.company_share_action', 'users_company_share_ledger.no_of_share', 'users_company_share_ledger.opening_balance', 'users_company_share_ledger.withdrawal', 'users_company_share_ledger.deposit', 'users_company_share_ledger.closing_balance', 'users.name', 'trade_portfolio.trade_company_name')
                                                ->LeftJoin('users','users.id','=','users_company_share_ledger.user_id')
                                                ->LeftJoin('trade_portfolio','trade_portfolio.id','=','users_company_share_ledger.company_id')
                                                ->where('users_company_share_ledger.company_id',$company_id)
                                                ->orderBy('users_company_share_ledger.id','desc')                                            
                                                ->get();
            $response = [
                'STATUS' => "Success",
                'MESSAGE' => 'Users Companywise Share Ledgers.',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
        }
        else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ];
        }
    
        return response()->json($response, 400);
    }

    public function shares_graph(Request $req){

        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $company_id = $req->company_id;
            $data = Users_Company_Share_Ledger::select('users_company_share_ledger.compnay_current_value','users_company_share_ledger.company_share_action', 'users_company_share_ledger.no_of_share', 'users_company_share_ledger.opening_balance', 'users_company_share_ledger.withdrawal', 'users_company_share_ledger.deposit', 'users_company_share_ledger.closing_balance', 'users.name', 'trade_portfolio.trade_company_name')
                                                ->LeftJoin('users','users.id','=','users_company_share_ledger.user_id')
                                                ->LeftJoin('trade_portfolio','trade_portfolio.id','=','users_company_share_ledger.company_id')
                                                ->orderBy('users_company_share_ledger.id','desc')                                            
                                                ->get();
            $response = [
                'STATUS' => "Success",
                'MESSAGE' => 'User`s Shares Ledger.',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
        }else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ];
        }

        return response()->json($response, 400);
    }



    public function companywise_shares_graph(Request $req){
        $data=[];
        $user=User::select("id")->where('remember_token',$req->token)->first();
       
        
        if(!empty($user)){
            $company_id = $req->company_id;
        
            $data = Users_Company_Share_Ledger::select('users_company_share_ledger.compnay_current_value','users_company_share_ledger.company_share_action', 'users_company_share_ledger.no_of_share', 'users_company_share_ledger.opening_balance', 'users_company_share_ledger.withdrawal', 'users_company_share_ledger.deposit', 'users_company_share_ledger.closing_balance', 'users.name', 'trade_portfolio.trade_company_name')
                                                ->LeftJoin('users','users.id','=','users_company_share_ledger.user_id')
                                                ->LeftJoin('trade_portfolio','trade_portfolio.id','=','users_company_share_ledger.company_id')
                                                ->where('users_company_share_ledger.company_id',$company_id)
                                                ->orderBy('users_company_share_ledger.id','desc')                                            
                                                ->get();
            $response = [
                'STATUS' => "Success",
                'MESSAGE' => 'Users Companywise Share Ledgers.',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
        }else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ];
        }

        return response()->json($response, 400);
    }
        
   

    public function user_dashboard(Request $req){
        $data=[];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $company_id = $req->company_id;
        
            $data = Users_Company_Share_Ledger::select('*')->where('user_id',$user->id)->get();
            $response = [
                'STATUS' => "Success",
                'MESSAGE' => 'Users Companywise Share Ledgers.',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
        }else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ];
        }

        return response()->json($response, 400);
    }


    public function token_watch_lst(){ }

    /** Abhishek Tomar*/

    public function saved_stocks_list(Request $req){
        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
           
            $data = Users_Company_Share_Ledger::select("*")->where('user_id',$user->id)->get();
           
            $response = [
                'STATUS' => "success",
                'MESSAGE' => 'All Company Share List Successfully',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
        }else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ]; 
        }

        

        return response()->json($response, 400);
    }


    public function all_transactions(Request $req){
        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $data = Users_Company_Share_Ledger::select("*")->where('user_id','=', $user->id)->get();
            $response = [
                'STATUS' => "success",
                'MESSAGE' => 'All Transactions List Successfully',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
            return response()->json($response, 200);      
        }else{    
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid Users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ]; 
            return response()->json($response, 400);
        }

    }

    public function datewise_transactions(Request $req){
        $startDate = $req->input('start_date');
        $endDate =   $req->input('end_date');
        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $data = Users_Company_Share_Ledger::select("*")->whereDate('created_at','>=',$startDate)->whereDate('created_at','<=',$endDate)->where('user_id','=', $user->id)->get();
            
            $response = [
                'STATUS' => "success",
                'MESSAGE' => 'All Datewise Transactions List Successfully',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
            return response()->json($response, 200);      
        }else{    
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid Users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ]; 
            return response()->json($response, 400);
        }

    }


    public function income_transactions(Request $req){
        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $data = Users_Company_Share_Ledger::select("*")->where([
                ['user_id','=', $user->id],
                ["company_share_action","=", "Sell"]
            ])->get();
            
            $response = [
                'STATUS' => "success",
                'MESSAGE' => 'All Income Transactions List Successfully',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
            return response()->json($response, 200);      
        }else{    
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid Users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ]; 
            return response()->json($response, 400);
        }

    }
        

    public function trade_balance(Request $req){

        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $data = User::select("opening_balance")->where('id','=', $user->id)->get();
            $response = [
                'STATUS' => "success",
                'MESSAGE' => 'Your Current Trade Balance',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
            return response()->json($response, 200);      
        }else{    
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid Users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ]; 
            return response()->json($response, 400);
        }

    }

    public function portfolio_statistics(Request $req){
        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first(); 
        
        if(!empty($user)){   

            $data = Trade_portfolio::get(); 
            $response = [
                'STATUS' => "success",
                'MESSAGE' => 'Portfolio Data Show Successfully',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
            return response()->json($response, 200); 
        }else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ]; 
            return response()->json($response, 400); 
        }

    }


 
    public function user_wallet_details(){}
	
    public function user_wallet_activity(Request $req){
        
        $user = "";
        $data = [];
        $user=User::select("id")->where('remember_token',$req->token)->first();
        
        if(!empty($user)){
            $data = User::select("*")->where('id','=', $user->id)->get();
            $response = [
                'STATUS' => "success",
                'MESSAGE' => 'Your Wallet Activity',
                'STATUS_CODE'   => 200,
                'DATA'  => $data
            ];
            return response()->json($response, 200);      
        }else{    
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid Users',
                'STATUS_CODE'   => 400,
                'DATA'  => $data
            ]; 
            return response()->json($response, 400);
        }

    }
	
    public function card_details(){ }
    
    public function card_settings(){ }
    
    public function send_money(Request $request){
        $account_number = $request->account_number;
        $amount = $request->amount;
        $password = $request->password;
        
        if(!isset($account_number)){
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Account Number can`t empty.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400); 
        }
        if(!isset($amount)){
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Amount can`t empty.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400); 
        }

        $user = User::select("id")->where('remember_token',$request->token)->first();

        if(!empty($user)){ 
            $user_id = $user->id;

            /** validate account number */
            $bank = Bank_Detail::where('user_id',$user_id)->first();

            if(!empty($bank) && $bank->account_number == $account_number){
                $response = [
                    'STATUS' => "Success",
                    'MESSAGE' => 'Payment In-Progress',
                    'STATUS_CODE'   => 200,
                ];
                return response()->json($response, 200); 
            }
            else{
                $response = [
                    'STATUS' => "Failed",
                    'MESSAGE' => 'Wrong Bank details.',
                    'STATUS_CODE'   => 400,
                ];
                return response()->json($response, 400);
            }
        }
        else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid User.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400);
        }

    }

    public function add_fund(Request $req) {
        $amount = $req->amount;
        if(!isset($amount)){
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Amount can`t empty.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400); 
        }
        
        $user = User::select("id")->where('remember_token',$req->token)->first();
        
        $length = 14;
        $str = '1234567890';
        $randomChar = substr(str_shuffle($str), 0, $length);
        $transaction_id = "F".$randomChar;

        $bank_details_id = 1 ;
        
        if(!empty($user)){ 

            $user_id = $user->id;

            $fund = new Fund;

            $fund->user_id = $user_id;
            $fund->amount = $amount;
            $fund->bank_details_id = $bank_details_id;
            $fund->payment_status = "PENDING";
            $fund->transaction_id = $transaction_id;
            $fund->transaction_date = date('Y-m-d');
            $fund->created_at = date('Y-m-d H:i:s'); 

            $fund->save();

            if($fund){
                $response = [
                    'STATUS' => "Success",
                    'MESSAGE' => 'Payment In-Progress.',
                    'STATUS_CODE'   => 200,
                ];
                return response()->json($response, 200);
            }
            else{
                $response = [
                    'STATUS' => "Failed",
                    'MESSAGE' => 'Something is wrong.',
                    'STATUS_CODE'   => 400,
                ];
                return response()->json($response, 400);
            }

        }
        else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid User.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400);
        }

        
    }


    public function add_bank(Request $req)
    {
        $bank_name = $req->bank_name;
        $account_number =  $req->account_number;
        $ifsc = $req->ifsc;
        $bank_holder =  $req->bank_holder;

        if(!isset($bank_name)){
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Bank Name can`t empty.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400); 
        }
        if(!isset($account_number)){
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Account Number can`t empty.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400); 
        }
        if(!isset($ifsc)){
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'IFSC Code can`t empty.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400); 
        }
        if(!isset($bank_holder)){
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Bank Holder Name can`t empty.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400); 
        }

        $user = User::select("id")->where('remember_token',$req->token)->first();

        if(!empty($user)){ 
            $user_id = $user->id;

            $bank = new Bank_Detail;
            
            $bank->bank_name = $bank_name;
            $bank->account_number = $account_number;
            $bank->ifsc = $ifsc;
            $bank->bank_holder = $bank_holder;
            $bank->user_id = $user_id;
            $bank->created_at = date('Y-m-d H:i:s');

            $bank->save();
            
            if($bank){
                $response = [
                    'STATUS' => "Success",
                    'MESSAGE' => 'Bank details Added Successfully.',
                    'STATUS_CODE'   => 200,
                ];
                return response()->json($response, 200);
            }
            else{
                $response = [
                    'STATUS' => "Failed",
                    'MESSAGE' => 'Something is wrong.',
                    'STATUS_CODE'   => 400,
                ];
                return response()->json($response, 400);
            }
        }
        else{
            $response = [
                'STATUS' => "Failed",
                'MESSAGE' => 'Invalid User.',
                'STATUS_CODE'   => 400,
            ];
            return response()->json($response, 400);
        }

    }



    public function mail_index()
    {
        $testMailData = [
            'title' => 'Test Email From AllPHPTricks.com',
            'body' => 'This is the body of test email.'
        ];

        Mail::to('tomarabh@gmail.com')->send(new SendMail($testMailData));

        echo 'Success! Email has been sent successfully.';
    }

}


