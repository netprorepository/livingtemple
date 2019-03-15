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
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script>
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150)
                        .css('display','block');
                        
                       
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

<script>
 function readURLS(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blahs')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150).css('display','block');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
</head>

<body>
<?php include("include/menu.php"); ?>
  

 <section class="sliderinner" style="background:url(<?=BASE_URL?>images/slider1.jpg) no-repeat center center; background-size:cover;">
     <h2>Apply Now</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Apply Now</a></li>
    </ul>
         
</section>

<section class="abt-section apply-page">
          
        
        <div class="about-content form-holder">
             <div class>
            
             </div>
           <form id="apply-form" method="POST" action= "<?=BASE_URL?>ajax/apply.php" >
		   <ul>
                         <li class="col-md-7">
                           <h3>Please Fill and Complete 
 all Section Of <br>
this Form(Application fee of N6000.00 only applies)</h3>
                        


          
						</li>
                         <li class="col-md-5 date">
                             <span class="col-xs-7"> Passport upload:</span>
                             <span class="col-xs-4"> 
                             <input type="file" onchange="readURL(this);" name="passport" style="font-size:14px; margin-top:10px;">
                             <img id="blah" src="#" style="width:150px; height:150px;" alt"Preview"/>
                            
                         </li>
                         <div class="clearfix"></div>
                         
                         <div class="form-h">
                              Personal Details
                         </div>
                         
                         <li class="col-md-6">
						 <input type="text" class="form-control" name="surname" placeholder="Child's Surname*"/></li>
                        
						<li class="col-md-6">
						<input type="text" class="form-control" name="fname" placeholder="Child’s First Name* "/></li>
                        
						<li class="col-md-6">
						<input type="text"  class="form-control" name="mname" placeholder="Middle Name*"/></li>
                        <li class="col-md-6">
                         <select name="gender"> 
                             <option value="">Gender</option>
                             <option name="male" >Male</option>
                             <option name="female" >Female</option>
                         </select>
                        </li>
                         <li class="col-md-12">
						 <textarea class="form-control" name="address" placeholder="Address*"></textarea></li>
                         
                          <li class="col-md-6">
						  <input type="text" class="form-control" name="postcode" placeholder="Postcode"/></li>
                         
                          <li class="col-md-6">
                          <input type="text" class="form-control" id="datepicker" name="dob" placeholder=" Date of birth (mm / dd / yyyy) *" id="datepicker"/>
                          <i class="fa fa-calendar-alt"></i>
                          </li>
						  
						  <li class="col-md-12">
                           <input type="text" class="form-control" id="email" name="email" placeholder="Email*"></li>
                          
                          <li class="col-md-6">
						  <input type="text" class="form-control" name="fguardian" placeholder="Father's No./Guardian *"/></li>
                          
                          <li class="col-md-6">
                         <input type="text" class="form-control" name="mguardian" placeholder="Mother's No./Guardian *"/></li>
                          
                          <li class="col-md-6">
						  <input type="text" class="form-control" name="occupation" placeholder="Occupation *"/></li>
                          
                           <li class="col-md-6 class-check">
                              <div class="col-md-4">Birth Certificate</div>
                              <div class="col-md-8"> <input type="file" onchange="readURLS(this);" name="birthcert" /></div>
                              
                              <img id="blahs" src="#" alt="Preview Image" />
                          </li>
                           
                           <li class="col-md-6">
                              <select name="classs">
                             <option value="">Class</option>
                             <option value="Primary 1" >Primary 1 </option>
                             <option value="Primary 2">Primary 2 </option>
                             <option value="Primary 3">Primary 3 </option>
                             <option value="Primary 4">Primary 4 </option>
                             <option value="Primary 5">Primary 5 </option>
                             <option value="Primary 6">Primary 6 </option>
                             <option value="JSS 1">JSS 1</option>
                             <option value="JSS 2">JSS 2 </option>
                             <option value="JSS 3">JSS 3 </option>
                             <option value="SS 1">SS 1</option>
                             <option value="SS 2">SS 2 </option>
                             <option value="SS 3">SS 3 </option>
                             

                         </select>
                              
                            </li>
                           
                           <div class="clearfix"></div>
                           
                            <li class="col-md-12">
							<input type="text" class="form-control" name="ppsattended" placeholder="Previous Primary School Attended *"/></li>
                            
							
                               <li class="col-md-12">
							   <input type="text"  class="form-control" name="pspsattended" placeholder="Previous Secondary Primary School Attended (only for student on transfer) *"/></li>
                               
                               <li class="col-md-4">
							   <input type="text" class="form-control" name="cposition" placeholder="Child's Position in Family "/></li>
                               
                               <li class="col-md-4">
							   <input type="text" class="form-control" name="religion" placeholder="Religion *"/></li>
                               
                                <li class="col-md-4">
								<input type="text" class="form-control" name="language" placeholder="Home / Language *"/></li>
                          
                          <li class="col-md-6 class-check"> is the English Spoken as the first language at home: &nbsp; 
                             Yes <input type="radio" name="yes" value="Yes" />  No  <input type="radio" name="yes" value="No" />  
                          </li>
                          
                           <li class="col-md-6">
						   <input type="text" class="form-control" name="ethinicorigin" placeholder="Ethnic Origin *"/></li>
                           
                           
                           <div class="clearfix"></div>
                           
                            <div class="form-h">
                              Medical Information*
                         </div>
          
                      <div class="clearfix"></div>
                      
                       <li class="col-md-6">
                      
                       <select name="illness">
					  
                          <option value="">Does Your Child Suffer From Any illness...</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                       </select>
                       </li>
                       
                       <li class="col-md-6">
                           <input type="text" name="specify"  placeholder="Please Specify if Yes"/>
                       </li>
                       
                         <div class="clearfix"></div>
                           
                            <div class="form-h">
                              Parental Responsibility (Please select the appropriate box for your child )*
                         </div>
                         
                          <li class="col-md-12 frm-radio">
                             <div class="col-md-3 text-center">
                                  Mother <br/>  <input type="radio" name="mother" value="Mother">
                             </div>
                             <div class="col-md-3 text-center"> Mother & Father  <br/>  <input type="radio" name="mother" value="Mother & Father"></div> <div class="col-md-3 text-center"> Father  <br/>  <input type="radio" name="mother" value="Father" > </div>
                             
                            <div class="col-md-3 text-center"> 
                             Other  <br/><input type="radio" name="mother" value="Other"> 
                             </div>
                          </li>
                           <div class="clearfix"></div>
                          <li><span id="apply-error"></span></li>
                        
                          
                          
                          <li class="col-md-3 submit">
     <input type="submit" id="apply-submit" value="SAVE & PROCEED TO PAYMENT"/>
  </li> 
                         
                      </ul>
           
           		  <div class="clearfix"></div>
 	
		</form>
           
           
           
           
           <div class="clearfix"></div>
           
           
           
           
           
        </div>
        
</section>
<?php include("include/footer.php"); ?>  
<script>
$( "#datepicker" ).datepicker();
</script>


</html>
