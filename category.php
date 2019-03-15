<?php


if($_GET['sid']=='our-school')
		{
			if($_GET['tid']=='living-temple-nursery')
				{
				include('inner-pages/living-temple-nursery.php');
				}
				elseif($_GET['tid']=='living-temple-primary')
				{
				include('inner-pages/living-temple-primary.php');
				}
				elseif($_GET['tid']=='living-temple-secondary')
				{
				include('inner-pages/living-temple-secondary.php');
				}
				
					
		
		}
elseif($_GET['sid']=='academics')
		{
				if($_GET['tid']=='our-staff')
				{
				include('inner-pages/our-staff.php');
				}
				elseif($_GET['tid']=='awards')
				{
				include('inner-pages/awards.php');
				}
				
		}	

		
elseif($_GET['sid']=='news-and-event')
		{
				if($_GET['tid']=='calender')
				{
				include('inner-pages/celander.php');
				}
				elseif($_GET['tid']=='attendance')
				{
				include('inner-pages/attendance.php');
				}
				
					
					
		}	
		