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
							   '<div class="col-md-10"><textarea name="description2[]" rows="7" id="description"  class="form-control"></textarea>'+
								'</div> </div>'+
					   '<div class="form-group">'+
								'<label class="col-md-2 control-label">Description 2:</label>'+
								'<div class="col-md-10"><textarea name="description3[]"  rows="7" id="description"  class="form-control"></textarea>'+
							  '</div> </div>&nbsp;';
	
		
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
			
			$where="status='Active' ORDER BY id DESC limit 1"; 
				$lastOrderid=$objComm->findRecord('tbl_page',$where);	
				if($code=='')
				{
				$code="LVT00";
				$code .= $lastOrderid[0]['id']+1;
				}
				
			for($i=0;$i<count($_FILES["images"]["name"]);$i++)
						{
							  $img = $objComm->uploadfile($_FILES["images"]["name"][$i],$_FILES["images"]["tmp_name"][$i]);
							  $fields=array('img_id','image');
		    				  $data=array($code,$img);
							  $lastId=$objComm->insertWithLastid($fields,$data,'tbl_images');				
								
						}
			
			$bimages = $objComm->uploadfile($_FILES["bimage"]["name"],$_FILES["bimage"]["tmp_name"]);
			$fields=array('menu1','menu2','title','description','date','status','url','image2','code');
			$data=array($menu1,$menu2,mysql_real_escape_string($title),
			mysql_real_escape_string(str_replace("'", '',trim(preg_replace('/\s+/',' ',$description)))),$date,$status,$objComm->strToUrl($title),$bimages,$code);
			$lastId=$objComm->insertWithLastid($fields,$data,'tbl_page');	

             	
						
			
			for($i=0;$i<count($description1);$i++)
				{
					$date=date("d/m/Y");
					$images1	= $objComm->uploadfile($_FILES["image1"]["name"][$i],$_FILES["image1"]["tmp_name"][$i]);
					$fields1=array('menu1','menu2','description1','image','description2','description3','date','status');
					$data1=array($menu1,$menu2,mysql_real_escape_string($description1[$i]),$images1,
					mysql_real_escape_string($description2[$i]),mysql_real_escape_string($description3[$i]),$date,$status);
					$lastId=$objComm->insertWithLastid($fields1,$data1,'tbl_page_section');
				}
			
			for($i=0;$i<count($description11);$i++)
				{
					
					$fields1=array('menu1','menu2','description1','description2','date','status');
					$data1=array($menu1,$menu2,mysql_real_escape_string($description11[$i]),
					mysql_real_escape_string($description22[$i]),$date,$status);
					$lastId=$objComm->insertWithLastid($fields1,$data1,'tbl_page_section');
				}
			$message=INSRT_DATA_MASS_SUSS;	
			}	
?>			
<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Page</strong></a> </li> </ul> 
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
		  <select class="form-control" name="menu1" onchange="return subcategory(this.value)">
		  <option>--select--</option>
		  <?php
		  $category=$objComm->findAllRecord('tbl_menu1');
		  for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>"><?=$category[$i]['name']?></option>
		  <?php } ?>
		  </select>
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Choose Sub Category:</label> 
          <div class="col-md-10" > 
		  <select class="form-control" name="menu2" id="ajaxvalue" onchange="return subcategory2(this.value)">
		  <option>--select--</option>
		  </select>
		  </div> </div>
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Page Top Heading:</label> 
          <div class="col-md-10"><textarea name='title'  rows="4" class="form-control"></textarea></div> </div> 
		  
		  <!---<div class="form-group">
          <label class="col-md-2 control-label">Second Heading :</label> 
          <div class="col-md-10"><textarea rows="3" name='short' class="form-control"></textarea></div> </div> 
		  ---->
		  <div class="form-group">
          <label class="col-md-2 control-label">Background Images:</label> 
          <div class="col-md-10"><input type="file" name='bimage' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='images[]' class="form-control" multiple ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='description' id='description'  rows="8" class="form-control"></textarea></div> </div> 
			
		  
			
			
		  
		  <div id="TextBoxContainer">
				<!--Textboxes will be added here -->
		  </div>
		  <div class="form-group">
          <label class="col-md-2 control-label"><input id="btnAdd" type="button" class="btn btn-primary btn-primary-margin-left"  value="Add" /></label> 
          <div class="col-md-10"></div> </div>
		  
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
				?>
