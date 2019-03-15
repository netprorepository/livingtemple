<?php
	  $where1 = "url ='".$_GET['tid']."'";
      $general=$objComm->findRecord('tbl_menu2',$where1);
	  
	  $where1 = "menu2 ='".$general[0]['id']."'";
	  $attendance =$objComm->findRecord('tbl_page',$where1);
	  
	  $aay=$objComm->getPostImage($attendance[0]['code']);
	  
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

 <section class="sliderinner" style="background:url(<?=BASE_URL?>products/<?=$attendance[0]['image2']?>) no-repeat center center; background-size:cover;">
     <h2><?=$attendance[0]['title']?></h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#"><?=$attendance[0]['title']?></a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg academics-pg attendance-pg">
          
        
        <div class="about-content">
        
          <div class="col-md-4 col-sm-6 adm-img">
                <figure>
                <img src="<?=BASE_URL?>products/<?=$aay[0]?>" class="img-responsive"> 
                </figure>
           </div>
        
           <div class="col-md-8 col-sm-6 admission-content">
               
              
            
           <?=$attendance[0]['description']?>

             
             
             
             
           </div>
           
           
           
           <div class="clearfix"></div>
           
           
           
           
           
        </div>
        
</section>
<?php include("include/footer.php"); ?>