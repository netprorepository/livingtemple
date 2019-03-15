<?php
include('administrator/setting.php');
include('config.php');

$type = $_POST['type'];
if($type == 'new'){
	$startdate = $_POST['startdate'].'+'.$_POST['zone'];
	$title = $_POST['title'];
	$insert = mysqli_query($con,"INSERT INTO calendar(`title`, `startdate`, `enddate`, `allDay`) VALUES('$title','$startdate','$startdate','false')");
	$lastid = mysqli_insert_id($con);
	echo json_encode(array('status'=>'success','eventid'=>$lastid));
}

if($type == 'changetitle')
{
	$eventid = $_POST['eventid'];
	$title = $_POST['title'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}



if($type == 'detail')
{	
	$res="";
	$eventid = $_POST['eventid'];
	$fet = mysqli_query($con,"select * from calendar where  id='$eventid'");
	$row=mysqli_fetch_row($fet);
	$res .="<div class='pop-holder'><h2>".$row[1]."</h2></br>";		
	
	if(strstr($row[5], '.'))		
	{
	$res .=$row[6];
	$res .="<img src='".BASE_URL."products/".$row[5]."' style='margin-top:40px; margin-bottom:20px;' class='img-responsive'><br></div>";	
	}
	//if($row)
		echo $res;
	//else
		///echo json_encode(array('status'=>'failed'));
}



if($type == 'resetdate')
{
	$title = $_POST['title'];
	$startdate = $_POST['start'];
	$enddate = $_POST['end'];
	$eventid = $_POST['eventid'];
	$update = mysqli_query($con,"UPDATE calendar SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");
	if($update)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'remove')
{
	$eventid = $_POST['eventid'];
	$delete = mysqli_query($con,"DELETE FROM calendar where id='$eventid'");
	
	if($delete)
		echo json_encode(array('status'=>'success'));
	else
		echo json_encode(array('status'=>'failed'));
}

if($type == 'fetch')
{	$events = array();	 $current_date=date('Y-m-d');
	$query = mysqli_query($con, "SELECT * FROM calendar where status='Active'");
	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{			
		if($fetch['callagain']=='Monthly')	
			{					
				$cd=explode('T',$fetch['startdate']);			
				$date1=date_create($cd[0]);	
				$start_date= date_format($date1,"Y-m-d");
				$ed=explode('T',$fetch['enddate']);				
				$date2=date_create($ed[0]);	
				$enddate= date_format($date2,"Y-m-d");		
				/* Start Time for monthly repatation */
				$start_dat[1]=date ("Y-m-d", strtotime("+0 month", strtotime($start_date)));
				$start_dat[2]=date ("Y-m-d", strtotime("+1 month", strtotime($start_date)));
				$start_dat[3]=date ("Y-m-d", strtotime("+2 month", strtotime($start_date)));
				
				/* End Time for monthly repatation */
				$end_dat[1]=	date ("Y-m-d", strtotime("+0 month", strtotime($enddate)));	
				$end_dat[2]=	date ("Y-m-d", strtotime("+1 month", strtotime($enddate)));	
				$end_dat[3]=	date ("Y-m-d", strtotime("+2 month", strtotime($enddate)));	
				
				
				for($i=1;$i<4;$i++)		
					{			
						$fg=$start_date.$i;			 
						$eg=$start_date.$i;			
						$sd=$start_dat[$i].'T00:00:00+05:30';				
						$ed=$end_dat[$i].'T00:00:00+05:30';			
						 if(date('N', strtotime($start_dat[$i])) == 7)
							 {		}		
						 else		
						 {
							 $e = array();
							 $e['id'] = $fetch['id'];
							 $e['title'] = $fetch['title'];
							 $e['start'] = $sd;
							 $e['end'] = $ed;		
							 $allday = ($fetch['allDay'] == "true") ? true : false;	
							 $e['allDay'] = $allday;			
							 array_push($events, $e);
						}	
					}	
				
				}
			/* For weekly repeatation event */
			
			elseif($fetch['callagain']=='Weekly')	
			{					
				$cd=explode('T',$fetch['startdate']);			
				$date1=date_create($cd[0]);	
				$start_date= date_format($date1,"Y-m-d");
				$ed=explode('T',$fetch['enddate']);				
				$date2=date_create($ed[0]);	
				$enddate= date_format($date2,"Y-m-d");		
				/* Start Time for monthly repatation */
				$start_dat[1]=date ("Y-m-d", strtotime("+0 day", strtotime($start_date)));
				$start_dat[2]=date ("Y-m-d", strtotime("+7 day", strtotime($start_date)));
				$start_dat[3]=date ("Y-m-d", strtotime("+14 day", strtotime($start_date)));
				$start_dat[4]=date ("Y-m-d", strtotime("+21 day", strtotime($start_date)));
				$start_dat[5]=date ("Y-m-d", strtotime("+28 day", strtotime($start_date)));
				$start_dat[6]=date ("Y-m-d", strtotime("+35 day", strtotime($start_date)));
				$start_dat[7]=date ("Y-m-d", strtotime("+42 day", strtotime($start_date)));
				$start_dat[8]=date ("Y-m-d", strtotime("+49 day", strtotime($start_date)));
				$start_dat[9]=date ("Y-m-d", strtotime("+56 day", strtotime($start_date)));
				$start_dat[10]=date ("Y-m-d", strtotime("+63 day", strtotime($start_date)));
				
				/* End Time for dayly repatation */
				$end_dat[1]=	date ("Y-m-d", strtotime("+0 day", strtotime($enddate)));	
				$end_dat[2]=	date ("Y-m-d", strtotime("+7 day", strtotime($enddate)));	
				$end_dat[3]=	date ("Y-m-d", strtotime("+14 day", strtotime($enddate)));	
				$end_dat[4]=	date ("Y-m-d", strtotime("+21 day", strtotime($enddate)));	
				$end_dat[5]=	date ("Y-m-d", strtotime("+28 day", strtotime($enddate)));	
				$end_dat[6]=	date ("Y-m-d", strtotime("+35 day", strtotime($enddate)));	
				$end_dat[7]=	date ("Y-m-d", strtotime("+42 day", strtotime($enddate)));	
				$end_dat[8]=	date ("Y-m-d", strtotime("+49 day", strtotime($enddate)));	
				$end_dat[9]=	date ("Y-m-d", strtotime("+56 day", strtotime($enddate)));	
				$end_dat[10]=	date ("Y-m-d", strtotime("+63 day", strtotime($enddate)));	
				
				
				for($i=1;$i<11;$i++)		
					{			
						$fg=$start_date.$i;			 
						$eg=$start_date.$i;			
						$sd=$start_dat[$i].'T00:00:00+05:30';				
						$ed=$end_dat[$i].'T00:00:00+05:30';			
						 if(date('N', strtotime($start_dat[$i])) == 7)
							 {		}		
						 else		
						 {
							 $e = array();
							 $e['id'] = $fetch['id'];
							 $e['title'] = $fetch['title'];
							 $e['start'] = $sd;
							 $e['end'] = $ed;		
							 $allday = ($fetch['allDay'] == "true") ? true : false;	
							 $e['allDay'] = $allday;			
							 array_push($events, $e);
						}	
					}	
				
				}

				
				else
					{	
						$e = array();
						$e['id'] = $fetch['id'];
						$e['title'] = $fetch['title'];
						$e['start'] = $fetch['startdate'];
						$e['end'] = $fetch['enddate'];
						$allday = ($fetch['allDay'] == "true") ? true : false;	
						$e['allDay'] = $allday;
						array_push($events, $e);
					}
		}	
		echo json_encode($events);
                //print_r($events);
   }
?>