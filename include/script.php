<?php
        $where4 = "menu1='4'";
        $where8 = "menu1='8'";
        $where1 = "id ='1'";
        $where2 = "id ='2'";
        $where3 = "id ='2'";
		$whera = "menu1='6'";
		$whern = "menu1='5'";
		$wherass = "id ='5'";
		$wher3 = "menu1='3'";
		$wher2 = "menu1='2'";
		$wher22 = "menu1='2' and status ='Active'";
		$wher9 = "menu1='9'";
		
		
        $whereWorship = "menu1 ='3' and menu2='6'";
        $whereWorship2 = "menu1 ='3' and menu2='7'";
		// Slider
               $wheres = "status ='Active'";	
               $wheresf = "id!=''";	
               $wheresd = "status ='Active' order by id DESC ";	
		
		
			//Home
		 $info=$objComm->findRecord('tbl_social',$where1);
		 //$menu=$objComm->findRecord('tbl_menu1',$wheres);
		 
		 $about_home =$objComm->findRecord('tbl_home',$where1);
		 
		 
		  // About Us Page
          
			$address_home =$objComm->findRecord('tbl_donate',$where1);
		
		 // About Us Page
          
			$about_us =$objComm->findRecord('tbl_page',$where1);
		 
		 
		// Living Temple Nursery
          
			$nursery =$objComm->findRecord('tbl_page',$where1);
			
		
			
		// award banner
          
			$award =$objComm->findRecord('tbl_award',$wheres);
			
	
			 // Staff banner
          
			$staff=$objComm->findRecord('tbl_staff',$wheres);
	 
		
		
		 // Home page banner
          
			$slider=$objComm->findRecord('tbl_home_slider',$wheres);
			
		 
			
			$events=$objComm->findRecord('tbl_event',$wheres);
			
			 // Gallery  Page
			
			 
			 $gallcat=$objComm->findRecord('tbl_gcategory',$wheres);
			 
			 
		 
		
		?>