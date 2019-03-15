<?php
include 'setting.php';
$objComm->authenticate($_COOKIE['username']);
?>

<header class="header navbar navbar-fixed-top" role="banner"> 
<div class="container"> 
<ul class="nav navbar-nav"> 
<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li> </ul>

<a class="navbar-brand" href="welcome.php"> <img src="<?=Logo?>" alt="logo" style="height:40px"/></a> 
<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation"> <i class="icon-reorder"></i> </a> 

<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm"> <li> <a href="welcome.php"> Dashboard </a> </li>  </ul> 

<ul class="nav navbar-nav navbar-right"> 
			<li class="dropdown user"> 
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-male"></i> <span class="username"><?=$_COOKIE['username']?></span>
					<i class="icon-caret-down small"></i> </a> 
							<ul class="dropdown-menu"> 
								<li class="divider"></li> 
								<li><a href="logout.php">
									<i class="icon-key"></i> Log Out</a>
								</li> 
							</ul> 
			
			</li> 
</ul>


 </div>  </header> 
 
  