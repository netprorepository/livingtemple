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
			$datetime=date("d/m/Y");
			
			$update_arr=array(								
			'brand_name'=>$brand_name,
			'status'=>$status,
			'url'=>$objComm->strToUrl($brand_name),
			'date'=>$datetime
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('brand_name',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('brand_name','id',$_GET['id']);
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Brand Name</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <label class="col-md-2 control-label">Brand Name:</label> 
          <div class="col-md-10"><input type="text" name='brand_name' value="<?=$result[0]['brand_name']?>" class="form-control"></div> </div> 
		  
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>