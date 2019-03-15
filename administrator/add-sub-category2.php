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
			$datetime=date("d/m/Y");
			$where="name='$sub_category' and menu_id='$category_id' and menu2_id='$subcategory_id'";  
			$subcategorycheck=$objComm->findRecord('tbl_menu3',$where);
				if(count($subcategorycheck)>0)
					{
					$errmessage.=$_SESSION['subcategorymsg']=$sub_category.' Subcategory  already Exist<br>';			
					}
					
				else{
					$fields=array('menu_id','menu2_id','name','url','status');
					$data=array($category_id,$subcategory_id,$sub_category,$objComm->strToUrl($sub_category),$status);
					$lastId=$objComm->insertWithLastid($fields,$data,'tbl_menu3');				
					$message=INSRT_DATA_MASS_SUSS;
				}
			}	
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Subcategory 2</strong></a> </li>
		
	</ul> 
	   </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
      <br/>  
		  
<form class="form-horizontal row-border" action="" method="post"> 		   
          
		 
		 
        
		 <div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		    <select class="form-control" name="category_id" onchange="return subcategory(this.value)">
		  <option>--select--</option>
		  <?php
		  $category=$objComm->findAllRecord('tbl_menu1');
		for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>"><?=$category[$i]['name']?></option>
		  <? } ?>
		  </select>
		  </div> </div>
		   <div class="form-group"><label class="col-md-2 control-label">Choose Sub Category:</label> 
          <div class="col-md-10" > 
		  <select class="form-control" name="subcategory_id" id="ajaxvalue">
		  <option>--select--</option>
		  </select>
		  </div> </div>
		   <div class="form-group">
          <label class="col-md-2 control-label">Subcategory Name:</label> 
          <div class="col-md-10"><input type="text" name='sub_category' class="form-control"><span class="error_msg"><?php  if(isset($errmessage)) echo $errmessage; ?></span></div> </div> 
		  
		  
		<div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active">Active</option><option value="Inactive">Inactive</option></select>
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
			 
			 			 