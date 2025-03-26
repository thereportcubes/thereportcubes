<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\employee;
use App\Models\User;
use App\Models\Key;
use App\Models\Link;
use App\Models\App;
use App\Models\Page;
use App\Models\Mail;
use App\Models\Sms;
use App\Models\Repcha;
use App\Models\Number;
use Response;
use Auth;
use Hash;
use Dompdf\Dompdf;

class AdminController extends Controller
{


  public function login_form(Request $req)
  {
      
     $req->validate([
      'email' =>'required',
      'password' =>'required'
     ]);

     $credentials = $req->only('email', 'password');

      if (Auth::attempt($credentials)) {
          $req->session()->regenerate();
          return redirect('admin/dashboard');
      }
        else
        {
          echo "<h1>Admin Login failed</h1>";
        }

   }

     public function logout(Request $req) {
     Auth::logout();
     return redirect('/admin/login');
    }

    public function register(){
        return view('register');
    }

    public function login(){
        return view('admin.login');
    }

    public function dash_index(){
      return view('admin.dashboard');
    }

    public function profile($id){
      $user = User::select('*')->where('id',$id)->first();
      return view('admin.admin-profile',compact('user'));
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

    /** Market Advisor new functions */

    public function infographic(){
      return view('admin.infographic');
    }

    public function press_release(){
      return view('admin.press_release');
    }




































    public function add_member()
    {
      return view('admin.add-member');
    }

    public function add_member_form(Request $req)
    {
      $users= new User;
        $users->name=$req->name;
        $users->phone=$req->phone;
        $users->email=$req->email;
        $users->address=$req->address;
        $users->gender=$req->gender;
        $users->dob=$req->dob;
        $users->city=$req->city;
        $users->state=$req->state;
        $users->password="";
        $users->role="member";
        $users->save();
       // return redirect('save_form');
        return redirect()->back()->with('success', 'You have successfully Added!');
    }

    public function all_member()
    {
      $list = User::select('*')
      ->where('role','member')->get();
      return view('admin.all-member',compact('list'));
    }

    public function edit_member($id)
    {
      $user = User::where('id',$id)->first();
      return view('admin.edit-member',compact('user','id'));
    }

    public function add_api_key(Request $req)
    {
        $user_id =  Auth::user()->id;
        $checkAlreadyRecord = Key::select('*')->where(
          [
            ['user_id',$user_id],
            [ "role", 'mapapi']
          ]
        )->first();   

        if($checkAlreadyRecord !=''){
            $updateArr = array(
              "api_key" => $req->api_key,
              "status" => '1',
            );
            $upd = Key::where('id',$checkAlreadyRecord->id)->update($updateArr);

            return redirect()->back()->with('success_map', 'Updated API Key');
        } 
        else{
          $keys= new Key;
            $keys->api_key = $req->api_key;
            $keys->status = '1';
            $keys->role = 'mapapi';
            $keys->user_id =$user_id;
            $keys->save();

        return redirect()->back()->with('success_map', 'You have successfully Added API Key');
        }
        
    }

    public function add_repcha_key(Request $req)
    {
      $user_id =  Auth::user()->id;
        $checkAlreadyRecord = Repcha::select('*')->where('user_id',$user_id)->first();   
        if($checkAlreadyRecord !=''){
            $updateArr = array(
              "site_key" => $req->site_key,
              "secret_key" => $req->secret_key,
            );
            $upd = Repcha::where('user_id',$user_id)->update($updateArr);
            return redirect()->back()->with('success_rep', 'Updated Repcha Keys');
        } 
        else{
          $Repchas= new Repcha;
            $Repchas->site_key = $req->site_key;
            $Repchas->secret_key = $req->secret_key;
            $Repchas->user_id = "7";
            $keys->save();

        return redirect()->back()->with('success_rep', 'You have successfully Added Repcha Key');
        }
    }

    public function add_whatsapp_number(Request $req)
    {
      $user_id =  Auth::user()->id;
        $checkAlreadyRecord = Number::select('*')->where('user_id',$user_id)->first();   
        if($checkAlreadyRecord !=''){
            $updateArr = array(
              "whatsapp_number" => $req->whatsapp_number,
              "skype_id" => $req->skype_id,
            );
            $upd = Number::where('user_id',$user_id)->update($updateArr);
            return redirect()->back()->with('success_wtsp', 'Updated Whatsapp Number and Skype ID');
        } 
        else{
          $numbers= new Number;
            $numbers->whatsapp_number = $req->whatsapp_number;
            $numbers->skype_id = $req->skype_id;
            $numbers->user_id = "7";
            $numbers->save();

        return redirect()->back()->with('success_wtsp', 'You have successfully Added Whatsapp Number and Skype ID');
        }
    }

    public function add_paypal_key(Request $req)
    {
        $user_id =  Auth::user()->id;
        $checkAlreadyRecord = Key::select('*')->where(
          [
            ['user_id',$user_id],
            [ "role", 'paypal']
          ]
        )->first();   

        if($checkAlreadyRecord !=''){
            $updateArr = array(
              "api_key" => $req->api_key,
              "status" => '1',              
              "client_id" => $req->client_id,
            );
            $upd = Key::where('id',$checkAlreadyRecord->id)->update($updateArr);
            return redirect()->back()->with('success_paypal', 'Updated Paypal API Key');
        } 
        else{
        $keys= new Key;
        $keys->api_key = $req->api_key;
        $keys->status = '1';
        $keys->role = 'paypal';
        $keys->client_id = $req->client_id;
        $keys->user_id = $user_id;
        $keys->save();
        return redirect()->back()->with('success_paypal', 'You have successfully Added Paypal API Key');
        }
    }

    public function add_mail(Request $req)
    {

      $user_id =  Auth::user()->id;
        $checkAlreadyRecord = Mail::select('*')->where('user_id',$user_id)->first();   
        if($checkAlreadyRecord !=''){
            $updateArr = array(
              "mailer_name" => $req->mailer_name,
              "host" => $req->host,
              "driver" => $req->driver,
              "port" => $req->port,
              "user_name" => $req->user_name,
              "email_id" => $req->email_id,
              "encription" => $req->encription,
              "password" => Hash::make($req->password),
            );
            $upd = Mail::where('user_id',$user_id)->update($updateArr);
            return redirect()->back()->with('success_mail', 'Updated All Mail config Details');
        } 
        else{
          $mail= new Mail;
            $mail->mailer_name=$req->mailer_name;
            $mail->host=$req->host;
            $mail->driver=$req->driver;
            $mail->port=$req->port;
            $mail->user_name=$req->user_name;
            $mail->email_id=$req->email_id;
            $mail->encription=$req->encription;
            $mail->password=Hash::make($req->password);
            $mail->save();
        }
    }

    public function add_sms(Request $req)
    {
      $user_id =  Auth::user()->id;
      $checkAlreadyRecord = Mail::select('*')->where('user_id',$user_id)->first();   
      if($checkAlreadyRecord !=''){
          $updateArr = array(
            "s_id" => $req->s_id,
            "msg_s_id" => $req->msg_s_id,
            "token" => $req->token,
            "from" => $req->from,
            "otp_template" => $req->otp_template,
          );
          $upd = Sms::where('user_id',$user_id)->update($updateArr);
          return redirect()->back()->with('success', 'Updated All Sms config Details');
      } 
      else{
        $sms= new Sms;
          $sms->s_id=$req->s_id;
          $sms->msg_s_id=$req->msg_s_id;
          $sms->token=$req->token;
          $sms->from=$req->from;
          $sms->otp_template=$req->otp_template;
          $sms->save();
          return redirect()->back()->with('success', 'Updated All Mail config Details');
         
      }
    }

    public function add_social_key(Request $req)
    {
        $user_id =  Auth::user()->id;
        $checkAlreadyRecord = Link::select('*')->where('user_id',$user_id)->first();   
        if($checkAlreadyRecord !=''){
            $updateArr = array(
              "fb_link" => $req->fb_link,
              "tw_link" => $req->tw_link,
              "linkedin_link" => $req->linkedin_link,
              "y_link" => $req->y_link,
              "inst_link" => $req->inst_link,
            );
            $upd = Link::where('user_id',$user_id)->update($updateArr);
            return redirect()->back()->with('success_url', 'Updated All Social Media Links');
        } 
        else{
          $links= new Link;
          $links->fb_link = $req->fb_link;
          $links->tw_link = $req->tw_link;
          $links->linkedin_link = $req->linkedin_link;
          $links->y_link = $req->y_link;
          $links->inst_link = $req->inst_link;
          $links->save();
        }
        
        return redirect()->back()->with('success_url', 'You have successfully Added Social Media Links');
    }

    public function add_app_setting(Request $request)
    {

      $user_id =  Auth::user()->id;
        $checkAlreadyRecord = App::select('*')->where('user_id',$user_id)->first();   
        if(isset($checkAlreadyRecord) && $checkAlreadyRecord->id > 0){

            if(isset($request->logo)){
              $imageName = time().'.'.$request->logo->extension();  
              $request->logo->move(public_path('uploads/app/logo/'), $imageName); 
            
              $logo = $imageName;

            }
            else{
              $logo = $request->logoH;
            }
            if(isset($request->favicon)){
              $favimageName = time().'.'.$request->favicon->extension();  
              $request->favicon->move(public_path('uploads/app/favicon/'), $favimageName); 

              $favicon = $favimageName;
            }
            else{
              $favicon = $request->faviconH;
            }

            $updateArr = array(
              "name" => $request->name,
              "description" => $request->description,
              "logo"        => $logo,
              "favicon"    => $favicon
            );
            $upd = App::where('user_id',$user_id)->update($updateArr);
            return redirect()->back()->with('success_g', 'Updated All App Settings');
        } 
        else{

              $app = new App;
              $imageName = "";
              $favimageName = "";

               if(isset($request->logo)){
                    $imageName = time().'.'.$request->logo->extension();  
                    $request->logo->move(public_path('uploads/app/logo/'), $imageName); 
                }
                if(isset($request->favicon)){
                  $favimageName = time().'.'.$request->favicon->extension();  
                  $request->favicon->move(public_path('uploads/app/favicon/'), $favimageName); 
                }
                $app->name = $request->name;
                $app->description = $request->description;
                $app->logo = $imageName;
                $app->favicon = $favimageName;
                $app->user_id= $user_id ;
                $app->save();
                return redirect()->back()->with('success_g', ' App Settings Saved Successfully');
            }
    }

    public function add_currency(Request $req)
    {
      $user_id =  Auth::user()->id;
      $updateArr = array(
        "currency_type" => $req->currency_type
      );
      $upd = App::where('user_id',$user_id)->update($updateArr);
      return redirect()->back()->with('success_cr', 'Updated Currency Settings');
          }

    public function add_home_cont(Request $req)
    {
        $page_key = $req->page_key;
        $page_title = $req->page_title;
        /** Check if content exist on page_key */
        $res = Page::where('page_key',$page_key)->first();
        if($res){
            /** update content */
            Page::where('page_key',$page_key)->update([
              "description" =>$req->description
            ]);
            return redirect()->back()->with('success', 'Page Content Updated Successfully!');
        }
        else{
            /** save content */

            $pages= new Page;
            $pages->page_key=$page_key;
            $pages->title= $page_title;
            $pages->description=$req->description;
            $pages->save();
        }


       
        return redirect()->back()->with('success', 'You have successfully Added!');
    }

    public function update_member(Request $request){

        $id = $request->idH;
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

        return redirect()->back()->with('success', 'Members details updated successfully!');
    }

    public function add_user()
    {
      return view('admin.add-user');
    }

    public function add_user_form(Request $req)
    {
        $users= new User;
        $users->name=$req->name;
        $users->phone=$req->phone;
        $users->email=$req->email;
        $users->address=$req->address;
        $users->gender=$req->gender;
        $users->dob=$req->dob;
        $users->city=$req->city;
        $users->state=$req->state;
        $users->password="";
        $users->role="user";
        $users->save();
       // return redirect('save_form');
        return redirect()->back()->with('success', 'You have successfully Added!');
    }

    public function all_user()
    {
      $list = User::select('*')
      ->where('role','user')->get();
      return view('admin.all-user',compact('list'));
    }

    public function user_view($id)
    {
      $list = User::select('*')
      ->where(
          [
            ['role','user'],
            ['id',$id]
          ])->first();
      return view('admin.user-view-wallet',compact('list'));
      
    }

    public function member_view($id)
    {
      $list = User::select('*')
      ->where(
          [
            ['role','member'],
            ['id',$id]
          ])->first();
      return view('admin.member-view-wallet',compact('list'));
      
    }

    # Sub Admin
    public function add_sub()
    {
      return view('admin.add-sub');
    }

    public function add_sub_form(Request $req)
    {
        $users= new User;
        $users->name=$req->name;
        $users->phone=$req->phone;
        $users->email=$req->email;
        $users->address=$req->address;
        $users->gender=$req->gender;
        $users->dob=$req->dob;
        $users->city=$req->city;
        $users->state=$req->state;
        $users->password=Hash::make($req->password);
        $users->role="sub-admin";
        $users->save();
       // return redirect('save_form');
        return redirect()->back()->with('success', 'You have successfully Added!');
    }

    public function all_sub()
    {
      $list = User::select('*')
      ->where('role','sub-admin')->get();
      return view('admin.all-sub-admin',compact('list'));
    }

    public function edit_sub_admin($id)
    {
      $user = User::where('id',$id)->first();
      return view('admin.edit-sub-admin',compact('user','id'));
    }

    public function update_sub_admin(Request $request){

        $id = $request->idH;
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

        return redirect()->back()->with('success', 'Sub Admin details updated successfully!');
    }


    public function edit_user($id)
    {
      $user = User::where('id',$id)->first();
      return view('admin.edit-user',compact('user','id'));
    }

    public function update_user(Request $request){

        $id = $request->idH;
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

    public function user_profile(){
      return view('admin.user-profile');
    }

    public function other_settings()
    {
      return view('admin.other-settings');
    }

    public function admin_profile()
    {
      return view('admin.admin-profile');
    }

    public function add_page()
    {
      return view('admin.add-page');
    }

    public function all_page()
    {
      return view('admin.all-page');
    }

    public function apikey()
    {
      $list2 = Key::select('*')->where('role','mapapi')->orderBy('id','desc')->first();
      return view('admin.key',compact('list2'));
    }

    public function others()
    {
      return view('admin.others-setting');
    }

    public function all_transaction()
    {
      return view('admin.transactions');
    }

    public function by_user()
    {
      return view('admin.by-user');
    }

    public function general_setting()
    {
      return view('admin.general-setting');
    }

    public function app_setting()
    {
      return view('admin.app-setting');
    }

    public function wallet_profile()
    {
      return view('admin.user-wallet');
    }

    public function single_user_wallet()
    {
      return view('admin.single-user-wallet');
    }

    public function dashboard_int()
    {
      return view('admin.dashboard_int');
    }

    public function get_page_content(Request $request){
        $page_key =  $request->page_key;
        
        $res = Page::where('page_key',$page_key)->first();
        if($res){
          $descr = Page::where('page_key',$page_key)->select('description')->first();
          return $descr;
        }
        else{
            '{"description":""}';
        }
        
    }

    
    
    
}
