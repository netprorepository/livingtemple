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
			$datetime=date("d/m/Y");
			$where="name='$category_name'";  
			$categorycheck=$objComm->findRecord('tbl_gcategory',$where);
			if(count($categorycheck)>0)
				{
				$_SESSION['categorymsg']=$category_name.' Category  already Exist';	
				$errmessage = $_SESSION['categorymsg'];
				}else{
					$fields=array('name','description','url','status');
					$data=array(mysql_real_escape_string($category_name),mysql_real_escape_string($description),$objComm->strToUrl($category_name),$status);
					$lastId=$objComm->insertWithLastid($fields,$data,'tbl_gcategory');				
					$message=INSRT_DATA_MASS_SUSS;	
				}
				
			}		
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Gallery Category</strong></a> </li> </ul> 
	   </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo "<strong>".$message."<strong>"; ?>
         
		 <br/>		 
<form class="form-horizontal row-border" action="" method="post"  enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <label class="col-md-2 control-label">Gallery Category Name:</label> 
          <div class="col-md-10"><input type="text" name='category_name' class="form-control"><span class="error_msg"><?php  if(isset($errmessage)) echo $errmessage; ?></span></div> </div> 
		 
			
		<div class="form-group">
          <label class="col-md-2 control-label">Gallery Description</label> 
          <div class="col-md-10"><textarea name='description' id='description' class="form-control"></textarea></div> </div> 
		 	
		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active">Active</option><option value="Inactive">Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        <?php 
					$objComm->editor('description');
					
				?>
             </div> </div> </div> </body> </html>