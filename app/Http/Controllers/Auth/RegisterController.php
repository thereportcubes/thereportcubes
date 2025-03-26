<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\Rules\ReCaptcha;
use Illuminate\Http\RedirectResponse;
use Mail;
use App\Mail\RequestMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

   // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
    }

    /**
     * //Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $req)
    {
        
        $req->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $nameArr = explode('@', $req->email);
        $data = [
            'name' => $nameArr[0],
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'job_title' => $req->job_title,
            'user_title' => $req->user_title,
            'country' => $req->country,
            'phone_number' => $req->phone_number,
            'phone' => $req->phone_number,
            'company_name' => $req->company_name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'role' => 'user',
            'user_role' => 11
        ];
        $user = User::create($data);
        $data['id'] = $user->id;
        $this->sendEmailVerificationNotification($data);
        /*if($user){
            Auth::login($user);
            $req->session()->regenerate();
            return redirect('user/dashboard');
       } else { */
           // return redirect()->back()->with('msg','1');
       // }
        return redirect('user-thanks');
    }
    public function login(Request $req)
    {
      $req->validate([
        'email' =>'required',
        'password' =>'required',
     //  'g-recaptcha-response' => ['required', new ReCaptcha]
      ]);
       $user  = User::where('email' , $req->email)->where('email_verified_at', '!=' , 0) ->first();
       $password  = $req->password;
        if (empty($user->password) || !Hash::check($password, $user->password)) { 
            return redirect()->back()->with('error','Login details wrong');
        }
        Auth::login($user);
        $req->session()->regenerate();
        if(Auth::user()->role == "admin"){
            return redirect('admin/dashboard');
        } else if(Auth::user()->role == "member"){
           return redirect('user/dashboard');
        } else {
           return redirect('user/dashboard');
        }
    }
    
    private function sendEmailVerificationNotification($data){
        $mailData['code'] = md5($data['id']).'@'.($data['id']+999);
        $mailData['title'] ='Verify Email Address';
        $mailData['name'] = $data['first_name'].' '.$data['last_name'];
        $mailData['body_type'] = 'send_verification';
        Mail::to($data['email'])->send(new RequestMail($mailData));
    }
    
     public function email_verify($request){
        $arr = explode('@', $request);
        $user  = User::where('id' , ($arr[1]-999)) ->first();
        if (!empty($user->id) && md5($user->id) == $arr[0]) { 
            User::where('id', $user->id)->update(['email_verified_at' => date('ymd')]); 
            return redirect('signin')->with('success','Email verify successfully');
        } else {
            return redirect('signin')->with('error','Invalid link');
        }
    }
}
