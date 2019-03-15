<?php
include "classes/config.php";
include "classes/class.phpmailer.php";
include "classes/dbConnect.php";
include "classes/loginClass.php";
include "classes/commonFunctionClass.php";
include "classes/cart.calass.php";
include "classes/userloginclass.php";
include "classes/pagination.cls.php";


$objdbconnect		=	new dbConnect();
$objLogin			=	new adminLogin($_POST);
$objComm			=	new commonFunctionClass();
$cart				=	new Cart();
$objUserLogin		=	new userLogin();
$pagination			=	new pagination();










$mail 				= 			new PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
?>

