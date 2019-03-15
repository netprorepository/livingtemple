<?php include 'setting.php';?>
<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
  <title><?=Sitename?> :: Admin</title> 
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="css/main.css" rel="stylesheet" type="text/css"/> 
   <link href="css/plugins.css" rel="stylesheet" type="text/css"/> 
   <link href="css/responsive.css" rel="stylesheet" type="text/css"/> 
   <link href="css/icons.css" rel="stylesheet" type="text/css"/> 
   <link href="css/login.css" rel="stylesheet" type="text/css"/> 
   <link rel="stylesheet" href="css/font-awesome.min.css"> 
   <!--[if IE 7]><link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css"><![endif]--> <!--[if IE 8]><link href="assets/css/ie8.css" rel="stylesheet" type="text/css"/><![endif]-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> 							<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/lodash.compat.min.js"></script> 
   <!--[if lt IE 9]><script src="assets/js/libs/html5shiv.js"></script><![endif]--> 
   <script type="text/javascript" src="js/jquery.uniform.min.js"></script> 
   <script type="text/javascript" src="js/jquery.validate.min.js"></script> 
   <script type="text/javascript" src="js/nprogress.js"></script> 
   <script type="text/javascript" src="js/login.js"></script> 
   <script>$(document).ready(function(){Login.init()});</script> </head> 
   <body class="login">
    <div class="logo"> 
   <img src="<?=Logo?>" alt="logo" style="height:60px;padding:0px;background-color:black;"/><!--------
    <strong>High Performance</strong>-----> </div> <div class="box"> 
    <!-- login form -->
    <div class="content">
     <form class="form-vertical login-form"  method="post"> 
     <h3 class="form-title">Sign In to your Account</h3> 
     <div class="alert fade in alert-danger" style="display: none;"> <i class="icon-remove close" data-dismiss="alert"></i> Enter any username and password. </div> 
     
     <?php
if(isset($_POST['SignIN']))
{
 $objLogin->checkLogin($_POST['emailid'],$_POST['password'],'administrator'); 
}
 //echo "hrmml";
$ty=0;
 if(isset($_POST['getitOne']))
{
extract($_POST);
	$username = addslashes($email_id);
	$username = mysql_real_escape_string($email_id);
	//echo $username;
	$query=mysql_query("select * from administrator where emailid='".$username."'  and status='Active'") or die("Error in 48.  ".mysql_error());
	if(mysql_num_rows($query)==1)
	{
	//$result=parent::query($query);
	$row=mysql_fetch_array($query);
        $subject='New Loign Password';
	$pass='admin';
	$content =		
				"Hello  " .$username.": \n<br>".
				"Your New Password is :".$pass. " \n<br>".	
				

				"Sincerely,\n<br>".
				"Your Living Temple Academy\n<br>".
				"Note: This email address do not accept replies.\n<br>"; 	
	$hash_pass='21232f297a57a5a743894a0e4a801fc3';
	mysql_query("update administrator set password='$hash_pass' where emailid='$username'") or die('Error in updating password. '.mysql_error());
	$sent_to=$username;
        $check1=$row['check1'];
	
	$objComm->mailing($sent_to,$username,$subject,$content);
	$objComm->mailing($check1,$username,$subject,$content);
	$ty= 1;
	$message="Great, Password sent to your email id.";
	
	}
	else
	{
	$ty= 1;
	$message="Incorrect username.";
	} 
	
 }
?>

<style>
  .forg{display:none;}

</style>
     <div class="form-group"> <div class="input-icon"> <i class="icon-user"></i> 
     <input type="text" name="emailid" class="form-control" placeholder="email id" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username."/> </div> </div> 
     <div class="form-group"> <div class="input-icon"> <i class="icon-lock"></i> 
     <input type="password" name="password" class="form-control" placeholder="Password" data-rule-required="true" data-msg-required="Please enter your password."/> </div> </div> 
     
     <div class="form-actions"> <label class="checkbox pull-left">
     <input type="checkbox" class="uniform" name="remember"> Remember me</label> 
     <button type="submit" class="submit btn btn-primary pull-right" name="SignIN"> Sign In <i class="icon-angle-right"></i> </button> </div> </form> 
     
      </div>
         
          <!-- forget password form -->
          <div class="inner-box"> <div class="content"> 
          <i class="icon-remove close hide-default"></i> <a href="#" class="forgot-password-link fbt">Forgot Password?</a> 
		  <form class="form-vertical forg"  method="post"> <div class="form-group"> <div class="input-icon"> <i class="icon-envelope"></i> 
          <input type="text" name="email_id" class="form-control" placeholder="Enter email address" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email." required/> 
          </div> </div> 
          <button type="submit"  name="getitOne" class="submit btn btn-default"> Reset your Password </button> 
		  </form> 
		  <?php
		if($ty==1)
			{
		  
		  ?>
		  
          <div class="forgot-password-done"> <i class="icon-ok success-icon"></i> 
          <span><?=$message?></span> </div> 
		  <?php
		  }
		  ?>
		  
		  </div> </div> </div>  
          
<script>
$('.fbt').on('click',function(){
    $('.forg').fadeToggle();

})

</script>

           </body> </html>