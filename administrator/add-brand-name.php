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

 if(isset($_POST['submit']))
			{
			extract($_POST);			
			$datetime=date("d/m/Y");
			$fields=array('brand_name','status','url','date');
			$data=array($brand_name,$status,$objComm->strToUrl($brand_name),$datetime);
			$lastId=$objComm->insertWithLastid($fields,$data,'brand_name');				
			$message=INSRT_DATA_MASS_SUSS;	
			}		
			

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
				
				
	
					
					$strng=$slice[0];
					$brand_name=trim(preg_replace('/\s+/',' ', $strng));
					
					$datetime=date("d/m/Y");
					$status="Active";
					$url=$objComm->strToUrl($brand_name);
					//$date=date("d/m/Y");
					$where="brand_name='$brand_name' ";  
					$categorycheck=$objComm->findRecord('brand_name',$where);
					if(count($categorycheck)>0)
						{
						$_SESSION['categorymsg']=$brand_name.'Brand Name  already Exist';			
						}
					else{
					$query="insert into brand_name (brand_name,status,url,date) values('$brand_name','$status','$url','$datetime')";
					$queryres=mysql_query($query);
					
					
			//exit();
			//$fields=array('category_name','status','tagline','category_image','url');
			//$data=array($category_name,$status,$tagline,$category_image,$url);
			//echo '<pre>';print_r();
			//exit();
			//$lastId=$objComm->insertWithLastid($fields,$data,'category');
		
					
				//}
			}
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
					$brand_name=$slice[0];
					
					  $sql = "DELETE from brand_name  WHERE brand_name = '$brand_name'";
					  $result = mysql_query($sql) or die(mysql_error());
			
			
			}
			
			//$message=INSRT_DATA_MASS_SUSS;
}
//$message=INSRT_DATA_MASS_SUSS;
echo "DELETION A GREAT SUCCESS!";

}

if(isset($_POST['UpdateData'])){

$filename=$_FILES["fileToUpload"]["name"];
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
				
				
					$strng=$slice[0];
					$name=trim(preg_replace('/\s+/',' ', $strng));
					
					//$status="Active";
					$url=$objComm->strToUrl($name);
					$date=date("d/m/Y");
					
					echo mysql_query("UPDATE brand_name SET
					brand_name='$name',
					date='$date',
					status='$status',
					url='$url'
					 where brand_name='$name'");
					
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
	   <li> <a href="javascript:void(0);"><strong>Add Brand</strong></a> </li> </ul> 
       </div> 

 
<?php include 'include/leftMenu.php' ?> 
      
        
        
        <div class="row"> 
        <div class="col-md-12"> 
        
        
        
         
        <?php if(isset($message)) echo $message; ?>
         
		 

         
		 <?php /*?><form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">New:</label> 
          <div class="col-md-10"><input type="file" name='fileToUpload' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="uploadData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Upload Data</button></div> </div>
		  </form><?php */?>
		  
		  <br/><br/><br/>
		   
		 
		   
			 <?php /*?> <form action="" method="post" enctype="multipart/form-data">
		 <div class="form-group">
          <label class="col-md-2 control-label">Delete:</label> 
          <div class="col-md-10"><input type="file" name='fileToDelete' required ></div> </div> 
		  
		  
		  <div class="form-group">
          <label class="col-md-2 control-label"></label> 
          <div class="col-md-10"><a onclick='window.open ("<?=BASE_URL?>administrator/example.html",
"mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="deleteData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Delete Data</button></div> </div>
		  </form><?php */?>
		   
		   <br/><br/><br/>		 
<form class="form-horizontal row-border" action="" method="post"  enctype="multipart/form-data"> 		   
          
		 
		 
         <div class="form-group">
          <label class="col-md-2 control-label">Brand Name:</label> 
          <div class="col-md-10"><input type="text" name='brand_name' class="form-control"></div> </div> 
		  
		 <!-- <div class="form-group">
          <label class="col-md-2 control-label">Tag Line:</label> 
          <div class="col-md-10"><input type="text" name='tagline' class="form-control"></div> </div> -->
		  
		  <!--<div class="form-group">
          <label class="col-md-2 control-label">Images:</label> 
          <div class="col-md-10"><input type="file" name='category_image' ></div> </div> -->
		  
		  <div class="form-group"><label class="col-md-2 control-label">Status:</label> 
          <div class="col-md-10"> <select class="form-control" name="status"><option value="Active">Active</option><option value="Inactive">Inactive</option></select>
		  </div> </div>		  
            
		  <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
 </form> 
                  
                   </div> </div> 
        
         
  
        
        
             </div> </div> </div> </body> </html>