<?php
error_reporting(0);
?>
<?php
	  $where1 = "id =1";
      $general=$objComm->findRecord('tbl_menu1',$where1);
	  $wheres = "status='Active'";
      $home_gallery=$objComm->findRecord('tbl_home_gallery',$wheres);
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
<section class="slider">
  <div class="owl-demo sl">
  <?php for($k=0; $k<count($slider); $k++){ ?>
    <div class="item" style="background:url(<?=BASE_URL?>products/<?=$slider[$k]['image']?>) no-repeat center center; background-size:cover;">
      <div class="slider-caption wow animated slideInUp"> <img src="<?=BASE_URL?>images/play.png" class="ct"/>
        <h1><?=$slider[$k]['title']?> </h1>
        <p><?=$slider[$k]['title2']?> </p>
      </div>
    </div>
  <?php } ?>
  </div>
  <div class="clearfix"></div>
</section>
<section class="abt-section">
  <div class="features">
    <div class="col-md-3 col-sm-6 col-xs-6"> <a href="<?=BASE_URL?>category/academics/awards/">
      <div class="flip">
        <div class="fbx front">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>Awards</h2>
          </div>
        </div>
        <div class="fbx back">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>Awards</h2>
          </div>
        </div>
      </div>
      </a> </div>
    <div class="col-md-3 col-sm-6 col-xs-6"> <a href="<?=BASE_URL?>category/academics/our-staff/">
      <div class="flip">
        <div class="fbx front">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>Our Staff</h2>
          </div>
        </div>
        <div class="fbx back">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>Our Staff</h2>
          </div>
        </div>
      </div>
      </a> </div>
    <div class="col-md-3 col-sm-6 col-xs-6"> <a href="<?=BASE_URL?>admission/">
      <div class="flip">
        <div class="fbx front">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>Admissions</h2>
          </div>
        </div>
        <div class="fbx back">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>Admissions</h2>
          </div>
        </div>
      </div>
      </a> </div>
    <div class="col-md-3 col-sm-6 col-xs-6"> <a href="<?=BASE_URL?>news-and-event/">
      <div class="flip">
        <div class="fbx front">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>News & Event</h2>
          </div>
        </div>
        <div class="fbx back">
          <div class="fbx-inner"> <i class="fas fa-graduation-cap"></i>
            <h2>News & Event</h2>
          </div>
        </div>
      </div>
      </a> </div>
    <div class="clearfix"></div>
  </div>
  <div class="about-content">
    <div class="col-md-7 col-sm-7 abt-left wow animated slideInLeft">
      <div class="bg-heading">
        <h3>Living Temple</h3>
      </div>
      <h2><?=$about_home[0]['heading1']?></h2>
      <?=$about_home[0]['content1']?>
      <a href="<?=BASE_URL?>about-us/">read More</a> </div>
    <div class="col-md-5 col-sm-5 abt-img wow animated slideInRight">
      <figure> <img src="<?=BASE_URL?>products/<?=$about_home[0]['image']?>"/> </figure>
    </div>
    <div class="clearfix"></div>
  </div>
</section>
<section class="home-gallery">
  <div class="owl-demo gallery-slide wow animated fadeIn">
   <?php for($l=0; $l<count($home_gallery); $l++){ ?>
    <div class="item"> <a href="<?=BASE_URL?>products/<?=$home_gallery[$l]['image']?>" class="popup-link"> <img src="<?=BASE_URL?>products/<?=$home_gallery[$l]['image']?>"/> <span><img src="<?=BASE_URL?>images/zoom-icon.png"/> </span> </a> </div>
   <?php } ?>
	
   
  </div>
  <div class="rights">
    <p><?=$address_home[0]['title']?><br/>
      <?=$address_home[0]['short']?></p>
  </div>
</section>

<?php include("include/footer.php"); ?>