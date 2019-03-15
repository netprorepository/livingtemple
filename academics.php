<?php
	  $where1 = "url ='".$_GET['fid']."'";
      $general=$objComm->findRecord('tbl_menu1',$where1);
	  $wheres = "id =6";
      $acadmics =$objComm->findRecord('tbl_page',$wheres);
	  
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
 <section class="sliderinner" style="background:url(<?=BASE_URL?>images/slider1.jpg) no-repeat center center; background-size:cover;">
     <h2><?=$acadmics[0]['title']?></h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#"><?=$acadmics[0]['title']?></a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg academics-pg">
          
        
        <div class="about-content">
        
          <div class="col-md-4 adm-img">
                <figure>
                <img src="<?=BASE_URL?>products/<?=$acadmics[0]['image2']?>" class="img-responsive"> 
                </figure>
           </div>
        
           <div class="col-md-8 admission-content">
               
              
            
          <?=$acadmics[0]['description']?>


             
           </div>
           
           
           
           <div class="clearfix"></div>
           
           
           <div class="class-gal">
              
              <?php 
			  $where4 = "img_id='".$acadmics[0]['code']."'";
			  $images =$objComm->findRecord('tbl_images',$where4);
			  for($k=0;$k<count($images); $k++){ ?>
              <div class="col-md-3 col-sm-6">
                 <a href="<?=BASE_URL?>products/<?=$images[$k]['image']?>" class="popup-link">
                 <img src="<?=BASE_URL?>products/<?=$images[$k]['image']?>" class="img-res"/>
                 </a>
              </div>
			  <?php } ?>
              
              
               <div class="clearfix"></div>
              
              </div>
           
           
        </div>
        
</section>
<?php include("include/footer.php"); ?>