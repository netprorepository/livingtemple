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
	   <li> <a href="javascript:void(0);"><strong>view Subcategory</strong></a> </li> </ul> 
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
         <th>Category Name</th>
		 <th>subcategory Name</th>		 
		 <th>Name</th>		 
         <th>Status</th> 
		 <th>Action</th>
		 </tr> </thead> 
		  
<tbody>  
<?php 
$query=$objComm->findAllRecord('tbl_menu3');
for($i=0;$i<count($query);$i++){
$category=$objComm->singleRowFetch('tbl_menu1','id',$query[$i][1]);
$subcategory=$objComm->singleRowFetch('tbl_menu2','id',$query[$i][2]);
?>		  
          <tr id="tr<?=$query[$i][0]?>"> 
			<td><?=$i+1?></td>		  
			<td><?=$category[0][1]?></td>		  
			<td><?=$subcategory[0][2]?></td>
			<td><?=$query[$i][3]?></td>
			<td><?=$query[$i][4]?></td> 
			<td><a href="edit-sub-category2.php?id=<?=$query[$i][0]?>" ><i class="icon-pencil"></i></a> &nbsp;&nbsp; <a class="delete" onclick="deletedata('tbl_menu3','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		  
<?php } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
  
        
        
             </div> </div> </div> </body> </html>