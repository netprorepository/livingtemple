<!DOCTYPE html>
 <html lang="en"> 
 <head> 

<meta http-equiv=Content-Type content="text/html; charset=windows-1252"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Admin</title> 
<?php 

include 'include/scriptStyle.php'

?>

<script type="text/javascript">
var l=1;
$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<div />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
    $("#btnGet").bind("click", function () {
        var values = "";
        $("input[name=DynamicTextBox]").each(function () {
            values += $(this).val() + "\n";
        });
        alert(values);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("div").remove();
    });
});

function GetDynamicTextBox(value) 
	{
	
	
	
	            return '<div class="form-group">' +
							'<label class="col-md-2 control-label">Heading:</label>'+ 
							'<div class="col-md-10"><input type="text" name="description1[]" class="form-control">'+
							'</div> </div>'+
					   '<div class="form-group">'+
							'<label class="col-md-2 control-label">Image:</label>'+ 
								'<div class="col-md-10"><input type="file" name="image1[]" class="form-control">'+ 
								  '</div></div>'+
					   '<div class="form-group">'+
							 '<label class="col-md-2 control-label">Description 1:</label>'+
							   '<div class="col-md-10"><textarea name="description2[]" rows="7" id="description1"  class="form-control"></textarea>'+
								'</div> </div>'+
					   '<div class="form-group">'+
								'<label class="col-md-2 control-label">Description 2:</label>'+
								'<div class="col-md-10"><textarea name="description3[]"  rows="7" id="description2"  class="form-control"></textarea>'+
							  '</div> </div>&nbsp;';
	
		
	}
</script>
</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php';
$objComm->editorjs();
if(isset($_POST['submit']))
			{
			extract($_POST);
			if(in_array(!null,$_FILES['images']['tmp_name'])) 
			{
			for($i=0;$i<count($_FILES["images"]["name"]);$i++)
			{
			$images	= $objComm->uploadfile($_FILES["images"]["name"][$i],$_FILES["images"]["tmp_name"][$i]);
			 
							mysql_query("insert into tbl_images set image='$images' , img_id='$code'") or die("Error in image update");
			}
			}
		
		
			if($_FILES["bimage"]["name"]!='')
			$imagesb	=$objComm->uploadfile($_FILES["bimage"]["name"],$_FILES["bimage"]["tmp_name"]);
			else
			$imagesb=$hidden_imagesB;
		
		
			$update_arr=array(								
			'menu1'=>$menu1,
			'status'=>$status,
			'menu2'=>$menu2,
			'title'=>$title,
			'image'=>$images,
			'image2'=>$imagesb,
			'description'=>mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$description)))),
			'url'=>$objComm->strToUrl($title)			
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('tbl_page',$update_arr,$where); 		
			
			
			for($i=0;$i<count($sectionID);$i++)
			{
				
						if($_FILES["image1"]["name"][$i]!='')
						$images1	=$objComm->uploadfile($_FILES["image1"]["name"][$i],$_FILES["image1"]["tmp_name"][$i]);
						else
						$images1=$hidden_images1[$i];
						$update_arr=array(								
						'menu1'=>$menu1,
						'menu2'=>$menu2,
						'image'=>$images1,
						'description1'=>mysql_real_escape_string($description1[$i]),
						'description2'=>mysql_real_escape_string($description2[$i]),
						'description3'=>mysql_real_escape_string($description3[$i]),
								
						);
						$where=' where id="'.$sectionID[$i].'"';
						$objComm->db_update_recordm('tbl_page_section',$update_arr,$where);	
						//echo "<script>alert('heheh');</script>";
			}
			
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('tbl_page','id',$_GET['id']);
			$aay=array();
			$aay=$objComm->getPostImage($result[0]['code']);
			$idd=$objComm->getPostImageID($result[0]['code']);
?>			


<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Page</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
       <input type="hidden" name="code" value="<?=$result[0]['code']?>">   
		 
		 
         <div class="form-group">
          <div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="menu1" onchange="return subcategory(this.value)">
		  <?php
		  $category=$objComm->findAllRecord('tbl_menu1');
		for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>" <?php if($result[0]['menu1']==$category[$i]['id']) echo 'selected';?> ><?=$category[$i]['name']?></option>
		  <?php } ?>
		  </select>
		  </div> </div>
		  
		  
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
          <label class="col-md-2 control-label">Page Top Heading:</label> 
          <div class="col-md-10"><textarea name='title'  class="form-control"><?=$result[0]['title']?></textarea></div> </div> 
		  
		   <div class="form-group">
          <label class="col-md-2 control-label">Images1:</label> 
          <div class="col-md-10"><input type="file" name='bimage' class="form-control">
		  <input type="hidden" value="<?=$result[0]['image2']?>" name="hidden_imagesB">
		  <img src="../products/<?=$result[0]['image2']?>" style="width:150px;padding:10px;" >
		  </div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Upload More Images:</label> 
          <div class="col-md-10"><div class="col-md-10"><input type="file" name='images[]' style="width:200px;" class="form-control" multiple></div></div> </div> 
		  
		  
		  <div style="padding-left:180px;" >
		  <?php 
		  for($i=0;$i<sizeof($idd);$i++)
		  {
		  
		  ?>
		  <div class="col-md-3">
		       <div class="form-group">
				
		  </div> 
		  
		  <div class="form-group" id="tr<?=$idd[$i]?>">
          <div class="col-md-10"><img class="img-thumbnail" style="width:100%;height:116px;" src="<?=BASE_URL?>products/<?=$aay[$i]?>" />
		  <br>
		  <a class="delete" onclick="deletedata('tbl_images','id','<?=$idd[$i]?>')" ><i class="icon-trash"></i></a>
		  </div> 
		  </div> 
		  <input type="hidden" name="hidden_images[]" value="<?=$aay[$i]?>">
		  </div>
		  <?php }
			?>	
		  <div class="clearfix"></div>
		  </div>
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='description' id='description'  rows="8" class="form-control"><?=$result[0]['description']?></textarea></div> </div> 
	
			<?php
					$where=" menu1='".$result[0]['menu1']."'  and menu2='".$result[0]['menu2']."'";
					$result2=$objComm->findRecord('tbl_page_section',$where);
					for($i=0;$i<count($result2);$i++)
					{   ?>
					<div class="form-group">
							<label class="col-md-2 control-label">Heading:</label> 
							<div class="col-md-10"><textarea name="description1[]" id="description<?=$i?>" class="form-control"><?=$result2[$i]['description1']?></textarea>
							</div> 
					</div>
					   <div class="form-group">
							<label class="col-md-2 control-label">Image:</label>
								<div class="col-md-10"><input type="file" name="image1[]" class="form-control">
								  
								  <input type="hidden" value="<?=$result2[$i]['image']?>" name="hidden_images1[]">
		                            <img src="../products/<?=$result2[$i]['image']?>" style="width:150px;padding:10px;" >
								  </div>
								  
						</div>
					   <div class="form-group">
							 <label class="col-md-2 control-label">Description 1:</label>
							   <div class="col-md-10"><textarea name="description2[]" rows="7" id="description<?=$i?><?=$i?>"  class="form-control"><?=$result2[$i]['description2']?></textarea>
								</div> 
						</div>
					   <div class="form-group">
								<label class="col-md-2 control-label">Description 2:</label>
								<div class="col-md-10"><textarea name="description3[]"  rows="7" id="description<?=$i?><?=$i?><?=$i?>"  class="form-control"><?=$result2[$i]['description3']?></textarea>
							  </div> 
						</div>
					<input type="hidden" name="sectionID[]" value="<?=$result2[$i]['id']?>">		  
				
					<?php		
					}
					?>
	
		  <div id="TextBoxContainer">
				<!--Textboxes will be added here -->
		  </div>
		 <!--- <div class="form-group">
          <label class="col-md-2 control-label"><input id="btnAdd" type="button" class="btn btn-primary btn-primary-margin-left"  value="Add" /></label> 
          <div class="col-md-10"></div> </div>
		  ---->
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
					$objComm->editor('description0');
					$objComm->editor('description1');
					$objComm->editor('description2');
					$objComm->editor('description3');
					$objComm->editor('description4');
					$objComm->editor('description5');
					$objComm->editor('description6');
					$objComm->editor('description7');
					$objComm->editor('description8');
					$objComm->editor('description9');
					$objComm->editor('description10');
					
					
					
					$objComm->editor('description00');
					$objComm->editor('description11');
					$objComm->editor('description22');
					$objComm->editor('description33');
					$objComm->editor('description44');
					$objComm->editor('description55');
					$objComm->editor('description66');
					$objComm->editor('description77');
					$objComm->editor('description88');
					$objComm->editor('description99');
					$objComm->editor('description1010');
					
					
					
					
					$objComm->editor('description000');
					$objComm->editor('description111');
					$objComm->editor('description222');
					$objComm->editor('description333');
					$objComm->editor('description444');
					$objComm->editor('description555');
					$objComm->editor('description666');
					$objComm->editor('description777');
					$objComm->editor('description888');
					$objComm->editor('description999');
					$objComm->editor('description101010');
					$objComm->editor('description1313');
					$objComm->editor('description131313');
					
					
					
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