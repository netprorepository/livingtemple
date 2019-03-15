<?php
error_reporting(0);
class adminLogin extends dbConnect
{

function __construct()
{
	parent::__construct();
	parent::connect_db();
}

function checkLogin($username,$password,$table)
{
	// To protect from MySQL injection
	$username = addslashes($username);
	$password = addslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$query="select * from ".$table." where emailid='".$username."' and password='".MD5($password)."' and status='Active'";
if(mysql_num_rows(parent::query($query))==1)
	{
	$result=parent::query($query);
	$row=mysql_fetch_array($result);
	// Set cookies. I set my cookies to last 24 hours
	$expires = 60 * 60 * 24;
	setcookie("username", $row['fullname'], time()+$expires);
	setcookie("email_id", $row['emailid'], time()+$expires);	
	setcookie("lastLogin", $row['lastLogin'], time()+$expires);	
	
	print "<script type='text/javascript'>window.location='index.php';</script>";
	}
	else
	{
	echo PASS_MATH;
	} 
 

}

}

?>