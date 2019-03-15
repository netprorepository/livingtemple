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
			'status'=>$status,
			);
			$_POST['id'];
			$where= 'where id="'.$_GET['id'].'"';
			echo $objComm->db_update_recordm('tbl_courses_apply',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>View Member Details</strong></a> </li> </ul> 
       </div> 
 
<?php include 'include/leftMenu.php' ?> 
        <div class="row"> 
        <div class="col-md-12"> 
         
        <?php if(isset($message)) echo $message; ?>
		   
<form class="form-horizontal row-border" action="" method="post"> 		   
			<?php 
			$where= " id= '".$_GET['id']."'";	
			$query=$objComm->findAllRecordcomp('tbl_courses_apply',$where);
			//for($i=0;$i<count($query);$i++){
			?>  
			<div class="form-group"><label class="col-md-2 control-label">Name:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['title']; echo $query[0]['name']; echo $query[0]['sname'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Email:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['email'];?>
		    </div> </div>	
			<div class="form-group"><label class="col-md-2 control-label">Phone:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['phone'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Address:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['address'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">DOB:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['dob'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Applied Courses:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['courses'];?>
		    </div> </div>
			
			<div class="form-group"><label class="col-md-2 control-label">Heared:</label> 
            <div class="col-md-10"> 
			<?php if($query[0]['news']=='on'){ echo "News"; }?> <?php if($query[0]['mail']=='on'){ echo "Mail";}?> <?php if($query[0]['brochure']=='on') { echo "Brochure";}?> <?php if($query[0]['friend']=='on'){echo "Friends";}?> <?php if($query[0]['website']=='on'){ echo "Website";} ?>
			<?php echo $query[0]['other'];?>		</div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Language Knowledge:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['language1'];?> <?php echo $query[0]['language2'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Qualification:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['qualification'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Date:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['date'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Exp:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['exp'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Previous Student:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['previous'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Courses:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['pcourses'];?>
		    </div> </div>
			<div class="form-group"><label class="col-md-2 control-label">Reg. No.:</label> 
            <div class="col-md-10"> 
			<?php echo $query[0]['regno'];?>
		    </div> </div>
			 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($query[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($query[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div><input type = "hidden" name="id" value="<?=$query[0]['id']?>">
		 	
		  <!--<div class="form-group">
          <label class="col-md-2 control-label">Address:</label> 
          <div class="col-md-10"><textarea name='address' rows="3" class="form-control"><?=$query[0]['address']?></textarea></div> </div> -->
		 
		  <?php //} ?>
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                </div> 
        
             </div> </div> </div> </body> </html>
			