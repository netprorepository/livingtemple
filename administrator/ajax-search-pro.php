<?php include('setting.php'); ?>
<?php 
   $text = $_REQUEST['text'];
   $sql = "select * from `products` where name LIKE '%".$text."%'";
   $result = mysql_query($sql);
   $count = mysql_num_rows($result);
   $x=1;
	while($rows=mysql_fetch_array($result)){
	$name = $rows['name'];
	  
    ?>
			 <tr id="tr<?php echo $x; ?>" class=""> 		 
			<td class=" sorting_1"><?php echo $rows['category_id']; ?></td> 
			<td class=" "><?php echo $rows['subcategory_id']; ?></td> 
			<td class=" "><?php echo $rows['name']; ?></td> 
			<td class=" "><?php echo $rows['code']; ?></td> 
			<td class=" "><?php echo $rows['description']; ?></td> 
			<td class=" "><?php echo $rows['price']; ?></td> 
			<td class=" "><?php echo $rows['discount_price']; ?></td> 
			<td class=" "><img src="<?php echo $rows['images']; ?>"></td> 
			<td class=" "><?php echo $rows['color']; ?></td> 
			<td class=" "><?php echo $rows['series']; ?></td> 
			<td class=" "><?php echo $rows['material']; ?></td> 
			<td class=" "><?php echo $rows['function']; ?></td> 
			<td class=" "><?php echo $rows['phone_model']; ?></td> 
			<td class=" "><?php echo $rows['delivery_time']; ?></td>			 
			<td class=" "><?php echo $rows['status']; ?></td> 			
			<td class=" "><a href="edit-product.php?id=16"><i class="icon-pencil"></i></a> &nbsp;&nbsp;<a class="delete" onclick="deletedata('products','id','16')"><i class="icon-trash"></i></a></td>
		  </tr>
		 
<?php 
     
   $x++; }
?>
		