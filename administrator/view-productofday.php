<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php' ?>


		

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>View Product</strong></a> </li> </ul> 
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
        <th>Category</th>
		<th>Sub Category</th>
		<th>Name</th>
		<th>Code</th>
		<th>Discount %</th>
		<th>Description</th>
		<th>Price</th>
		<th>Discount Price</th>
		<th>Images</th>
		<th>color</th>
		<th>Series</th>
		<th>Material</th>
		<th>Function</th>
		<th>Phone Model</th>
		<th>Delivery Time</th>				 
        <th>Status</th> 
		<th>Action</th>
		</tr> </thead> 
		  
<tbody>  
<?php 
$where="status='Active'";
$query=$objComm->findRecord('products',$where);
for($i=0;$i<count($query);$i++){
?>		  
          <tr id="tr<?=$query[$i][0]?>"> 		 
			<td><?=$query[$i]['category_id']?></td> 
			<td><?=$query[$i]['subcategory_id']?></td> 
			<td><?=$query[$i]['name']?></td> 
			<td><?=$query[$i]['code']?></td> 
			<td><?=$query[$i]['discount']?></td>
			<td><?=substr($query[$i]['description'],0,100)?></td> 
			<td><?=$query[$i]['price']?></td> 
			<td><?=$query[$i]['discount_price']?></td> 
			<td><img src="<?=$query[$i]['images']?>" ></td> 
			<td><?=$query[$i]['color']?></td> 
			<td><?=$query[$i]['series']?></td> 
			<td><?=$query[$i]['material']?></td> 
			<td><?=$query[$i]['function']?></td> 
			<td><?=$query[$i]['phone_model']?></td> 
			<td><?=$query[$i]['delivery_time']?></td>			 
			<td><?=$query[$i]['status']?></td> 			
			<td><!--<a href="edit-product.php?id=<?=$query[$i][0]?>" ><i class="icon-pencil"></i></a>--> &nbsp;&nbsp;<a class="delete" onclick="deletedata('products','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		  
<?php } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
  
        
        
             </div> </div> </div> </body> </html>