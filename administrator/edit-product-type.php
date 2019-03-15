<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';


			if(isset($_POST['submit']))
			{
			extract($_POST);			
			$update_arr=array(								
			'product_type'=>$product_type,
			'status'=>$status			
			);
			$where=' where id="'.$_GET['id'].'"';
                        $sq = "select * from product_type where id = '".$_GET['id']."'";
                        $res1 = mysql_query($sq);
                        $row = mysql_fetch_assoc($res1);

			$sql = "UPDATE products SET product_type='$product_type' WHERE product_type='".$row['product_type']."'";
                        mysql_query($sql);
			$objComm->db_update_recordm('product_type',$update_arr,$where);
                         		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('product_type','id',$_GET['id']);
			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Product Type</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post"> 		   
          	 
         <div class="form-group">
          <label class="col-md-2 control-label">Product Type :</label> 
          <div class="col-md-10"><input type="text" name='product_type' value="<?=$result[0]['product_type']?>" class="form-control"></div> </div> 
		  
		  
		 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <? if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <? if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>