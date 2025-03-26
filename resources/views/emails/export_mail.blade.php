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
   
   <p>
        Dear {{$mailData['full_name']}},<br><br>
    
        Thank you for showing interest. <br><br>
    
        We appreciate your patience and will contact you soon. <br><br>
    
        <!-- For further more queries, please drop us a mail at <a href='mailto:sales@marknteladvisors.com'>sales@marknteladvisors.com</a> <br><br>
    
        <a href='https://www.marknteladvisors.com/'>MarkNtel Advisors</a> is a premier market/business research, consulting, and analytics center known for its incessant real-time support. We work 24*7 to ensure that our clients meet their objectives. We deliver <a href='https://www.marknteladvisors.com/services'>research, consulting </a> and <a href='https://www.marknteladvisors.com/data-analytics/'>data analytics </a>services across industries like Information & Communication Technology (ICT), Healthcare, FMCG, FinTech, Aerospace & Defence, Building & Construction Materials, Automotive, Chemicals, Tires, Energy, and Banking & Financial Services among others.
        <br><br> -->
        Thank You <br>
        Team ReportCube
       </p>
    @elseif($mailData['body_type'] =='client')
    <table> 
            <tr><td colspan="3" text-align="center" style="font-size:18px;">EXIM Request Sample-Exim Sample Request <br><br></td></tr>
            <tr><td colspan="3" text-align="center"><u>Details for below:</u></td></tr>
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
            <tr>
                <td><b>Data Type</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Data_Type']}}</td>
            </tr>
            <tr>
                <td><b>Start Date</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Start_Date']}}</td>
            </tr>
            <tr>
                <td><b>End Date</b></td>
                <td>:</td>
                <td>{{$mailData['body']['End_Date']}}</td>
            </tr>
            <tr>
                <td><b>Data Type Country Select</b></td>
                <td>:</td>
                <td>{{$mailData['body']['Selected_Country']}}</td>
            </tr>
            <tr>
                <td><b>HS Code/Product description</b></td>
                <td>:</td>
                <td>{{$mailData['body']['HS_Code']}}</td>
            </tr>
        </table>
    @endif
    
</body>
</html>