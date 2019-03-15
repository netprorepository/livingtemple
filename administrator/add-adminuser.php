<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>
<script type="text/javascript">
window.onload = function () {
    document.getElementById("password").onchange = validatePassword;
    document.getElementById("confirm_password").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("confirm_password").value;
var pass1=document.getElementById("password").value;
if(pass1!=pass2)
    document.getElementById("confirm_password").setCustomValidity("Passwords Don't Match");
else
    document.getElementById("confirm_password").setCustomValidity('');  
//empty string means no validation error
}
</script>
</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';

 if(isset($_POST['submit']))
			{
			extract($_POST);			
			$date=date("d/m/Y");
			$fields=array('profile_pic','fullname','emailid','password','last_login','status');
			$data=array($objComm->uploadfileprofile($_FILES["profile_pic"]["name"],$_FILES["profile_pic"]["tmp_name"]),$name,$emailid,MD5($confirm_password),$date,$status);
			$lastId=$objComm->insertWithLastid($fields,$data,'administrator');				
			$message=INSRT_DATA_MASS_SUSS;	
			}		
				
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Slider</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
        
		   <div class="form-group">
          <label class="col-md-2 control-label">User Name:</label> 
          <div class="col-md-10"><input type="text" name='name'  class="form-control" required></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Email ID:</label> 
          <div class="col-md-10"><input type="email" name='emailid' class="form-control" required></div> </div> 
		 
		 <div class="form-group">
          <label class="col-md-2 control-label">Password:</label> 
          <div class="col-md-10"><input type="text" name='password' id="password" class="form-control" required></div> </div> 
		
		<div class="form-group">
          <label class="col-md-2 control-label">Confirm Password:</label> 
          <div class="col-md-10"><input type="text" name='confirm_password' id="confirm_password"class="form-control" required></div> </div> 
		
		<div class="form-group">
          <label class="col-md-2 control-label">Date of Athority:</label> 
          <div class="col-md-10"><input type="date" name='date' class="form-control"></div> </div> 
		
		  <!-- <div class="form-group">
          <label class="col-md-2 control-label">Profile Images:</label> 
          <div class="col-md-10"><input type="file" name='profile_pic' ></div> </div> -->
		  
		<div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active">Active</option><option value="Inactive">Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>
			 