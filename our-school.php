<?php
	  $where1 = "url ='".$_GET['fid']."'";
      $general=$objComm->findRecord('tbl_menu1',$where1);
	  $wheres = "id =4";
      $school =$objComm->findRecord('tbl_page',$wheres);
	  
	  
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
 <section class="sliderinner" style="background:url(<?=BASE_URL?>products/<?=$school[0]['image2']?>) no-repeat center center; background-size:cover;">
     <h2>Our School</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Our School</a></li>
    </ul>
         
</section>

<section class="abt-section school-page">
          
        
        <div class="about-content">
           <div class="col-md-12 abt-left schoolpg-top" style="background:url(<?=BASE_URL?>images/abt-bg2.jpg) no-repeat center center; background-size:cover;">
              <h3><?=$school[0]['title']?></h3>
             <?=$school[0]['description']?>


<div class="abt-img-wrap"> 

<?php 
			  $where4 = "img_id='".$school[0]['code']."'";
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
           
           
           <div class="col-md-12 abt-left schoolpg-top" style="background:url(<?=BASE_URL?>images/our-school-bg.jpg) no-repeat center center; background-size:cover;">
               <h3>VALUES CODE</h3>
              
              <div class="vales-wrap">
			  
			  <?php 
			  $where4 = "menu1='".$school[0]['menu1']."'";
			  $values =$objComm->findRecord('tbl_page_section',$where4);
			  for($m=0;$m<13; $m++){ ?>
                 <div class="col-md-4 col-sm-6">
                <div class="value-cbx cf">
                
                    <figure>
					<?php 
$newcontent = preg_replace("/<p[^>]*?>/", "", $values[$m]['description3']);
$newcontent = str_replace("</p>", "", $newcontent);

?>
                       <i class="<?=$newcontent?>"></i>
                       </figure> 
                       
                       <h4><?=$values[$m]['description1']?> </h4>
                       <p><?=$values[$m]['description2']?></p> 
                   </div>
                   
                </div>
				
				  <?php } ?>
                
               
                
                
                
                
              </div>


          
           <div class="clearfix"></div>
           
        </div>
        
        
        
        <div class="values">
            
        </div>
        
        
       <div class="about-content abt-pg">
        <?php 
			  $where5 = "id=14";
			  $user =$objComm->findRecord('tbl_page_section',$where5);
			  ?>
          <div class="col-md-5 adm-img">
                <figure>
                <img src="<?=BASE_URL?>products/<?=$user[0]['image']?>" class="img-responsive"> 
                </figure>
                <br>

                <h3><?=$user[0]['description1']?></h3>
           </div>
        
           <div class="col-md-7 abt-left admission-content ">
               
               <br/>
              <?=$user[0]['description2']?>
             
           </div>
           
           
           <div class="clearfix"></div>
           
        </div>  
        
</section>
<?php include("include/footer.php"); ?>
