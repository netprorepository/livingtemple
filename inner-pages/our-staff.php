<?php
	  $where1 = "url = '".$_GET['tid']."' ";
      $general=$objComm->findRecord('tbl_menu2',$where1);
	  
	   $wheress = "menu2 ='".$general[0]['id']."'";
	  $staffs =$objComm->findRecord('tbl_page',$wheress);
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
<section class="sliderinner" style="background:url(<?=BASE_URL?>products/<?=$staffs[0]['image2']?>) no-repeat center center; background-size:cover;">
     <h2>Our Staff</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
       <li><a href="<?=BASE_URL?>academics/">Academics</a></li>
      <li><a href="#">Our Staff</a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg academics-pg">
          
        
        <div class="about-content">
        
          
        
           <div class="col-md-12 admission-content">
               
              
             <?=$staffs[0]['description']?>
  
              
              
     
    <div class="teamholder">
	
	 <?php for($k=0; $k<count($staff); $k++){
	 
	 ?>
    <div class="col-md-3 col-sm-6">
      <div class="tbx"> <img src="<?=BASE_URL?>products/<?=$staff[$k]['image']?>" class="img-responsive"/>
        <div class="tname">
          <h3><?=$staff[$k]['title']?><br/> <?=$staff[$k]['desig']?></h3>
           <p><?=$staff[$k]['mobile']?></p>
        </div>
      </div>
    </div>
	 <?php } ?>
    
    
    <div class="clearfix"></div>
  </div>
              

           </div>
           
           
           
           <div class="clearfix"></div>
           
           
           
           
           
        </div>
        
</section>


<?php include("include/footer.php"); ?>