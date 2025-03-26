<!DOCTYPE html>
<html>
<head>
    <title>Report Cube</title>
    <style>
        table tr td{
            padding:8px 10px;
        }
    </style>
</head>
<body>   
   

   @if($mailData['body_type'] =='send_verification') 
   <p>
        Dear {{$mailData['name']}}, <br><br>
    
        Please click the button below to verify you email address.<br><br>
       <a href="{{ url('/email/verify/' . $mailData['code']) }}">Verify Email Address</a><br /><br />
        WeIf you did not create an account, no further action is required. <br><br>
        Thank You <br>
        Team Reportcube
       </p>
   @elseif($mailData['body_type'] =='user') 
   <!-- <h1>{{ $mailData['title'] }}</h1> -->
   <p>
        Dear {{$mailData['name']}}, <br><br>
    
        Thank you for showing interest. <br><br>
    
        We appreciate your patience and will contact you soon. <br><br>
    
         <table>
            <tr>
                <td><b>Name</b></td>
                <td style="width:50px;">:</td>
                <td>{{$mailData['name']}}</td>
            </tr>
            <tr>
                <td><b>Company Name</b></td>
                <td>:</td>
                <td>{{$mailData['company_name']}}</td>
            </tr>
            <tr>
                <td><b>Payment Type</b></td>
                <td>:</td>
                <td>{{$mailData['payment_type']}}</td>
            </tr>
            <tr>
                <td><b>Business Email</b></td>
                <td>:</td>
                <td>{{$mailData['email']}}</td>
            </tr>
            <tr>
                <td><b>Country</b></td>
                <td>:</td>
                <td>{{$mailData['country']}}</td>
            </tr>
            <tr>
                <td><b>Contact Number</b></td>
                <td>:</td>
                <td>{{$mailData['phone_number']}}</td>
            </tr>
            <tr>
                <td><b>City</b></td>
                <td>:</td>
                <td>{{$mailData['city']}}</td>
            </tr><tr>
                <td><b>Address</b></td>
                <td>:</td>
                <td>{{$mailData['address']}}</td>
            </tr><tr>
                <td><b>Designation</b></td>
                <td>:</td>
                <td>{{$mailData['designation']}}</td>
            </tr><tr>
                <td><b>Zip</b></td>
                <td>:</td>
                <td>{{$mailData['zip']}}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table>
                       <tr>
                            <td>Order Confirmation #</td>
                            <td>Amount</td>
                        </tr>
                        <tr>
                            <td>{{$mailData['product_title']}}</td>
                            <td>${{$mailData['product_price']}}</td>
                        </tr>
                        <tr>
                            <td>TOTAL</td>
                            <td>${{$mailData['product_price']}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><b>Message</b></td>
                <td>:</td>
                <td>{{$mailData['message']}}</td>
            </tr>
        </table> 
        <br><br>
        Thank You <br>
        Team Report Cube
       </p>
    @elseif($mailData['body_type'] =='client')        

        <table>
            <tr>
                <td><b>Name</b></td>
                <td style="width:50px;">:</td>
                <td>{{$mailData['name']}}</td>
            </tr>
            <tr>
                <td><b>Company Name</b></td>
                <td>:</td>
                <td>{{$mailData['company_name']}}</td>
            </tr>
            <tr>
                <td><b>Payment Type</b></td>
                <td>:</td>
                <td>{{$mailData['payment_type']}}</td>
            </tr>
            <tr>
                <td><b>Business Email</b></td>
                <td>:</td>
                <td>{{$mailData['email']}}</td>
            </tr>
            <tr>
                <td><b>Country</b></td>
                <td>:</td>
                <td>{{$mailData['country']}}</td>
            </tr>
            <tr>
                <td><b>Contact Number</b></td>
                <td>:</td>
                <td>{{$mailData['phone_number']}}</td>
            </tr>
            <tr>
                <td><b>City</b></td>
                <td>:</td>
                <td>{{$mailData['city']}}</td>
            </tr><tr>
                <td><b>Address</b></td>
                <td>:</td>
                <td>{{$mailData['address']}}</td>
            </tr><tr>
                <td><b>Designation</b></td>
                <td>:</td>
                <td>{{$mailData['designation']}}</td>
            </tr><tr>
                <td><b>Zip</b></td>
                <td>:</td>
                <td>{{$mailData['zip']}}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td>Order Confirmation #</td>
                            <td>Amount</td>
                        </tr>
                        <tr>
                            <td>{{$mailData['product_title']}}</td>
                            <td>${{$mailData['product_price']}}</td>
                        </tr>
                        <tr>
                            <td>TOTAL</td>
                            <td>${{$mailData['product_price']}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><b>Message</b></td>
                <td>:</td>
                <td>{{$mailData['message']}}</td>
            </tr>
        </table> 
        @elseif($mailData['body_type'] =='request_user')
        <p>
        Dear {{$mailData['name']}}, <br><br>
    
        Thank you for showing interest. <br><br>
    
        We appreciate your patience and will contact you soon. <br><br>
    
      
         Thank You <br>
        Team Report Cube
        </p>
        @elseif($mailData['body_type'] =='request')        

        <table>
            <tr>
                <td><b>Name</b></td>
                <td style="width:50px;">:</td>
                <td>{{$mailData['body']['Name']}}</td>
            </tr>
            <tr>
                <td><b>Company Name</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Company Name']}}</td>
            </tr>
            <tr>
                <td><b>Business Email</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Business Email']}}</td>
            </tr>
            <tr>
                <td><b>Country</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Country_Name']}}</td>
            </tr>
            <tr>
                <td><b>Contact Number</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Contact_No']}}</td>
            </tr>
            <tr>
                <td><b>Message</b></td>
                 <td>:</td>
                <td>{{$mailData['body']['Message']}}</td>
            </tr>
        </table> 
    @endif
    
</body>
</html>