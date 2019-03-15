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
$image=$objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);	
else
$image=$hidden_images;
		
			$update_arr=array(								
			'title'=>mysql_real_escape_string($title),
			'image'=>$image,
			'description'=>mysql_real_escape_string($description),
			'status'=>$status,
			'url'=>$url,
			'color'=>$color,
			'color2'=>$color1,
			);
			//'url'=>$objComm->strToUrl($title),
			
			$where=' where id="'.$_GET['id'].'"';	
			$objComm->db_update_recordm('tbl_box',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_box','id',$_GET['id']);
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Homepage Box</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         
		  
		  <div class="form-group"><label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="text" name="title" class="form-control" value="<?=$result[0]['title']?>"> </div> </div>		  
		 
		 <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='image' class="form-control" >
			<img src="../products/<?=$result[0]['image']?>" style="margin:20px;background-color:green;">
			<input type="hidden" name="hidden_image" value="<?=$query[0]['image']?>" />
		  </div> 
		  
		 </div>
			<input type="hidden" name="hidden_images" value="<?=$result[0]['image']?>" />		 
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><input type="text" name="description" value="<?=$result[0]['description']?>" class="form-control"></div></div>	
		  
		  <div class="form-group"><label class="col-md-2 control-label">Front Color:</label> 
          <div class="col-md-10"><input type="text" name="color" value="<?=$result[0]['color']?>" class="form-control">&nbsp;(Use Color Code RGBA)</div></div>	
			
		 <div class="form-group"><label class="col-md-2 control-label">Back Color:</label> 
          <div class="col-md-10"><input type="text" name="color1" value="<?=$result[0]['color2']?>" class="form-control">&nbsp;(Use Color Code RGBA)</div></div>	
		 	
		 
		  <div class="form-group"><label class="col-md-2 control-label">Url:</label> 
          <div class="col-md-10"><input type="text" name="url" value="<?=$result[0]['url']?>" class="form-control"></div></div>	
		  
		  
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