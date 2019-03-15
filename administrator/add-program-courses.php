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
 $objComm->editorjs();
 if(isset($_POST['submit']))
			{
			extract($_POST);			
			$date=date("d/m/Y");
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
			if($_FILES["st_image"]["name"]!='')
			{
			$image_st	= $objComm->uploadfile($_FILES["st_image"]["name"],$_FILES["st_image"]["tmp_name"]);
			}
			if($_FILES["time_image"]["name"]!='')
			{
			$image_time	= $objComm->uploadfile($_FILES["time_image"]["name"],$_FILES["time_image"]["tmp_name"]);
			}
			if($_FILES["entry_image"]["name"]!='')
			{
			$image_entry= $objComm->uploadfile($_FILES["entry_image"]["name"],$_FILES["entry_image"]["tmp_name"]);
			}
			if($_FILES["fee_image"]["name"]!='')
			{
			$image_fee	= $objComm->uploadfile($_FILES["fee_image"]["name"],$_FILES["fee_image"]["tmp_name"]);
			}
			if($_FILES["pro_image"]["name"]!='')
			{
			$image_pro	= $objComm->uploadfile($_FILES["pro_image"]["name"],$_FILES["pro_image"]["tmp_name"]);
			}
			$fields=array('page','ov_title','ov_short','ov_s_title','ov_description','ov_image' ,'st_title','st_short','st_s_title','st_description','st_image','time_title','time_short','time_s_title','time_description','time_image', 'entry_title','entry_short','entry_s_title','entry_description','entry_image','fee_title','fee_short','fee_s_title','fee_description','fee_image','pro_title','pro_short','pro_s_title','pro_description','pro_image','status');
			$data=array($page,mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_short)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_s_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$ov_description)))),$image_ov,mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_short)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_s_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$st_description)))),$image_st,mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_short)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_s_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$time_description)))),$image_time, mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_title)))), mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_short)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_s_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$entry_description)))),$image_time,mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_short)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_s_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$fee_description)))),$image_fee,mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_short)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_s_title)))),mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$pro_description)))),$image_pro,$status);
			$lastId=$objComm->insertWithLastid($fields,$data,'tbl_program_courses');				
			$message=INSRT_DATA_MASS_SUSS;	
			}	
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Program Courses</strong></a> </li> </ul> 
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
          <label class="col-md-2 control-label">Page Heading:</label> 
          <div class="col-md-10"><input type="text" name='page' class="form-control"></div> </div> 
		 
		 <!------- Overview ------------>
		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Title:</label> 
          <div class="col-md-10"><input type="text" name='ov_title' class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='ov_short' class="form-control"></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Second Title:</label> 
          <div class="col-md-10"><input type="text" name='ov_s_title' class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Overview Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='ov_description' id='ov_description' class="form-control"></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='ov_image' class="form-control"></div> </div> 
		  		
		<!----------------------Structure------------->

		<div class="form-group">
          <label class="col-md-2 control-label">Structure Title:</label> 
          <div class="col-md-10"><input type="text" name='st_title' class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Structure Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='st_short' class="form-control"></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Structure Second Title:</label> 
          <div class="col-md-10"><input type="text" name='st_s_title' class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Structure Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='st_description' id='st_description' class="form-control"></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='st_image' class="form-control"></div> </div>	
			
		<!---------- Time Tables--------------->	
			
					<div class="form-group">
          <label class="col-md-2 control-label">Timetables Title:</label> 
          <div class="col-md-10"><input type="text" name='time_title' class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Timetables Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='time_short' class="form-control"></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Timetables Second Title:</label> 
          <div class="col-md-10"><input type="text" name='time_s_title' class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Timetables Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='time_description' id='time_description' class="form-control"></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='time_image' class="form-control"></div> </div>	
			
		<!--------Entry Requirements---------->	

							<div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Title:</label> 
          <div class="col-md-10"><input type="text" name='entry_title' class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='entry_short' class="form-control"></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Second Title:</label> 
          <div class="col-md-10"><input type="text" name='entry_s_title' class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Entry Requirements Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='entry_description' id='entry_description' class="form-control"></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='entry_image' class="form-control"></div> </div>	
			
		<!----------Fees----------->
		
			<div class="form-group">
          <label class="col-md-2 control-label">Fees Title:</label> 
          <div class="col-md-10"><input type="text" name='fee_title' class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Fees Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='fee_short' class="form-control"></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Fees Second Title:</label> 
          <div class="col-md-10"><input type="text" name='fee_s_title' class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Fees Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='fee_description' id='fee_description' class="form-control"></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='fee_image' class="form-control"></div> </div>	
			
		<!------------Progression ------------>

					<div class="form-group">
          <label class="col-md-2 control-label">Progression Title:</label> 
          <div class="col-md-10"><input type="text" name='pro_title' class="form-control"></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Progression Short Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='pro_short' class="form-control"></textarea></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Progression Second Title:</label> 
          <div class="col-md-10"><input type="text" name='pro_s_title' class="form-control"></div> </div> 

		  <div class="form-group">
          <label class="col-md-2 control-label">Progression Description:</label> 
          <div class="col-md-10"><textarea rows="3" name='pro_description' id='pro_description' class="form-control"></textarea></div> </div> 
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='pro_image' class="form-control"></div> </div>	
			
		
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
			 
			 