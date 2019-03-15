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

if(isset($_POST['submit']))
			{
			extract($_POST);
			$dism = $price-$discount_price;
			$per = $dism*100/$price;
			$discount = round($per);
				if($_FILES["images"]["name"]!='')
			$images	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images"]["name"],$_FILES["images"]["tmp_name"]);
			else
			$images=$hidden_images;
			if($_FILES["images1"]["name"]!='')
			$images1	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images1"]["name"],$_FILES["images1"]["tmp_name"]);
			else
			$images1=$hidden_images1;
			if($_FILES["images2"]["name"]!='')
			$images2	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images2"]["name"],$_FILES["images2"]["tmp_name"]);
			else
			$images2=$hidden_images2;
			if($_FILES["images3"]["name"]!='')
			$images3	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images3"]["name"],$_FILES["images3"]["tmp_name"]);
			else
			$images3=$hidden_images3;
			if($_FILES["images4"]["name"]!='')
			$images4	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images4"]["name"],$_FILES["images4"]["tmp_name"]);
			else
			$images4=$hidden_images4;
			if($_FILES["images5"]["name"]!='')
			$images5	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images5"]["name"],$_FILES["images5"]["tmp_name"]);
			else
			$images5=$hidden_images5;
			if($_FILES["images6"]["name"]!='')
			$images6	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images6"]["name"],$_FILES["images6"]["tmp_name"]);
			else
			$images6=$hidden_images6;
			if($_FILES["images7"]["name"]!='')
			$images7	= BASE_URL.'products/'.$objComm->uploadfile($_FILES["images7"]["name"],$_FILES["images7"]["tmp_name"]);
			else
			$images7=$hidden_images7;
			$update_arr=array(								
			'category_id'=>$category_id,
			'subcategory_id'=>$subcategory_id,
			'name'=>$name,
			'code'=>$code,
			'description'=>$description,
			'price'=>$price,
			'images'=>$images,
			'color'=>$color,
			'series'=>$series,
			'material'=>$material,
			'function'=>$function,
			'phone_model'=>$phone_model,
			'delivery_time'=>$delivery_time,		
			'discount_price'=>$discount_price,
			'latest'=>$latest,
			'box1'=>$box1,
			'box2'=>$box2,
			'box3'=>$box3,
			'status'=>$status,
			'product_type'=>$product_type,
			'brand'=>$brand,
			'compatiable'=>$compatiable,
			'suitable_device'=>$suitable_device,
			'box_contents'=>$box_contents,
			'finish'=>$finish,
			'images1'=>$images1,
			'images2'=>$images2,
			'images3'=>$images3,
			'images4'=>$images4,
			'images5'=>$images5,
			'images6'=>$images6,
			'images7'=>$images7,			
			'quantity'=>$quantity,
			'color_map'=>$color_map,
			'seo_title'=>$seo_title,
			'seo_keyword'=>$seo_keyword,
			'seo_keyword1'=>$seo_keyword1,
			'seo_keyword2'=>$seo_keyword2,
			'seo_keyword3'=>$seo_keyword3,
			'seo_keyword4'=>$seo_keyword4,
			'seo_description'=>$seo_description,
			'itemcondition_id'=>$itemcondition_id,
			'media_type'=>$media_type,
			'discount'=>$discount,
			'url'=>$objComm->strToUrl($name)			
			);
			$where=' where id="'.$_GET['id'].'"';
			$objComm->db_update_recordm('products',$update_arr,$where); 		
			$message=UPDATE_DATA_MASS_SUSS;
			}
			
			$result=$objComm->singleRowFetch('products','id',$_GET['id']);
?>			

<div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb">
	   <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
	   <li> <a href="javascript:void(0);"><strong>Edit Product</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		   
<form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <div class="form-group"><label class="col-md-2 control-label">Choose Category:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="category_id" onchange="return subcategory(this.value)">
		  <?php
		  $category=$objComm->findAllRecord('category');
		for($i=0;$i<count($category);$i++){ ?>
		  <option value="<?=$category[$i]['id']?>" <? if($result[0]['category_id']==$category[$i]['id']) echo 'selected';?> ><?=$category[$i]['category_name']?></option>
		  <? } ?>
		  </select>
		  </div> </div>
		  
		  
		  <div class="form-group"><label class="col-md-2 control-label">Choose Sub Category:</label> 
          <div class="col-md-10" > 
		  
		  <select class="form-control" name="subcategory_id" id="ajaxvalue">
		  <?php
		  $subcategory=$objComm->findAllRecord('sub_category');
		for($j=0;$j<count($subcategory);$j++){ ?>
		  <option value="<?=$subcategory[$j]['id']?>" <? if($result[0]['subcategory_id']==$subcategory[$j]['id']) echo 'selected';?> ><?=$subcategory[$j]['sub_category']?></option>
		  <? } ?>
		  </select>
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Product Type:</label> 
          <div class="col-md-10" > 
		  <input type="text" name='product_type' value="<?=$result[0]['product_type']?>" class="form-control">
		  <!--<select class="form-control" name="product_type" id="ajaxvalue">
		  <?php
		  //$producttype=$objComm->findAllRecord('product_type');
		   //for($j=0;$j<count($producttype);$j++){ ?>
		  <option value="<?//=$producttype[$j]['product_type']?>" <? //if($result[0]['product_type']==$producttype[$j]['product_type']) echo 'selected';?> ><?//=$producttype[$j]['product_type']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Brand:</label> 
          <div class="col-md-10" > 
		  <input type="text" name='brand' value="<?=$result[0]['brand']?>" class="form-control">
		  <!--<select class="form-control" name="brand" id="ajaxvalue">
		  <?php
		   // $brandname=$objComm->findAllRecord('brand_image');
		  //for($j=0;$j<count($brandname);$j++){ ?>
		  <option value="<?//=$brandname[$j]['brand_name']?>" <? //if($result[0]['brand']==$brandname[$j]['brand_name']) echo 'selected';?> ><?//=$brandname[$j]['brand_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Compatiable Phone:</label> 
          <div class="col-md-10" > 
			<input type="text" name='compatiable' value="<?=$result[0]['compatiable']?>" class="form-control">
		  <!--<select class="form-control" name="compatiable" id="ajaxvalue">
		  <?php
		  //$compatiable=$objComm->findAllRecord('compatible');
		  //for($j=0;$j<count($compatiable);$j++){ ?>
		  <option value="<?//=$compatiable[$j]['compatible_name']?>" <? //if($result[0]['compatiable']==$compatiable[$j]['compatible_name']) echo 'selected';?> ><?//=$compatiable[$j]['compatible_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div>
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Product Name:</label> 
          <div class="col-md-10"><input type="text" name='name' value="<?=$result[0]['name']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">SKU ( Product Code):</label> 
          <div class="col-md-10"><input type="text" name='code' value="<?=$result[0]['code']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Description:</label> 
          <div class="col-md-10"><textarea name='description' rows="8" class="form-control"><?=$result[0]['description']?></textarea></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Sell Price:</label> 
          <div class="col-md-10"><input type="text" name='discount_price' value="<?=$result[0]['discount_price']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Price:</label> 
          <div class="col-md-10"><input type="text" name='price' value="<?=$result[0]['price']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='images' value="<?=$result[0]['images']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" width="304" height="236" src="<?=$result[0]['images']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images" value="<?=$result[0]['images']?>">
		  <div class="form-group">
          <label class="col-md-2 control-label">Images1:</label> 
          <div class="col-md-10"><input type="file" width="304" height="236" name='images1' value="<?=$result[0]['images1']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" width="304" height="236" src="<?=$result[0]['images1']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images1" value="<?=$result[0]['images1']?>">
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images2:</label> 
          <div class="col-md-10"><input type="file" name='images2' width="304" height="236" value="<?=$result[0]['images2']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" width="304" height="236" src="<?=$result[0]['images2']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images2" value="<?=$result[0]['images2']?>">
		  <div class="form-group">
          <label class="col-md-2 control-label">Images3:</label> 
          <div class="col-md-10"><input type="file" name='images3' value="<?=$result[0]['images3']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" width="304" height="236" src="<?=$result[0]['images3']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images3" value="<?=$result[0]['images3']?>">
		  <div class="form-group">
          <label class="col-md-2 control-label">Images4:</label> 
          <div class="col-md-10"><input type="file" name='images4' value="<?=$result[0]['images4']?>" class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" width="304" height="236" src="<?=$result[0]['images4']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images4" value="<?=$result[0]['images4']?>">
		  <div class="form-group">
          <label class="col-md-2 control-label">Images5:</label> 
          <div class="col-md-10"><input type="file" name='images5' value="<?=$result[0]['images5']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" width="304" height="236" src="<?=$result[0]['images5']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images5" value="<?=$result[0]['images5']?>">
		  <div class="form-group">
          <label class="col-md-2 control-label">Images6:</label> 
          <div class="col-md-10"><input type="file" name='images6' value="<?=$result[0]['images6']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" width="304" height="236" src="<?=$result[0]['images6']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images6" value="<?=$result[0]['images6']?>">
		  <div class="form-group">
          <label class="col-md-2 control-label">Images7:</label> 
          <div class="col-md-10"><input type="file" name='images7' value="<?=$result[0]['images7']?>" class="form-control"></div> </div> 
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img class="img-thumbnail" src="<?=$result[0]['images7']?>" /></div> </div> 
		  <input type="hidden" name="hidden_images7" value="<?=$result[0]['images7']?>">
		  <!--
		  <div class="form-group">
          <label class="col-md-2 control-label">Images8:</label> 
          <div class="col-md-10"><input type="text" name='images8' value="<?=$result[0]['images8']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img src="<?=$result[0]['images8']?>" /></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images9:</label> 
          <div class="col-md-10"><input type="text" name='images9' value="<?=$result[0]['images9']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img src="<?=$result[0]['images9']?>" /></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Images10:</label> 
          <div class="col-md-10"><input type="text" name='images10' value="<?=$result[0]['images10']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><img src="<?=$result[0]['images10']?>" /></div> </div> 
		  -->
		  <div class="form-group">
          <label class="col-md-2 control-label">color:</label> 
          <div class="col-md-10"><input type="text" name='color' value="<?=$result[0]['color']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">color Map:</label> 
          <div class="col-md-10"><input type="text" name='color_map' value="<?=$result[0]['color_map']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group"><label class="col-md-2 control-label">Suitable Device:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="suitable_device">
		  <option value="Mobile" <? if($result[0]['suitable_device']=='Mobile') echo 'selected';?>>Mobile</option>
		  <option value="Tablet" <? if($result[0]['suitable_device']=='Tablet') echo 'selected';?>>Tablet</option>
		  <option value="Accessories" <? if($result[0]['suitable_device']=='Accessories') echo 'selected';?>>Accessories</option>
		  </select>
		  </div> </div>	
		  
		  <!--<div class="form-group">
          <label class="col-md-2 control-label">Series:</label> 
          <div class="col-md-10"><input type="text" name='series' value="<?=$result[0]['series']?>" class="form-control"></div> </div> 
		  -->
		  <div class="form-group">
          <label class="col-md-2 control-label">Box Contents:</label> 
          <div class="col-md-10"><input type="text" name='box_contents' value="<?=$result[0]['box_contents']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Finish:</label> 
          <div class="col-md-10"><input type="text" name='finish' value="<?=$result[0]['finish']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Material Composition:</label> 
          <div class="col-md-10">
		  <input type="text" name='material' value="<?=$result[0]['material']?>" class="form-control">
		  <!--<select class="form-control" name="material" id="ajaxvalue">
		  <?php
		 // $material=$objComm->findAllRecord('material');
		//for($j=0;$j<count($material);$j++){ ?>
		  <option value="<?//=$material[$j]['material_name']?>" <? //if($result[0]['material']==$material[$j]['material_name']) echo 'selected';?> ><?//=$material[$j]['material_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div> 
		  
		  <!--<div class="form-group">
          <label class="col-md-2 control-label">Function:</label> 
          <div class="col-md-10"><input type="text" name='function' value="<?=$result[0]['function']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Phone Model:</label> 
          <div class="col-md-10"><input type="text" name='phone_model' value="<?=$result[0]['phone_model']?>" class="form-control"></div> </div> -->
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Quantity:</label> 
          <div class="col-md-10"><input type="text" name='quantity' value="<?=$result[0]['quantity']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Item Condition:</label> 
          <div class="col-md-10">
		  <input type="text" name='itemcondition_id' value="<?=$result[0]['itemcondition_id']?>" class="form-control">
		  <!--<select class="form-control" name="itemcondition_id" id="ajaxvalue">
		  <?php
		     //$itemcondition=$objComm->findAllRecord('itemcondition');
		    //for($j=0;$j<count($itemcondition);$j++){ ?>
		  <option value="<?//=$itemcondition[$j]['id']?>" <? //if($result[0]['itemcondition_id']==$itemcondition[$j]['id']) echo 'selected';?> ><?//=$itemcondition[$j]['itemcondition_name']?></option>
		  <? //} ?>
		  </select>-->
		  </div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Delivery Time:</label> 
          <div class="col-md-10"><input type="text" name='delivery_time' value="<?=$result[0]['delivery_time']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Media Type:</label> 
          <div class="col-md-10"><input type="text" name='media_type' value="<?=$result[0]['media_type']?>" class="form-control"></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Title:</label> 
          <div class="col-md-10"><input type="text" name='seo_title' value="<?=$result[0]['seo_title']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword1:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword' value="<?=$result[0]['seo_keyword']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword2:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword1' value="<?=$result[0]['seo_keyword1']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword3:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword2' value="<?=$result[0]['seo_keyword2']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword4:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword3' value="<?=$result[0]['seo_keyword3']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Keyword5:</label> 
          <div class="col-md-10"><input type="text" name='seo_keyword4' value="<?=$result[0]['seo_keyword4']?>" class="form-control"></div> </div> 
		  
		  <div class="form-group">
          <label class="col-md-2 control-label">Seo Description:</label> 
          <div class="col-md-10"><input type="text" name='seo_description' value="<?=$result[0]['seo_description']?>" class="form-control"></div> </div> 
		  
		   <div class="form-group"><label class="col-md-2 control-label">Add To Latest Offer List:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="latest">
		  <option value="yes" <? if($result[0]['latest']=='yes') echo 'selected';?>>Yes</option>
		  <option value="no" <? if($result[0]['latest']=='no') echo 'selected';?>>No</option>
		  </select>
		  </div> </div>	

			<div class="form-group"><label class="col-md-2 control-label">Add To Box1 List:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="box1">
		  <option value="yes" <? if($result[0]['box1']=='yes') echo 'selected';?>>Yes</option>
		  <option value="no" <? if($result[0]['box1']=='no') echo 'selected';?>>No</option>
		  </select>
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Add To Box2 List:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="box2">
		  <option value="yes" <? if($result[0]['box2']=='yes') echo 'selected';?>>Yes</option>
		  <option value="no" <? if($result[0]['box2']=='no') echo 'selected';?>>No</option>
		  </select>
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Add To Box3 List:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="box3">
		  <option value="yes" <? if($result[0]['box3']=='yes') echo 'selected';?>>Yes</option>
		  <option value="no" <? if($result[0]['box3']=='no') echo 'selected';?>>No</option>
		  </select>
		  </div> </div>
		  
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> 
		  <select class="form-control" name="status">
		  <option value="Active" <? if($result[0]['status']=='Active') echo 'selected';?>>Active</option>
		  <option value="Inactive" <? if($result[0]['status']=='Inactive') echo 'selected';?>>Inactive</option>
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
			 