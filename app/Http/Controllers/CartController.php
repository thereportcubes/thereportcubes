<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

use Hash;

use DB;

use App\Models\Cart;

use App\Models\Report;

use App\Models\My_Order;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Redirect;

use App\Rules\ReCaptcha;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

use URL;

use Session;

use Notification;

use Illuminate\Support\Facades\Http;

use Mail;

use App\Mail\ContactMail;

use App\Mail\RequestMail;

use App\Mail\CareerMail;

use App\Mail\ExportMail;

use App\Mail\SearchMail;
use Stichoza\GoogleTranslate\GoogleTranslate;



class CartController extends Controller

{

   private $client_id;

    private $secret;

    private $api_url;



    public function __construct()

    {

        $this->client_id = config('paypal.client_id');

        $this->secret = config('paypal.secret');

        $this->api_url = config('paypal.settings.mode') === 'sandbox'

            ? 'https://api.sandbox.paypal.com/v1/payments/payment'

            : 'https://api.paypal.com/v1/payments/payment';

    }

    public function index()

    {

        $products = Product::all();

        return view('products', compact('products'));

    }

  

    public function cart()

    {

        return view('cart');

    }

    public function cart1()

    {

        return view('cart1');

    }

  

    public function addToCart($id)

    {

        $report = Report::findOrFail($id);

        

        $cart = session()->get('cart', []);

  

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [

                "id"    => $report->id,

                "name" => $report->title,

                "page_url" => $report->page_url,

                "quantity" => 1,

                "price" => $report->single_licence_price,

                //"image" => $report->image,

                "report_code"=> $report->report_code,

            ];

        }

          

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Report added to cart successfully!');

    }



    public function add_to_cart_new(Request $request){

        $id = $request->id;

        $report_type_price = $request->report_type_price;

        

        $price_and_type = explode('-',$report_type_price );

        

      $report = Report::select('id', 'title', 'report_code', 'page_url', 'report_post_date', 'no_of_page')

                ->where('id', $id)

                ->first();

                        

        

        $cart = session()->get('cart', []);

  

        if(isset($cart[$id])) {

            return response(

[

'message'=>'Already Added',

'status'=>false

],200);

            // $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [

                "id"    => $report->id,

                "name" => $report->title,

                'date'=>$report->report_post_date,

                'pages'=>$report->no_of_page,

                "page_url" => $report->page_url,

                "quantity" => 1,

                "price" => $price_and_type[0],

                "report_type" => $price_and_type[1],

                //"image" => $report->image,

                "report_code"=> $report->report_code,

            ];

        }

          

        session()->put('cart', $cart);

                return response(

[

'message'=>'Successfully Added',

'status'=>true

],201);

    }

    

    public function add_to_cart_another(Request $request){

        $id = $request->id;

        $report_type_price = $request->report_type_price;

        

        $price_and_type = explode('-',$report_type_price );

        

        $report = Report::select('id','title','report_code','page_url','report_post_date','no_of_page')

                            ->where('id',$id)

                            ->first();

        

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [

                "id"    => $report->id,

                "name" => $report->title,

                "quantity" => 1,

                'date'=>$report->report_post_date,

                'pages'=>$report->no_of_page,

                "price" => $price_and_type[0],

                "report_type" => $price_and_type[1],

                //"image" => $report->image,

                "report_code"=> $report->report_code,

            ];

        }

          

        session()->put('cart', $cart);



    }

  

    // public function update(Request $request)

    // {

    //     $selectedVal = $request->selectedVal; 

    //     $arr = explode(',',$selectedVal);



    //     $id = $arr[0];

    //     $license_type = $arr[1];



    //     $data = Report::select('single_licence_price','special_single_licence_price','multi_user_price','special_multi_user_price','custom_report_price','special_custom_report_price')->where('id',$id)

    //     ->first();

        

    //     $price = 0;



    //     if($license_type == 'excel_data_pack'){

    //         $price = $data->excel_data_pack;

    //     }

    //     elseif($license_type == 'single_licence_price'){

    //         if($data->special_single_licence_price !=''){

    //             $price = $data->single_licence_price;     

    //         }

    //           $price = $data->special_single_licence_price;

    //       }

    //     elseif($license_type == 'multi_user_price'){

    //          if($data->special_multi_user_price !=''){

    //             $price = $data->special_multi_user_price;     

    //         }

    //           $price = $data->special_single_licence_price;

          

    //     }

    //     elseif($license_type == 'custom_report_price'){

    //         if($data->special_custom_report_price !=''){

    //             $price = $data->special_custom_report_price;     

    //         }

    //         $price = $data->custom_report_price;

    //     }



    //     if($id && $license_type){

    //         $cart = session()->get('cart');

    //         $cart[$id]['report_type'] = $license_type;

    //         $cart[$id]['price'] = $price;

    //         session()->put('cart', $cart);

    //         session()->flash('success', 'Cart updated successfully');

    //     }

    // }

  

  public function update(Request $request)

{

    $selectedVal = $request->selectedVal; 

    $arr = explode(',', $selectedVal);



    $id = $arr[0];

    $license_type = $arr[1];



    $data = Report::select('single_licence_price', 'special_single_licence_price', 'multi_user_price', 'special_multi_user_price', 'custom_report_price', 'special_custom_report_price')

        ->where('id', $id)

        ->first();

    

    $price = 0;



    if ($license_type == 'excel_data_pack') {

        $price = $data->excel_data_pack;

    } elseif ($license_type == 'single_licence_price') {

        if ($data->special_single_licence_price != '') {

            $price = $data->special_single_licence_price;

        } else {

            $price = $data->single_licence_price;

        }

    } elseif ($license_type == 'multi_user_price') {

        if ($data->special_multi_user_price != '') {

            $price = $data->special_multi_user_price;

        } else {

            $price = $data->multi_user_price;

        }

    } elseif ($license_type == 'custom_report_price') {

        if ($data->special_custom_report_price != '') {

            $price = $data->special_custom_report_price;

        } else {

            $price = $data->custom_report_price;

        }

    }



    if ($id && $license_type) {

        $cart = session()->get('cart');

        $cart[$id]['report_type'] = $license_type;

        $cart[$id]['price'] = $price;

        session()->put('cart', $cart);

        session()->flash('success', 'Cart updated successfully');

    }

}



    public function remove(Request $request)

    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }

    }



    public function save_cart_payment(Request $request)

    {

         

        if(Auth::User()) {

            $userId = Auth::User()->id;

            $user_type = 'Registerd User';

        }

        else{

            $userId = '0';

            $user_type = 'Guest User';

        }

       /* $request->validate([

             'g-recaptcha-response' => ['required', new ReCaptcha]

        ]);*/

        $order_id = uniqid();

        $input = $request->all();

        unset($input['_token']);

        unset($input['g-recaptcha-response']);

        /* save into table*/

        $orderIds = [];

        $total = 0; 

        foreach(session('cart') as $cartData){

		    $price = str_replace(',','',$cartData['price']);

		    $total += $price * $cartData['quantity'];

		    $report_type = ""; 

		    if($cartData['report_type'] == 'excel_data_pack'){

		        $report_type = "Excel Data Pack";

		    }

		    else if($cartData['report_type'] == 'single_licence_price'){

		        $report_type = "Single User License";

		    }

		    else if($cartData['report_type'] == 'multi_user_price'){

		        $report_type = "Multi User License";

		    }

		    else if($cartData['report_type'] == 'custom_report_price'){

		        $report_type = "Enterprise License";

		    }

			$orderArray = [

				'product_id'            =>  $cartData['id'],

				'product_licence_type'  =>  $report_type,

				'product_price'         =>  $price,

				'user_id'               =>  $userId,

				'product_type'          =>  'Report',

				'status_id'             =>  0,

				'payment_mode'          =>  $request->payment_type,

				'report_status'         =>  'Processing',

				'paymet_type'           =>  $request->payment_type,

				'user_type'             =>  $user_type,

				'order_id'              =>  $order_id,

				'billing_name'          =>  $request->billing_name,

                'billing_company_name'  =>  $request->billing_company_name,

                'billing_designation'   =>  $request->billing_designation,

                'billing_address'       =>  $request->billing_address,

                'billing_city'          =>  $request->billing_city,

                // 'billing_state'         =>  $request->billing_state,

                'billing_zip'           =>  $request->billing_zip,

                'billing_country'       =>  $request->country_name,

                'billing_tel'           =>  $request->billing_tel,

                'billing_email'         =>  $request->billing_email,

                'billing_first_name'    =>  $request->billing_name,

				'currency'              =>  'USD'

			];

            $orderId = My_order::insertGetId($orderArray);

            $orderIds[] = $orderId;     

        }

        session(['order_ids' => $orderIds]); 

        if($request->payment_type == 'CC Avanue'){

            /*sent to ccavenue*/

            //if(!empty($_COOKIE['test'])){

              //  $input['amount'] = 1;

            //    $input['currency'] = "INR";

            //} else {

                $input['amount'] = $total;

                $input['currency'] = "USD";

            //}

            $input['order_id'] = $order_id;

            $input['redirect_url'] = route('ccavenue_payment_success');

            $input['cancel_url'] = route('ccavenue_payment_cancel');

            $input['language'] = "EN"; 

            $input['merchant_id'] = "232932";

            $merchant_data = "";

            $working_key = "2C49A3B5D08FBC1CA63628C769C9ADCC"; 

            $access_code = "AVDT87GI86BP78TDPB"; 

            $input['billing_name']          = $request->billing_name; 

            $input['billing_address']       = $request->billing_address; 

            $input['billing_city']          = $request->billing_city; 

            // $input['billing_state']         = $request->billing_state; 

            $input['billing_zip']           = $request->billing_zip; 

            $input['billing_country']       = $request->country_name; 

            $input['billing_tel']           = $request->billing_tel;

            $input['billing_email']         = $request->billing_email; 

            $input['billing_first_name']    = $request->billing_name;

            $merchant_data ='';

            foreach ($input as $key => $value) {

                $merchant_data .= $key . '=' . $value . '&';

            }

            $encrypted_data = $this->encryptCC($merchant_data, $working_key);

            //if(!empty($_COOKIE['test'])){

              //  $url = 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest=' . $encrypted_data . '&access_code=' . $access_code;

            //} else {

                $url = 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest=' . $encrypted_data . '&access_code=' . $access_code;

            //}

           /*  $mailData = [

                'title'     => 'Thank you for your Order..',

                'message'   => 'Our sales team will get in touch with you soon.',

                'body'      => 'true',

                'body_type' => 'user',

                'name' => $request->billing_name,

            ];*/

           // Mail::to($request->billing_email)->send(new RequestMail($mailData));

            return redirect($url);

        } else if($request->payment_type == 'paypal') {

            $provider = new PayPalClient;

            $provider->setApiCredentials(config('paypal'));

            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([

                "intent" => "CAPTURE",

                "application_context" => [

                    'return_url' => URL::to('paypal/callback'),

                    'cancel_url' => URL::to('cart'),

                ],

                "purchase_units" => [

                    0 => [

                        "amount" => [

                            "currency_code" => "USD",

                            "value" => $total

                        ]

                    ]

                ]

            ]);#dd($response);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href

                foreach ($response['links'] as $links) {

                    if ($links['rel'] == 'approve') {

                        return redirect()->away($links['href']);

                    }

                }

                return redirect()

                    ->route('createTransaction')

                    ->with('error', 'Something went wrong.');

            } else {

                return redirect()

                    ->route('createTransaction')

                    ->with('error', $response['message'] ?? 'Something went wrong.');

            }

        }else if($_POST['payment_type'] == 'Wire Transfer'){

            /*if(session('cart') )

            {

                foreach(session('cart') as $id => $details){

                    //print_r($details['id']); die;

                    $report_type = "" ;

                    if($details['report_type'] == 'single_licence_price '){

                        $report_type = "Single User License";

                    }

                    elseif($details['report_type'] == 'multi_user_price '){

                        $report_type = "Multi User License";

                    }

                    elseif($details['report_type'] == 'custom_report_price '){

                        $report_type = "Enterprise License";

                    }

                    elseif($details['report_type'] == 'excel_data_pack '){

                        $report_type = "Excel Data Pack";

                    }



                    $orderArray = array(

                        'product_id'            =>  $details['id'],

                        'product_licence_type'  =>  $report_type,

                        'product_price'         =>  $details['price'],

                        'user_id'               =>  $userId,

                        'product_type'          =>  'Report',

                        'status_id'             =>  1,

                        'payment_mode'          =>  'Wire Transfer',

                        'report_status'         =>  'Processing',

                        'paymet_type'           =>  'Wire Transfer',

                        'user_type'             =>  $user_type,

                        'order_id'              =>  $order_id,

                        'billing_name'          =>  $request->name,

                        'billing_address'       =>  $request->address,

                        'billing_city'          =>  $request->city,

                        'billing_state'         =>  "",

                        'billing_zip'           =>  $request->zip_code,

                        'billing_country'       =>  $request->country_name,

                        'billing_tel'           =>  $request->phone,

                        'billing_email'         =>  $request->email,

                        'billing_first_name'    =>  $request->name,                

                        'currency'              =>  "USD",

                    );

                    $id = My_Order::create($orderArray)->id;

                    

                }*/

                $order_list = My_order::where('order_id',$order_id)->select('id')->get(); 

                foreach($order_list as $order_id) {

                    My_order::where('id',$order_id['id'])->update(['report_status'=>'Paid']); 

    		        $this->sendOrderEmail($order_id['id']);  

                }                # Send Mail to Customer

                 

               /* $mailData = [

                    'title'     => 'Thank you for your Order..',

                    'message'   => 'Our sales team will get in touch with you soon.',

                    'body'      => 'true',

                    'body_type' => 'user',

                    'name' => $request->billing_name

                ];

        

                /*$mailData2 = [

                    'title' => 'Request Customization User Details !',

                    'body' => [

                                "Name" => $req->full_name,

                                "Company Name" => $req->company_name,

                                "Business Email" => $req->busniess_email,

                                "Contact_No" => $req->phone,

                                "Message" => $req->message,

                                "Request Type" => "talk-to-our-consultant",

                            ],

                    'body_type' => 'client'

                ]; */

        

               // Mail::to($request->billing_email)->send(new RequestMail($mailData));

                //Mail::to("test@marknteladvisors.com")->send(new RequestMail($mailData2));

        

                return redirect()->to('/success-thankyou');

            //}

        }



    }

    

    public function ccavenue_payment_success(Request $request){

        try {

        //   dd($request->all());

            $workingKey = "2C49A3B5D08FBC1CA63628C769C9ADCC"; //Working Key should be provided here.

            $encResponse = $_POST["encResp"];

            

            // print_r($encResponse); 

            

    

            $rcvdString = $this->decryptCC($encResponse, $workingKey);        //Crypto Decryption used as per the specified working key.

            $order_id = $order_status = "";

            $decryptValues = explode('&', $rcvdString);

            $dataSize = sizeof($decryptValues);

        	for($i = 0; $i < $dataSize; $i++) {

        		$information=explode('=',$decryptValues[$i]);

        		if($i==3){

        		    $order_status=$information[1];

        		}

        		if($i==3){

        		    $order_status=$information[1];

        		}

        		if($i ==0){

        		    $order_id = $information[1];

        		}

        	}

            if($dataSize > 0){

                // return view('ccavenue_payment_success',compact('response_type'));

                $order_list = My_order::where('order_id',$order_id)->select('id')->get(); 

                foreach($order_list as $order_id) {

                    My_order::where('id',$order_id['id'])->update(['report_status'=>'Paid']); 

    		        $this->sendOrderEmail($order_id['id']);  

                }

            // foreach(session('order_ids') as $order_id)

            // {

            // My_order::where('id',$order_id)->update(['report_status'=>'Paid']);  

            // }

            // session(['order_ids' => []]);

            return Redirect::to('/thankyou');

            }

            

            //print_r($decryptValues);

        }

        catch (Exception $e) {

            echo $e;

        }

    }

    

    public function ccavenue_payment_cancel(Request $request){

        

        try {

           

            $workingKey = "2C49A3B5D08FBC1CA63628C769C9ADCC"; //Working Key should be provided here.

            $encResponse = $_POST["encResp"];

            

            $rcvdString = $this->decryptCC($encResponse, $workingKey);        //Crypto Decryption used as per the specified working key.

            $order_status = "";

            $decryptValues = explode('&', $rcvdString);

            $dataSize = sizeof($decryptValues);

            

            if($dataSize > 0){

                $response_type = "cancel";

                return view('ccavenue_payment_cancel',compact('response_type'));

            }

            

            #print_r($decryptValues);die;

        }

        catch (Exception $e) {

            echo $e;

        }

        

    }

    

    public function encryptCC($plainText, $key)

    {

        $key = $this->hextobin(md5($key));

        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);

        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);

        $encryptedText = bin2hex($openMode);

        return $encryptedText;

    }

    

    public function decryptCC($encryptedText, $key)

    {

        $key = $this->hextobin(md5($key));

        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);

        $encryptedText = $this->hextobin($encryptedText);

        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);

        return $decryptedText;

    }

    

    public function pkcs5_padCC($plainText, $blockSize)

    {

        $pad = $blockSize - (strlen($plainText) % $blockSize);

        return $plainText . str_repeat(chr($pad), $pad);

    }

    

    public function hextobin($hexString)

    {

        $length = strlen($hexString);

        $binString = "";

        $count = 0;

        while ($count < $length) {

            $subString = substr($hexString, $count, 2);

            $packedString = pack("H*", $subString);

            if ($count == 0) {

                $binString = $packedString;

            } else {

                $binString .= $packedString;

            }

    

            $count += 2;

        }

        return $binString;

    }



    public function paymentResponse(Request $request)

    {

        \Log::info('CCAvenue Payment Response:', $request->all());

        

        // Handle the response from CCAvenue after payment

 $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $paypalToken = $provider->getAccessToken();

        // Validate the response data

        $validator = Validator::make($request->all(), [

            'order_id' => 'required',

            'tracking_id' => 'required',

            'amount' => 'required',

            'checksum' => 'required',

            // Add more required parameters based on CCAvenue documentation

        ]);



        if ($validator->fails()) {

            // Handle validation failure

            return 'Invalid response data.';

        }



        // Verify the checksum

        $merchantId = '232932';

        $workingKey = '2C49A3B5D08FBC1CA63628C769C9ADCC'; 

        $orderId = $request->input('order_id');

        $trackingId = $request->input('tracking_id');

        $amount = $request->input('amount');

        $checksum = $request->input('checksum');



        $expectedChecksum = $this->generateChecksum($merchantId, $orderId, $amount, $workingKey);



        if ($checksum !== $expectedChecksum) {

            // Checksum mismatch; handle accordingly

            return 'Checksum mismatch.';

        }



        // Perform actions based on the payment response

        // Update your database, send email notifications, etc.



        // Display a success or failure message

        return 'Payment response received. Tracking ID: ' . $trackingId;

    }



    private function generateChecksum($merchantId, $orderId, $amount, $workingKey)

    {

        // Implement CCAvenue checksum generation logic

        // Refer to CCAvenue documentation for the specific algorithm

        // This is a placeholder; replace it with the actual logic



        $data = "$merchantId|$orderId|$amount|$workingKey";

        $checksum = hash('sha256', $data);



        return $checksum;

    }

    function sendEmail(){

        

    }

    public function getPaymentStatus(Request $request)

    {

        $request = request();

        $paymentId = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');

        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            foreach(session('order_ids') as $order_id) {

                My_order::where('id',$order_id)->update(['report_status'=>'Paid']); 

		        $this->sendOrderEmail($order_id);  

            }

            session(['order_ids' => []]);

            return Redirect::to('/thankyou');

        } else {

           return Redirect::to('/shopping-basket');

        }

        Session::put('error', 'Payment failed');

        return Redirect::to('/');

    }

    private function sendOrderEmail($order_id){

        $orders = My_order::where('id', $order_id)->select('id','billing_first_name','billing_email', 'billing_company_name', 'payment_mode', 'billing_city', 'billing_email', 'billing_country', 'billing_tel', 'billing_address', 'billing_designation', 'billing_zip', 'product_id', 'product_price')->first();

        $product =$products = Report::where('id', $orders->product_id)->select('title')->first();

		$mailData = [

            'title'         => 'Thank you for your Order..',

            'name'          => $orders->billing_first_name,

            'company_name'  => $orders->billing_company_name,

            'message'       => 'Our sales team will get in touch with you soon.',

            'payment_type' => $orders->payment_mode,

            'body'          => 'true',

            'body_type'     => 'user',

            'city'          => $orders->billing_city,

            'email'         => $orders->billing_email,

            'country'       => $orders->billing_country,

            'phone_number'  => $orders->billing_tel,

            'address'       => $orders->billing_address,

            'designation'   => $orders->billing_designation,

            'zip'           => $orders->billing_zip,

            'product_title' => $product->title,

            'product_price' => $orders->product_price

        ];

        //Mail::to($orders->billing_email)->send(new RequestMail($mailData));

        $mailData['body_type'] = 'client';

        Mail::to('inbound@thereportcube.com')->send(new RequestMail($mailData));

    }
    
    public function language()
    {
        $html = '<p>Hello World</p><p>Welcome to PHP!</p>';
        preg_match_all('/<p>(.*?)<\/p>/s', $html, $matches);
        print_r($matches[1]);

        $translator = new GoogleTranslate();
        foreach (config('app.available_languages') as $lang) {
            if ($lang !== 'en') {
                $translator->setSource('en')->setTarget($lang);
               echo '<br>'. $translator->translate('Hello World');
               echo '<br>'. $translator->translate('This is my first post');
            }
        }
        return response()->json(['message' => 'Post created and translated successfully'], 201);
    }

}

