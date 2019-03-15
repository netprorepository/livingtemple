<?php
	  $where1 = "url ='".$_GET['fid']."'";
      $general=$objComm->findRecord('tbl_menu1',$where1);
	  $wheres = "id =5";
      $admission =$objComm->findRecord('tbl_page',$wheres);
	  
	   $wher = "img_id ='".$admission[0]['code']."'";
      $image =$objComm->findRecord('tbl_images',$wher);
	  
	  $whesssss = "id =15";
      $page_section =$objComm->findRecord('tbl_page_section',$whesssss);
	  
	  
?>

<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$general[0]['title']?></title>
<meta name="description" content="<?=$general[0]['description']?>">
<meta name="keywords" content="<?=$general[0]['keyword']?>"/>
<?php include("include/stylesheet.php"); ?>
</head>

<body>
<?php include("include/menu.php"); ?> 

<section class="sliderinner" style="background:url(<?=BASE_URL?>products/<?=$admission[0]['image2']?>) no-repeat center center; background-size:cover;">
     <h2>Admission</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Admission</a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg">
          
        
        <div class="about-content">
        
          <div class="col-md-5 col-sm-6 adm-img">
                <figure>
                <img src="<?=BASE_URL?>products/<?=$image[0]['image']?>" class="img-responsive"> 
                 <h3><?=$admission[0]['title']?></h3>
                </figure>
           </div>
        
           <div class="col-md-7 col-sm-6 abt-left admission-content">
               
              
            
              <?=$admission[0]['description']?>


             <a href="#"> Brochure Download </a>
             
             
             
             
           </div>
           
           
           
           <div class="clearfix"></div>
           
           
           
           
           
        </div>
        
</section>

<section class="ad-open" style="background:url(<?=BASE_URL?>products/<?=$page_section[0]['image']?>) no-repeat center center; background-size:cover; background-attachment:fixed;">
       <h3><?=$page_section[0]['description']?></h3>
       <?=$page_section[0]['description2']?>


</section>
<?php include("include/footer.php"); ?>