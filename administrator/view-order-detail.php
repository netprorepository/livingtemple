<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';
 $where="id='".$_GET['id']."' ";  
$order=$objComm->findRecord('orders_id',$where);

$where="id='".$order[0]['userId']."' ";  
$user_detail=$objComm->findRecord('user_registration',$where);


$where="orderId='".$order[0]['orderid']."' ";  
$orderitem=$objComm->findRecord('orders',$where);

$clientdetail="select * from orders where orderId='".$order[0]['orderid']."'";
$clientdetailres=mysql_query($clientdetail);
$clientRow=mysql_fetch_assoc($clientdetailres);

if(isset($_POST['submit']))
			{
			$bar = md5(uniqid());
			extract($_POST);			
			$update_arr=array(								
			'barcode'=>$bar,
			'status'=>$status				
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('orders_id',$update_arr,$where); 		
			$message='successfully';
			
			$content='Hello '.$clidenname.'<br /><br />';
			$content.='Your order: '.$orderno.'  <br /><br />';
			$content.='consignment no: '.$bar.'  <br /><br />';
			$content.='Your booking has been '.$status.' <br /><br />';	
			$content.='Sincerely,\n<br>';
			$content.='Your Mobilcover Team\n<br /><br />';
			$content.='Note: This email address cannot accept replies.\n<br/>';
			
			//$mail->SetFrom("p@deliciousweb.net");
			//$mail->Subject ="Order no:".$orderno;
			//$mail->Body = $content;
			//$mail->AddAddress($clidenemail);
			//if(!$mail->Send()){
			//echo "Mailer Error: " . $mail->ErrorInfo;
			//}
			//else{
			//echo "Message has been sent";
			//}   
			$subject = "Order Status From  " .$_SERVER['SERVER_NAME'];
			$sent_from = "info@deliciousweb.net";
			$sent_to= $user_detail[0]['user_email'];
			echo $ok = $objComm->mailing($sent_to,$sent_from,$subject,$content);
			if($ok)
			 {
			 echo "Message has been sent";
			 }
			 else{
				echo "Error in Message Send";
			 }
			
			}
			
			



?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>View Order Detail</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
		
		
		<div class="col-md-12"> 
		<div class="widget invoice"> 
		<div class="widget-header"> 
		<div class="pull-left"> 
		<h2><?=$user_detail[0]['first_name'].' '.$user_detail[0]['last_name']?></h2> </div> 
		<div id="message"> <?=$$message?></div>
		<div class="pull-right"> 
		<p class="invoice-nr">
		<strong>Order No.:</strong> <?=$order[0]['orderid']?></p> 
		<p class="invoice-date"><?=$order[0]['date']?></p> </div> </div> 
		<div class="widget-content"> 
		<div class="row"> 
		<div class="col-md-6"> <h3>Client Detail</h3> 
		<address> <strong><?=$user_detail[0]['user_email']?></strong>
		<br> <?=$user_detail[0]['user_phone']?><br> 
		 </address> </div> 
		
		
		<div class="col-md-6 align-right"> <h3>Address</h3> 
		<address> <br>  <?=$clientRow['address']?><br> <?=$clientRow['city']?>
		<br> <?=$clientRow['pincode']?>
		<br> <?=$clientRow['country']?>
		 </address> </div> 
		
		
		<div class="col-md-12"> 
		<table class="table table-striped table-hover"> <thead> 
		<tr> 
		<th>#</th> 		
		<th class="hidden-xs">Product Name</th> 
		<th class="hidden-xs">Product Code</th>
		<th class="hidden-xs">Quantity</th> 
		<th class="hidden-xs">Unit Cost</th> 
		<th>Total</th> 
		<!--<th>Status</th>--> </tr>
		</tr> </thead> <tbody> 
	<?php for($i=0;$i<count($orderitem);$i++){ ?>	
		<tr> 
		<td><?=$i+1?></td> 
		<td><?=$orderitem[$i]['productName']?></td>
		<td class="hidden-xs"><?=$orderitem[$i]['productId']?></td> 
		<td class="hidden-xs"><?=$orderitem[$i]['quantity']?></td> 
		<td class="hidden-xs"><?=CURRENCY?> <?=$orderitem[$i]['productPrice']?></td> 
		<td><?=CURRENCY?> <?=$orderitem[$i]['productPrice']*$orderitem[$i]['quantity']?></td> 
		<!--<td><select onchange="return order_item_status('<?=$orderitem[$i]['id']?>',this.value)">
		<option value="Pending" <? if($orderitem[$i]['status']=='Pending') echo 'selected';?>>Pending</option>
		<option value="Cancel" <? if($orderitem[$i]['status']=='Cancel') echo 'selected';?>>Cancel</option>
		<option value="Dispatched" <? if($orderitem[$i]['status']=='Dispatched') echo 'selected';?>>Dispatched</option>
		<option value="Delivered" <? if($orderitem[$i]['status']=='Delivered') echo 'selected';?>>Delivered</option>
		
		</select></td> -->
		</tr> 
		<?php } ?>
		
		</tbody> </table> </div> 
		</div> 
		<div class="row padding-top-10px"> 
		<div class="col-md-6"> 
		 </div> 
		<div class="col-md-6 align-right"> 
		<ul class="list-unstyled amount padding-bottom-5px"> 
		
		 <li class="total"><strong>Total:</strong> <?=CURRENCY?> <?=$order[0][2]?></li> 
		</ul> 
		<!--<div class="buttons"> 
		<a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
		
		</div>--> </div> </div> </div> </div> 
		
		
		
		
		
		
		
		
		
		
		</div>
		
         </div> 
        
         
<script>
  
function order_item_status(id,status)
{
var xmlhttp;
if (status=="")
  {
  document.getElementById("message").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("message").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","order-item-status.php?id="+id+'&status='+status,true);
xmlhttp.send();
}
  
</script>
        
        
             </div> 
			 
			 
			 
			 
		<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
         
         <div class="form-group status_two" style="display: none;">
          
          
		  
		  
			<div class="form-group"><label class="col-md-2 control-label">Status:</label> 
			  <div class="col-md-6"> 
			  <select class="form-control" name="status">
				<option value="Pending" <? if($order[0]['status']=='Pending') echo 'selected';?>>Pending</option>
				<option value="Cancel" <? if($order[0]['status']=='Cancel') echo 'selected';?>>Cancel</option>
				<option value="Dispatched" <? if($order[0]['status']=='Dispatched') echo 'selected';?>>Dispatched</option>
				<option value="Delivered" <? if($order[0]['status']=='Delivered') echo 'selected';?>>Delivered</option>
						  
			  </select>
			  </div> 
			  </div>		  
            <input type="hidden" value="<?=$order[0]['orderid']?>" name="orderno" />
			<input type="hidden" value="<?=$user_detail[0]['user_email']?>" name="clidenemail" />
			<input type="hidden" value="<?=$user_detail[0]['first_name'].' '.$user_detail[0]['last_name']?>" name="clidenname" />
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
			 </div>


			 </div>



			 </body> </html>
			 

			 

<?php require_once('include/footer.php') ?>
<?php require_once('include/script.php') ?>	 