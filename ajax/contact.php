<?php
require_once('../administrator/setting.php');
extract($_POST);
	
	       if($fname=='')
			echo 'Please enter your Name';
			elseif($phone=='')
			echo 'Please Enter your Phone Number';
			elseif($email=='')
			echo 'Please enter a valid Email';
			elseif (!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $email)) 
			echo 'Invalid email';
			elseif($location=='')
			echo 'Please Enter your location';
			elseif($message=='')
		    echo 'Please Enter Your Message';
			
		
       else {			
			   $date=date("d/m/Y");
			   $status='Active';
			  // data insertion
				$name=$fname;
				
				$fields=array('name','email','phone','description','date','status');
				$data=array(mysql_real_escape_string($name),$email,$phone,mysql_real_escape_string($message),$date,$status);
				$lastid=$objComm->insertWithLastid($fields,$data,'tbl_query');	

				 $to="amit.deliciousweb@gmail.com";
				 
				 $content ="Hello "."Admin".": \n<br>".
				"Name :" .$name." \n<br>".
				"E-Mail :" .$email." \n<br>".
				"Phone :" .$phone." \n<br>".
				"Location :" .$location." \n<br>".
				"Message :" .$message." \n<br>".

				"Above Person want to Contact You,\n<br>";
				$subject = "Contact Inquiry";
				
				
				$sent_to= "info@livingtempleacademy.ng";

				$sent_from= "info@livingtempleacademy.ng";

                	
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'From:'.'<'.$sent_from.'>' . "\r\n";
			        $headers .= 'Reply-To:'.'<'.$sent_from.'>' . "\r\n";
			        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
			
	                mail($sent_to,$subject,$content,$headers);
	        	    mail($to,$subject,$content,$headers);
					
					echo 'Thanks for writing us.';		
							
						
	        }		
		
			
	

?>