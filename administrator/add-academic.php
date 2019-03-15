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
			//$date=date("Y-m-d");
			$fields=array('title','description','date','status');
			
			$data=array(mysql_real_escape_string($title),mysql_real_escape_string($description),$date,$status);
			$lastId=$objComm->insertWithLastid($fields,$data,'tbl_acadmic_cal');				
			$message=INSRT_DATA_MASS_SUSS;	
			}		
				
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add News</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         
		  
		  <div class="form-group"><label class="col-md-2 control-label">Question:</label> 
          <div class="col-md-10"><input type="text" name="title" class="form-control"> </div> </div>
		
		  
		  <div class="form-group"><label class="col-md-2 control-label">Detail:</label> 
          <div class="col-md-10"><textarea name='description' id='description' class="form-control"></textarea></div> </div>	
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Date:</label> 
          <div class="col-md-10">
		  <select  name="date" class="form-control">
				
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
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active">Active</option><option value="Inactive">Inactive</option></select>
		  </div> </div>		  	
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        </br>
        </br>
        </br>
        
             </div> </div> </div> </body> 
			 			<?php 
					$objComm->editor('description');
				?>
			 </html>