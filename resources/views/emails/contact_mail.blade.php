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
   
   
   @if($mailData['body_type'] =='user') 
   <p>
        Dear {{$mailData['name']}}, <br><br>
    
        Thank you for showing interest. <br><br>
    
        We appreciate your patience and will be in touch with you soon. <br><br>
    
       
        Thank You <br>
        Team Report Cube
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
                <td>{{$mailData['body']['Country Name']}}</td>
            </tr>
            <tr>
                <td><b>Contact Number</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Contact No.']}}</td>
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