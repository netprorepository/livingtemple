<?php
	class Product extends dbConnect{
		
     function __construct()
	{
		parent::__construct();
		parent::connect_db();
	}    
		
		
	function getSellByItem($id){
		
		$sql = "select SUM(quantity) from orders where productId='$id' and status='Delivered'";
					
		$result = mysql_query($sql);
		while($row1=mysql_fetch_array($result))
					 {
						return $mark=$row1['SUM(quantity)'];
						
					}
							 
			
		
	}
    
        
	}

?>