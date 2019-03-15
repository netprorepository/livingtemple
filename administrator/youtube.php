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
			$date=date('d/m/Y');
			if($_FILES["image"]["name"]!='')
$brand_image=$objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);	
else
$brand_image=$hidden_images;

			$url1=explode('=',$url);
				if($url1[1]=='')
				{
					$url3=$url2;
				}else
				{
					$url3=$url1[1];
				}
			$update_arr=array(
			'url'=>$url3,
			
			'date'=> $date,
			'status'=>$status,
			'image'=>$brand_image
			);
			$where= 'where id='.$_GET['id'];
			$objComm->db_update_recordm('tbl_youtube',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Video</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          <?php 
$query=$objComm->singleRowFetch('tbl_youtube','id',$_GET['id']);
for($i=0;$i<count($query);$i++){
?>  

		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"> <input type="file" name='image' class="form-control" ><br/>
			<img src="../products/<?=$query[0]['image']?>" style="background-color:black;width:150px;"></div> </div>
			<input type="hidden" name="hidden_images" value="<?=$query[0]['image']?>" />
		 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Video</label> 
          <div class="col-md-10">
		  <input type="text" name='url' class="form-control" value="<?=$query[0]['url']?>">
		  <input type="hidden" name='url2' class="form-control" value="<?=$query[0]['url']?>">
		  
		  
		  <br/>
		  <iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="200" height="200" src="http://www.youtube.com/embed/<?=$query[0]['url']?>" frameborder="0" allowFullScreen></iframe>
		  <br/>
		  </div> </div> 
		  
		  <!--<div class="form-group">
          <label class="col-md-2 control-label">Title</label> 
          <div class="col-md-10"><textarea  name='description'  rows="5" class="form-control" ><?=$query[0]['description']?></textarea>
		  
		  </div> </div> --->
		  
		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($query[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($query[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>
		  <?php } ?>
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                </div> 
        
             </div> </div> </div> </body> </html>
			