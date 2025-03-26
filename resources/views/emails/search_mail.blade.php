<!DOCTYPE html>
<html>
<head>
    <title>The Report Cube</title>
    <style>
        table tr td{
            padding:8px 10px;
        }
    </style>
</head>
<body>   
   

   @if($mailData['body_type'] =='user') 
   <!-- <h1>{{ $mailData['title'] }}</h1> -->
   <p>
        Dear {{$mailData['name']}}, <br><br>
    
        Thank you for your request. <br><br>
    
        We appreciate your patience and will be in touch with you soon. If you have any additional queries or would like to discuss further, please feel free to reply to this email. <br><br>
    
      
        Thank You <br>
        <strong>Team Reportcube</strong>
       </p>
    @elseif($mailData['body_type'] =='client')
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