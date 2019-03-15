<?php
include 'setting.php';
if($objComm->authenticate($_COOKIE['username']))
{
header('location:welcome.php');
}

?>