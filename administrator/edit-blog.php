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

if($_FILES["image"]["name"]!='')
$brand_image=$objComm->uploadfileblogs($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);	
else
$brand_image=$hidden_images;
			$update_arr=array(								
			'description'=>mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ', $description)))),
			'name'=>mysql_real_escape_string($name),
			'place'=>mysql_real_escape_string($place),
			'url'=>$objComm->strToUrl($name),
			'status'=>$status,
			'image'=>$brand_image
			
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_blog',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_blog','id',$_GET['id']);
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Blog</strong></a> </li> </ul> 
       </div> 

<?php include 'include/leftMenu.php' ?> 
        <div class="row">  
        <?php if(isset($message)) echo $message; ?>
		<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          <div class="form-group"><label class="col-md-2 control-label">Title:</label> 
          <div class="col-md-10"> <input type="text" name='name'   value="<?=$result[0]['name']?>" class="form-control" > </div> </div>
		  
         <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"> <input type="file" name='image' class="form-control" ><br/>
			<img src="../blogs/<?=$result[0]['image']?>" style="background-color:black;width:150px;"></div> </div>
			<input type="hidden" name="hidden_images" value="<?=$result[0]['image']?>" />
		  
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name="description" id="description" rows="8" class="form-control"> <?=$result[0]['description']?></textarea></div></div>		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Place</label> 
          <div class="col-md-10"> <input type="text" name='place' value="<?=$result[0]['place']?>" class="form-control" > </div> </div>
		  
		  
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>			  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         <?php 
					$objComm->editor('description');
			
				?>
  
        
        
             </div> </div> </div> </body> </html>