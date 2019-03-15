<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>
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
			 
			 
</head> 
<body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';
 $objComm->editorjs();
 require_once 'classes/excel_reader2.php';

 if(isset($_POST['submit']))
			{
			extract($_POST);			
			$date=date("d/m/Y");
			$images	= $objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);
			$fields=array('menu1','menu2','title','image','short','timing','date','status','url');
			$data=array(3,$menu2,mysql_real_escape_string($title),$images,
			mysql_real_escape_string($short),mysql_real_escape_string($timing),$date,$status,$objComm->strToUrl($title));
			$lastId=$objComm->insertWithLastid($fields,$data,'tbl_services');				
			$message=INSRT_DATA_MASS_SUSS;	
			}	
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Services</strong></a> </li> </ul> 
	   </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)){
			
		echo $message; 
			
		}
		if($er==2)
		{
		echo "<a href='download.php?file=$filename'>&nbsp;&nbsp;&nbsp;Error File</a>";
		}    
		?>
        <br/>

		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="menu2" onchange="return subcategory(this.value)" >
		  <?php
		  $category=$objComm->singleRowFetch('tbl_menu2','menu_id',3);
		  for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>"><?=$category[$i]['name']?></option>
		  <?php } ?>
		  </select>
		  </div> </div>
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Heading:</label> 
          <div class="col-md-10"><input type="text" name='title' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Short Description :</label> 
          <div class="col-md-10"><input type="text" name='short' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Timing:</label> 
          <div class="col-md-10"><input type="text" name='timing' class="form-control"></div> </div> 
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='image' class="form-control"></div> </div> 
		 		
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
			 <?php 
					$objComm->editor('description');
					$objComm->editor('description2');
				?>
