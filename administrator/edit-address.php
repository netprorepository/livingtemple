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
$objComm->editorjs();
if(isset($_POST['submit']))
			{
			extract($_POST);			
			$update_arr=array(								
			
			'add1'=>$description1,
			'add2'=>$description2,
			'add3'=>$description3,
			);
			$where= 'where id=1';
			$objComm->db_update_recordm('tbl_contact',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Home Heading</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post"> 		   
          <?php 
$query=$objComm->findAllRecord('tbl_contact');
for($i=0;$i<count($query);$i++){
?>  

		  <div class="form-group">
          <label class="col-md-2 control-label">Customer Service:</label> 
          <div class="col-md-10"><textarea name='description1' name='description1' class="form-control" > <?=$query[0]['add1']?></textarea></div> 
		  </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Sales:</label> 
          <div class="col-md-10"><textarea name='description2' name='description2' class="form-control" > <?=$query[0]['add2']?></textarea></div> 
		  </div>
		  <div class="form-group">
          <label class="col-md-2 control-label">Corporate headquarters:</label> 
          <div class="col-md-10"><textarea name='description3' name='description3' class="form-control" > <?=$query[0]['add3']?></textarea></div> 
		  </div>		  
		  <?php } ?>
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                </div> 
        <?php 
					$objComm->editor('description1');
					$objComm->editor('description2');
					$objComm->editor('description3');
				?>
             </div> </div> </div> </body> </html>
			