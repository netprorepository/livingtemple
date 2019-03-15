<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php' ?>


		

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li><strong> View Application Transactions </strong></li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
       
        <div class="row"> 
         <div class="col-md-12"> 
          
         <div class="widget-content"> 
<div>

<div id="txtHint"></div>
</div>
 <form action="" method="post" >
         <table class="table table-striped table-bordered table-hover table-checkable datatable"> <thead> 
        <tr>
       
		<th>Date</th>
		<th>Amount</th>
		<th>Status</th>
		<th>Ref</th>
		<th>Applicant Name</th>
               <th>Class</th>
		<th>Contact</th>
		<th>Action</th>
		</tr> </thead> 

<tbody>  
<?php 
$code_query = "SELECT * FROM  `tbl_transaction` JOIN tbl_application WHERE tbl_transaction.applicant_id = tbl_application.id";
$code_result = mysql_query($code_query);
$i = 0; 
while($query = mysql_fetch_array($code_result)){   // print_r($query);
	
?>		  
           <tr id="tr<?=$i?>"> 		 
		 
		    <td> <?= date("d-M-Y h:i A",strtotime($query['transdate'])) ?></td> 
                    <td><?= number_format($query['amount'])?></td> 
		    <td><?=$query['status']?></td> 
                   <td><?=$query['reference']?></td>
                   <td><?= strtoupper($query['surname'].' '.$query['fname'])?></td>
                  <td><?=$query['classs']?></td>
                  <td><?=$query['fguardian']?></td>
		    <td><a class="delete" onclick="deletedata('tbl_transaction','id','<?=$query['id']?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
	  
<?php $i++; } ?>
          </tbody> 
			
			</table> 
            
            
            </form>
            </div>
            
            
             </div> </div>
         
             </div> </div> </div>
			 </body> </html>