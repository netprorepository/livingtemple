<?php
	  $where1 = "url = '".$_GET['tid']."' ";
      $general=$objComm->findRecord('tbl_menu2',$where1);
	  
	   $wheress = "menu2 ='".$general[0]['id']."'";
	  $awards =$objComm->findRecord('tbl_page',$wheress);
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
   
 <section class="sliderinner" style="background:url(<?=BASE_URL?>products/<?=$awards[0]['image2']?>) no-repeat center center; background-size:cover;">
     <h2>Awards</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
       <li><a href="<?=BASE_URL?>academics/">Academics</a></li>
      <li><a href="#">Awards</a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg academics-pg">
          
        
        <div class="about-content">
        
          
        
           <div class="col-md-12 admission-content">
               
              
              
               <?=$awards[0]['description']?>
              
              
              
              <div class="class-gal">
              <?php for($k=0; $k<count($award); $k++){ ?>
              <div class="col-md-3 col-sm-6">
                 <a href="<?=BASE_URL?>products/<?=$award[$k]['image']?>" class="popup-link">
                 <img src="<?=BASE_URL?>products/<?=$award[$k]['image']?>" class="img-res"/>
                 </a>
              </div>
               <?php } ?>
               
              
              </div>
              

           </div>
           
           
           
           <div class="clearfix"></div>
           
           
           
           
           
        </div>
        
</section>
<?php include("include/footer.php"); ?>