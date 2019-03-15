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
	   <li> <a href="javascript:void(0);"><strong>View Product</strong></a> </li> 
	   <li ><a href="#" onclick="download12()" ><strong>Download search product</strong></a></li> 
	   
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
         <table id="my-table" class="table table-striped table-bordered table-hover"> <thead> 
        <tr>
        <th>Category</th>
		<th>Sub Category</th>
		<th>Name</th>
		<th>Code</th>
		<th>Description</th>
		<th>Price</th>
		<th>Discount Price</th>
		<th>Images</th>
		<th>color</th>
		<th>Series</th>
		<th>Material</th>
		<th>Function</th>
		<th>Phone Model</th>
		<th>Delivery Time</th>				 
        <th>Status</th> 
		<th>Action</th>
		</tr> </thead> 
		  
<tbody>  	
<?php 
					global $Category,$current,$limit;
							$current=$_REQUEST['current'];
							$limit=1000;
					$sql="select * from products";
					$rs  = mysql_query($sql) or die(mysql_error());
					$totalpages = ceil(mysql_num_rows($rs) / $limit);
					if($current=="")
					{
						$current=1;
					}
					$offset=($current* $limit) - $limit;
					$sql=$sql." limit $offset,$limit";
	 		
	 		
	 		$rs  = mysql_query($sql) or die(mysql_error());
               //	echo $sql;
                
                	
			
	          if(mysql_num_rows($rs))
	          {
	          	$x=0;
	          	      while($query=mysql_fetch_array($rs))
	                	{


	 $_SESSION["category_id"] = $query['category_id'];
	 //echo"<pre>";
	 //print_r($_SESSION["category_id"]);die;
	 $cat_id = $query['category_id'];
	 $sql = "select * from `category` where id = '$cat_id'";
	 $catresult = mysql_query($sql);
	 $row = mysql_fetch_assoc($catresult);
	 
	 $subcat_id = $query['subcategory_id'];
	 $subsql = "select * from `sub_category` where id = '$subcat_id'";
	 $subcatresult = mysql_query($subsql);
	 $subrow = mysql_fetch_assoc($subcatresult);
?>		  

         
          <tr id="tr<?=$query[0]?>"> 
                        		 
			<td><?=$row['category_name']?></td> 
			<td><?=$subrow['sub_category']?></td> 
			<td><?=$query['name']?></td> 
			<td><?=$query['code']?></td> 
			<td><?=substr($query['description'],0,100)?></td> 
			<td><?=$query['price']?></td> 
			<td><?=$query['discount_price']?></td> 
			<td class="back_img"><img src="<?=$query['images']?>" ></td> 
			<td><?=$query['color']?></td> 
			<td><?=$query['series']?></td> 
			<td><?=$query['material']?></td> 
			<td><?=$query['function']?></td> 
			<td><?=$query['phone_model']?></td> 
			<td><?=$query['delivery_time']?></td>			 
			<td><?=$query['status']?></td> 			
			<td><a href="edit-product.php?id=<?=$query[0]?>" ><i class="icon-pencil"></i></a> &nbsp;&nbsp;<a class="delete" onclick="deletedata('products','id','<?=$query[0]?>')" ><i class="icon-trash"></i></a></td>
		  </tr> 
		 
		  
		
		  
<?php 
	
	}
		echo "<table border='0'  max-width='500px'  cellpadding='3' cellspacing='0' border='0' align=\"center\">";
		echo "<tr id=EvName ><td class='bodytext' width=1%>Pages:</td><td  align=left>";
							for($x=1 ; $x <= $totalpages ;$x++)
							{
							if($x==$current)
							echo "&nbsp;<b><font size='1'>$x</b>&nbsp;|";	
							
							else
								//echo "&nbsp;<a href='$x'><b>$x</b>&nbsp;</a>|";
								echo "&nbsp;<a href='".BASE_URL."administrator/view-product.php?current=".$x."'><b>$x</b>&nbsp;</a>|";	
							}
				echo "</td></tr>";
				
				echo "</table>";
	          	
	
	}
  	
	
?>






          </tbody> 
			
			</table> 
          
            
            </form>
            </div>
            
            
             </div> </div>
         
  
        
        
             </div> </div> </div> </body> </html>