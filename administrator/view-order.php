<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>
<script>
  
function order_item_status(oid,cname,cemail,status)
{
 var dataString1 = 'status='+status+'&cname='+cname+'&cemail='+cemail+'&oid='+oid;
 
    var root = "order-item-status.php";
    $.ajax({
        type: "POST",
        url: root,
        data: dataString1,
        async: false,
        cache: false,
        success: function(html) {
           
				alert(html);
		   
        }
    });
}
  
</script>
</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php' ?>


		

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>View Order</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
       
        <div class="row"> 
         <div class="col-md-12"> 
          
         <div class="widget-content"> 
<div>

<div id="txtHint"></div>
</div>
 <form action="" method="post" >
         <table class="table table-striped table-bordered table-hover table-checkable datatable"> <thead> 
        <tr>
        <th>Order Id</th>
		<th>Total Price</th>
		<th>Mobile No.</th>
		<th>Date</th>					 
        <th>Status</th> 
		<th>Order Action</th>
		<th>Action</th>
		</tr> </thead> 
		  
<tbody>  
<?php 
$query=$objComm->findAllRecord('orders_id');
for($i=0;$i<count($query);$i++){

$clientdetail="select * from user_registration where id='".$query[$i]['userId']."'";
$clientdetailres=mysql_query($clientdetail);
$clientdetailRow=mysql_fetch_assoc($clientdetailres);
?>		  
          <tr id="tr<?=$query[$i][0]?>"> 		 
			<td><?=$query[$i]['orderid']?></td> 
			<td><?=$query[$i]['totalprice']?></td> 
			<td><?=$clientdetailRow['user_phone'];?></td> 	
			<td><?=$query[$i]['date']?></td>
			<td><?=$query[$i]['status']?></td> 		
			<td><select onchange="return order_item_status('<?=$query[$i]['orderid']?>','<?=$clientdetailRow['first_name']?>','<?=$clientdetailRow['user_email']?>',this.value)">
		<option value="Pending" <?php if($query[$i]['status']=='Pending') echo 'selected';?>>Pending</option>
		<option value="Cancel" <?php if($query[$i]['status']=='Cancel') echo 'selected';?>>Cancel</option>
		<option value="Dispatched" <?php if($query[$i]['status']=='Dispatched') echo 'selected';?>>Dispatched</option>
		<option value="Delivered" <?php if($query[$i]['status']=='Delivered') echo 'selected';?>>Delivered</option>
		
		</select></td> 
			<td><a href="view-order-detail.php?id=<?=$query[$i][0]?>" ><i class="icon-pencil"></i></a> &nbsp;&nbsp;<a class="delete" onclick="deletedata('orders_id','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="javascript:void window.open('invoice.php?id=<?=$query[$i][0]?>','1429706049635','width=700,height=700,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" href="invoice.php?id=<?=$query[$i][0]?>">Invoice</a></td>
		  </tr> 
		  
<?php } ?>
          </tbody> 
			<tr><td align="center" colspan="7"><a href="downloadexcel.php">Download Excel</a></td></tr>
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
                  
        
        
             </div> </div> </div> </body> </html>