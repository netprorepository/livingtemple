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
				//$url=BASE_URL."pay-for-event/".$objComm->strToUrl($name)."/";	
				$url2=$objComm->strToUrl($name);	
			  	//$date=date("d/m/Y");
			    $fields=array('name','title','image','description','time','date','url2','author','status');
			     $data=array(mysql_real_escape_string($name),mysql_real_escape_string($title),$objComm->uploadfile($_FILES["brand_image"]["name"],$_FILES["brand_image"]["tmp_name"]),mysql_real_escape_string($description),$time,$date,$url2,$author,$status);
			    $lastId=$objComm->insertWithLastid($fields,$data,'tbl_news');				
			    //$message=INSRT_DATA_MASS_SUSS;	
				
			$message1 ='<div class="alert alert-success fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Success! </strong> Record inserted successfully</div>';
			}		
				
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Events</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message."<br>"; ?>
        <?php if(isset($message1)) echo $message1; ?>
         
		   
		<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
     	  
		   <div class="form-group"><label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="text" name="name" class="form-control"></div> </div>

          <div class="form-group">
          <label class="col-md-2 control-label">Title:</label> 
          <div class="col-md-10"><input type="text" name='title'  class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">News Date:</label> 
          <div class="col-md-10"><input type="text" name='date' placeholder="Please enter event date" class="form-control"></div> </div> 
		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name="description" rows="8"  class="form-control"></textarea></div> </div>
		 
		 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Author</label> 
          <div class="col-md-10"><input type="text" name='author' placeholder="Please enter Author Name" class="form-control"></div> </div> 
		  

		  <div class="form-group">
          <label class="col-md-2 control-label">Time</label> 
          <div class="col-md-10"><input type="text" name='time' placeholder="Please enter Time" class="form-control"></div> </div> 

		  
          <div class="form-group">
          <label class="col-md-2 control-label">Images (600 x 300):</label> 
          <div class="col-md-10"><input type="file" name='brand_image'  class="form-control"></div> </div> 
		  
		 
		  
		  
		  
		  	
		  
	  	  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active">Active</option><option value="Inactive">Inactive</option></select>
		  </div> 
		  </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>