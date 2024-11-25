<?php
$formtype =$_POST['contactform'];
if($formtype=='1'){
	$subject = "Packages Inquiry : ".$_POST['first_name'];
}


  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip));
    
    

   
// echo 'Country Name: ' . $ipdat->geoplugin_countryName . "<br>";
// echo 'City Name: ' . $ipdat->geoplugin_city . "<br>";
// echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "<br>";
// echo 'Latitude: ' . $ipdat->geoplugin_latitude . "<br>";
// echo 'Longitude: ' . $ipdat->geoplugin_longitude . "<br>";
// echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "<br>";
// echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "<br>";
// echo 'Timezone: ' . $ipdat->geoplugin_timezone;
//     exit();

//client ifo
$ipaddress=$ip;
$country=$ipdat->geoplugin_countryName;
$city=$ipdat->geoplugin_city;
$timeZone=$ipdat->geoplugin_timezone;
//endinfo


$data='<table style="width:100%; border: 1px solid black; border-collapse: collapse;">';
foreach($_POST as $key=>$value){
    $_key=ucwords(str_replace('_',' ',$key));
    $data.='<tr>
    <td style="border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px; font-weight: 500;">'.$_key.'<td>
    <td style=" border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px">'.$value.'</td>
    </tr>';
}

 $data.='<tr>
    <td style="border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px; font-weight: 500;">IP<td>
    <td style=" border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px">'.$ipaddress.'</td>
    </tr>
    <tr>
    <td style="border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px; font-weight: 500;">Country<td>
    <td style=" border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px">'.$country.'</td>
    </tr>
    <tr>
    <td style="border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px; font-weight: 500;">City<td>
    <td style=" border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px">'.$city.'</td>
    </tr>
    <tr>
    <td style="border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px; font-weight: 500;">Time Zone<td>
    <td style=" border: 1px solid black; border-collapse: collapse; padding: 15px; text-align: left; font-size:15px">'.$timeZone.'</td>
    </tr>';
    
    
$data.='</table>';
$subject= "Author Success Publishing";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$mailSent=mail("lead@authorsuccesspublishing.com",$subject,$data,$headers);
if($mailSent){
    header('Location:thank-you.php');
    echo json_encode(['status'=>'1','data'=>'Mail Sent']);
} else {
    header('Location:error.php');
    echo json_encode(['status'=>'0','data'=>'Some error occured']);
}
?>