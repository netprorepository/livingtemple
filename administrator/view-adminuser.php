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
	   <li> <a href="javascript:void(0);"><strong> view Admin User</strong></a> </li> </ul> 
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
       	<th>User Name</th>
		<th>Email ID</th>
		<!--<th>profile_pic</th>-->
		<th>Status</th>
		<th>Action</th>
		</tr> </thead> 

<tbody>  
<?php 
$query=$objComm->findAllRecord('administrator');
for($i=0;$i<count($query);$i++){
?>		  
          <tr id="tr<?=$query[$i][0]?>"> 		 
			
			<td><?=$query[$i]['fullname']?></td> 
			<td><?=$query[$i]['emailid']?></td> 
			<!--<td><img src="img/<?=$query[$i]['profile_pic']?>"  width="20%"/></td>-->
			<td><?=$query[$i]['status']?></td> 			
			
			<td><a href="edit-adminuser.php?id=<?=$query[$i][0]?>" ><i class="icon-pencil"></i></a> &nbsp;&nbsp;
			<a class="delete" onclick="deletedata('administrator','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		  
<?php } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
             </div> </div> </div>
			 </body> </html>