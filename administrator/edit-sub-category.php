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
			$update_arr=array(								
			'menu_id'=>$category_id,
			'name'=>mysql_real_escape_string($sub_category),
			'status'=>$status,
			'title'=>mysql_real_escape_string($title),
			'keyword'=>mysql_real_escape_string($keyword),
			'description'=>mysql_real_escape_string($description),	
			'url'=>$objComm->strToUrl($sub_category)	
			);
					
		
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_menu2',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_menu2','id',$_GET['id']);
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Subcategory</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post"> 		   
          
		  <div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="category_id">
		  <?php
		  $category=$objComm->findAllRecord('tbl_menu1');
		for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>" <?php if($category[$i]['id']==$result[0][1]) echo 'selected'; ?>><?=$category[$i]['name']?></option>
		  <?php } ?>
		  </select>
		  </div> </div>
		 
		 
         <div class="form-group">
          <label class="col-md-2 control-label">Subcategory Name:</label> 
          <div class="col-md-10"><input type="text" name='sub_category' value="<?=$result[0]['name']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Title:</label> 
          <div class="col-md-10"><input type="text" name='title' value="<?=$result[0]['title']?>" class="form-control"></div> </div> 
		 
		<div class="form-group">
          <label class="col-md-2 control-label">Keyword:</label> 
          <div class="col-md-10"><textarea name='keyword'  class="form-control"><?=$result[0]['keyword']?></textarea> </div> 
		 </div>
		<div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='description'  class="form-control"><?=$result[0]['description']?></textarea> </div> 
		</div>
		  
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <?php if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <?php if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>