
<!DOCTYPE html>
 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Administrator</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php' ?>  
 
 <div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb"> <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li> </ul> 
       
       
        </div> 
<?php include 'include/leftMenu.php' ?> 
      
        
         <div class="row"> 
         <div class="col-md-12"> 
       
         <h4><?=Sitename?>  </h4> 
             Welcome . <?=$_COOKIE['username']?>
        </div> </div>    
        
        
        
          </div> </div> </div> </body> </html>