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
	   <li> <a href="javascript:void(0);"><strong>View App. Process</strong></a> </li> </ul> 
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
		 <th>ID</th>
		 <th>Question</th>
         <th>Description</th>		 
         <th>Title</th>		 
         <th>Status</th> 
		 <th>Action</th>
		 </tr> </thead> 
		  
<tbody>  
<?php 
$query=$objComm->findAllRecord('tbl_faq');
for($i=0;$i<count($query);$i++)
{
$result=$objComm->singleRowFetch('tbl_faq_cat','id',$query[$i][3]);

?>		  
          <tr id="tr<?=$query[$i][0]?>"> 
			<td><?=$i+1?></td>
			<td><?=$query[$i][1]?></td>
			<td><?=$query[$i][2]?></td>
			<td><?=$result[0][1]?></td> 
			<td><?=$query[$i][4]?></td> 
			<td><a href="edit-faq.php?id=<?=$query[$i][0]?>"><i class="icon-pencil"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="delete" onclick="deletedata('tbl_faq','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		  
<?php } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
  
        
        
             </div> </div> </div> </body> </html>