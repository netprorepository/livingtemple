<?php

// Database Connection

$host="localhost";
$uname="mobilecover";
$pass="!B[rM7O9AyT*";
$database = "mobilecover"; 

$connection=mysql_connect($host,$uname,$pass); 

echo mysql_error();

//or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");
$searchStr = $_REQUEST['searchStr'];
// Fetch Record from Database
$output = "";
$table = 'products'; // Enter Your Table Name
if(!empty($searchStr)){
	
		$query = "SELECT category_name, sub_category, name, code, title, brand, compatiable, product_type, delivery_time, suitable_device, description, box_contents, price, quantity, itemcondition_id, discount_price, seo_keyword, seo_keyword1, seo_keyword2, seo_keyword3, seo_keyword4, images, images1, images2, images3, images4, images5, images6, images7, color, color_map, material, media_type, media_type1, media_type2, products.status, finish, latest, box1, box2, box3 FROM products INNER JOIN category ON category.id = products.category_id
				INNER JOIN sub_category ON sub_category.id = products.subcategory_id
				WHERE name like '%$searchStr%' or code like '%$searchStr%' or description like '%$searchStr%'";
	
}else{
    $query = "SELECT category_name, sub_category, name, code, title, brand, compatiable, product_type, delivery_time,suitable_device, description, box_contents, price, quantity, itemcondition_id, discount_price, seo_keyword, seo_keyword1, seo_keyword2, seo_keyword3, seo_keyword4, images, images1, images2, images3, images4, images5, images6, images7, color, color_map, material, finish, media_type, media_type1, media_type2, products.status, latest, box1, box2, box3 FROM products INNER JOIN category ON category.id = products.category_id
				INNER JOIN sub_category ON sub_category.id = products.subcategory_id";
}
$cloumn=array("Category","Sub-Category","name","TemplateType","Title","brand","Compatible","Type"
,"suitable device","description","box-contents","MRP","currency","quantity","item-condition","Sales Price",
"search-terms1","search-terms2","search-terms3","search-terms4","search-terms5","other-image-url1","other-image-url2",
"other-image-url3","other-image-url4","other-image-url5","other-image-url6","other-image-url7","color","color-map",
"material-composition","finish","media-type1","media-type2","media-type3","delivery-time","latest-offer","Box1","Box2","Box3",
"status");
$len=count($cloumn);
$sql = mysql_query($query);
$columns_total = mysql_num_fields($sql);


// Get The Field Name

for ($i = 0; $i < $len; $i++) {
//$heading = mysql_field_name($sql, $i);
//$heading = mysql_field_name($sql, $i);
$output .= '"'.$cloumn[$i].'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) 
{
$Category=$row['category_name'];	
$Sub_Category=$row['sub_category'];	
$name=$row['name'];	
$TemplateType=$row['code']; 	
$Title=$row['name']; 	
$brand=$row['brand'];	
$Compatible=$row['compatiable'];	
$Type=$row['product_type'];	
$suitable=$row['suitable_device']; 
$description=$row['description'];	
$box_contents=$row['box_contents'];	
$MRP	=$row['price'];
$currency	="new";
$quantity	=$row['quantity'];
$item_condition	=$row['itemcondition_id'];
$Sales_Price=$row['discount_price'];
$search_terms1	=$row['seo_keyword'];
$search_terms2	=$row['seo_keyword1'];
$search_terms3	=$row['seo_keyword2'];
$search_terms4	=$row['seo_keyword3'];
$search_terms5	=$row['seo_keyword4'];
$main_image_url	=$row['images'];
$other_image_url1	=$row['images1'];
$other_image_url2	=$row['images2'];
$other_image_url3	=$row['images3'];
if($other_image_url3==''){ $other_image_url3='-';}
$other_image_url4	=$row['images4'];
if($other_image_url4==''){ $other_image_url4='-';}
$other_image_url5	=$row['images5'];
if($other_image_url5==''){ $other_image_url5='-';}
$other_image_url6	=$row['images6'];
if($other_image_url6==''){ $other_image_url6='-';}
$other_image_url7	=$row['images7'];
if($other_image_url7==''){ $other_image_url7='-';}
$color	=$row['color'];
$color_map	=$row['color_map'];
$material_composition=$row['material'];	
$finish	=$row['finish'];
$media_type1    =$row['media_type'];
if($media_type1==''){ $media_type1='-';}	
$media_type2	=$row['media_type1'];
if($media_type2==''){ $media_type2='-';}
$media_type3	=$row['media_type2'];
if($media_type3==''){ $media_type3='-';}
$delivery_time	=$row['delivery_time'];
$latest_offer	=$row['latest'];
$Box1	=$row['box1'];
$Box2	=$row['box2'];
$Box3	=$row['box3'];
$status =$row['status'];
$data=array($Category,$Sub_Category,$name,$TemplateType,$Title,$brand,$Compatible,$Type
,$suitable,$description,$box_contents,$MRP,$currency,$quantity,$item_condition,$Sales_Price,
$search_terms1,$search_terms2,$search_terms3,$search_terms4,$search_terms5,$main_image_url,
$other_image_url1,$other_image_url2,$other_image_url3,$other_image_url4,$other_image_url5,$other_image_url6
,$color,$color_map,$material_composition,$finish,$media_type1,$media_type2,
$media_type3,$delivery_time,$latest_offer,$Box1,$Box2,$Box3,$status);
//echo $Box1;
for ($i = 0; $i < $len; $i++) 
{
$output .='"'.$data["$i"].'",';

}
$output .="\n";
}



// Download the file

$filename = "myFile.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>