<!DOCTYPE html>
<html>
<head>
    <title>The Report Cube</title>
</head>
<body>
   
   <h1>{{ $mailData['title'] }}</h1>

   @if($mailData['body_type'] =='user') 
   <p>
        Dear, <br>
    
        Thank you for showing interest in our report. <br>
    
        We appreciate your patience and our sales team will be in touch with you soon. <br>
    
        
        <br><br>
        Name : {{$mailData]['name']}} <br>
        Company Name : {{$mailData['company_name']}} <br>
        Business Email : {{$mailData['email']}} <br>
        Payment Type : {{$mailData['payment_type']}} <br>
        Contact No. : {{$mailData['phone_number']}} <br>
        Email : {{$mailData]['email']}} <br>
        Country : {{$mailData['country']}} <br>
        Business Email : {{$mailData['email']}} <br>
        Address : {{$mailData['address']}} <br>
        Message : {{$mailData['Message']}} <br>
        <br><br>
        Thank You <br>
        Team The Report Cube
       </p>
    @elseif($mailData['body_type'] =='client')
            
        Name : {{$mailData]['name']}} <br>
        Company Name : {{$mailData['company_name']}} <br>
        Business Email : {{$mailData['email']}} <br>
        Payment Type : {{$mailData['payment_type']}} <br>
        Contact No. : {{$mailData['phone_number']}} <br>
        Email : {{$mailData]['email']}} <br>
        Country : {{$mailData['country']}} <br>
        Business Email : {{$mailData['email']}} <br>
        Address : {{$mailData['address']}} <br>
        Message : {{$mailData['Message']}} <br>
    @endif
    
</body>
</html>