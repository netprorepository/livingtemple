<?php
session_start();
include 'setting.php';

$where="id='".$_GET['id']."' ";  
$order=$objComm->findRecord('orders_id',$where);


$where="id='".$order[0]['userId']."' ";  
$user_detail=$objComm->findRecord('user_registration',$where);


$where="orderId='".$order[0]['orderid']."' ";  
$orderitem=$objComm->findRecord('orders',$where);

$query="select * from orders where orderId = '".$order[0]['orderid']."'";
$queres=mysql_query($query);
$queryRow=mysql_fetch_assoc($queres);
$_SESSION["date"] = $order[0]['date'];
$_SESSION["payment"] = $queryRow['payment_method'];
$_SESSION["orderid"] = $order[0]['orderid'];
$_SESSION["fname"] = $user_detail[0]['first_name'];
$_SESSION["lname"] = $user_detail[0]['last_name'];
$_SESSION["uadd"] = $user_detail[0]['user_address'];
$_SESSION["ucity"] = $user_detail[0]['user_city'];
$_SESSION["uzip"] = $user_detail[0]['user_zip_code'];
$_SESSION["ucon"] = $user_detail[0]['user_country'];
$_SESSION["uphn"] = $user_detail[0]['user_phone'];
$bar = $_SESSION['barcode'];
$status=$order[0]['status'];

if($status=='Pending'){
$bars='http://demo.deliciousweb.in/mobilecover/administrator/demo.gif';
$barcd='01-Demo-9';
}else{
$barcodes = $_SESSION['barcode'];
$barcd = $order[0]['barcode'];
$bars = $order[0]['barcode'];
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

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice</title>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif;"> 
  <tr>
  
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333;"><h3 style="margin-top:0;">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Barcode</h3></br><img alt="testing" src="<?php echo $bars;?>" width="140px" height="65px"><br /><h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $barcd; ?></h3>





    </td>
    <td width="20%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333; text-align:right; vertical-align:top;">&nbsp;</td>
    <td width="40%" style="padding:10px; font:bold 15px Arial, Helvetica, sans-serif; color:#333; text-align:right; vertical-align:top;">
    <h3 style="margin-top:0;">Invoice</h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="  line-height: 1.5em;
  ">
  <tr>
    <td width="25%" style="text-align: left;">Date :</td>
     <td width="14%">&nbsp;</td>
    <td width="40%" style=" border: 1px solid #333;
  line-height: 32px;
  border-bottom: 0;
  padding: 5px 10px;"><?=$order[0]['date']?></td>
  </tr>
  <tr>
    <td width="25%" style="text-align: left;">Payment Type : </td>
     <td width="14%">&nbsp;</td>
    <td width="40%" style=" border: 1px solid #333;
  line-height: 32px;
  border-bottom: 0;
  padding: 5px 10px;"><?=$queryRow['payment_method']?></td>
  
  </tr>
 <tr style="margin-top:10px;">
    <td width="25%" style="text-align: left;">Order Id :</td>
     <td width="14%">&nbsp;</td>
    <td width="40%" style=" border: 1px solid #333;
  line-height: 32px;

  padding: 5px 10px;"><?=$order[0]['orderid']?></td>
  </tr>
 
  
  
</table>

    </td>
    

    </tr>
    <tr>
    <td colspan="3">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px;">Delivery Address :</td>
    
  </tr>
  <tr>
    <td>
    <p style="font:14px normal Arial, Helvetica, sans-serif; line-height:1.5em; padding:0px 10px;">
    <?=$user_detail[0]['first_name'].' '.$user_detail[0]['last_name']?><br />
<?=$user_detail[0]['user_address']?>, <?=$user_detail[0]['user_city']?>,<br />
<?=$user_detail[0]['user_zip_code']?>, <?=$user_detail[0]['user_country']?><br />
Phone : +91<?=$user_detail[0]['user_phone']?>

</p>
    </td>
  </tr>
  
</table>
    
    </td>
    </tr>
  <tr>
     <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 13px;">
  <tr>
    <td colspan="6"><h3>Purchased Items of the package</h3> </td>
    </tr>
  <tr style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:2em; text-transform:uppercase;" >
    <td style="border:1px solid #ccc; padding:5px;" width="15%">Image</td>
   <td style="border:1px solid #ccc; padding:5px;" width="35%">Product Name</td>
   <td style="border:1px solid #ccc; padding:5px;" width="15%">Price</td>
   <td style="border:1px solid #ccc; padding:5px;" width="15%">Qty</td>
   <td style="border:1px solid #ccc; padding:5px;" width="20%"><strong>Total</strong></td>
   
  </tr>
  <?php for($i=0;$i<count($orderitem);$i++){ 
  
   $_SESSION["productname"]=$orderitem[$i]['productName'];
   $_SESSION["img"]=$orderitem[$i]['image'];
   $_SESSION["productprise"]= $orderitem[$i]['productPrice'];
   $_SESSION["qua"]= $orderitem[$i]['quantity'];
   $_SESSION["orde"]=$order[0][2];
  
  ?>
  <tr style="text-transform:lowercase;">
     <td style="border:1px solid #ccc; padding:5px;"><img src="<?=$orderitem[$i]['image']?>" width="60" /></td>
   <td style="border:1px solid #ccc; padding:5px;"><?=$orderitem[$i]['productName']?></td>
   <td style="border:1px solid #ccc; padding:5px;"><?=CURRENCY?> <?=$orderitem[$i]['productPrice']?></td>
   <td style="border:1px solid #ccc; padding:5px;"><?=$orderitem[$i]['quantity']?></td>
   <td style="border:1px solid #ccc; padding:5px;"><?=CURRENCY?> <?=$subtotal=$orderitem[$i]['productPrice']*$orderitem[$i]['quantity']?></td>
   
  </tr>
  <?php $subtotal++;}?>
  <!--<tr style="text-transform:lowercase;">
     <td style="border:1px solid #ccc; padding:5px;"><img src="images/motorola-img.jpg" width="60" /></td>
   <td style="border:1px solid #ccc; padding:5px;">MOFI LEATHER FLIP COVER CASE WITH SLIM BACK STAND FOR XIAOMI MIPAD BLACK</td>
   <td style="border:1px solid #ccc; padding:5px;">1900</td>
   <td style="border:1px solid #ccc; padding:5px;">2</td>
   <td style="border:1px solid #ccc; padding:5px;">3800/-</td>
   
  </tr>
  <tr style="text-transform:lowercase;">
     <td style="border:1px solid #ccc; padding:5px;"><img src="images/motorola-img.jpg" width="60" /></td>
   <td style="border:1px solid #ccc; padding:5px;">MOFI LEATHER FLIP COVER CASE WITH SLIM BACK STAND FOR XIAOMI MIPAD BLACK</td>
   <td style="border:1px solid #ccc; padding:5px;">1900</td>
   <td style="border:1px solid #ccc; padding:5px;">2</td>
   <td style="border:1px solid #ccc; padding:5px;">3800/-</td>
   
  </tr>
  <tr style="text-transform:lowercase;">
     <td style="border:1px solid #ccc; padding:5px; text-transform:capitalize;">Shipping Charge</td>
     <td style="border:1px solid #ccc; padding:5px;"></td>
  
   <td style="border:1px solid #ccc; padding:5px;">0</td>
   <td style="border:1px solid #ccc; padding:5px;">0</td>
   <td style="border:1px solid #ccc; padding:5px;">0</td>
   
  </tr>--->
  <tr style="text-transform:lowercase;">
     <td style="border:1px solid #ccc; padding:5px; background:#333; color:#fff; text-transform:capitalize;">Total</td>
     <td style="border:1px solid #ccc; padding:5px;"></td>
  
   <td style="border:1px solid #ccc; padding:5px;"></td>
   <td style="border:1px solid #ccc; padding:5px;"></td>
   <td style="  border: 1px solid #ccc;
  padding: 5px;
  background-color: #ccc;
  font-size: 27px;"><?=CURRENCY?> <?=$order[0][2]?></td>
   
  </tr>
</table>

    
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    </table>

    </td>
  </tr>
  <tr>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" style="padding:10px; background:#333; color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:15px;">Sold by :</td>
    <td width="20%"></td>
    <td width="40%" style="padding:10px; color:#333; font-family:Arial, Helvetica, sans-serif; font-size:15px; text-transform:uppercase; font-weight:bold;">If product is undelivered then revert the product to:</td>
  </tr>
  <tr>
    <td><p style="font:normal 14px Arial, Helvetica, sans-serif; color:#333; line-height:1.5em; ">Brain Freezer, B 196/197 Basement Lajpat Nagar 1, , NEW DELHI - 110024<br /><br />
    <span style="background:#333; color:#fff; padding:5px;">VAT/TIN No: 07100466405</span></p></td>
    <td>&nbsp;</td>
    <td style="vertical-align:top;"><p style="font:normal 14px Arial, Helvetica, sans-serif; color:#333; line-height:1.5em; ">Brain Freezer, B 196/197 Basement Lajpat Nagar 1, , NEW DELHI - 110024
    </p></td>
  </tr>
  <tr>
   <td></td>
   <td></td>
   <td></td>
  </tr>
  <tr>
   <td></td>
   <td></td>
   <td></td>
  </tr>
  <tr>
   <td></td>
   <td></td>
   <td></td>
  </tr>
  <tr>
   <td colspan="3" style="background:#C00; color:#fff; padding:10px; text-align:center; font-family:Arial, Helvetica, sans-serif;">Thanks For Shopping With Mobile Covers</td>
  </tr>
</table>

    
  </tr>
  
 
  
</table>
<div class="buttons"> 
		<a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
		
		</div> 
</body>
</html>
