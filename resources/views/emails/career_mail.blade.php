<!DOCTYPE html>
<html>
<head>
    <title>MarkNtel Advisor</title>
    <style>
        table tr td{
            padding:8px 10px;
        }
    </style>
</head>
<body>   
   

   @if($mailData['body_type'] =='user') 
   
   <p>
        Dear {{$mailData['name']}},<br>
    
        Thank you for your application, Our team will get in touch with you if your profile gets shortlisted.
    
        <br><br>
        Thank You <br>
        Team Report Cube
       </p>
    @elseif($mailData['body_type'] =='client')

        <table>
            <tr><td colspan="3" text-align="center" style="font-size:18px;">Job Application <br><br></td></tr>
            <tr><td colspan="3" text-align="center"><u>Details for below:</u></td></tr>
            <tr>
                <td><b>Name</b></td>
                <td style="width:50px;">:</td>
                <td>{{$mailData['body']['Name']}}</td>
            </tr>
            <tr>
                <td><b>Business Email</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Email']}}</td>
            </tr>
           
            <tr>
                <td><b>Phone</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Phone']}}</td>
            </tr>
            <tr>
                <td><b>Message</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Message']}}</td>
            </tr>
            <tr>
                <td><b>Position Apply For</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Position']}}</td>
            </tr>
            <tr>
                <td><b>Experience</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Experience']}}</td>
            </tr>
            <tr>
                <td><b>Location</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Location']}}</td>
            </tr>
            <tr>
                <td><b>CTC</b></td>
                <td>:</td>
                <td>{{$mailData['body']['CTC']}}</td>
            </tr>
            <tr>
                <td><b>Notice Period</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Notice']}}</td>
            </tr>
        </table>

    @endif
    
</body>
</html>