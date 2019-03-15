 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/><![endif]--> 
 <link href="css/main.css" rel="stylesheet" type="text/css"/> 
 <link href="css/plugins.css" rel="stylesheet" type="text/css"/>
 <link href="css/responsive.css" rel="stylesheet" type="text/css"/> 
 <link href="css/icons.css" rel="stylesheet" type="text/css"/> 
 <link rel="stylesheet" href="css/font-awesome.min.css">
  <!--[if IE 7]><link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css"><![endif]--> <!--[if IE 8]><link href="assets/css/ie8.css" rel="stylesheet" type="text/css"/><![endif]--> 
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui-1.10.2.custom.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/lodash.compat.min.js"></script> 
<!--[if lt IE 9]><script src="assets/js/libs/html5shiv.js"></script><![endif]--> 
<script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script> 
<script type="text/javascript" src="js/jquery.event.move.js"></script> 
<script type="text/javascript" src="js/jquery.event.swipe.js"></script> 
<script type="text/javascript" src="js/breakpoints.js"></script> 
<script type="text/javascript" src="js/respond.min.js"></script> 
<script type="text/javascript" src="js/jquery.cookie.min.js"></script> 
<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script> 
<script type="text/javascript" src="js/jquery.slimscroll.horizontal.min.js"></script> 
<script type="text/javascript" src="js/jquery.sparkline.min.js"></script> 
<script type="text/javascript" src="js/moment.min.js"></script> 
<script type="text/javascript" src="js/daterangepicker.js"></script> 
<script type="text/javascript" src="js/jquery.blockUI.min.js"></script> 
<script type="text/javascript" src="js/jquery.uniform.min.js"></script> 
<script type="text/javascript" src="js/select2.min.js"></script> 
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="js/tabletools/TableTools.min.js"></script> 
<script type="text/javascript" src="js/ColVis.min.js"></script> 
<script type="text/javascript" src="js/jquery.dataTables.columnFilter.js"></script> 
<script type="text/javascript" src="js/DT_bootstrap.js"></script> 
<script type="text/javascript" src="js/app.js"></script> 
<script type="text/javascript" src="js/plugins.js"></script> 
<script type="text/javascript" src="js/plugins.form-components.js"></script> 
<script>$(document).ready(function(){App.init();Plugins.init()});</script>
<script type="text/javascript" src="js/custom.js"></script> 
<script type="text/javascript" src="js/dataTables.min.js"></script> 
<script>
function deletedata(table,colname,id)
{
if(confirm(table,colname,id))
{
document.getElementById("tr"+id).style.display = "none";

if (table=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","include/delete.php?table="+table+"&idcolom="+colname+"&id="+id,true);
  xmlhttp.send();  
}
else{
return false;
}
}

</script>