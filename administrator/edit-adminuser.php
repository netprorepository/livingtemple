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
			if($_FILES["profile_pic"]["name"]!='')
			{
			extract($_POST);			
			$update_arr=array(								
			'fullname'=>$name,
			'emailid'=>$emailid,
			'password'=>MD5($password),
			'status'=>$status,
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('administrator',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}				
			else
			{
			$image=$objComm->uploadfileprofile($_FILES["profile_pic"]["name"],$_FILES["profile_pic"]["tmp_name"]);
			
			extract($_POST);			
			$update_arr=array(								
			'fullname'=>$name,
			'emailid'=>$emailid,
			'password'=>$confirm_password,
			'profile_pic'=>$image,
			'status'=>$status,
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('administrator',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			}
			
			$result=$objComm->singleRowFetch('administrator','id',$_GET['id']);
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Admin User Account</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" name="form"> 		   
          
		 
		 
         <div class="form-group">
         
		  <div class="form-group">
          <label class="col-md-2 control-label">User Name:</label> 
          <div class="col-md-10"><input type="text" name='name' value="<?=$result[0]['fullname']?>" class="form-control"></div> </div> 
		 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Email ID:</label> 
          <div class="col-md-10"><input type="text" name='emailid' value="<?=$result[0]['emailid']?>" class="form-control"></div> </div> 
		 
		  <div class="form-group">
          <label class="col-md-2 control-label">Password:</label> 
          <div class="col-md-10">
		  <input type="text" required id="password" name='password' id="password"value="<?=$result[0]['password']?>" class="form-control"></div> </div> 
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Confirm Password:</label> 
          <div class="col-md-10"><input type="text" value="<?=$result[0]['password']?>" 
		 name='confirm_password' id="confirm_password"class="form-control"></div> </div> 
		  
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Choose New Profile Images:</label> 
          <div class="col-md-10"><input type="file" name='profile_pic' ></div><br> 
		  <input type="hidden" name="profile_pic" value="<?=$result[0]['profile_pic']?>" />

		  <img src="img/<?=$result[0]['profile_pic']?>"  width="20%"/>
		  </div> 
		  
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="status">
		  <option value="Active" <? if($result[0]['status']=='Active') echo 'selected';?>>Active</option>
		  <option value="Inactive" <? if($result[0]['status']=='Active') echo 'selected';?>>Inactive</option>
		  </select>
		  </div> </div>		  
            
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>
			 
			 
	<script>
function subcategory(catid){
var formData = {catid:catid}; //Array 
 
$.ajax({
    url : "ajax-subcatogary.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
       $("#ajaxvalue").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}

</script>			 
			 