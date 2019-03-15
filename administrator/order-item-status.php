<?php
session_start();
include('setting.php');

extract($_POST);
$status=$_REQUEST['status'];

//echo 'Your order item status has been changed '.$status;

$bar = $_SESSION["barcode"];
$date = $_SESSION["date"];
$pay = $_SESSION["payment"];
$oids = $_REQUEST["orderid"];
$oid = $_SESSION["orderid"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$uadd = $_SESSION["uadd"];
$ucity = $_SESSION["ucity"];
$uzip = $_SESSION["uzip"];
$ucon = $_SESSION["ucon"];
$uphn = $_SESSION["uphn"];
$product = $_SESSION["productname"];
$img = $_SESSION["img"];
$productprise = $_SESSION["productprise"];
$qty = $_SESSION["qua"];
$oder = $_SESSION["orde"];

$sql1 = "select * from `barcode` limit 0,1";
$result1 = mysql_query($sql1);
$row = mysql_fetch_assoc($result1);
$count = mysql_num_rows($result1);


// display new barcode 
if($status=='Cancel' || $status=='Pending' ){
$sql2 = "UPDATE  `mobilecover`.`orders_id` SET  `status` =  '$status' WHERE  `orders_id`.`orderid` = '$oid'";;
mysql_query($sql2);
$to = $cemail;
$subject = "Order Status From  " .$_SERVER['SERVER_NAME'];
$content='Hello '.$cname.' your Order '.$oid.' has been '.$status.'!!<br /><br />';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: <info@deliciousweb.net>' . "\r\n";
$headers .= 'Cc: pankaj.choursia0001@gmail.com' . "\r\n";

$oks = mail($to,$subject,$content,$headers);
			
	if($oks)
	 {
	 echo "Are you Sure Want To ".$status;
	 }
	 else{
		echo "Error in Message Send";
	 }		
}
if($status=='Delivered'){
$sql2 = "UPDATE  `mobilecover`.`orders` SET  `status` =  '$status' WHERE  `orders`.`orderId` = '$oid'";
mysql_query($sql2);
$bar = $_SESSION["barcode"];
$vari=strlen($bar);
if($vari==4){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/barcode.gif';
}
if($vari==5){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/1.gif';
}
if($vari==6){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/2.gif';
}
if($vari==7){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/3.gif';
}
if($vari==8){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/4.gif';
}
if($vari==9){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/5.jpg';
}
if($vari==10){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/6.png';
}
if($vari==11){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/7.png';
}
if($vari==12){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/8.jpg';
}
$id = $row['id'];
$sql3 = "UPDATE  `mobilecover`.`orders_id` SET  `status` =  '$status' WHERE  `orders_id`.`orderid` = '$oid'";
mysql_query($sql3);	

$to = $cemail;
$subject = "Order Status From  " .$_SERVER['SERVER_NAME'];
$content='Hello '.$cname.'<br /><br />';
$content.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$content.='<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Invoice</title></head>';
$content.='<body><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif;">'; 
$content.='<tr><td><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
$content.='<td width="40%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333;">';
$content.='<tr><td colspan="3" style="background:#C00; color:#fff; font-size:24px; text-transform:capitalize; padding:10px; text-align:center; font-family:Arial, Helvetica, sans-serif;">'.$cname.' your order has been '.$status.'</td></tr><br />';
$content.='</br><img alt="logo" src="http://demo.deliciousweb.in/mobilecover/images/logo.png" width="170px"><br /><br /><br />';
$content.='</br><img alt="barcode" src="'.$bars.'" width="140px" height="65px"><br />'.$bar.'<br />';
$content.='</td><td width="20%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333; text-align:right; vertical-align:top;"></td>';
$content.='<td width="40%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333; text-align:right; vertical-align:top;">';
$content.='<h3 style="margin-top:0;">'.$var.' Invoice</h3>';
$content.='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="  line-height: 1.5em;"><tr>';
$content.='<td width="25%" style="text-align: left;">Date :</td><td width="14%">&nbsp;</td>';
$content.='<td width="40%" style=" border: 1px solid #333;line-height: 32px;border-bottom: 0;padding: 5px 10px;">'.$date.'</td></tr><tr>';
$content.='<td width="25%" style="text-align: left;">Payment Type : </td><td width="14%">&nbsp;</td>';
$content.='<td width="40%" style=" border: 1px solid #333;line-height: 32px;border-bottom: 0;padding: 5px 10px;">'.$pay.'</td>';
$content.='</tr><tr style="margin-top:10px;"><td width="25%" style="text-align: left;">Order Id :</td><td width="14%">&nbsp;</td>';
$content.='<td width="40%" style=" border: 1px solid #333;line-height: 32px; padding: 5px 10px;">'.$oid.'</td></tr>';
$content.='</table></td></tr> <tr><td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
$content.='<td style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px;">Delivery Address :</td>';
$content.='</tr><tr><td><p style="font:14px normal Arial, Helvetica, sans-serif; line-height:1.5em; padding:0px 10px;">'.$fname.','.$lname.',<br />';
$content.='&nbsp;'.$uadd.','.$ucity.'<br />';
$content.='&nbsp;'.$uzip.','.$ucon.'<br />';
$content.='Phone : +91'.$uphn.'&nbsp;';
$content.='</p></td></tr></table></td> </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td colspan="3">';
$content.='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 13px;"><tr><td colspan="6">';
$content.='<h3>Purchased Items of the package</h3> </td></tr><tr style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:2em; text-transform:uppercase;" >';
$content.='<td style="border:1px solid #ccc; padding:5px;" width="15%">Image</td><td style="border:1px solid #ccc; padding:5px;" width="35%">Product Name</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;" width="15%">Price</td><td style="border:1px solid #ccc; padding:5px;" width="15%">Qty</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;" width="20%"><strong>Total</strong></td>';
$content.='</tr><tr style="text-transform:lowercase;">';
$content.='<td style="border:1px solid #ccc; padding:5px;"><img src="'.$img.'" width="60" /></td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.$product.'</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.CURRENCY .$productprise.'</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.$qty.'</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.CURRENCY .$subtotal=$productprise*$qty.'</td>';
$content.='</tr><tr style="text-transform:lowercase;"><td style="border:1px solid #ccc; padding:5px; background:#333; color:#fff; text-transform:capitalize;">Total</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;"></td><td style="border:1px solid #ccc; padding:5px;"></td><td style="border:1px solid #ccc; padding:5px;"></td>';
$content.='<td style="  border: 1px solid #ccc;padding: 5px;background-color: #ccc;font-size: 27px;">'.CURRENCY .$oder.'</td>';
$content.='</tr></table>';
$content.='</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
$content.='</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table> </td></tr><tr>';
$content.='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="40%" style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px;">Sold by :</td>';
$content.='<td width="20%"></td><td width="40%" style="padding:10px; color:#333; font-family:Arial, Helvetica, sans-serif; font-size:15px; text-transform:uppercase; font-weight:bold;">If product is undelivered then revert the product to:</td>';
$content.='</tr><tr><td><p style="font:normal 14px Arial, Helvetica, sans-serif; color:#333; line-height:1.5em; ">Brain Freezer, B 196/197 Basement Lajpat Nagar 1, , NEW DELHI - 110024<br />';
$content.='<br />';

$content.='</p></td>';
$content.='<td>&nbsp;</td><td style="vertical-align:top;">';
$content.='<p style="font:normal 14px Arial, Helvetica, sans-serif; color:#333; line-height:1.5em; ">Brain Freezer, B 196/197 Basement Lajpat Nagar 1, , NEW DELHI - 110024</p>';
$content.='</td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr>';
$content.='<td></td><td></td><td></td></tr><tr><td colspan="3" style="background:#C00; color:#fff; padding:10px; text-align:center; font-family:Arial, Helvetica, sans-serif;">Thanks For Shopping With Mobile Covers</td></tr></table></tr></table></body></html>';




// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: <info@deliciousweb.net>' . "\r\n";
$headers .= 'Cc: pankaj.choursia0001@gmail.com' . "\r\n";

$ok = mail($to,$subject,$content,$headers);
			
	if($ok)
	 {
	 echo "Are you Sure Want To ".$status;
	 }
	 else{
		echo "Error in Message Send";
	 }	

}
else{
if($count > 0){
$sql2 = "UPDATE  `mobilecover`.`orders` SET  `status` =  '$status' WHERE  `orders`.`orderId` = '$oid'";
mysql_query($sql2);
$barcode = $row['barcode'];
$_SESSION['barcode'] = $row['barcode'];
$bars = $row['barcode'];
$vari=strlen($bars);
if($vari==4){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/barcode.gif';
}
if($vari==5){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/1.gif';
}
if($vari==6){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/2.gif';
}
if($vari==7){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/3.gif';
}
if($vari==8){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/4.gif';
}
if($vari==9){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/5.jpg';
}
if($vari==10){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/6.png';
}
if($vari==11){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/7.png';
}
if($vari==12){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/8.jpg';
}
$id = $row['id'];
if($status=='Dispatched' || $status=='Delivered'){
$qry = "DELETE FROM `barcode` WHERE `barcode`.`id` = '$id'";
mysql_query($qry);	

$sql3 = "UPDATE  `mobilecover`.`orders_id` SET  `status` =  '$status',
`barcode` =  '$barcode' WHERE  `orders_id`.`orderid` = '$oid'";
mysql_query($sql3);	
}
$to = $cemail;
$subject = "Order Status From  " .$_SERVER['SERVER_NAME'];
$content='Hello '.$cname.'<br /><br />';
$content.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$content.='<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Invoice</title></head>';
$content.='<body><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif;">'; 
$content.='<tr><td><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
$content.='<td width="40%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333;">';
$content.='<tr><td colspan="3" style="background:#C00; color:#fff; font-size:24px; text-transform:capitalize; padding:10px; text-align:center; font-family:Arial, Helvetica, sans-serif;">'.$cname.' your order has been '.$status.'</td></tr><br />';
$content.='</br><img alt="logo" src="http://demo.deliciousweb.in/mobilecover/images/logo.png" width="170px"><br /><br /><br />';
$content.='</br><img alt="testing" src="'.$bars.'" width="140px" height="65px"><br />'.$barcode.'<br />';
$content.='</td><td width="20%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333; text-align:right; vertical-align:top;"></td>';
$content.='<td width="40%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333; text-align:right; vertical-align:top;">';
$content.='<h3 style="margin-top:0;">'.$var.' Invoice</h3>';
$content.='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="  line-height: 1.5em;"><tr>';
$content.='<td width="25%" style="text-align: left;">Date :</td><td width="14%">&nbsp;</td>';
$content.='<td width="40%" style=" border: 1px solid #333;line-height: 32px;border-bottom: 0;padding: 5px 10px;">'.$date.'</td></tr><tr>';
$content.='<td width="25%" style="text-align: left;">Payment Type : </td><td width="14%">&nbsp;</td>';
$content.='<td width="40%" style=" border: 1px solid #333;line-height: 32px;border-bottom: 0;padding: 5px 10px;">'.$pay.'</td>';
$content.='</tr><tr style="margin-top:10px;"><td width="25%" style="text-align: left;">Order Id :</td><td width="14%">&nbsp;</td>';
$content.='<td width="40%" style=" border: 1px solid #333;line-height: 32px; padding: 5px 10px;">'.$oid.'</td></tr>';
$content.='</table></td></tr> <tr><td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>';
$content.='<td style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px;">Delivery Address :</td>';
$content.='</tr><tr><td><p style="font:14px normal Arial, Helvetica, sans-serif; line-height:1.5em; padding:0px 10px;">'.$fname.','.$lname.',<br />';
$content.='&nbsp;'.$uadd.','.$ucity.'<br />';
$content.='&nbsp;'.$uzip.','.$ucon.'<br />';
$content.='Phone : +91'.$uphn.'&nbsp;';
$content.='</p></td></tr></table></td> </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td colspan="3">';
$content.='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 13px;"><tr><td colspan="6">';
$content.='<h3>Purchased Items of the package</h3> </td></tr><tr style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:2em; text-transform:uppercase;" >';
$content.='<td style="border:1px solid #ccc; padding:5px;" width="15%">Image</td><td style="border:1px solid #ccc; padding:5px;" width="35%">Product Name</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;" width="15%">Price</td><td style="border:1px solid #ccc; padding:5px;" width="15%">Qty</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;" width="20%"><strong>Total</strong></td>';
$content.='</tr><tr style="text-transform:lowercase;">';
$content.='<td style="border:1px solid #ccc; padding:5px;"><img src="'.$img.'" width="60" /></td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.$product.'</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.CURRENCY .$productprise.'</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.$qty.'</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;">'.CURRENCY .$subtotal=$productprise*$qty.'</td>';
$content.='</tr><tr style="text-transform:lowercase;"><td style="border:1px solid #ccc; padding:5px; background:#333; color:#fff; text-transform:capitalize;">Total</td>';
$content.='<td style="border:1px solid #ccc; padding:5px;"></td><td style="border:1px solid #ccc; padding:5px;"></td><td style="border:1px solid #ccc; padding:5px;"></td>';
$content.='<td style="  border: 1px solid #ccc;padding: 5px;background-color: #ccc;font-size: 27px;">'.CURRENCY .$oder.'</td>';
$content.='</tr></table>';
$content.='</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
$content.='</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table> </td></tr><tr>';
$content.='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="40%" style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px;">Sold by :</td>';
$content.='<td width="20%"></td><td width="40%" style="padding:10px; color:#333; font-family:Arial, Helvetica, sans-serif; font-size:15px; text-transform:uppercase; font-weight:bold;">If product is undelivered then revert the product to:</td>';
$content.='</tr><tr><td><p style="font:normal 14px Arial, Helvetica, sans-serif; color:#333; line-height:1.5em; ">Brain Freezer, B 196/197 Basement Lajpat Nagar 1, , NEW DELHI - 110024<br />';
$content.='<br />';

$content.='</p></td>';
$content.='<td>&nbsp;</td><td style="vertical-align:top;">';
$content.='<p style="font:normal 14px Arial, Helvetica, sans-serif; color:#333; line-height:1.5em; ">Brain Freezer, B 196/197 Basement Lajpat Nagar 1, , NEW DELHI - 110024</p>';
$content.='</td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr>';
$content.='<td></td><td></td><td></td></tr><tr><td colspan="3" style="background:#C00; color:#fff; padding:10px; text-align:center; font-family:Arial, Helvetica, sans-serif;">Thanks For Shopping With Mobile Covers</td></tr></table></tr></table></body></html>';




// More headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: <info@deliciousweb.net>' . "\r\n";
$headers .= 'Cc: pankaj.choursia0001@gmail.com' . "\r\n";

$oky = mail($to,$subject,$content,$headers);
			
	if($oky)
	 {
	 echo "Are you Sure Want To ".$status;
	 }
	 else{
		echo "Error in Message Send";
	 }		
}else{

	//echo "Sorry there is no bar code in database.";
}
}
			

?>