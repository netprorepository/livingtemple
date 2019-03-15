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
			$fields=array('id','image','name','content','price','dis_price','images','status');
			$data=array($category_id,$subcategory_id,$name,$code,$description,$price,$images,$color,$series,$material,$function,$phone_model,$delivery_time,$date,$status,$discount_price,$objComm->strToUrl($name));
			$lastId=$objComm->insertWithLastid($fields,$data,'latest_product');				
			$message=INSRT_DATA_MASS_SUSS;	
			}	







if(isset($_POST['uploadData'])){


$csv_file = $_FILES["fileToUpload"]["tmp_name"]; 


if (($getfile = fopen($csv_file, "r")) !== FALSE) 
{
     $data = fgetcsv($getfile, 1000, ",");
	 
			while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE)
			{
			   $num = count($data);
				for ($c=0; $c < $num; $c++) 
				{
					$result = $data;
					$str = implode(",", $result);
					$slice = explode(",", $str);
				
				
	$where="category_name='".$slice[0]."' ";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	
	$where="sub_category='".$slice[1]."' ";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$category[0][0];
					
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$name=$slice[2];
					$code=$slice[3];
					$description=$slice[4];
					$price=$slice[5];
					$images=$slice[6];
					$color=$slice[7];
					$series=$slice[8];
					$material=$slice[9];
					$function=$slice[10];
					$phone_model=$slice[11];
					$delivery_time=$slice[12];					
					$discount_price=$slice[13];
					
					
					$status="Active";
					$url=$objComm->strToUrl($name);
					$date=date("d/m/Y");
					
					
			
			$fields=array('category_id','subcategory_id','name','code','description','price','images','color','series','material','function','phone_model','delivery_time','date','status','discount_price','url');
			$data=array($category_id,$subcategory_id,$name,$code,$description,$price,$images,$color,$series,$material,$function,$phone_model,$delivery_time,$date,$status,$discount_price,$url);
			$lastId=$objComm->insertWithLastid($fields,$data,'products');
		
					
				}
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
$message=INSRT_DATA_MASS_SUSS;

}			
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Latest Product</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpload' ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="uploadData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Upload Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>
<form class="form-horizontal row-border" action="" method="post"> 		   
          
		 
		 
         <div class="form-group">
          
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Name:</label> 
          <div class="col-md-10"><input type="text" name='name' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Code:</label> 
          <div class="col-md-10"><input type="text" name='code' class="form-control"></div> </div> 
		  
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
			 
			 