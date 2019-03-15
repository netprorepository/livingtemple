<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php include 'include/scriptStyle.php' ?>

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
			$gallery="";
			

			$update_arr=array(		
				'wel_desc'=> mysql_real_escape_string($views),
				'v_title'=>$v_title,
				'v_desc'=>mysql_real_escape_string($description2),
				'video'=>$video,
				'status'=>$status
				
				);
			
		    $where=' where id= 1';
			$objComm->db_update_recordm('tbl_home',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
		
			
		    //$lastId=$objComm->insertWithLastid($fields,$data,'tbl_about');				
			//$message=INSRT_DATA_MASS_SUSS;	
			}
			$result=$objComm->singleRowFetch('tbl_home','id',1);			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Update Home Page</strong></a> </li> </ul> 
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
          
		  <div class="form-group">
          <label class="col-md-2 control-label">Welcome Message :</label> 
          <div class="col-md-10"><textarea name='views' id='description'   rows="8" class="form-control"><?=$result[0]['wel_desc']?></textarea></div> </div> 
		
			
		  <div class="form-group">
          <label class="col-md-2 control-label">Select Videos:</label> 
          <div class="col-md-10">
			<select name="video" class="form-control">
			<?php
		   $category=$objComm->singleRowFetch('tbl_youtube','status','Active');
			for($i=0;$i<count($category);$i++){ ?>
			<option value="<?=$category[$i]['id']?>" <?php if($category[$i]['id']==$result[0]['video']) echo 'selected'; ?>><?=$category[$i]['description']?></option>

		  <?php } ?>
			
			</select>
		  </div> </div>	
	
		 <div class="form-group">
          <label class="col-md-2 control-label">Title:</label> 
          <div class="col-md-10"><input type="text" name='v_title' value="<?=$result[0]['v_title']?>" class="form-control"></div> </div>
		  
		<div class="form-group">
          <label class="col-md-2 control-label">Description After Video:</label> 
          <div class="col-md-10"><textarea name='description2' id='description4'   rows="8" class="form-control"><?=$result[0]['v_desc']?></textarea></div> </div> 
		  
			 <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active" <?php if($result[0]['status']=='Active') echo'selected';?>>Active</option><option value="Inactive" <?php if($result[0]['status']=='Inactive') echo'selected';?>>Inactive</option></select>
		  </div> </div>		  
    		  
            
			<button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
		</form> 
                   </div> </div> 
             </div> </div> </div>
			 </div>
</body> 
</html>
			 <?php 
					$objComm->editor('description');
					$objComm->editor('description2');
					$objComm->editor('description3');
					$objComm->editor('description4');
					$objComm->editor('description5');
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