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
<?php include("include/stylesheet.php"); ?>
</head>
<body>
    <?php include("include/menu.php"); ?>

 <section class="sliderinner" style="background:url(images/slider1.jpg) no-repeat center center; background-size:cover;">
     <h2>Attendance</h2>
     <ul>
      <li><a href="index.html"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Attendance</a></li>
    </ul>
         
</section>

<section class="abt-section admission-pg academics-pg attendance-pg">
          
        
        <div class="about-content">
        
          <div class="col-md-4 col-sm-6 adm-img">
                <figure>
                <img src="images/attendence.jpg" class="img-responsive"> 
                </figure>
           </div>
        
           <div class="col-md-8 col-sm-6 admission-content">
               
              
            
              <p>The school is under strict obligation to carry out disciplinary measures in relation to an absence of our students from school without prior information or unavoidable reasons. </p>
              <p>Therefore we do not allow our children or pupils to take “any” time off during school sessions. We have 13 weeks of school closure time throughout the year and this is the time of which holidays must be taken by all our students.</p> 
<p>
Any absences from school during school sessions will be rigorously followed up by our attendance officer and also home visits will be made. </p>
<p>
When booking routine medical appointments every effort must be made to book appointments out of school hours. However evidence will be required in advance of an appointment or visits to any hospital made during school hours.

</p>

<p>The welfare of our students is of paramount at Living Temple Academy</p>

             
             
             
             
           </div>
           
           
           
           <div class="clearfix"></div>
           
           
           
           
           
        </div>
        
</section>
<?php include("include/footer.php"); ?>