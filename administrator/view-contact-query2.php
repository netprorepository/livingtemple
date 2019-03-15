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
	   <li> <a href="javascript:void(0);"><strong> view Footer Contact us Query </strong></li> </ul> 
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
       
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Description</th>
		<th>Date</th>
		<th>Action</th>
		</tr> </thead> 

<tbody>  
<?php 
$code_query = "SELECT * FROM  `tbl_query2`";
$code_result = mysql_query($code_query);
$x = 0; 
while($query = mysql_fetch_array($code_result)){
	
?>		  
            <tr id="tr<?=$x?>"> 		 
		    <td><?=$query['name']?></td> 
		    <td><?=$query['email']?></td> 
		    <td><?=$query['phone']?></td> 
			<td><?=$query['description']?></td> 
			<td><?=$query['date']?></td> 
		    <td><a class="delete" onclick="deletedata('tbl_query2','id','<?=$x?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
	  
<?php $x++; } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
             </div> </div> </div>
			 </body> </html>