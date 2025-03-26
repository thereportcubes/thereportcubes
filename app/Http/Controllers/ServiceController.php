<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Hash;
use Mail;
use App\Mail\ServicesMail;
use App\Models\Servicesquery;
use App\Rules\ReCaptcha;

class ServiceController extends Controller
{
    public function service_syndicated_research(){
        return view('service_syndicated_research');
    }

    public function service_competitive_analysis(){
        return view('service_competitive_analysis');
    }

    public function service_company_profile(){
        return view('service_company_profile');
    }

    public function service_biographies(){
        return view('service_biographies');
    }

    public function service_customised_research(){
        return view('service_customised_research');
    }
    public function Submitenquery(Request $req)
    {
    /*$validator = $req->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha],
           
          
        ]);*/
    $servicesQuery = new Servicesquery();
    $servicesQuery->name = $req->name;
    $servicesQuery->bussinessemail = $req->contact_email;
    $servicesQuery->phone = $req->contact_phone;
    $servicesQuery->buget = $req->budget;
    $servicesQuery->message = $req->contact_message;
    $servicesQuery->title = $req->title; // Assuming you have this column in your table
    $servicesQuery->save();
    $mailDataUser = [
        'title' => 'Thanks For Enquery !',
        'body' => "true",
        'body_type' => 'user',
        'name' => $req->name,
    ];

    $mailDataClient = [
        'title' => '',
        'body' => [
            "Name" => $req->name,
        
            "Business Email" => $req->contact_email,
           
            "Contact No." => $req->contact_phone,
            "Buget" => $req->budget,
            
            "Message" => $req->contact_message,
        ],
        'body_type' => 'client',
    ];

    // Send the email to the user
    Mail::to($req->contact_email)->send(new ServicesMail($mailDataUser));
    // Send the email to the client
    Mail::to("inbound@thereportcube.com")->send(new ServicesMail($mailDataClient));

    // Redirect to thank you page
    return redirect()->to('/thankyou');
}
}