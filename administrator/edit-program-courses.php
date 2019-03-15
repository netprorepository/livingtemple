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
			$image_ov="";
			$image_st="";
			$image_time="";
			$image_entry="";
			$image_fee="";
			$image_pro="";
			if($_FILES["ov_image"]["name"]!='')
			{
			$image_ov	= $objComm->uploadfile($_FILES["ov_image"]["name"],$_FILES["ov_image"]["tmp_name"]);
			}
			else
			{
			$image_ov=$hidden_ov_image;
			}
			if($_FILES["st_image"]["name"]!='')
			{
			$image_st	= $objComm->uploadfile($_FILES["st_image"]["name"],$_FILES["st_image"]["tmp_name"]);
			}
			else
			{
			$image_st=$hidden_st_image;
			}
			if($_FILES["time_image"]["name"]!='')
			{
			$image_time	= $objComm->uploadfile($_FILES["time_image"]["name"],$_FILES["time_image"]["tmp_name"]);
			}
			else
			{
			$image_time=$hidden_time_image;
			}
			if($_FILES["entry_image"]["name"]!='')
			{
			$image_entry= $objComm->uploadfile($_FILES["entry_image"]["name"],$_FILES["entry_image"]["tmp_name"]);
			}
			else
			{
			$image_entry=$hidden_entry_image;
			}
			if($_FILES["fee_image"]["name"]!='')
			{
			$image_fee	= $objComm->uploadfile($_FILES["fee_image"]["name"],$_FILES["fee_image"]["tmp_name"]);
			}
			else
			{
			$image_fee=$hidden_fee_image;
			}
			if($_FILES["pro_image"]["name"]!='')
			{
			$image_pro	= $objComm->uploadfile($_FILES["pro_image"]["name"],$_FILES["pro_image"]["tmp_name"]);
			}
			else
			{
			$image_pro=$hidden_pro_image;
			}
			$update_arr=array(								
			'page' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$page)))),
			'ov_title' =>  mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_title)))), 
			'ov_short' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_short)))),
			'ov_s_title' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_s_title)))),
			'ov_description' =>mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_description)))),
			'ov_image' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$image_ov)))),
			'st_title' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_title)))),
			'st_short' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_short)))),
			'st_s_title' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_s_title)))),
			'st_description' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_description)))),
			'st_image' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$image_st)))),
			'time_title' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_title)))),
			'time_short' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_short)))),
			'time_s_title'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_s_title)))),
			'time_description' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_description)))),
			'time_image'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$image_time)))), 
			'entry_title' =>mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_title)))) ,
			'entry_short'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_short)))),
			'entry_s_title' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_s_title)))),
			'entry_description'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_description)))),
			'entry_image'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$image_entry)))),
			'fee_title'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_title)))), 
			'fee_short'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_short)))),
			'fee_s_title'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_s_title)))),
			'fee_description' => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_description)))),
			'fee_image'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$image_fee)))),
			'pro_title'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_title)))),
			'pro_short'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_short)))),
			'pro_s_title'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_s_title)))),
			'pro_description'  =>mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_description)))), 
			'pro_image'  => mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$image_pro)))),
			'status' =>$status
			
			
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_program_courses',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_program_courses','id',$_GET['id']);
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Program Courses</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
           <div class="form-group">
          <label class="col-md-2 control-label">Page Heading:</label> 
          <div class="col-md-10"><input type="text" name='page' value="<?=$result[0]['page']?>" class="form-control"></div> </div> 
		 
		 <!------- Overview ------------>
		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Title:</label> 
          <div class="col-md-10"><input type="text" name='ov_title' value="<?=$result[0]['ov_title']?>" class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='ov_short' class="form-control"><?=$result[0]['ov_short']?></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Second Title:</label> 
          <div class="col-md-10"><input type="text" name='ov_s_title' value="<?=$result[0]['ov_s_title']?>" class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='ov_description' id='ov_description' class="form-control"><?=$result[0]['ov_description']?></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10">
		  <input type="file" name='ov_image'  class="form-control">
			<img src="../products/<?=$result[0]['ov_image']?>" style="width:150px;">
		  <input type="hidden" name='hidden_ov_image' value="<?=$result[0]['ov_image']?>"  class="form-control">
		  </div> </div> 
		  		
		<!----------------------Structure------------->

		<div class="form-group">
          <label class="col-md-2 control-label">Structure Title:</label> 
          <div class="col-md-10"><input type="text" name='st_title' value="<?=$result[0]['st_title']?>" class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Structure Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='st_short' class="form-control"><?=$result[0]['st_short']?></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Structure Second Title:</label> 
          <div class="col-md-10"><input type="text" name='st_s_title' value="<?=$result[0]['st_s_title']?>" class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Structure Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='st_description' id='st_description' value="<?=$result[0]['st_description']?>" class="form-control"></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10">
		  <input type="file" name='st_image'  class="form-control">
		  	<img src="../products/<?=$result[0]['st_image']?>" style="width:150px;">
		  <input type="hidden" name='hidden_st_image' value="<?=$result[0]['st_image']?>"  class="form-control">
		
		  </div> </div>	
			
		<!---------- Time Tables--------------->	
			
					<div class="form-group">
          <label class="col-md-2 control-label">Timetables Title:</label> 
          <div class="col-md-10"><input type="text" name='time_title' value="<?=$result[0]['time_title']?>" class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Timetables Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='time_short' class="form-control"><?=$result[0]['time_short']?></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Timetables Second Title:</label> 
          <div class="col-md-10"><input type="text" name='time_s_title' value="<?=$result[0]['time_s_title']?>" class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Timetables Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='time_description' id='time_description' class="form-control"><?=$result[0]['time_description']?></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10">
		  <input type="file" name='time_image' class="form-control">
		  		<img src="../products/<?=$result[0]['time_image']?>" style="width:150px;">
		  <input type="hidden" name='hidden_time_image' value="<?=$result[0]['time_image']?>"  class="form-control">
		
		  </div> </div>	
			
		<!--------Entry Requirements---------->	

							<div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Title:</label> 
          <div class="col-md-10"><input type="text" name='entry_title' value="<?=$result[0]['entry_title']?>" class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='entry_short' class="form-control"><?=$result[0]['entry_short']?></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Second Title:</label> 
          <div class="col-md-10"><input type="text" name='entry_s_title' value="<?=$result[0]['entry_s_title']?>" class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='entry_description' id='entry_description' class="form-control"><?=$result[0]['entry_description']?></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10">
		  <input type="file" name='entry_image' class="form-control">
		 <img src="../products/<?=$result[0]['entry_image']?>" style="width:150px;">
		  <input type="hidden" name='hidden_entry_image' value="<?=$result[0]['entry_image']?>"  class="form-control">
		
		  </div> </div>	
			
		<!----------Fees----------->
		
			<div class="form-group">
          <label class="col-md-2 control-label">Fees Title:</label> 
          <div class="col-md-10"><input type="text" name='fee_title'  value="<?=$result[0]['fee_title']?>" class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Fees Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='fee_short' class="form-control"><?=$result[0]['fee_short']?></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Fees Second Title:</label> 
          <div class="col-md-10"><input type="text" name='fee_s_title' value="<?=$result[0]['fee_s_title']?>" class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Fees Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='fee_description' id='fee_description' class="form-control"><?=$result[0]['fee_description']?></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10">
		  <input type="file" name='fee_image' class="form-control">
			<img src="../products/<?=$result[0]['fee_image']?>" style="width:150px;">
		  <input type="hidden" name='hidden_fee_image' value="<?=$result[0]['fee_image']?>"  class="form-control">
		
		  </div> </div>	
			
		<!------------Progression ------------>

					<div class="form-group">
          <label class="col-md-2 control-label">Progression Title:</label> 
          <div class="col-md-10"><input type="text" name='pro_title' value="<?=$result[0]['pro_title']?>" class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Progression Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='pro_short' class="form-control"><?=$result[0]['pro_short']?></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Progression Second Title:</label> 
          <div class="col-md-10"><input type="text" name='pro_s_title' value="<?=$result[0]['pro_s_title']?>" class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Progression Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='pro_description' id='pro_description' class="form-control"><?=$result[0]['pro_description']?></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10">
		  <input type="file" name='pro_image' class="form-control">
		  		<img src="../products/<?=$result[0]['pro_image']?>" style="width:150px;">
		  <input type="hidden" name='hidden_pro_image' value="<?=$result[0]['pro_image']?>"  class="form-control">
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
		<?php 
			$objComm->editor('ov_description');
			$objComm->editor('st_description');
			$objComm->editor('time_description');
			$objComm->editor('entry_description');
			$objComm->editor('fee_description');
			$objComm->editor('pro_description');
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