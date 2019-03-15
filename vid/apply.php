<?php
require_once('../administrator/setting.php');
require 'pay.php';
extract($_POST);
	
	      //if(strtolower($_FILES['passport']['type'])=='')
		//echo 'Please upload your passport';
		if($surname=='')
			echo 'Please enter your Surname';
		elseif($fname=='')
			echo 'Please enter your First Name';
		elseif($mname=='')
			echo 'Please enter your Middle Name';
        elseif($gender=='')
			echo 'Please select gender';                
	   elseif($address=='')
			echo 'Please enter a valid Address';
	   elseif($dob=='')
			echo 'Please enter your date of Birth';
	   elseif($email=='')
			echo 'Please enter a valid Email';
       elseif (!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $email)) 
			echo 'Invalid email';
	   elseif($fguardian=='')
			echo "Please enter Father's No. ";
	   elseif($mguardian=='')
			echo "Please enter mother's No. ";
	   elseif($occupation=='')
			echo 'Please enter your occupation';
		elseif($classs=='')
			echo 'Please Select your Class';	
			
	   elseif($ppsattended=='')
			echo 'Please enter your Previous Primary School Attended ';
	   elseif($pspsattended=='')
			echo 'Please enter your Previous Secondary Primary School Attended (only for student on transfer ';
	   //elseif($cposition=='')
		//	echo "Please enter your Position in Family";
	   elseif($religion=='')
			echo 'Please enter your religion';
			
	   elseif($language=='')
			echo 'Please enter your Language';
	 elseif(!isset($yes))
			echo 'Is the English Spoken as the first language at home?';
			
	   elseif($ethinicorigin=='')
			echo 'Please enter your Ethinic origin';
			
			  elseif($illness=='')
			echo 'Does your Child Suffer From Any illness';
		// elseif($illness=='Yes')
		//	echo 'Please Specify if Yes';
		 elseif(!isset($mother))
			echo 'Please Check Parental Responsibility';
			
		  else {			
			   $date=date("d/m/Y");
			   $status='Active';
			  // data insertion
				$ref = payment::uniqidReal();
				
				$fields=array('surname', 'fname', 'mname', 'address', 'dob', 'email', 'fguardian', 'mguardian', 'occupation', 'ppsattended', 'pspsattended', 'cposition', 'religion', 'language', 'ethinicorigin', 'passport', 'date', 'birthcert', 'classs', 'illness');
				$data=array(mysql_real_escape_string($surname), mysql_real_escape_string($fname), mysql_real_escape_string($mname), mysql_real_escape_string($address), mysql_real_escape_string($dob), $email, mysql_real_escape_string($fguardian), mysql_real_escape_string($mguardian), mysql_real_escape_string($occupation), mysql_real_escape_string($ppsattended), mysql_real_escape_string($pspsattended), mysql_real_escape_string($cposition), mysql_real_escape_string($religion), mysql_real_escape_string($language), mysql_real_escape_string($ethinicorigin), $objComm->uploadfile($_FILES["passport"]["name"],$_FILES["passport"]["tmp_name"]), $date, $objComm->uploadfile($_FILES["birthcert"]["name"],$_FILES["birthcert"]["tmp_name"]), mysql_real_escape_string($classs), mysql_real_escape_string($illness));
				$lastid=$objComm->insertWithLastid($fields,$data,'tbl_application');
				$transaction_fields = array('amount','gateway_response', 'reference', 'status', 'applicant_id');
				$transaction_data = array('6000','initialised',$ref, 'initialised',$lastid);
				$objComm->insertWithLastid($transaction_fields,$transaction_data,'tbl_transaction');
				//exit;
				
                   $where="id='$lastid'";
                     $result=$objComm->findRecord('tbl_application',$where);				

				 $to="info@livingtemple.net";
				 
				 $content ="Hello "."Admin".": \n<br>".
				"File :" .$passport." \n<br>".
				"Surname :" .$surname." \n<br>".
				"Fname :" .$fname." \n<br>".
				"Mname :" .$mname." \n<br>".
				"Gender" .$gender." \n<br>".
				"Address :" .$address." \n<br>".
				"Date-Of-Birth :" .$dob." \n<br>".
				"E-Mail :" .$email." \n<br>".
				"Fguardian :" .$fguardian." \n<br>".
				"Mguardian :" .$mguardian." \n<br>".
				"Occupation:" .$occupation." \n<br>".
				"Previous Primary School Attended:" .$ppsattended." \n<br>".
				"Previous Secondary Primary School Attended (only for student on transfer) :" .$pspsattended." \n<br>".
				"Child-Position :" .$cposition." \n<br>".
				"Child-religion :" .$religion." \n<br>".
				"Child-language :" .$language." \n<br>".
				"Child-ethinicorigin :" .$ethinicorigin." \n<br>".
				"Class :" .$classs." \n<br>".
				"Does Your Child Suffer From Any illness... :" .$illness." \n<br>".
				"Please Specify if Yes" .$specify." \n<br>".
				"is the English Spoken as the first language at home:" .$yes." \n<br>".
				"Parental Responsibility (Please select the appropriate box for your child )" .$mother." \n<br>".
				"Download Passport : <a href='http://dwdemo.net/living-temple-academy/php/products/".$result[0]['passport']."'  style='width:90px;'>Download Passport</a>\n<br>".
				"Download Birth Certificate : <a href='http://dwdemo.net/living-temple-academy/php/products/".$result[0]['birthcert']."'  style='width:90px;'>Birth Certificate Download</a>\n<br>".
				
				
				
				"Apply Now ,\n<br>";
				$subject = "Apply Now";
				
				$sent_to= "info@livingtempleacademy.ng";

				$sent_from= "info@livingtempleacademy.ng";

                	
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'From:'.'<'.$sent_from.'>' . "\r\n";
			        $headers .= 'Reply-To:'.'<'.$sent_from.'>' . "\r\n";
			        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
			
	                mail($sent_to,$subject,$content,$headers);
	        	    mail($to,$subject,$content,$headers);
					//go to paystack for payment
					payment::gotopaystack($lastid, $email, $phone, $surname, $lastname, $ref, '600000');
					
					
					echo 'Thanks for writing us.';		
							
						
	        }		
		
		
?>