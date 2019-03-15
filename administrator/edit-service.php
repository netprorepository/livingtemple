<!DOCTYPE html>
 <html lang="en"> 
 <head> 

<meta http-equiv=Content-Type content="text/html; charset=windows-1252"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';
$objComm->editorjs();
if(isset($_POST['submit']))
			{
			extract($_POST);
			if($_FILES["image"]["name"]!='')
			$images	=$objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);
			else
			$images=$hidden_images;
			$update_arr=array(								
			'menu1'=>3,
			'menu2'=>$menu2,
			'title'=>$title,
			'short'=>mysql_real_escape_string($short),
			'timing'=>$timing,
			'image'=>$images,
			'url'=>$objComm->strToUrl($title)			
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_services',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_services','id',$_GET['id']);
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Services</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          
		  <div class="form-group"><label class="col-md-2 control-label">Choose Sub Category:</label> 
          <div class="col-md-10" > 
		  
		  <select class="form-control" name="menu2" id="ajaxvalue" onchange="return subcategory2(this.value)">
		  <?php
			$aasd=$result[0]['menu2'];
			echo $aasd;
		  $subcategory=$objComm->singleRowFetch('tbl_menu2','id',$aasd);
		for($j=0;$j<count($subcategory);$j++){ ?>
		  <option value="<?=$subcategory[$j]['id']?>" <?php if($result[0]['menu2']==$subcategory[$j]['id']) echo 'selected';?> ><?=$subcategory[$j]['name']?></option>
		  <?php } ?>
		  </select>
		  </div> </div>
		  
		
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Heading:</label> 
          <div class="col-md-10"><input type="text" name='title' value="<?=$result[0]['title']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Short Description:</label> 
          <div class="col-md-10"><input type="text" name='short' value="<?=$result[0]['short']?>" class="form-control"></div> </div> 
		
		  <div class="form-group">
          <label class="col-md-2 control-label">Timing:</label> 
          <div class="col-md-10"><input type="text" name='timing' value="<?=$result[0]['timing']?>" class="form-control"></div> </div> 
		
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Background Images:</label> 
          <div class="col-md-10"><input type="file" name='image' class="form-control"> 
		  <input type="hidden" value="<?=$result[0]['image']?>" name="hidden_images">
		  <img src="../products/<?=$result[0]['image']?>" style="width:150px;padding:10px;" >
		  </div></div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="status">
		  <option value="Active" <?php if($result[0]['status']=='Active') echo 'selected';?>>Active</option>
		  <option value="Inactive" <?php if($result[0]['status']=='Inactive') echo 'selected';?>>Inactive</option>
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
// thired level category menu

function subcategory2(catid){
var formData = {catid:catid}; //Array 
 
$.ajax({
    url : "ajax-subcatogary2.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
       $("#ajaxvalue2").html(data);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});

}

</script>	