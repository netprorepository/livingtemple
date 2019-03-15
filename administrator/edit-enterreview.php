<?php 
include 'include/scriptStyle.php';
include 'include/topHeader.php';
$id = $_REQUEST['id'];
$status = $_REQUEST['status'];
$query =UPDATE rating SET status ='$status'  WHERE id = '$id';
$queryres = mysq_query($query);


?>