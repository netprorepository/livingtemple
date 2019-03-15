<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 

<?php include 'include/scriptStyle.php' ?>
<script>

function download12(){	
		var searchStr = $("#kwd_search").val();
		location.href='export.php?searchStr='+searchStr;
	}
$(document).ready(function(){
	
	// Write on keyup event of keyword input element
	$("#kwd_search").keyup(function(){
		// When value of the input is not blank
        var term=$(this).val()
		if( term != "")
		{
			// Show only matching TR, hide rest of them
			$("#my-table tbody>tr").hide();
            $("#my-table td").filter(function(){
                   return $(this).text().toLowerCase().indexOf(term ) >-1
            }).parent("tr").show();
		}
		else
		{
			// When there is no input or clean again, show everything back
			$("#my-table tbody>tr").show();
		}
	});
});
</script>
</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';
       include 'include/setting.php';
 ?>


		

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>View Services</strong></a> </li> 
	   </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
       
        <div class="row"> 
         <div class="col-md-12"> 
          
         <div class="widget-content"> 
<div>

<div id="txtHint"></div>

</div>
<div class="html_ser">
<div class="left_ser_kew"></div>
<div class="right_ser_kew" style="text-align:right;"><label for="kwd_search" style="margin-top:8px;">Search:</label> <input type="text" id="kwd_search" value="" style="  border: 1px solid #CCB5B5; height: 22px;
  margin: 8px 0px;"/>
</div>
</div>
 <form action="" method="post" >
         <table class="table table-striped table-bordered table-hover table-checkable datatable"> <thead> 
        <tr>
        <th>ID</th>
        <th>Menu 1</th>
		<th>Menu 2</th>
		<th>Title</th>
		<th>Timing</th>
		<th>Image</th>
		<th>Status</th> 
		<th>Action</th>
		</tr> </thead> 
		  
<tbody>  	
<?php 
$query=$objComm->findAllRecord('tbl_services');
for($i=0;$i<count($query);$i++)
{
	 $_SESSION["category_id"] = $query['category_id'];
	 //echo"<pre>";
	 //print_r($_SESSION["category_id"]);die;
	 $cat_id = $query['category_id'];
	 $sql = "select * from `tbl_menu1` where id ='".$query[$i][1]."'";
	 $catresult = mysql_query($sql);
	 $row = mysql_fetch_assoc($catresult);
	 
	 $subcat_id = $query[$i][2];
	 $subsql = "select * from `tbl_menu2` where id = '$subcat_id'";
	 $subcatresult = mysql_query($subsql);
	 $subrow = mysql_fetch_assoc($subcatresult);
	
?>		  

         
          <tr id="tr<?=$query[$i][0]?>"> 
                        		 
			<td><?=$i+1?></td> 
			<td><?=$row['name']?></td> 
			<td><?=$subrow['name']?></td> 
			<td><?=$query[$i]['title']?></td> 
			<td><?=$query[$i]['timing']?></td> 
			<td class="back_img"><img src="../products/<?=$query[$i]['image']?>" style="width:50px;" ></td> 
			<td><?=$query[$i]['status']?></td> 
			<td><a href="edit-service.php?id=<?=$query[$i][0]?>" ><i class="icon-pencil"></i></a> &nbsp;&nbsp;<a class="delete" onclick="deletedata('tbl_services','id','<?=$query[$i][0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		 
		  
		
		  
<?php 
	}
?>		






          
			
			</table> 
          
            
            </form>
            </div>
            
            
             </div> </div>
         
  
        
        
             </div> </div> </div> </body> </html>