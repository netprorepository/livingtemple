<?php
	  $where1 = "url ='".$_GET['fid']."'";
      $general=$objComm->findRecord('tbl_menu1',$where1);
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
     <h2>Awards</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
       <li><a href="<?=BASE_URL?>academics/">Academics</a></li>
      <li><a href="<?=BASE_URL?>category/academics/awards/">Awards</a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg academics-pg news-event-page">
          
        
        <div class="about-content">
        
          
        
           <div class="col-md-12">
		   <?php for($i=0; $i<count($gallcat); $i++){ ?>
              <div> 
              <h3><?=$gallcat[$i]['name']?> </h3>
              
              <div class="class-gal">
              
			  <?php 
			  $wheres= "category_id= '".$gallcat[$i]['id']."'" ;
			  $gallery=$objComm->findRecord('tbl_gallery',$wheres);
			  for($j=0; $j<count($gallery); $j++){ ?>
              <div class="col-md-3 col-sm-6">
                 <a href="<?=BASE_URL?>products/<?=$gallery[$j]['image']?>" class="popup-link">
                 <img src="<?=BASE_URL?>products/<?=$gallery[$j]['image']?>" class="img-res"/>
                 </a>
              </div>
			  <?php } ?>
              
              <div class="clearfix"></div>
              
              </div>
              </div>
			  
               <br/>
			    <?php } ?>
             </div>
           <div class="clearfix"></div>
           
           
        </div>
        
</section>
<?php include("include/footer.php"); ?>  