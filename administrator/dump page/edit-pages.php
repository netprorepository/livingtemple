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
			'name'=>$name,
			'description'=>htmlentities($description),
			'seo_titel'=>$seo_titel,
			'seo_keywords'=>$seo_keywords,
			'seo_description'=>$seo_description,			
			'url'=>$objComm->strToUrl($name)			
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('pages',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('pages','id',$_GET['id']);
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Page</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post"> 		   
          
		 
		 
        
         

		<div class="form-group">
          <label class="col-md-2 control-label">Page Name:</label> 
          <div class="col-md-10"><input type="text" name="name" value="<?=$result[0]['name']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='description'  id="editor1" class="form-control"><?=$result[0]['description']?></textarea></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">SEO Content:</label> 
           </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Titel:</label> 
          <div class="col-md-10"><input type="text" name='seo_titel' value="<?=$result[0]['seo_titel']?>"  class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Key Words:</label> 
          <div class="col-md-10"><textarea name='seo_keywords' rows="8"  class="form-control"><?=$result[0]['seo_keywords']?></textarea></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='seo_description' rows="8" class="form-control"><?=$result[0]['seo_description']?></textarea></div> </div> 
		 </div>		 
            
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>
			 
<?php 
$objComm->editorjs();
$objComm->editor('editor1');

 ?>	
<?php require_once('include/footer.php') ?>
<?php require_once('include/script.php') ?>	 