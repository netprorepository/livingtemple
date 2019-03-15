<?php
include('administrator/setting.php');
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
<?php include("include/menu.php"); $objComm->editorjs(); ?>
            <br/><br/>
			 <section class="sliderinner" style="background:url(<?=BASE_URL?>images/slider1.jpg) no-repeat center center; background-size:cover;">
     <h2>Apply Now</h2>
     <ul>
      <li><a href="<?=BASE_URL?>"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Apply Now</a></li>
    </ul>
         
</section>
			

<?php   
//require_once('../administrator/setting.php');
  $ref = $_GET['ref'];

 $curl = curl_init();
                curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
              "accept: application/json",
              "authorization: Bearer sk_live_88029f30049b59689d5fcfd828c6c4d17e52ac2f",
              "cache-control: no-cache"
            ],
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          if($err){
                  // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
          }

          $tranx = json_decode($response);
       
          if(!$tranx->status){
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
          }
           //print_r($tranx->data->metadata->personal_id); exit; 
		   //update transaction and send email	   
				
				$gresponse = $tranx->data->status;
                $update_arr=array(								
			'reference'=>mysql_real_escape_string($tranx->data->reference),
			'status'=>mysql_real_escape_string($tranx->data->status),
			'gateway_response'=>mysql_real_escape_string($tranx->data->status),
			);
			//$where= ' where applicant_id =' ."'$tranx->data->metadata->applicant_id'";
                        $where=' where applicant_id="'.$tranx->data->metadata->personal_id.'"';
			$objComm->db_update_recordm('tbl_transaction',$update_arr,$where); 	
			
				
												
												
												//send a congratulatory email
								
                                $message = '<html><body>';
                                $message .= '<div style="text-align: center;">'; 

                                $message .= '<p style="font-weight: bold;">Living Temple Academy</p>';
                                $message .= '<h1 style="font-weight: bold;">Dear '.$tranx->data->metadata->fname.' '. $tranx->data->metadata->lname.'</h1>';
                                $message .= '<br>';
                                $message .= '<p>';
                                $message .= 'Your Application to Living Temple Academy and corresponding payment has been recieved';
                                

                                $message .= '<br>';
                                $message .= '<p style="font-weight: bold;">';
                                $message .= 'Thank You';
                                $message .= '<br>';
                                $message .= 'Team Living Temple Academy';
                                $message .= '</p>';

                                $message .= '</div>';
                                $message .= '</body></html>';
                                                
                                // Always set content-type when sending HTML email
                                $subject = "Application Into Living Temple Academy";
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                // More headers
                                $headers .= 'From: <info@livingtempleacademy.ng>' . "\r\n";
                                $headers .= 'Cc: accounts@livingtempleacademy.ng' . "\r\n";
								$headers .= 'Cc: chukwudi@netpro.com.ng' . "\r\n";
								//$headers .= 'Cc: vincent@netpro.com.ng' . "\r\n";
                                mail($email,$subject,$message,$headers);
                                //close mail
												
												
				echo '  <div class="alert alert-success" role="alert">
                                                Your payment was successful and your application completed. Please check your email for further instructions
                                                </div>
                                            ';

?>


      
</section>
<?php include("include/footer.php"); ?>  


</html>
