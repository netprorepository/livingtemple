<?php 
//echo 'am called'; exit;
//error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);
// All Settings files include in setting.php and create common object here  
include('administrator/setting.php');
include('include/script.php');
//echo 'here'; exit;
// Getting  url through id using .htaccess 

//include('phpMalCodeScanner.php');
//$scan	=	new phpMalCodeScan();
$_GET['fid'];


if($_GET['fid']=='')
include('home.php');

elseif($_GET['fid']=='home')
include('home.php');

elseif($_GET['fid']=='about-us')
include('about-us.php');

elseif($_GET['fid']=='apply-now')
include('apply-now.php');

elseif($_GET['fid']=='news-and-event')
include('news-and-events.php');
elseif($_GET['fid']=='our-school')
include('our-school.php');

elseif($_GET['fid']=='admission')
include('admission.php');


elseif($_GET['fid']=='academics')
include('academics.php');

elseif($_GET['sid']=='our-staff')
include('our-staff.php');

elseif($_GET['sid']=='awards')
include('awards.php');

elseif($_GET['fid']=='category')
include('category.php');

elseif($_GET['fid']=='news')
include('news.php');


elseif($_GET['fid']=='contact')
include('contact-us.php');

elseif($_GET['fid']=='become-a-member')
include('become-a-member.php');

elseif($_GET['fid']=='executive-board')
include('executive-board.php');

elseif($_GET['fid']=='gallery')
include('gallery.php');

elseif($_GET['fid']=='fellowship')
include('fellowship.php');

/*elseif($_GET['fid']=='accessibility')
include('common-page.php');

elseif($_GET['fid']=='cookie-policy')
include('common-page.php');

elseif($_GET['fid']=='privacy-policy')
include('common-page.php');

elseif($_GET['fid']=='terms-of-service')
include('common-page.php');
*/

elseif($_GET['fid']=='admin')
header('Location:'.BASE_URL.'administrator/login.php');

elseif($_GET['fid']=='adminis')
header('Location:'.BASE_URL.'administrator/login.php');

elseif($_GET['fid']=='administrator')
header('Location:'.BASE_URL.'administrator/login.php');

elseif($_GET['fid']==BASE_URL)
include('home.php');
else
include('404.php');

?>
