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
			'status'=>$status,
			'image'=>$brand_image
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_award',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_award','id',$_GET['id']);
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Award</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		
		  <!--<div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="category_id" onchange="return subcategory(this.value)">
		  <?php
		   //$category=$objComm->findAllRecord('tbl_gcategory');
		  //for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>" <?php if($result[0]['category_id']==$category[$i]['id']) echo 'selected';?> ><?=$category[$i]['name']?></option>
		  <?php //} ?>
		  </select>
		  </div> </div>-->
		 
         <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"> <input type="file" name='image' class="form-control" ><br/>
			<img src="../products/<?=$result[0]['image']?>" style="background-color:black;width:150px;"></div> </div>
			<input type="hidden" name="hidden_images" value="<?=$result[0]['image']?>" />
		<!----  
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><input type="text" name="description" class="form-control" value="<?=$result[0]['description']?>"> </div> </div>		  
		  ----->
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <?php if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <?php if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>			  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>