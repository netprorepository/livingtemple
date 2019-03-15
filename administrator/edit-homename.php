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

if(isset($_POST['submit']))
			{
			extract($_POST);			
			$update_arr=array(								
			
			'name1'=>$name1,
			);
			$where= 'where id=1';
			$objComm->db_update_recordm('home_name',$update_arr,$where); 		
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
$query=$objComm->findAllRecord('home_name');
for($i=0;$i<count($query);$i++){
?>  

		  <div class="form-group">
          <label class="col-md-2 control-label">Homepage Heading:</label> 
          <div class="col-md-10"><input type="text" name='name1' class="form-control" value="<?=$query[0]['name1']?>"></div> </div> 
		  <?php } ?>
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                </div> 
        
             </div> </div> </div> </body> </html>
			