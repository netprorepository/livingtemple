<?php 
setcookie("username", "", time()-3600);
setcookie("email_id", "", time()-3600);
setcookie("lastLogin", "", time()-3600);
header('Location:login.php');

?>