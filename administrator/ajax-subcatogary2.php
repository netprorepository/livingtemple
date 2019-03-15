<?php include('setting.php'); ?>
		
		  <?php
		  
		  $subcategory=$objComm->singleRowFetch('tbl_menu3','menu2_id',$_POST['catid']);
		  ?>
		  <option>--select--</option>
		  <?php
		  for($i=0;$i<count($subcategory);$i++){ ?>
		  <option value="<?=$subcategory[$i]['id']?>"><?=$subcategory[$i]['name']?></option>
		  <?php } ?>
		