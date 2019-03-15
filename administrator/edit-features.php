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

if($_FILES["brand_image"]["name"]!='')
$brand_image=$objComm->uploadfile($_FILES["brand_image"]["name"],$_FILES["brand_image"]["tmp_name"]);	
else
$brand_image=$hidden_images;
		
			$update_arr=array(								
			'title'=>$title,
			'brand_name'=>mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ', $brand_name)))),
			'fcategory_id'=>$category_id,
			'status'=>$status,
			'brand_image'=>$brand_image
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_features',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_features','id',$_GET['id']);
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Features & Benefits</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		  <div class="form-group"><label class="col-md-2 control-label">Choose Feature Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="category_id" onchange="return subcategory(this.value)">
		  <?php
		  $category=$objComm->findAllRecord('tbl_fcategory');
		for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>" <? if($result[0]['fcategory_id']==$category[$i]['id']) echo 'selected';?> ><?=$category[$i]['name']?></option>
		  <? } ?>
		  </select>
		  </div> </div>
		  
         <div class="form-group">
          <label class="col-md-2 control-label">Features & Benefits Images:</label> 
          <div class="col-md-10"> <input type="file" name='brand_image' class="form-control" ><br/>
			<img src="../products/<?=$result[0]['brand_image']?>" style="background-color:black;width:150px;"></div> </div>
			<input type="hidden" name="hidden_images" value="<?=$result[0]['brand_image']?>" />
		  
		   <div class="form-group"><label class="col-md-2 control-label">Features & Benefits Name:</label> 
          <div class="col-md-10"><input type="text" name="title" class="form-control" value="<?=$result[0]['title']?>"> </div> </div>  
		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><input type="text" name="brand_name" class="form-control" value="<?=$result[0]['brand_name']?>"> </div> </div>		  
		  
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>			  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>