<?php
ob_start();
ini_set("display_errors",0);

$HOST_NAME                        = $_SERVER['SERVER_NAME'];
$DOCUMENT_ROOT                    = $_SERVER['DOCUMENT_ROOT'];
if($HOST_NAME == "localhost")
{

      
        $DB_HOST                        = "localhost";                  // Database Host Server
        $DB_USERNAME                    = "root";              // Database Username
        $DB_PASSWORD                    = "";              // Password for the Db User
        $DB_NAME                        = "living_temple";              // Database name
        
		
		define('BASE_URL', 'http://localhost/living-temple/');    // base url
}
else
{
  

	  $DB_HOST                        = "XpertProFresh";                  // Database Host Server
        $DB_USERNAME                    = "rcrsgiwt_livingt";              // Database Username
        $DB_PASSWORD                    = "ga8-oxX^lPWj";              // Password for the Db User
        $DB_NAME                        = "rcrsgiwt_livingtem";              // Database name
        
		
		define('BASE_URL', 'https://livingtempleacademy.ng/');   // base url
}

define("DB_HOST",$DB_HOST);
define("DB_USERNAME",$DB_USERNAME);
define("DB_NAME",$DB_NAME);
define("DB_PASSWORD",$DB_PASSWORD);
/* indian time */
date_default_timezone_set('Asia/Calcutta');

//define error massage
@session_start();
define("PASS_MATH",'<div class="alert fade in alert-danger" style="display: none;"> <i class="icon-remove close" data-dismiss="alert"></i> User Name or Password miss match. </div>');
define("INSRT_DATA_MASS_SUSS",'<div class="alert alert-success fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Success!</strong> Record inserted successfully</div>');
define("ERROR_FILE_TYPE_MASS_SUSS",'<div class="alert alert-success fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong></strong> Please upload the csv format only.</div>');
define("UPDATE_DATA_MASS_SUSS",'<div class="alert alert-success fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Success!</strong>  Record successfully updated</div>');
define("DELETE_DATA_MASS_SUSS",'<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button> Record successfully deleted</div>');
define("ALLRADY_EXIT_DATA",'<div class="notibar msgerror"><a class="close"></a><p>Catagory name alrady exits</p></div>');

define("SENT_FROM",'amit.deliciousweb@gmail.com');
define("SENT_TO",'amit.deliciousweb@gmail.com');
define("CURRENCY",'Rs.');


// Site Credentials 
define("Sitename",'Living Temple Academy');
define("Logo",'../products/logo.png');




?>