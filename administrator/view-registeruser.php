<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 
<?php
$host="localhost";
$uname="root";
$pass="";
$database = "online_school"; 

$connection=mysql_connect($host,$uname,$pass);

//or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");

if (isset($_GET['id'])) 
	{
	$di=$_GET['id'];	
	mysql_query('delete from tbl_courses_apply where id="'.$di.'"') or die(mysql_error()) ;
	//header('Location:?page='.$pageId.'');
	echo DELETE_DATA_MASS_SUSS;

	}

?>
 
 <div id="container"> 
 
 <?php include 'include/topHeader.php' ?>


		

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>View Apply Courses Details</strong></a> </li> 
	  </ul>
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
       
        <div class="row"> 
         <div class="col-md-12"> 
          
         <div class="widget-content"> 
<div>

<div id="txtHint"></div>
<div class="dexcel" align="center"><a href="export1.php"><strong>Download User Application Details</strong></a></div>
</div>
 <form action="" method="post" >
         <table class="table table-striped table-bordered table-hover table-checkable datatable"> <thead> 
        <tr>
        <th>Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th>Courses</th>
        <th>Status</th> 
		<th>Action</th>
		</tr> </thead> 
		  
<tbody>  
<?php 
$query=$objComm->findAllRecord('tbl_courses_apply');
for($i=0;$i<count($query);$i++){
?>		  
          <tr> 		 
			<td><?=$query[$i]['title']?> <?=$query[$i]['name']?> <?=$query[$i]['sname']?></td> 
			<td><?=$query[$i]['email']?></td> 						 
			<td><?=$query[$i]['phone']?></td>
			<td><?=$query[$i]['courses']?></td>
			<td><?=$query[$i]['status']?></td> 			
			<td><a href="viewmemberdetail.php?id=<?=$query[$i][0]?>" >View Detail</a> &nbsp;&nbsp;<a class="delete" href="view-registeruser.php?id=<?php echo $query[$i][0];?>" onclick="return confirm('Are you sure to delete this record.');" ><i class="icon-trash"></i></a></td>
		  </tr> 
		<!---onclick="delete('user_registration','id','<?php //echo $query[$i][0];
			?>')"---->  
<?php } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
  
        
        
             </div> </div> </div> </body> </html>