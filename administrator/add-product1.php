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
			$fields=array('category_id','subcategory_id','name','code','description','price','images','color','material','delivery_time','date','status','discount_price','url','latest','product_type','brand','compatiable','suitable_device','box_contents','finish','images1','images2','images3','images4','images5','images6','images7','images8','images9','images10','quantity','color_map','seo_title','seo_keyword','seo_keyword1','seo_keyword2','seo_keyword3','seo_keyword4','seo_description','itemcondition_id','latest','media_type');
			$data=array($category_id,$subcategory_id,$name,$code,$description,$price,$images,$color,$material,$delivery_time,$date,$status,$discount_price,$objComm->strToUrl($name),$latest,$product_type,$brand,$compatiable,$suitable_device,$box_contents,$finish,$images1,$images2,$images3,$images4,$images5,$images6,$images7,$images8,$images9,$images10,$quantity,$color_map,$seo_title,$seo_keyword,$seo_keyword1,$seo_keyword2,$seo_keyword3,$seo_keyword4,$seo_description,$itemcondition_id,$latest,'$media_type');
			$lastId=$objComm->insertWithLastid($fields,$data,'products');				
			$message=INSRT_DATA_MASS_SUSS;	
			}	







if(isset($_POST['uploadData'])){


$csv_file = $_FILES["fileToUpload"]["tmp_name"]; 


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
				
				
	$where="category_name='".$slice[0]."' ";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	
	$where="sub_category='".$slice[1]."' ";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$subcategory[0][0];
	
	
	$where="itemcondition_name='".$slice[14]."' ";  
	$itemcondition=$objComm->findRecord('itemcondition',$where);
	$itemconditionid=$itemcondition[0][0];
	//echo $itemconditionid;
	//print_r($itemcondition);
					
					//exit();
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$name=$slice[2];
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
					
					$status="Active";
					$url=$objComm->strToUrl($name);
					$date=date("d/m/Y");
					
					
			//exit();
			$fields=array('category_id','subcategory_id','name','code','description','price','images','color','material','delivery_time','date','status','discount_price','product_type','brand','compatiable','suitable_device','box_contents','finish','images1','images2','images3','images4','images5','images6','images7','images8','images9','images10','quantity','color_map','seo_title','seo_keyword','seo_keyword1','seo_keyword2','seo_keyword3','seo_keyword4','seo_description','itemcondition_id','url','latest','media_type');
			$data=array($category_id,$subcategory_id,$name,$code,$description,$price,$images,$color,$material,$delivery_time,$date,$status,$discount_price,$product_type,$brand,$compatiable,$suitable_device,$box_contents,$finish,$images1,$images2,$images3,$images4,$images5,$images6,$images7,$images8,$images9,$images10,$quantity,$color_map,$seo_title,$seo_keyword,$seo_keyword1,$seo_keyword2,$seo_keyword3,$seo_keyword4,$seo_description,$itemcondition_id,$url,$latest,$media_type);
			
			$lastId=$objComm->insertWithLastid($fields,$data,'products');
		
					
				//}
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
$message=INSRT_DATA_MASS_SUSS;

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
				
				
	$where="category_name='".$slice[0]."' ";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	
	$where="sub_category='".$slice[1]."' ";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$subcategory[0][0];
	
	
	$where="itemcondition_name='".$slice[39]."' ";  
	$itemcondition=$objComm->findRecord('itemcondition',$where);
	$itemconditionid=$itemcondition[0][0];
					
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$name=$slice[2];
					
					
					  $sql = "DELETE from products  WHERE category_id = '$category_id' and subcategory_id='$subcategory_id' and name='$name'";
					  $result = mysql_query($sql) or die(mysql_error());
			
			
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
//$message=INSRT_DATA_MASS_SUSS;
echo "DELETION A GREAT SUCCESS!";

}



if(isset($_POST['UpdateData'])){


$csv_file = $_FILES["fileToUpdate"]["tmp_name"]; 


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
				
				
	$where="category_name='".$slice[0]."' ";  
	$category=$objComm->findRecord('category',$where);
	$categoryid=$category[0][0];
	
	$where="sub_category='".$slice[1]."' ";  
	$subcategory=$objComm->findRecord('sub_category',$where);
	$subcategoryid=$subcategory[0][0];
	
	
	$where="itemcondition_name='".$slice[36]."' ";  
	$itemcondition=$objComm->findRecord('itemcondition',$where);
	$itemconditionid=$itemcondition[0][0];
					
					 $category_id=$categoryid;
					$subcategory_id=$subcategoryid;
					$name=$slice[2];
					$code=$slice[3];
					$description=$slice[4];
					$price=$slice[5];
					$images=$slice[6];
					$color=$slice[7];
					//$series=$slice[8];
					$material=$slice[8];
					//$function=$slice[10];
					//$phone_model=$slice[11];
					$delivery_time=$slice[9];					
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
					$status=$slice[38];
					$media_type=$slice[39];
					
					//$status="Active";
					$url=$objComm->strToUrl($name);
					$date=date("d/m/Y");
					
					mysql_query("UPDATE products SET
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
					media_type='$media_type' where category_id='$category_id' and subcategory_id='$subcategory_id' and name='$name'");
					
		
					
				//}
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
	   <li> <a href="javascript:void(0);"><strong>Add Product</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">New:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpload' ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="uploadData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Upload Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>
		   
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Update:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpdate' ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="UpdateData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Update Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>
		   
		 <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Delete:</label> 
          <div class="col-md-10"><input type="file" name='fileToDelete' ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="deleteData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Delete Data</button></div> </div>
		  </form>
		   
		   <br/><br/><br/>

		   
		   
<form class="form-horizontal row-border" action="" method="post"> 		   
          
		 
		 
         <div class="form-group">
          <div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="category_id" onchange="return subcategory(this.value)">
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
		  
		  <div class="form-group"><label class="col-md-2 control-label">Choose Brand:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="brand">
		  <?php
		  $protype=$objComm->findAllRecord('brand_image');
		for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?=$protype[$i]['brand_name']?>"><?=$protype[$i]['brand_name']?></option>
		  <? } ?>
		  </select>
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Choose Compatiable Phone:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="compatiable">
		  <?php
		  $protype=$objComm->findAllRecord('compatible');
		for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?=$protype[$i]['compatible_name']?>"><?=$protype[$i]['compatible_name']?></option>
		  <? } ?>
		  </select>
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
          <label class="col-md-2 control-label">Price:</label> 
          <div class="col-md-10"><input type="text" name='price' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Discount Price:</label> 
          <div class="col-md-10"><input type="text" name='discount_price' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="text" name='images' class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images1:</label> 
          <div class="col-md-10"><input type="text" name='images1' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images2:</label> 
          <div class="col-md-10"><input type="text" name='images2' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images3:</label> 
          <div class="col-md-10"><input type="text" name='images3' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images4:</label> 
          <div class="col-md-10"><input type="text" name='images4' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images5:</label> 
          <div class="col-md-10"><input type="text" name='images5' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images6:</label> 
          <div class="col-md-10"><input type="text" name='images6' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images7:</label> 
          <div class="col-md-10"><input type="text" name='images7' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images8:</label> 
          <div class="col-md-10"><input type="text" name='images8' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images9:</label> 
          <div class="col-md-10"><input type="text" name='images9' class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label">Thumb Images10:</label> 
          <div class="col-md-10"><input type="text" name='images10' class="form-control"></div> </div> 
		  
		  
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
          <label class="col-md-2 control-label">Choose Material Composition:</label> 
          <div class="col-md-10">
		  <select class="form-control" name="material">
		  <?php
		  $protype=$objComm->findAllRecord('material');
		for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?=$protype[$i]['material_name']?>"><?=$protype[$i]['material_name']?></option>
		  <? } ?>
		  </select>
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
		  <select class="form-control" name="itemcondition_id">
		  <?php
		  $protype=$objComm->findAllRecord('itemcondition');
		for($i=0;$i<count($protype);$i++){ ?>
		  <option value="<?=$protype[$i]['id']?>"><?=$protype[$i]['itemcondition_name']?></option>
		  <? } ?>
		  </select>
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
		  
		  <div class="form-group"><label class="col-md-2 control-label">Add To Latest Offer List:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="latest">
		  <option value="yes">Yes</option>
		  <option value="no">No</option>
		  </select>
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
			 
			 