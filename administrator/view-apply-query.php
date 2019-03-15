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
	   <li><strong> View Online Applications </strong></li> </ul> 
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
		<th>Address</th>
		<th>Dob</th>
		<th>Religion</th>
		<th>Language</th>
		<th>Date</th>
		<th>Action</th>
		</tr> </thead> 

<tbody>  
<?php 
$query=$objComm->findAllRecord('tbl_application');


for($i=0; $i<count($query); $i++){
	
?>		  
            <tr id="tr<?=$query[$i][0]?>"> 		 
		    <td><?=$query[$i]['surname']?> <?=$query[$i]['fname']?></td> 
		    <td><?=$query[$i]['email']?></td> 
		    <td><?=$query[$i]['address']?></td> 
		    <td><?=$query[$i]['dob']?></td> 
		    <td><?=$query[$i]['religion']?></td> 
		    <td><?=$query[$i]['language']?></td> 
			<td><?=$query[$i]['date']?></td> 
		    <td><a class="delete" onclick="deletedata('tbl_application','id','<?=$query[$i]['id']?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
	  
<?php  } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
             </div> </div> </div>
			 </body> </html>