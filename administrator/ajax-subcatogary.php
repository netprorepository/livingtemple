<?php include('setting.php'); ?>
		
		  <option>--select--</option>
		  <?php
		  
		  $subcategory=$objComm->singleRowFetch('tbl_menu2','menu_id',$_POST['catid']);
		for($i=0;$i<count($subcategory);$i++){ ?>
		  <option value="<?=$subcategory[$i]['id']?>"><?=$subcategory[$i]['name']?></option>
		  <?php } ?>
		