<?php
include 'setting.php';
$where="id='".$_GET['id']."' ";  
$order=$objComm->findRecord('orders_id',$where);

$where="id='".$order[0]['userId']."' ";  
$user_detail=$objComm->findRecord('user_registration',$where);


$where="orderId='".$order[0]['orderid']."' ";  
$orderitem=$objComm->findRecord('orders',$where);

$clientdetail="select * from orders where orderId='".$order[0]['orderid']."'";
$clientdetailres=mysql_query($clientdetail);
$clientRow=mysql_fetch_assoc($clientdetailres);
?>
<div class="buttons"> 
		<a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
		
		</div>
<table width="100%" border="0" bgcolor="#FFFFFF" align="center" style="border:1px solid #e70f19;">
  <tbody>
  <tr>
	<td align="center">
		<table width="100%"><tbody><tr><td align="center">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
			<tbody><tr height="100" style="padding:30px 0; ">

				<td width="40%"><img src="img/logo.png" alt="Logo" width="250"class="CToWUd" style="padding-left:25px;"></td>
                
				<td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="32%" ></td>
    <td width="68%" rowspan="2" style="font-family:arial,verdana;font-size:16px;font-weight:bold;color:#515151"><?=$order[0][7]?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>
</td>
			</tr>
		</tbody></table>
		<table width="95%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
             <tr>
				<td style="font-family:arial,verdana;font-size:16px;font-weight:bold;color:#515151" height="50px">Prepaid <span class="il">Order No:<?=$order[0]['orderid']?></td>
			</tr>
            <tr>
<td style="font-family:arial,verdana;font-size:12px;color:#515151; padding:10px; border:2px dotted #999999;background-color:#eaf2f5;" valign="middle" width="100%">Delivery Address :</a></td>
</tr>
            <tr>
<td style="font-family:arial,verdana;font-size:12px;color:#515151;text-align:justify" valign="top">
<br />
<p style="font-family:arial,verdana;font-size:12px;color:#515151;">
<b><?=$user_detail[0]['first_name'].' '.$user_detail[0]['last_name']?></b><br>
<?=$user_detail[0]['user_email']?><br>
<b>Customer Number : +91 <?=$user_detail[0]['user_phone']?></b><br>
<b><?=$clientRow['address']?> ,
<?=$clientRow['city']?>,
<?=$clientRow['pincode']?>,
<?=$clientRow['country']?></b>
<br /><br /><br />
<hr />
<h4 style="font-family:arial,verdana;font-size:16px;font-weight:bold;color:#515151" height="50px">Sold By</h4>
<p>
Mobilecove, B 196/197 Basement Lajpat Nagar 1, , NEW DELHI - 110024
<br />
</p>
<p><strong>VAT/TIN No: 07100466405<br /><br />

</strong><br /><br /><br /></p>

</p>
</td>
<style>
.new2 tr td{border: 1px solid #333;
  padding: 10px;}
</style>
</tr>
		</tbody></table>
		<table width="95%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
            
            <tr>
			  <td valign="top" style="font-family:arial,verdana;font-size:12px;color:#4e4e4e;text-align:justify">
					

<table style="width:100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<h2>Your Product are :</h2>
<tr>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="new2" style="border:2px dotted #999999;background-color:#eaf2f5;  font-family:Arial, Helvetica, sans-serif; font-size:14px;">
  <tr style="font-family:arial,verdana;font-size:12px;color:#fff; background:#333;  ">
    <td>#</td>
	<td style="padding:0 0 0 10px;">Product</td>
    <td>Item Price</td>
    <td>Qty</td>
    <td>Subtotal</td>
  </tr>
  <?php for($i=0;$i<count($orderitem);$i++){ ?>
  <tr style="border-bottom:1px solid #333; background:#fff;  ">
	<td><?=$i+1?></td>
    <td><?=$orderitem[$i]['productName']?> </td>
    <td><?=CURRENCY?> <?=$orderitem[$i]['productPrice']?></td>
    <td><?=$orderitem[$i]['quantity']?></td>
    <td><?=CURRENCY?> <?=$subtotal=$orderitem[$i]['productPrice']*$orderitem[$i]['quantity']?></td>
  </tr>
  <?php $subtotal++;}?>
  <!--<tr style="border-bottom:1px solid #333; background:#fff;  ">
  
    <td>Jojo Black Cover </td>
    <td>Rs. 299</td>
    <td>2</td>
    <td>Rs. 299</td>
  </tr>
  <tr style="border-bottom:1px solid #333; background:#fff;  ">
  
    <td>Jojo Black Cover </td>
    <td>Rs. 299</td>
    <td>2</td>
    <td>Rs. 299</td>
  </tr>-->
  <tr style="border-bottom:1px solid #333; background:#fff;  ">
  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Total :  <?=CURRENCY?> <?=$order[0][2]?></td>
  </tr>
  
  
  
</table>

</tr>


</tbody>
</table>
				</td>
			</tr>
            <tr>
            
            </tr>
		</tbody></table>
		
	</td>
  </tr>
</tbody></table>
	</td>
  </tr>
</tbody>
</table>