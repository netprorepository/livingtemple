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
			'name'=>$category_name,
			'description'=>$description,
			'status'=>$status,
			'url'=>$objComm->strToUrl($category_name)
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_gcategory',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_gcategory','id',$_GET['id']);
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Gallery Category</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <label class="col-md-2 control-label">Category Name:</label> 
          <div class="col-md-10"><input type="text" name='category_name' value="<?=$result[0]['name']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Gallery Description</label> 
          <div class="col-md-10"><textarea name='description' id='description' class="form-control"><?=$result[0]['description']?></textarea></div> </div> 
		 	
		
		
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <?php if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <?php if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
         <?php 
					$objComm->editor('description');
					
				// ?>
        
             </div> </div> </div> </body> </html>