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
	   <li> <a href="javascript:void(0);"><strong> view Review</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
       
        <div class="row"> 
         <div class="col-md-12"> 
          
         <div class="widget-content"> 
<div>

<div id="txtHint"></div>
<div class="dexcel" align="center"><a href="export2.php"><strong>Download Rating Details</strong></a></div>

</div>
 <form action="" method="post" >
         <table class="table table-striped table-bordered table-hover table-checkable datatable"> <thead> 
        <tr>
		<th>Name</th>
		<th>Email ID</th>
		<th>Review</th>
		<th>Date</th>
		<th>Status</th>
		<th>Action</th>
		</tr> </thead> 

<tbody>  
<?php
$query=$objComm->findAllRecord('rating');
for($i=0;$i<count($query);$i++){
$var=$query[$i]['pageURL'];
?>		  
          <tr id="tr<?=$query[$i][0]?>"> 		 
			<td><?=$query[$i]['name']?></td>
			<td><?=$query[$i]['email']?></td>
			<td><a href="<?php echo $var; ?>" target="_blank"><?=$query[$i]['review']?></a></td>
			<td><?=$query[$i]['date']?></td> 
			<td><?=$query[$i]['status']?></td> 			
			<td><a href="edit-review.php?id=<?=$query[$i][0]?>" ><i class="icon-pencil"></i></a> &nbsp;&nbsp;<a class="delete" onclick="deletedata('rating','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		  
<?php } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
             </div> </div> </div>
			 </body> </html>