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
	   <li> <a href="javascript:void(0);"><strong>View Testimonials</strong></a> </li> </ul> 
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
		 <th>Image</th>
		  <th>From</th>		
		 <th>Video</th>		 
         <th>Status</th> 
		 <th>Action</th>
		 </tr> </thead> 
		  
<tbody>  
<?php 
$query=$objComm->findAllRecord('tbl_testimonials_video');
for($i=0;$i<count($query);$i++){
?>		  
          <tr id="tr<?=$query[$i][0]?>"> 
			<td><?=$query[$i][1]?></td>
			<td><img src="../products/<?=$query[$i]['image']?>"  height="70px" style="background-color:black;" width="70px"/></td>
			<td><?=$query[$i][3]?></td>
			<td><iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="150" height="150" src="http://www.youtube.com/embed/<?=$query[$i]['video']?>" frameborder="0" allowFullScreen></iframe></td>
			<td><?=$query[$i][4]?></td> 
			<td><a href="edit-testimonials-video.php?id=<?=$query[$i][0]?>"><i class="icon-pencil"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="delete" onclick="deletedata('tbl_testimonials_video','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		  
<?php } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
  
        
        
             </div> </div> </div> </body> </html>