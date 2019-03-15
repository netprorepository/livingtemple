<header>
  <div class="topHeader">
    <div class="social-m">
      <ul>
        <li><a href="<?=$info[0]['facebook']?>"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="<?=$info[0]['instagram']?>"><i class="fab fa-instagram"></i></a></li>
        <li><a href="<?=$info[0]['skype']?>"><i class="fab fa-youtube"></i></a></li>
        <li><a  href="#" class="login">LOGIN</a></li>
      </ul>
    </div>
    <nav>
      <div class="col-md-2 logoWrap"> <a href="<?=BASE_URL?>"> <img src="<?=BASE_URL?>products/<?=$info[0]['image']?>" alt=""/></a> </div>
      <div class="col-md-10 navigation">
        <ul>
          <li <?php if($_GET['fid']== $menu1['url']) { echo "class='navact'";}?> ><a href="<?=BASE_URL?>">Home </a></li>
		  
		  <?php
				  $myd=mysql_query("select * from tbl_menu1 where id!='1' and  status='Active' limit 6") or die("Error in .".mysql_error());
						$url="";
							while($menu1=mysql_fetch_array($myd))
						   {
									$mydd=mysql_query("select * from tbl_menu2 where menu_id='".$menu1['id']."' and  status='Active'") or die("Error in .".mysql_error());
								$sub="";
								//$link1=BASE_URL.$menu1['url'].'/';
								$link1='#';
								if(mysql_num_rows($mydd)>0)
								{
								
									//$sub="<i class='fa fa-sort-desc'></i>";
									$link1=BASE_URL.$menu1['url'].'/';
								}
								else{
									$link1= BASE_URL.$menu1['url'].'/';
							
									
								}
								
							?>
							<li <?php if($_GET['fid']== $menu1['url']) { echo "class='navact'";}?>>
				  
				  <a href="<?=$link1?>"><?=$menu1['name']?></a>
           <?php
						if(mysql_num_rows($mydd)>0)
							{
							?>
							
            <ul>
			
			 <?php
								while($menu2=mysql_fetch_array($mydd))
								{
								?>
									<li <?php if($_GET['sid']== $menu2['url']) { echo "class='act'";}?>><a href="<?=BASE_URL?>category/<?=$menu1['url']?>/<?=$menu2['url']?>/"><?=$menu2['name']?></a></li>
								<?php			
								}
								?>
					</ul>
					  <?php
							}
							  		
						?>
						</li>
				  <?php
							}
					?>
					
                                                           

              </ul>
          
      </div>
    </nav>
    <div class="clearfix"></div>
  </div>
</header>