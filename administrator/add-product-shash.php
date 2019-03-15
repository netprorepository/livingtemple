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
			$box1=$_POST['box1'];
			$box2=$_POST['box2'];
			$box3=$_POST['box3'];
			$images	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images"]["name"],$_FILES["images"]["tmp_name"]);
			$images1	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images1"]["name"],$_FILES["images1"]["tmp_name"]);
			$images2	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images2"]["name"],$_FILES["images2"]["tmp_name"]);
			$images3	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images3"]["name"],$_FILES["images3"]["tmp_name"]);
			$images4	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images4"]["name"],$_FILES["images4"]["tmp_name"]);
			$images5	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images5"]["name"],$_FILES["images5"]["tmp_name"]);
			$images6	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images6"]["name"],$_FILES["images6"]["tmp_name"]);
			$images7	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images7"]["name"],$_FILES["images7"]["tmp_name"]);
			$dism = $price-$discount_price;
			$per = $dism*100/$price;
			$discount = round($per);
			$fields=array('category_id','subcategory_id','name','code','description','price','images','color','material','delivery_time','date','discount','status','discount_price','url','latest','product_type','brand','compatiable','suitable_device','box_contents','finish','images1','images2','images3','images4','images5','images6','images7','quantity','color_map','seo_title','seo_keyword','seo_keyword1','seo_keyword2','seo_keyword3','seo_keyword4','seo_description','itemcondition_id','media_type','today_offer','box1','box2','box3');
			$data=array($category_id,$subcategory_id,$name,$code,$description,$price,$images,$color,$material,$delivery_time,$date, $discount,$status,$discount_price,$objComm->strToUrl($name),$latest,$product_type,$brand,$compatiable,$suitable_device,$box_contents,$finish,$images1,$images2,$images3,$images4,$images5,$images6,$images7,$quantity,$color_map,$seo_title,$seo_keyword,$seo_keyword1,$seo_keyword2,$seo_keyword3,$seo_keyword4,$seo_description,$itemcondition_id,$media_type,$lattest_offer,$box1,$box2,$box3);
			$lastId=$objComm->insertWithLastid($fields,$data,'products');				
			$message=INSRT_DATA_MASS_SUSS;	
			}	







if(isset($_POST['uploadData'])){

$filename=$_FILES["fileToUpload"]["name"];
$newfilename=explode(".",$filename);
$filetype = $newfilename[1];
$st=array();
$st2=array();
if($filetype=="csv"){

$csv_file = $_FILES["fileToUpload"]["tmp_name"]; 


if (($getfile = fopen($csv_file, "r")) !== FALSE) 
{
     $data = fgetcsv($getfile, 10000, ",");
	 $a=0;
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
	$where="category_name='".$slice[0]."'";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	$cat="";
	$cat=$category[0][1];
	
	$where="sub_category='".$slice[1]."'";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$subcategory[0][0];
	$subcat="";
	$subcat=$subcategory[0][2];
	
	
	//$where="itemcondition_name='".$slice[14]."' ";  
	//$itemcondition=$objComm->findRecord('itemcondition',$where);
	//$itemconditionid=$itemcondition[0][0];
	//echo $itemconditionid;
	//print_r($itemcondition);
					
					//exit();
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$strng=$slice[2];
					$code=$slice[3];
					$name = preg_replace('!\s+!', ' ', $strng);
					//echo $name = str_ireplace("  ", " ", $strng);
					//echo $name=preg_replace('/\s+/',' ',$slice[2]);
					//echo $name = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $strng);
					
					$seo_title=$slice[4];
					$brand=$slice[5];
					$compatiable=$slice[6];
					$product_type=$slice[7];
					$suitable_device=$slice[8];
					$description=str_replace("'","",$slice[9]);
					$box_content=$slice[10];
					$price=$slice[11];
					$currency=$slice[12];
					$quantity=$slice[13];
					$itemcondition=$slice[14];
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
					$finish = $slice[32];
					$media_type=$slice[33];
					$media_type1=$slice[34];
					$media_type2=$slice[35];					
					$delivery_time=$slice[36];
					$latest_offer=$slice[37];
					$dism = $price-$discount_price;
					$per = $dism*100/$price;
					$discount = round($per);
					$box1=$slice[38];
					$box2=$slice[39];
					$box3=$slice[40];
					$status=$slice[41];			
					$url=$objComm->strToUrl($name);
					$date=date("d/m/Y");
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
			$code_query = "select * from `products` where code = '".$slice[3]."'";
			$code_result = mysql_query($code_query);
			$code_count = mysql_num_rows($code_result);
			if($code_count > 0){
				
			}else{
				$qu = "select brand_name from `brand_name` where brand_name = '".$slice[5]."'";
					$re = mysql_query($qu);
					$coun = mysql_num_rows($re);
					$bdate = date("d/m/y");
					$bstatus = "Active";
					$urlb = str_replace(" ","-",$brand);
					if($coun>0){
						
					}else{
						$fields2=array('brand_name','status','date','url');
						$data2=array($brand,$bstatus,$bdate,$urlb);
						$lastId2=$objComm->insertWithLastid($fields2,$data2,'brand_name');
					}
					$fields=array('category_id','subcategory_id','product_type','name','code','description','price','images','color','material','delivery_time','date','discount_price','url','compatiable','suitable_device','box_contents','brand','finish','images1','images2','images3','images4','images5','images6','images7','quantity','color_map','seo_title','seo_keyword','seo_keyword1','seo_keyword2','seo_keyword3','seo_keyword4','seo_description','itemcondition_id','media_type','media_type1','media_type2','latest','discount','box1','box2','box3');
					$data=array($category_id,$subcategory_id,$product_type,$name,$code,$description,$price,$images,$color,$material,$delivery_time,$date,$discount_price,$url,$compatiable,$suitable_device,$box_contents,$brand,$finish,$images1,$images2,$images3,$images4,$images5,$images6,$images7,$quantity,$color_map,$seo_title,$seo_keyword,$seo_keyword1,$seo_keyword2,$seo_keyword3,$seo_keyword4,$seo_description,$itemcondition_id,$media_type,$media_type1,$media_type2,$latest_offer,$discount,$box1,$box2,$box3);
					
					if(!$cat){
						$message .= $slice[0]." Category Not Found. <br>";
					}else{
						if(!$subcat){
							$message .= $slice[1]." Sub-Category Not Found.<br>";
						}else{
							
							$lastId=$objComm->insertWithLastid($fields,$data,'products');
						}
						
					}
					if($message == ""){
						$message = INSRT_DATA_MASS_SUSS;
					}		//
					
			}
					
	$a++;			//}
	}
			
			//$message=INSRT_DATA_MASS_SUSS;
}


//$message=INSRT_DATA_MASS_SUSS;

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
					//$strng=$slice[2];
					//$name=trim(preg_replace('/\s+/',' ', $strng));
					
					$sql = "DELETE from products  WHERE code = '$code'";
					$result = mysql_query($sql) or die(mysql_error());
					if($result){
						$message="Deleted successfully!";
					}
					
			
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
//$message=INSRT_DATA_MASS_SUSS;


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
	 ?>
	 
	 <?php
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
	$where="category_name='".$slice[0]."'";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	$cat="";
	$cat=$category[0][1];
	
	$where="sub_category='".$slice[1]."'";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$subcategory[0][0];
	$subcat="";
	$subcat=$subcategory[0][2];
	
	
	//$where="itemcondition_name='".$slice[14]."' ";  
	//$itemcondition=$objComm->findRecord('itemcondition',$where);
	//$itemconditionid=$itemcondition[0][0];
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$strng=$slice[2];
					$code=$slice[3];
					$name = preg_replace('!\s+!', ' ', $strng);
					//echo $name = str_ireplace("  ", " ", $strng);
					//echo $name=preg_replace('/\s+/',' ',$slice[2]);
					//echo $name = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $strng);
					
					$seo_title=$slice[4];
					$brand=$slice[5];
					$compatiable=$slice[6];
					$product_type=$slice[7];
					$suitable_device=$slice[8];
					$description=str_replace("'","",$slice[9]);
					$box_content=$slice[10];
					$price=$slice[11];
					$currency=$slice[12];
					$quantity=$slice[13];
					$itemcondition=$slice[14];
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
					$finish = $slice[32];
					$media_type=$slice[33];
					$media_type1=$slice[34];
					$media_type2=$slice[35];					
					$delivery_time=$slice[36];
					$latest_offer=$slice[37];
					$box1=$slice[38];
					$box2=$slice[39];
					$box3=$slice[40];
					$dism = $price-$discount_price;
					$per = $dism*100/$price;
					$discount = round($per);
					$status=$slice[41];			
					$url=$objComm->strToUrl($name);
					$date=date("d/m/Y");
					if($quantity==0 || $quantity==''){
						$status="Inactive";
						$quantity=0;
						
					}else{
						$status="Active";
					}
					
					$code_query = "select * from `products` where code = '".$slice[3]."'";
					$code_result = mysql_query($code_query);
					$code_count = mysql_num_rows($code_result);
					if($code_count > 0){
						$qu = "select brand_name from `brand_name` where brand_name = '".$slice[5]."'";
							$re = mysql_query($qu);
							$coun = mysql_num_rows($re);
							$bdate = date("d/m/y");
							$bstatus = "Active";
							$urlb = str_replace(" ","-",$brand);
							if($coun>0){
								
							}else{
								$fields2=array('brand_name','status','date','url');
								$data2=array($brand,$bstatus,$bdate,$urlb);
								$lastId2=$objComm->insertWithLastid($fields2,$data2,'brand_name');
							}
							
							if(!$cat){
								$message .= $slice[0]." Category Not Found. <br>";
							}else{
								if(!$subcat){
									$message .= $slice[1]." Sub-Category Not Found.<br>";
								}else{
									
									$sql = "UPDATE `products`
											SET category_id='$category_id', subcategory_id='$subcategory_id', product_type='$product_type',
											name='$name', code='$code',	description='$description', discount_price='$discount_price', price='$price', discount='$discount', images='$images', color='$color', material='$material',	delivery_time='$delivery_time', url='$url', compatiable='$compatiable', suitable_device='$suitable_device', box_contents='$box_contents', brand='$brand', finish='$finish', images1='$images1', images2='$images2', images3='$images3', images4='$images4', images5='$images5', images6='$images6', images7='$images7', quantity='$quantity', color_map='$color_map', seo_title='$seo_title', seo_keyword='$seo_keyword', seo_keyword1='$seo_keyword1', seo_keyword2='$seo_keyword2', seo_keyword3='$seo_keyword3', seo_keyword4='$seo_keyword4', seo_description='$seo_description', itemcondition_id='$itemcondition', media_type='$media_type', media_type1='$media_type1', media_type2='$media_type2', latest='$latest_offer', box1='$box1', box2='$box2', box3='$box3', status='$status'
											where code='$code'";
															
									$result = mysql_query($sql);
											
								}
								
							}
									//

						
					}else{
						$message .= $slice[3]." SKU Code Not Found. <br>";
					}
									
					
					if($message == ""){
						$message = INSRT_DATA_MASS_SUSS;
					}
		//exit();
					
				//}
			}
		}

}else{

echo "<script>alert('Please upload the csv format only.');</script>";
$message=ERROR_FILE_TYPE_MASS_SUSS;
}
}	
		
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Add Product</strong></a> </li> </ul> 
	   <div class="dowload_demo"><a href="excel/newupload.csv"><strong>Download Demo</strong></a> </div>
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)){
			
		echo $message; 
			
		}
		
		    
		?>
         
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">New:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpload' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example2.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="uploadData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Upload Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>
		   
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Update:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpdate' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/update-product.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="UpdateData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Update Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>
		   
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Delete:</label> 
          <div class="col-md-10"><input type="file" name='fileToDelete' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/delete-product.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="deleteData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Delete Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>

		   
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="category_id" onchange="return subcategory(this.value)">
		  <option>--select--</option>
		  <?php
		  $category=$objComm->findAllRecord('category');
		for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>"><?=$category[$i]['category_name']?></option>
		  <? } ?>
		  </select>
		  </div> </div>
		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Choose Sub Category:</label> 
          <div class="col-md-10" > 
		  <select class="form-control" name="subcategory_id" id="ajaxvalue">
		  <option>--select--</option>
		  </select>
		  </div> </div>
		  
		 <div class="form-group"><label class="col-md-2 control-label">Choose Product Type:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="product_type">
		  <?php
		  $protype=$objComm->findAllRecord('product_type');
		for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?=$protype[$i]['product_type']?>"><?=$protype[$i]['product_type']?></option>
		  <? } ?>
		  </select>
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Brand:</label> 
          <div class="col-md-10"> 
		  <input type="text" name='brand' class="form-control">
		  <!--<select class="form-control" name="brand">
		  <?php
		  //$protype=$objComm->findAllRecord('brand_image');
		  //for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?//=$protype[$i]['brand_name']?>"><?//=$protype[$i]['brand_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Compatiable Phone:</label> 
          <div class="col-md-10"> 
		  <input type="text" name='compatiable' class="form-control">
		  <!--<select class="form-control" name="compatiable">
		  <?php
		  //$protype=$objComm->findAllRecord('compatible');
		//for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?//=$protype[$i]['compatible_name']?>"><?//=$protype[$i]['compatible_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div>
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Product Name:</label> 
          <div class="col-md-10"><input type="text" name='name' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">SKU ( Product Code):</label> 
          <div class="col-md-10"><input type="text" name='code' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='description' rows="8" class="form-control"></textarea></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Sell Price:</label> 
          <div class="col-md-10"><input type="text" name='discount_price' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Price:</label> 
          <div class="col-md-10"><input type="text" name='price' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='images' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images1:</label> 
          <div class="col-md-10"><input type="file" name='images1' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images2:</label> 
          <div class="col-md-10"><input type="file" name='images2' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images3:</label> 
          <div class="col-md-10"><input type="file" name='images3' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images4:</label> 
          <div class="col-md-10"><input type="file" name='images4' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images5:</label> 
          <div class="col-md-10"><input type="file" name='images5' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images6:</label> 
          <div class="col-md-10"><input type="file" name='images6' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images7:</label> 
          <div class="col-md-10"><input type="file" name='images7' class="form-control"></div> </div> 
		  <div class="form-group">
          <!--<label class="col-md-2 control-label">Thumb Images8:</label> 
          <div class="col-md-10"><input type="text" name='images8' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images9:</label> 
          <div class="col-md-10"><input type="text" name='images9' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images10:</label> 
          <div class="col-md-10"><input type="text" name='images10' class="form-control"></div> </div> -->
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">color:</label> 
          <div class="col-md-10"><input type="text" name='color' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">color Map:</label> 
          <div class="col-md-10"><input type="text" name='color_map' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Suitable Device:</label> 
          <div class="col-md-10">
		  <select class="form-control" name="suitable_device">
			<option value="Mobile">Mobile</option>
			<option value="Tablet">Tablet</option>
			<option value="Accessories">Accessories</option>
		  </select>
		  </div> </div> 
		  
		  <!--<div class="form-group">
          <label class="col-md-2 control-label">Series:</label> 
          <div class="col-md-10"><input type="text" name='series' class="form-control"></div> </div> -->
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Box Contents:</label> 
          <div class="col-md-10"><input type="text" name='box_contents' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Finish:</label> 
          <div class="col-md-10"><input type="text" name='finish' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Material Composition:</label> 
          <div class="col-md-10">
		  <input type="text" name='material' class="form-control">
		  <!--<select class="form-control" name="material">
		  <?php
		  //$protype=$objComm->findAllRecord('material');
		  //for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?//=$protype[$i]['material_name']?>"><?//=$protype[$i]['material_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div> 
		  
		  <!--<div class="form-group">
          <label class="col-md-2 control-label">Function:</label> 
          <div class="col-md-10"><input type="text" name='function' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Phone Model:</label> 
          <div class="col-md-10"><input type="text" name='phone_model' class="form-control"></div> </div> -->	
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Quantity:</label> 
          <div class="col-md-10"><input type="text" name='quantity' class="form-control"></div> </div>

		  <div class="form-group">
          <label class="col-md-2 control-label">Choose Item Condition:</label> 
          <div class="col-md-10">
		  <input type="text" name='itemcondition_id' class="form-control">
		  <!--<select class="form-control" name="itemcondition_id">
		  <?php
		  //$protype=$objComm->findAllRecord('itemcondition');
		  //for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?//=$protype[$i]['id']?>"><?//=$protype[$i]['itemcondition_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Delivery Time:</label> 
          <div class="col-md-10"><input type="text" name='delivery_time' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Media Type:</label> 
          <div class="col-md-10"><input type="text" name='media_type' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Title:</label> 
          <div class="col-md-10"><input type="text" name='seo_title' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword1:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword2:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword1' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword3:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword2' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword4:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword3' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword5:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword4' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Description:</label> 
          <div class="col-md-10"><input type="text" name='seo_description' class="form-control"></div> </div> 
		  
		  <div class="form-group"><label class="col-md-2 control-label">Latest Offer:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="latest">
		  <option value="yes">Yes</option>
		  <option value="no">No</option>
		  </select>
		  </div> </div>	

			<div class="form-group"><label class="col-md-2 control-label">Box One:</label> 
			  <div class="col-md-10"> 
			  <select class="form-control" name="box1">
			  <option value="yes">Yes</option>
			  <option value="no">No</option>
			  </select>
			  </div> 
			</div>

			<div class="form-group"><label class="col-md-2 control-label">Box Two:</label> 
			  <div class="col-md-10"> 
				  <select class="form-control" name="box2">
				  <option value="yes">Yes</option>
				  <option value="no">No</option>
				  </select>
			  </div> 
			</div>
		  <div class="form-group"><label class="col-md-2 control-label">Box Three:</label> 
				<div class="col-md-10"> 
				  <select class="form-control" name="box3">
				  <option value="yes">Yes</option>
				  <option value="no">No</option>
				  </select>
				</div>
		  </div>		
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
			 
			 