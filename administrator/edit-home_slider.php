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
			
			if($_FILES["image"]["name"]!='')
$brand_image=$objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);	
else
$brand_image=$hidden_images;	
			
			$update_arr=array(
			'image'=>$brand_image,
			'title'=>mysql_real_escape_string($title),
			'title2'=>mysql_real_escape_string($title2),
			'status'=>$status
			);
			$where= 'where id='.$_GET['id'];
			$objComm->db_update_recordm('tbl_home_slider',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Homepage Slider</strong></a> </li> </ul> 
       </div> 

<?php include 'include/leftMenu.php' ?> 
      
        <div class="row"> 
        <div class="col-md-12"> 
         
        <?php if(isset($message)) echo $message; ?>
         
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          <?php 
$query=$objComm->singleRowFetch('tbl_home_slider','id',$_GET['id']);
for($i=0;$i<count($query);$i++){
?>  

		  
		  <div class="form-group">
		    <label class="col-md-2 control-label">Image:</label> 
              <div class="col-md-10"> <input type="file" name='image' class="form-control" ><br/>
			<img src="../products/<?=$query[0]['image']?>" style="background-color:black;width:150px;"></div> </div>
			<input type="hidden" name="hidden_images" value="<?=$query[0]['image']?>" />	  
		
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Title 1</label> 
          <div class="col-md-10"><input type="text"  name='title'   class="form-control" value="<?=$query[0]['title']?>" >
		  </div> 
		  </div>
				
		  <div class="form-group">
          <label class="col-md-2 control-label">Title 2</label> 
          <div class="col-md-10"><input type="text"  name='title2'   class="form-control" value="<?=$query[0]['title2']?>" >
		  </div> 
		  </div>
          
		 		  
		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <?php if($query[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <?php if($query[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>
		  <?php } ?>
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                </div> 
        
             </div> </div> </div> </body> </html>
			