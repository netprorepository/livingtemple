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
if(isset($_POST['uploadData'])){

$filename=$_FILES["fileToUpload"]["name"];
$newfilename=explode(".",$filename);
$filetype = $newfilename[1];
if($filetype=="csv"){

$csv_file = $_FILES["fileToUpload"]["tmp_name"]; 


if (($getfile = fopen($csv_file, "r")) !== FALSE) 
{
     $data = fgetcsv($getfile, 10000, ",");
	 
			while (($data = fgetcsv($getfile, 10000, ",")) !== FALSE)
			{
			   $num = count($data);
				//for ($c=0; $c < $num; $c++) 
				//{
					//$result = $data;
					$slice = $data;
					//echo $description=$result[9];
					//exit();
					//$str = implode(",", $result);
					//$slice = explode(",", $str);
				
				$slice[0] = strtolower($slice[0]);
				$slice[0]=trim(preg_replace('/\s+/',' ', $slice[0]));
				 $slice[1]=trim(preg_replace('/\s+/',' ', $slice[1]));
	$where="category_name='".$slice[0]."' ";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	
	$where="sub_category='".$slice[1]."' ";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$subcategory[0][0];
	
	
	//$where="itemcondition_name='".$slice[14]."' ";  
	//$itemcondition=$objComm->findRecord('itemcondition',$where);
	//$itemconditionid=$itemcondition[0][0];
	//echo $itemconditionid;
	//print_r($itemcondition);
					
					//exit();
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$strng=$slice[2];
					$name = preg_replace('!\s+!', ' ', $strng);
					//echo $name = str_ireplace("  ", " ", $strng);
					//echo $name=preg_replace('/\s+/',' ',$slice[2]);
					//echo $name = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $strng);
					$code=$slice[3];
					$seo_title=$slice[4];
					$brand=$slice[5];
					$compatiable=$slice[6];
					$product_type=$slice[7];
					$suitable_device=$slice[8];
					$description=$slice[9];
					$box_contents=$slice[10];
					$price=$slice[11];
					$quantity=$slice[13];
					$itemcondition_id=$slice[14];
					$discount_price=$slice[15];
					$seo_keyword=$slice[16];
					$seo_keyword1=$slice[17];
					$seo_keyword2=$slice[18];
					$seo_keyword3=$slice[19];
					$seo_keyword4=$slice[20];
					$images=$slice[21];
					$images1=$slice[22];
					$images2=$slice[23];
					$images3=$slice[24];
					$images4=$slice[25];
					$images5=$slice[26];
					$images6=$slice[27];
					$images7=$slice[28];
					$color=$slice[29];
					$color_map=$slice[30];
					$material=$slice[31];
					$finish=$slice[32];
					$media_type=$slice[33];
					$media_type1=$slice[34];
					$media_type2=$slice[35];
					$delivery_time=$slice[36];
					$discount=$slice[37];
					
					
					/*$delivery_time=$slice[9];					
					$discount_price=$slice[10];
					$product_type=$slice[11];
					$brand=$slice[12];
					$compatiable=$slice[13];
					$suitable_device=$slice[14];
					$box_contents=$slice[15];
					$finish=$slice[16];
					$images1=$slice[17];
					$images2=$slice[18];
					$images3=$slice[19];
					$images4=$slice[20];
					$images5=$slice[21];
					$images6=$slice[22];
					$images7=$slice[23];
					$images8=$slice[24];
					$images9=$slice[25];
					$images10=$slice[26];
					$quantity=$slice[27];
					$color_map=$slice[28];
					$seo_title=$slice[29];
					$seo_keyword=$slice[30];
					$seo_keyword1=$slice[31];
					$seo_keyword2=$slice[32];
					$seo_keyword3=$slice[33];
					$seo_keyword4=$slice[34];
					$seo_description=$slice[35];
					$itemcondition_id=$itemconditionid;
					$latest=$slice[37];
					$media_type=$slice[38];*/
					if($quantity==0 || $quantity==''){
						$status="Inactive";
						$quantity=0;
						
					}else{
						$status="Active";
					}
					
					$url=$objComm->strToUrl($name);
					//$url;
					$date=date("d/m/Y");
					
					
			//exit();
			$fields=array('category_id','subcategory_id','name','code','description','price','images','color','material','delivery_time','date','status','discount_price','product_type','brand','compatiable','suitable_device','box_contents','finish','images1','images2','images3','images4','images5','images6','images7','images8','images9','images10','quantity','color_map','seo_title','seo_keyword','seo_keyword1','seo_keyword2','seo_keyword3','seo_keyword4','seo_description','itemcondition_id','url','latest','media_type','discount');
			$data=array($category_id,$subcategory_id,$name,$code,$description,$price,$images,$color,$material,$delivery_time,$date,$status,$discount_price,$product_type,$brand,$compatiable,$suitable_device,$box_contents,$finish,$images1,$images2,$images3,$images4,$images5,$images6,$images7,$images8,$images9,$images10,$quantity,$color_map,$seo_title,$seo_keyword,$seo_keyword1,$seo_keyword2,$seo_keyword3,$seo_keyword4,$seo_description,$itemcondition_id,$url,$latest,$media_type,$discount);
			
			$lastId=$objComm->insertWithLastid($fields,$data,'products');
		
					
				//}
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
$message=INSRT_DATA_MASS_SUSS;
}else{
//echo "<script>alert('Please upload the csv format only.');</script>";
$message=ERROR_FILE_TYPE_MASS_SUSS;
}
}	



if(isset($_POST['deleteData'])){


$csv_file = $_FILES["fileToDelete"]["tmp_name"]; 


if (($getfile = fopen($csv_file, "r")) !== FALSE) 
{
     $data = fgetcsv($getfile, 10000, ",");
	 
			while (($data = fgetcsv($getfile, 10000, ",")) !== FALSE)
			{
			   $num = count($data);
				//for ($c=0; $c < $num; $c++) 
				//{
					$result = $data;
					$str = implode(",", $result);
					$slice = explode(",", $str);
				
				
	//$where="category_name='".$slice[0]."' ";  
	//$category=$objComm->findRecord('category',$where);
	//$categoryid=$category[0][0];
	
	//$where="sub_category='".$slice[1]."' ";  
	//$subcategory=$objComm->findRecord('sub_category',$where);
	//$subcategoryid=$subcategory[0][0];
	
	
	
					
					 //$category_id=$categoryid;
					//$subcategory_id=$subcategoryid;
					$code=$slice[0];
					$discount=$slice[1];
					//$strng=$slice[2];
					//$name=trim(preg_replace('/\s+/',' ', $strng));
					
					  $sql = "DELETE from products  WHERE code = '$code' and discount='$discount'";
					  $result = mysql_query($sql) or die(mysql_error());
			
			
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
//$message=INSRT_DATA_MASS_SUSS;
echo "DELETION A GREAT SUCCESS!";

}



if(isset($_POST['UpdateData'])){

$filename=$_FILES["fileToUpdate"]["name"];
$newfilename=explode(".",$filename);
$filetype = $newfilename[1];
if($filetype=="csv"){

$csv_file = $_FILES["fileToUpdate"]["tmp_name"]; 


if (($getfile = fopen($csv_file, "r")) !== FALSE) 
{
     $data = fgetcsv($getfile, 10000, ",");
	 
			while (($data = fgetcsv($getfile, 10000, ",")) !== FALSE)
			{
			   $num = count($data);
				//for ($c=0; $c < $num; $c++) 
				//{
					//$result = $data;
					$slice = $data;
					//$str = implode(",", $result);
					//$slice = explode(",", $str);
				
	$slice[0] = strtolower($slice[0]);
				$slice[0]=trim(preg_replace('/\s+/',' ', $slice[0]));
				 $slice[1]=trim(preg_replace('/\s+/',' ', $slice[1]));
	$where="category_name='".$slice[0]."' ";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	
	$where="sub_category='".$slice[1]."' ";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$subcategory[0][0];
	
	
	//$where="itemcondition_name='".$slice[14]."' ";  
	//$itemcondition=$objComm->findRecord('itemcondition',$where);
	//$itemconditionid=$itemcondition[0][0];
					
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$strng=$slice[2];
					$name=trim(preg_replace('/\s+/',' ', $strng));
					$code=$slice[3];
					$seo_title=$slice[4];
					$brand=$slice[5];
					$compatiable=$slice[6];
					$product_type=$slice[7];
					$suitable_device=$slice[8];
					$description=$slice[9];
					$box_contents=$slice[10];
					$price=$slice[11];
					$quantity=$slice[13];
					$itemcondition_id=$slice[14];
					$discount_price=$slice[15];
					$seo_keyword=$slice[16];
					$seo_keyword1=$slice[17];
					$seo_keyword2=$slice[18];
					$seo_keyword3=$slice[19];
					$seo_keyword4=$slice[20];
					$images=$slice[21];
					$images1=$slice[22];
					$images2=$slice[23];
					$images3=$slice[24];
					$images4=$slice[25];
					$images5=$slice[26];
					$images6=$slice[27];
					$images7=$slice[28];
					$color=$slice[29];
					$color_map=$slice[30];
					$material=$slice[31];
					$finish=$slice[32];
					$media_type=$slice[33];
					$media_type1=$slice[34];
					$media_type2=$slice[35];
					$delivery_time=$slice[36];
					$status="Active";
					$discount=$slice[37];
					
					
					//$status="Active";
					$url=$objComm->strToUrl($name);
					$date=date("d/m/Y");
					
					$sql = "UPDATE products SET
					category_id='$category_id',
					subcategory_id='$subcategory_id',
					name='$name',
					code='$code',
					description='$description',
					price='$price',
					images='$images',
					color='$color',
					phone_model='$phone_model',
					delivery_time='$delivery_time',
					date='$date',
					status='$status',
					discount_price='$discount_price',
					product_type='$product_type',
					brand='$brand',
					compatiable='$compatiable',
					suitable_device='$suitable_device',
					box_contents='$box_contents',
					finish='$finish',
					images1='$images1',
					images2='$images2',
					images3='$images3',
					images4='$images4',
					images5='$images5',
					images6='$images6',
					images7='$images7',
					images8='$images8',
					images9='$images9',
					images10='$images10',
					quantity='$quantity',
					color_map='$color_map',
					seo_title='$seo_title',
					seo_keyword='$seo_keyword',
					seo_keyword1='$seo_keyword1',
					seo_keyword2='$seo_keyword2',
					seo_keyword3='$seo_keyword3',
					seo_keyword4='$seo_keyword4',
					seo_description='$seo_description',
					itemcondition_id='$itemcondition_id',
					url='$url',
					discount='$discount',
					media_type='$media_type' where code='$code'";
					mysql_query($sql);

					
		//exit();
					
				//}
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
$message=INSRT_DATA_MASS_SUSS;
}else{
//echo "<script>alert('Please upload the csv format only.');</script>";
$message=ERROR_FILE_TYPE_MASS_SUSS;
}
}	
 

?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Discount</strong></a> </li> </ul> 
	   <div class="dowload_demo"><a href="excel/add_dicount.csv"><strong>Download Demo</strong></a> </div>
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">New:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpload' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="uploadData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Upload Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>
		   
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Update:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpdate' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="UpdateData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Update Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>
		   
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Delete:</label> 
          <div class="col-md-10"><input type="file" name='fileToDelete' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="deleteData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Delete Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>

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
			 
			 