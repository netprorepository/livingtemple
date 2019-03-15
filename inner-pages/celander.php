<?php
	  $where1 = "url ='".$_GET['tid']."'";
      $general=$objComm->findRecord('tbl_menu2',$where1);
?>

<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$general[0]['title']?></title>
<meta name="description" content="<?=$general[0]['description']?>">
<meta name="keywords" content="<?=$general[0]['keyword']?>"/>
<link href="<?=BASE_URL?>css/owl.transitions.css" rel="stylesheet"/>
<link href="<?=BASE_URL?>css/fullcalendar.min.css" rel="stylesheet" />
<link href="<?=BASE_URL?>css/fullcalendar.print.min.css" rel="stylesheet" media='print'/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include("include/stylesheet.php"); ?>
</head>
<body>
    <?php include("include/menu.php"); ?>
	
 <section class="sliderinner" style="background:url(<?=BASE_URL?>images/slider1.jpg) no-repeat center center; background-size:cover;">
     <h2>Calendar</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Calendar</a></li>
    </ul>
         
</section>

<section class="celander-pg ">
<?php include('include/calendra.php')?>
          <div id="calendar"></div>
        
</section>

<section class="copy">
   <div class="col-md-6">
      <ul>
         <li><a href="<?=BASE_URL?>">Home</a></li>
      <li><a href="<?=BASE_URL?>our-school/">Our School</a></li>
      <li><a href="<?=BASE_URL?>admission/">Admission</a></li>
      <li><a href="<?=BASE_URL?>academics/">Academics</a></li>
      <li><a href="<?=BASE_URL?>news-and-event/">News & Event</a></li>
      <li><a href="<?=BASE_URL?>contact/">Contact</a></li>
      <li><a href="<?=BASE_URL?>apply-now/">Apply Now</a> </li>          

      </ul>
   </div>
   
   <div class="col-md-2 text-center"><a href="http://netpro.com.ng/" target="_blank">Designed by NetPro</a></div>
   
   <div class="col-md-4">
        <?=$info[0]['copyright']?>
   </div>
   
   
   <div class="clearfix"></div>
   
</section>

<div class="resnav">
     <a id="nav-toggle" href="#">
     <span ></span></a>
</div>
  
    
    <div class="nav-fix">
    
    <div class="col-xs-2">
        <a href="<?=BASE_URL?>"><img src="<?=BASE_URL?>products/<?=$info[0]['image']?>"/></a>
    </div>
    
    <div class="col-xs-10 navigation">
    <ul>
     <li <?php if($_GET['fid']== $menu1['url']) { echo "class='navact'";}?> ><a href="<?=BASE_URL?>">Home </a></li>
	  <?php
				  $myd =mysql_query("select * from tbl_menu1 where id!='1' and  status='Active' limit 6") or die("Error in .".mysql_error());
						$url="";
							while($menu1=mysql_fetch_array($myd))
						   {
									$mydd=mysql_query("select * from tbl_menu2 where menu_id='".$menu1['id']."' and  status='Active'") or die("Error in .".mysql_error());
								$sub="";
								//$link1=BASE_URL.$menu1['url'].'/';
								$link1='#';
								if(mysql_num_rows($mydd)>0)
								{
								
									$sub="<i class='fas fa-sort-down'></i>";
									$link1=BASE_URL.$menu1['url'].'/';
								}
								else{
									$link1= BASE_URL.$menu1['url'].'/';
							
									
								}
								
							?>
							
							<li <?php if($_GET['fid']== $menu1['url']) { echo "class='navact'";}?>>
				  
				  <a href="<?=$link1?>"><?=$menu1['name']?></a><?=$sub?>
           <?php
						if(mysql_num_rows($mydd)>0)
							{
							?>
							
            
      
        <ul class="sub-cat">
		<?php
								while($menu2=mysql_fetch_array($mydd))
								{
								?>
									<li <?php if($_GET['sid']== $menu2['url']) { echo "class='act'";}?>><a href="<?=BASE_URL?>category/<?=$menu1['url']?>/<?=$menu2['url']?>/"><?=$menu2['name']?></a></li>
								<?php } ?>
					</ul>
          
       <?php } ?>
      </li>
	 <?php } ?>
    </ul>
  </div>
            </div>
    <?php 
$data="";	
$data ="<p class='caldata'></p>";
?>
<div class="popUp">
<div class="kill"><i class="fas fa-close"></i></div>
</div>  
    
</body>
  
<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="<?=BASE_URL?>js/wow.min.js"></script>
<script src="<?=BASE_URL?>js/jquery.magnific-popup.min.js"></script> 
<script src="<?=BASE_URL?>assets/js/owl.carousel.js"></script>

<script src="<?=BASE_URL?>js/moment.min.js"></script>
<script src="<?=BASE_URL?>js/fullcalendar.min.js"></script>
<script>
   $('.kill').on('click',function(){
	   $('.popUp').hide();
	   
	   $('.pop-holder').remove();
	   });
</script>
<script src="<?=BASE_URL?>js/js.js"></script>


   



</html>
