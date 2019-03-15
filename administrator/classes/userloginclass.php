<?php
class userLogin extends dbConnect
{

function __construct()
{
	parent::__construct();
	parent::connect_db();
}

function checkUserLogin($username,$password,$table,$returnUrl)
{
	// To protect from MySQL injection
	$username = addslashes($username);
	$password = addslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$query="select * from ".$table." where userEmail='".$username."' and userPassword='".$password."' and status=1";

	if(mysql_num_rows(parent::query($query))==1)
	{	
	$row=mysql_fetch_array(parent::query($query));
		$_SESSION['userName']=$row['userName'];			
		$_SESSION['userEmail']=$username;			
		$_SESSION['userPassword']=$password;
		$_SESSION['userid']=$row['id'];
		$_SESSION['logintype']='website';
	
	
	//parent::query("update ".$table." set date='now()' where userEmail='".$username."' and userPassword='".$password."' and status=1");
	
	header('Location:'.$returnUrl);
	}
	else
	{
	echo '<font color="red">The email or password you entered is incorrect.</font>';
	} 
 

}

}

?>