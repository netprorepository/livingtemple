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
					{
					
					$image	=$objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);
					}else
					{
					$image=$_POST['hidden_image'];
					}
			
			$update_arr=array(								
			
			'contact'=>$contact,
			'facebook'=>$facebook,
			'twitter'=>$twitter,
			'linkedin'=>$linkedin,
			'youtube'=>$youtube,
			'status'=>$status,
			'image'=>$image,
			'pintrest'=>$pintrest,
			'insttagram'=>$insttagram,
			'rss'=>$rss,
			);
			$where= 'where id=1';
			$objComm->db_update_recordm('tbl_social',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Top Header Contant</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post"  enctype="multipart/form-data"> 	 		   
          <?php 
$query=$objComm->findAllRecord('tbl_social');
for($i=0;$i<count($query);$i++){
?>  

		  <div class="form-group">
          <label class="col-md-2 control-label">Contact:</label> 
          <div class="col-md-10"><input type="text" name='contact'  class="form-control" value="<?=$query[0]['contact']?>"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Facebook:</label> 
          <div class="col-md-10"><input type="text" name='facebook' class="form-control" value="<?=$query[0]['facebook']?>"></div> </div> 
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Twitter:</label> 
          <div class="col-md-10"><input type="text" name='twitter' class="form-control" value="<?=$query[0]['twitter']?>"></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Youtube:</label> 
          <div class="col-md-10"><input type="text" name='youtube' class="form-control" value="<?=$query[0]['youtube']?>"></div> </div> 
		  
		 <div class="form-group">
          <label class="col-md-2 control-label">Pintrest:</label> 
          <div class="col-md-10"><input type="text" name='pintrest' class="form-control" value="<?=$query[0]['pintrest']?>"></div> </div> 
		  
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Linkedin:</label> 
          <div class="col-md-10"><input type="text" name='linkedin' class="form-control" value="<?=$query[0]['linkedin']?>"></div> </div> 
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Insttagram:</label> 
          <div class="col-md-10"><input type="text" name='insttagram' class="form-control" value="<?=$query[0]['insttagram']?>"></div> </div> 
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">RSS:</label> 
          <div class="col-md-10"><input type="text" name='rss' class="form-control" value="<?=$query[0]['rss']?>"></div> </div> 
		  
		 
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($query[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($query[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Logo:</label> 
          <div class="col-md-10"><input type="file" name='image' class="form-control"><span class="error_msg"><?php  if(isset($errmessage)) echo $errmessage; ?></span>
		  <img src="../products/<?=$query[0]['image']?>" style="width:150px;margin:10px;">
		  <input type="hidden" name="hidden_image" value="<?=$query[0]['image']?>" />
		  
		  </div> </div>
		  
			<?php } ?>
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                </div> 
        
             </div> </div> </div> </body> </html>
			