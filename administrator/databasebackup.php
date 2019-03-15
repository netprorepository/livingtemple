<!DOCTYPE html>

 <html lang="en"> 
 <head> 
 <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
 <title>Tiffany NGU:: Admin</title> 
<?php include 'include/scriptStyle.php' ?>

</head> <body> 

 
 <div id="container"> 
 
 <?php include 'include/topHeader.php' ?>  
 
 <div id="content"> 
       <div class="container"> 
       <div class="crumbs">  
       <ul id="breadcrumbs" class="breadcrumb"> <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li> </ul> 
       
       
        </div> 
<?php include 'include/leftMenu.php' ?> 
      
        
         <div class="row"> 
         <div class="col-md-12"> 
       
          
         <h4>Tiffany NGU	</h4> 
         Your Database being Download....... 
            
			<?php
backup_tables('localhost','tiffany_data','tiffany_data','tiffany_data');

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	$return="";
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
		//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table) or die("Error in 33. ".mysql_error());
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		//echo $return;
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j < $num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j < ($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$output='db-backup.sql';
	$handle = fopen('db-backup.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
	header('Content-type: application/sql');	
	header('Content-Disposition: attachment; filename='.$output);
	echo "<a href='download.php?file=$output'>Download File</a>";
	
	//header("Content-type: application/octet-stream");
	//header("Content-Disposition: attachment; filename=db-backup.sql");
	//header("Pragma: no-cache");
	//header("Expires: 0");
	//print "$return";
	exit;
	
	}

?>
            
             </div> </div>    
        
        
        
          </div> </div> </div> </body> </html>