<?php    
require_once('../administrator/setting.php');
class payment{
		

//function that generates a unique id for each transaction

    public static function uniqidReal($lenght = 13) {
      // uniqid gives 13 chars, but you could adjust it to your needs.
      if (function_exists("random_bytes")) {
          $bytes = random_bytes(ceil($lenght / 2));
      } elseif (function_exists("openssl_random_pseudo_bytes")) {
          $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
      } else {
          throw new Exception("no cryptographically secure random function available");
      }
      return substr(bin2hex($bytes), 0, $lenght);
  }
  

      public static function gotopaystack($applicant_id,$email,$phone,$fname, $lname, $ref){
	//generate a reference
	//echo $ref; exit;
	 $baseurl = "www.livingtempleacademy.ng";
	 $amount = 500000;
         $transaction_charge = 100000;
	
	 $reference = $ref;
	
            $subacc = 'ACCT_dpkhb8dpeebklyi'; // sub-account code, you get this when you set up a split account.
            $cancel_url = $baseurl.'cancel/'.$ref.'/';
			
            //initialize transaction
								
								//arrange and go to paystack
 
            $extCharge = 0; // extra charge if amount is greater than 2500
            $fixedCharge = 0; // fixed charge by paystack 1.5 % of $amount
            $postAmount = 0; // final amount to send to paystack
            $percentageCharge = 1.538129; // percentage charge by paystack for every transaction (1.5223 %)|(2.0223%)1.538129
            //$transaction_charge = 20000;

            $fixedCharge = ($percentageCharge/100) * $amount;

            // transaction charge must be capped at 2000
            // so we check to make sure charge doent exceed this value
            if($fixedCharge > 2000){
                //$imp_charge = (0.5/100) * $amount;
                //$fixedCharge = 2000 + $imp_charge;
                $fixedCharge = 2000;
            }

            // for transaction amount greater than 2500 a fee of NGN 100 is added
            // so we check the amount to ensure this is enforced
            if($amount > 2500){
                $extCharge = 100;
            }

            // Amount to finally post to the payment gateway
            $postAmount = $amount + $fixedCharge + $extCharge+ $transaction_charge;
            //echo $postAmount;exit;
           // $postAmount = $postAmount * 100;
             
             
            /**************************************/
/*initialize transaction*/
/*************************************/
             $curl = curl_init();
              curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => json_encode([
                'callback_url'=>'https://livingtempleacademy.ng/paymentverification.php?ref='.$ref,
                'amount'=> $postAmount,
                'email'=>$email,
                'first_name'=>$fname,
                'last_name'=>$lname,
                'reference'=>$ref,
                'subaccount'=> $subacc,
                'transaction_charge'=>$transaction_charge,
                'bearer'=>$subacc,
                'metadata'=>json_encode([
                  'cancel_action'=>$cancel_url,
                  'personal_id'=>$applicant_id,
                  'lname'=>$lname,
                  'fname'=>$fname,
                  'email'=> $email,
                  'phone'=>$phone,
				  //'course_applied'=>$course_applied,
                ]),
              ]),
              CURLOPT_HTTPHEADER => [
                "authorization: Bearer sk_live_88029f30049b59689d5fcfd828c6c4d17e52ac2f",
                "content-type: application/json",
                "cache-control: no-cache"
              ],
            ));


            $response = curl_exec($curl);
            $err = curl_error($curl);
           // debug(json_encode( $response, JSON_PRETTY_PRINT));exit;
           print_r($err);
            
            if($err){
              // there was an error contacting the Paystack API
              die('Curl returned error: ' . $err);
            }

            $tranx = json_decode($response);
          
            if(!$tranx->status){
              // there was an error from the API
              die('API returned error: ' . $tranx->message);
            }

            // store transaction reference so we can query in case user never comes back
            // perhaps due to network issue
            //save_last_transaction_reference($tranx->data->reference);
			$update_arr=array(								
			
			'reference'=>$tranx->data->reference,
			);
			$where= 'where applicant_id =' .$applicant_id;
			//$objComm->db_update_recordm('tbl_transaction',$update_arr,$where); 	

            // redirect to page so User can pay
            //debug($tranx); exit; 
            header('Location: ' . $tranx->data->authorization_url);
            
          
         
           }
        
    


}










?>