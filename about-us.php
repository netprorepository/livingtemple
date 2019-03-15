<?php
	  $where1 = "id =1";
      $general=$objComm->findRecord('tbl_menu1',$where1);
	  $wheres = "id=1";
      $about =$objComm->findRecord('tbl_ftag',$wheres);
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
  

 <section class="sliderinner" style="background:url(<?=BASE_URL?>images/Admission-slider.jpg) no-repeat center center; background-size:cover;">
     <h2>About Us</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#">About Us</a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg">
          
        
        <div class="about-content abt-pg">
        
          <div class="col-md-5 adm-img">
                <figure>
                <img src="<?=BASE_URL?>products/<?=$about[0]['image']?>" class="img-responsive"> 
                </figure>
                 <br>

                <h3><?=$about[0]['short']?></h3>
           </div>
        
           <div class="col-md-7 abt-left admission-content ">
               
               
              <h3> <?=$about[0]['title']?></h3>
            
             <?=$about[0]['description']?>



             
             
             
           </div>
           
           
           
           <div class="clearfix"></div>
           
           
           
           
           
        </div>
        
</section>


 <?php include("include/footer.php"); ?>