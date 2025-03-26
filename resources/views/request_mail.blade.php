<!DOCTYPE html>
<html>
<head>
    <title>Report Cube</title>
</head>
<body>
   
   <h1>{{ $mailData['title'] }}</h1>

   @if($mailData['body_type'] =='user') 
   <p>
        Dear , <br>
    
        Thank you for showing interest. <br>
    
        We appreciate your patience and will contact you soon. <br>
    
     <!--    For further more queries, please drop us a mail at <a href='mailto: sales@thereportcube.com'>sales@marknteladvisors.com</a> <br>
    
        <a href='https://www.marknteladvisors.com/'>Report Cube</a> is a premier market/business research, consulting, and analytics center known for its incessant real-time support. We work 24*7 to ensure that our clients meet their objectives. We deliver <a href='https://www.marknteladvisors.com/services'>research, consulting </a> and <a href='https://www.marknteladvisors.com/data-analytics/'>data analytics </a>services across industries like Information & Communication Technology (ICT), Healthcare, FMCG, FinTech, Aerospace & Defence, Building & Construction Materials, Automotive, Chemicals, Tires, Energy, and Banking & Financial Services among others.
        <br><br> -->
        Thank You <br>
        Team Reportcube
       </p>
    @elseif($mailData['body_type'] =='client')
            
        Name : {{$mailData['body']['Name']}} <br>
        Company Name : {{$mailData['body']['Company Name']}} <br>
        Business Email : {{$mailData['body']['Business Email']}} <br>
        Contact No. : {{$mailData['body']['Contact No.']}} <br>
        Message : {{$mailData['body']['Message']}} <br>
    @endif
    
</body>
</html>