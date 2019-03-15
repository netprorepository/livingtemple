<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> 
<body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';
 $objComm->editorjs();
 require_once 'classes/excel_reader2.php';

 if(isset($_POST['submit']))
			{
			extract($_POST);			
			$date=date("d/m/Y");
			
			if($_FILES["image"]["name"]!='')
			$image	=$objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);
		    
			else
			$image=$hidden_images;
		   
			if($_FILES["image1"]["name"]!='')
			$image1	=$objComm->uploadfile($_FILES["image1"]["name"],$_FILES["image1"]["tmp_name"]);
			else
			$image1=$hidden_image;
		    if($_FILES["image2"]["name"]!='')
			$image2	=$objComm->uploadfile($_FILES["image2"]["name"],$_FILES["image2"]["tmp_name"]);
			else
			$image2=$hidden_imag;
		
			$update_arr=array(		
				'heading1'=> mysql_real_escape_string($heading1),
				'content1'=>mysql_real_escape_string($content1),
				'url'=>mysql_real_escape_string($url),
				'image'=>$image,
				'status'=>$status,
				'heading2'=> mysql_real_escape_string($heading2),
				'content2'=>mysql_real_escape_string($content2),
				'image1'=>$image1,
				'heading3'=> mysql_real_escape_string($heading3),
				'content3'=>mysql_real_escape_string($content3),
				'image2'=>$image2
				
				);
			
		    $where=' where id ='.$_GET['id'];
			$objComm->db_update_recordm('tbl_home',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
		
			}
			$result=$objComm->singleRowFetch('tbl_home','id',$_GET['id']);			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Update Homepage Section</strong></a> </li> </ul> 
	   </div> 
<?php include 'include/leftMenu.php' ?> 
        <div class="row"> 
        <div class="col-md-12"> 
        <?php if(isset($message)){
		echo $message; 
		}
		if($er==2)
		{
		echo "<a href='download.php?file=$filename'>&nbsp;&nbsp;&nbsp;Error File</a>";
		}    
		?>
        <br/>
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
         <div class="form-group">
          
		  <div class="form-group">
          <label class="col-md-2 control-label">Title:</label> 
          <div class="col-md-10"><input type="text" name='heading1'    class="form-control" value="<?=$result[0]['heading1']?>"></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='content1'  id='description1' class="form-control"><?=$result[0]['content1']?></textarea></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Image :</label> 
          <div class="col-md-10"><input type="file" name='image'  class="form-control">
			<input type="hidden" value="<?=$result[0]['image']?>" name="hidden_images">
		  
		  <img src="../products/<?=$result[0]['image']?>" style="width:150px;padding:10px;" >
		  
		  </div> </div> 

           <!--<div class="form-group">
          <label class="col-md-2 control-label">Heading1:</label> 
          <div class="col-md-10"><input type="text" name='heading2'    class="form-control" value="<?=$result[0]['heading2']?>"></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Description1:</label> 
          <div class="col-md-10"><textarea rows="3" name='content2'  id='description2' class="form-control"><?=$result[0]['content2']?></textarea></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Image1 :</label> 
          <div class="col-md-10"><input type="file" name='image1'  class="form-control">
			<input type="hidden" value="<?=$result[0]['image1']?>" name="hidden_image">
		  
		  <img src="../products/<?=$result[0]['image1']?>" style="width:150px;padding:10px;" >
		  
		  </div> </div> 


      <div class="form-group">
          <label class="col-md-2 control-label">Heading2:</label> 
          <div class="col-md-10"><input type="text" name='heading3'    class="form-control" value="<?=$result[0]['heading3']?>"></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Description2:</label> 
          <div class="col-md-10"><textarea rows="3" name='content3'  id='description3' class="form-control"><?=$result[0]['content3']?></textarea></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Image2 :</label> 
          <div class="col-md-10"><input type="file" name='image2'  class="form-control">
			<input type="hidden" value="<?=$result[0]['image2']?>" name="hidden_imag">
		  
		  <img src="../products/<?=$result[0]['image2']?>" style="width:150px;padding:10px;" >
		  
		  </div> </div> 






	  
		 <div class="form-group">
          <label class="col-md-2 control-label">Outter  URL:</label> 
          <div class="col-md-10"><input type="text" name='url'    class="form-control" value="<?=$result[0]['url']?>"></div> </div> -->
		 
			 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <?php if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <?php if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>		  
    		  
            
			<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
		</form> 
                   </div> </div> 
             </div> </div> </div>
			 </div>
</body> 
</html>
			 <?php 
					$objComm->editor('description1');
					$objComm->editor('description2');
					$objComm->editor('description3');
					$objComm->editor('description4');
					$objComm->editor('description5');
					$objComm->editor('description6');
				?>
