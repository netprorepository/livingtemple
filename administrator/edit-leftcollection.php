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

if($_FILES["images"]["name"]!='')
$images=$objComm->uploadfile($_FILES["images"]["name"],$_FILES["images"]["tmp_name"]);	
else
$images=$hidden_images;
		
			$update_arr=array(								
			'name'=>$name,
			'discount'=>$discount,
			'description'=>$description,
			'link_url'=>$link_url,
			'status'=>$status,
			'images'=>$images
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('collection',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('collection','id',$_GET['id']);
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Left Collection Images</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="text" name='name' value="<?=$result[0]['name']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Discount:</label> 
          <div class="col-md-10"><input type="text" name='discount' value="<?=$result[0]['discount']?>" class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><input type="text" name='description' value="<?=$result[0]['description']?>" class="form-control"></div> </div> 
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Link Url:</label> 
          <div class="col-md-10"><input type="text" name='link_url' value="<?=$result[0]['link_url']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='images' ></div> </div>
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img src="../products/<?=$result[0]['images']?>"></div> </div>
		  <input type="hidden" name="hidden_images" value="<?=$result[0]['images']?>" />
		  
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>