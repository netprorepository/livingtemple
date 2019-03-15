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
 require_once 'classes/excel_reader2.php';

 if(isset($_POST['submit']))
			{
			extract($_POST);			
			$date=date("d/m/Y");
			
			$fields=array('name','image','content','price','dis_price','latest','status');
			$data=array($name,$images,$description,$price,$discount_price,$latest,$status);
			$lastId=$objComm->insertWithLastid($fields,$data,'latest_product');				
			$message=INSRT_DATA_MASS_SUSS;	
			}	

?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Latest Offer Product</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   <br/><br/><br/>
  <form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data">

		  <div class="form-group">
          <label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="text" name='name' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='description' rows="8" class="form-control"></textarea></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Price:</label> 
          <div class="col-md-10"><input type="text" name='price' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Discount Price:</label> 
          <div class="col-md-10"><input type="text" name='discount_price' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="text" name='images' class="form-control"></div> </div> 
		   
		   <div class="form-group"><label class="col-md-2 control-label">Product Offer Product :</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="latest">
		  <option value="yes">Yes</option>
		  <option value="no">No</option>
		  </select>
		  </div> </div>		  
     
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="status">
		  <option value="Active">Active</option>
		  <option value="Inactive">Inactive</option>
		  </select>
		  </div> </div>		  
            
		<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>
			 
<script>
function subcategory(catid){
var formData = {catid:catid}; //Array 
 
$.ajax({
    url : "ajax-subcatogary.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
       $("#ajaxvalue").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}

</script>			 
			 
			 