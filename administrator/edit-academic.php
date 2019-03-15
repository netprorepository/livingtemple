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
			'title'=>mysql_real_escape_string($title),
			'description'=>mysql_real_escape_string($description),
			'date'=>mysql_real_escape_string($date),
			'status'=>$status,
			);
			$where=' where id="'.$_GET['id'].'"';	
			$objComm->db_update_recordm('tbl_acadmic_cal',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_acadmic_cal','id',$_GET['id']);
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
		<li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Academic Calendar</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
			
		  
		  <div class="form-group"><label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="text" name="title" class="form-control" value="<?=$result[0]['title']?>"> </div> </div>		  
		 
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name="description" class="form-control"><?=$result[0]['description']?></textarea></div></div>	
		 
		 <div class="form-group"><label class="col-md-2 control-label">Date:</label> 
          <div class="col-md-10">
			<select  name="date" class="form-control">
				
			<option value="<?=$result[0]['date']?>" select><?=$result[0]['date']?></option>
			<option value="January">January</option>
			<option value="Feburary">Feburary</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
			</select>
				
		  </div> </div>		  
		 		
		  
		<div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <?php if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <?php if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>			  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
         			<?php 
					$objComm->editor('description');
				?>
			
             </div> </div> </div> </body> </html>