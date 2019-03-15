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
     <h2>Contact Us</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg ">
          
        
        <div class="contact-page">

            <div class="col-md-6 col-sm-6">

                 

                  

                  <h2>Registered Office</h2>

                  <p><strong><?=$info[0]['address']?></strong></p>


             <p>Tel: <?=$info[0]['phone']?></p>
            <p>Email: <?=$info[0]['email']?></p>






             <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3971.5532514380375!2d7.004378314309239!3d5.4845063960228435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sPlot+191%2C+Area+A%2C+World+Bank%2C+Owerri%2C+Imo+State+Nigeria!5e0!3m2!1sen!2sin!4v1526717843342" width="100%" height="280" frameborder="0" style="border:0" allowfullscreen></iframe>     

            </div>

            <div class="col-md-6 col-sm-6 ctform">

               <h2>To get in touch, please fill out the form below</h2>

               <form name="contact-form" id="contact-form" action="<?=BASE_URL?>ajax/contact.php" method="POST">

               <ul id="ststicParent">

                  <li><input type="text"  name="fname" placeholder="Name"/></li>

                   <li><input type="email" name="email" placeholder="Email "/></li>

                   <li><input type="text" name="phone" id="child" placeholder="Phone "/></li>

                   <li><input type="text"  name="location" placeholder="Location"/></li>

                   <li><textarea name="message" placeholder="Your Message"></textarea></li>
 <li><span id="contact-error" class="text-center"></span></li>
                   <li><input type="submit" id="contact-submit" value="SUBMIT DETAILS"/></li>

               </ul>

               </form>

            </div>
            
            <div class="clearfix"></div>

            

           

        </div>
        
</section>






<?php include("include/footer.php"); ?>
