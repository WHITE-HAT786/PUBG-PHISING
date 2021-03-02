<?php
// SCRIPT BY ARPANTEK
// COPYRIGHT © ITS ME ARPANTEK
// HARGAI W OK, JANGAN LO UBAH COPYRIGHT NYA

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
$ip = "".get_client_ip()."";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://arpanrizki.my.id/api/get_flag2/api.php"); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"ip=$ip");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$arpantek_flag = curl_exec($ch);
curl_close ($ch);
$exe = explode('-',$arpantek_flag);
$hasil_arpantek_flag = $exe[1];
?>