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
$brand_image=$objComm->uploadfilepopup($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);	
else
$brand_image=$hidden_images;
		
			$update_arr=array(								
			'status'=>$status,
			'url'=> mysql_real_escape_string($url),
			'image'=>$brand_image,
			'footer'=>$footer,
			);
			$where=' where id="2"';
			$objComm->db_update_recordm('tbl_popup',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_popup','id',2);
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Update Footer Ads</strong></a> </li> </ul> 
       </div> 
<?php include 'include/leftMenu.php' ?> 
        <div class="row"> 
        <div class="col-md-12"> 
        <?php if(isset($message)) echo $message; ?>
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
         <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"> <input type="file" name='image' class="form-control" ><br/>
			<img src="../popup/<?=$result[0]['image']?>" style="background-color:black;width:150px;"></div> </div>
			<input type="hidden" name="hidden_images" value="<?=$result[0]['image']?>" />

         <div class="form-group">
          <label class="col-md-2 control-label">External URL:</label> 
          <div class="col-md-10"> <input type="text" name='url' value="<?=$result[0]['url']?>" class="form-control" ></div> </div>
			
		 <div class="form-group">
          <label class="col-md-2 control-label">Copyright:</label> 
          <div class="col-md-10"> <input type="text" name='footer' value="<?=$result[0]['footer']?>" class="form-control" ></div> </div>
		
		
			
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>			  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>