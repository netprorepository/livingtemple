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
			$cdate=date("d/m/Y");
			
			$startdate=$date."T00:00:00+05:30";
	
			$enddate=$date."T00:00:00+05:30";	
			/* if(date('N', strtotime($date)) == 7) 
				{
				$message=DATE_ERROR;	
				}
				else
				{ */
					$fields=array('title','startdate','enddate','image','description','callagain','date','status','f_page','url','entry_fee');
					$data=array(mysql_real_escape_string($name),$startdate,$enddate,$objComm->uploadfile($_FILES["brand_image"]["name"],$_FILES["brand_image"]["tmp_name"]),mysql_real_escape_string($description),$callagain,$cdate,$status,$f_page,$objComm->strToUrl($name),$entry_fee);
					$lastId=$objComm->insertWithLastid($fields,$data,'calendar');				
					$message=INSRT_DATA_MASS_SUSS;
				
				$checkurl=mysql_query("select * from tbl_search where url='".$objComm->strToUrl($name)."'") or die('error 31 '.mysql_error());
				if(mysql_num_rows($checkurl)>0)
				{
					
				}
				else
				{
					$link="search-event/details/".$objComm->strToUrl($name);
					mysql_query("insert into tbl_search set title='".mysql_real_escape_string($name)."',category='event',url='".$objComm->strToUrl($name)."',url2='$link' ") or die('error 39 '.mysql_error());
				}

					
				}	
			/* } */			
				
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
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
		<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
     	  
		   <div class="form-group"><label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="text" name="name" class="form-control"></div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name="description" id="description"  rows="8"  class="form-control"></textarea></div> </div>
		 
          <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='brand_image'  class="form-control"></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Event Date:</label> 
          <div class="col-md-10"><input type="date" name='date' placeholder="Please enter event date" class="form-control"></div> </div> 
		  
		  	<!--<div class="form-group">
          <label class="col-md-2 control-label">Entry Fees:</label> 
          <div class="col-md-10"><input type="text" name='entry_fee'  placeholder="Please insert entry fee" class="form-control"></div> </div>
	
		  
		  		  <div class="form-group">
          <label class="col-md-2 control-label">Fans Page:</label> 
          <div class="col-md-10"><input type="text" name='f_page' placeholder="Please insert Fans Page Url" class="form-control"></div> </div> -->
		  
		  
		  	<div class="form-group"><label class="col-md-2 control-label">Repeate This Event:</label> 
          <div class="col-md-10"> <select class="form-control" name="callagain">
				<option value="Inactive">No</option>
				<option value="Monthly">Monthly</option>
				<option value="Weekly">Weekly</option>
				
				</select>
		  </div> 
		  </div>
			
	  	  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active">Active</option><option value="Inactive">Inactive</option></select>
		  </div> 
		</div>

		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
          <?php 
					$objComm->editor('description');
					
				?>

  
        
        
             </div> </div> </div> </body> </html>