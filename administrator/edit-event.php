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
 $objComm->editorjs();
 if(isset($_POST['submit']))
			{
			extract($_POST);
	$cdate=date("d/m/Y");
			
			$startdate=$date."T00:00:00+05:30";	
			$enddate=$date."T00:00:00+05:30";	
			/* if(date('N', strtotime($date)) == 7) 
				{
				$message=DATE_ERROR;	
				}
				else
				{ */
			
if($_FILES["image"]["name"]!='')
$brand_image=$objComm->uploadfile($_FILES["image"]["name"],$_FILES["image"]["tmp_name"]);	
else
$brand_image=$hidden_images;
			$update_arr=array(								
			'description'=>mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ', $description)))),
			'title'=>mysql_real_escape_string($name),
			'startdate'=>$startdate,
			'enddate'=>$enddate,
			'callagain'=>$callagain,
			'status'=>$status,
			'image'=>$brand_image,
			'date'=>$cdate,
			'f_page'=>$f_page,
			'entry_fee'=>$entry_fee,
			'url'=>$objComm->strToUrl($name),
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('calendar',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			
			
			$checkurl=mysql_query("select * from tbl_search where url='$url'") or die('error 36 '.mysql_error());
			if(mysql_num_rows($checkurl)>0)
			{
				$link="search-food/details/".$objComm->strToUrl($name);
				mysql_query("update tbl_search set title='".mysql_real_escape_string($name)."', category='event', url='".$objComm->strToUrl($name)."', url2='$link' where url='$url' ") or die('error in line 56 '.mysql_error());
			}
			
			else
			{
				$link="search-food/details/".$objComm->strToUrl($name);
				mysql_query("insert into tbl_search set title='".mysql_real_escape_string($name)."',category='event',url='".$objComm->strToUrl($name)."',url2='$link' ") or die('error in line 62 '.mysql_error());
			}
			
			
			
			}
		/* } */
			
			$result=$objComm->singleRowFetch('calendar','id',$_GET['id']);

			$cd=explode('T',$result[0]['startdate']);	
			//echo "--------------------------------------------------------------".$result[0]['startdate']."<br>";
		//	echo "--------------------------------------------------------------".$cd[0]."<br>";
			$date1=date_create($cd[0]);
			$cacds= date_format($date1,"Y-m-d");
	///	echo "--------------------------------------------------------------".$cacds."<br>";
			?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Event</strong></a> </li> </ul> 
       </div> 

<?php include 'include/leftMenu.php' ?> 
        <div class="row">  
        <?php if(isset($message)) echo $message; ?>
		<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          <div class="form-group"><label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"> <input type="text" name='name'   value="<?=$result[0]['title']?>" class="form-control" > </div> </div>
		  
         <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"> <input type="file" name='image' class="form-control" ><br/>
			<img src="../products/<?=$result[0]['image']?>" style="background-color:black;width:150px;"></div> </div>
			<input type="hidden" name="hidden_images" value="<?=$result[0]['image']?>" />
		  
		  <div class="form-group"><label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name="description" rows="8" class="form-control"> <?=$result[0]['description']?></textarea></div></div>		  
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Event Date:</label> 
          <div class="col-md-10">
		  <input type="date" name='date' value="<?=$cacds?>" placeholder="Please enter event date" class="form-control"></div> </div> 
		
		
	      <!--<div class="form-group">
          <label class="col-md-2 control-label">Fans Page:</label> 
          <div class="col-md-10"><input type="text" name='f_page' value="<?=$result[0]['f_page']?>" placeholder="Please insert Fans Page Url" class="form-control"></div> </div>
		
		
		<div class="form-group">
          <label class="col-md-2 control-label">Entry Fees:</label> 
          <div class="col-md-10"><input type="text" name='entry_fee' value="<?=$result[0]['entry_fee']?>" placeholder="Please insert entry fee" class="form-control"></div> </div>-->
		  
		  <div class="col-md-10"> <input type="hidden" name='url' value="<?=$result[0]['url']?>" class="form-control" > </div>
		
		
		
		 	<div class="form-group"><label class="col-md-2 control-label">Repeate This Event:</label> 
          <div class="col-md-10">
		  <select class="form-control" name="callagain">
		  <option value="Monthly" <?php if($result[0]['callagain']=='Monthly') echo'selected';?>>
		  Monthly</option>
		  <option value="Weekly" <?php if($result[0]['callagain']=='Weekly') echo'selected';?>>
		  Weekly</option>
		  <option value="Inactive" <?php if($result[0]['callagain']=='Inactive') echo'selected';?>>
		  No Repeat</option>
		  </select>
		  </div> 
		  </div>
		
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10">
		  <select class="form-control" name="status">
		  <option value="Active" <?php if($result[0]['status']=='Active') echo'selected';?>>
		  Active</option>
		  <option value="Inactive" <?php if($result[0]['status']=='Inactive') echo'selected';?>>
		  Inactive</option>
		  </select>
		  </div> </div>			  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
          <?php 
					$objComm->editor('description');
					
				?>

  
        
        
             </div> </div> </div> </body> </html>