<?php 
class dbConnect
{
 private $mysql_host;
 private $mysql_database;
 private $mysql_user;
 private $mysql_password;
//private $mysql_connec;


function __construct()
{
	$this->mysql_host=DB_HOST;
	$this->mysql_database=DB_NAME;
	$this->mysql_password=DB_PASSWORD;
	$this->mysql_user=DB_USERNAME;	
}

function connect_db()
{   
	$mysql_connec = mysqli_connect($this->mysql_host,$this->mysql_user,$this->mysql_password,$this->mysql_database)
                or die(mysql_error());
         
	$db_found = mysqli_select_db($mysql_connec,$this->mysql_database) or die(mysql_error());
        //echo 'db somtin'; exit;
        


/*if (mysql_connect_errno())
		   die(mysql_connect_error()); */
		   
//echo $test=$this->mysql_host.$this->mysql_database.$this->mysql_password=DB_PASSWORD.$this->mysql_user=DB_USERNAME;
}

function query($qq)
{
	$result=mysql_query($qq);
	return $result;
}
function totalRow($table)
{
	$query=self::query("SELECT * FROM ".$table."") or die(mysql_error()); 
	$totalRow=mysql_num_rows($query);
	return $totalRow;
}

public function singleRow($table,$colom,$value)
{
$query=self::query('SELECT * FROM '.$table.' where '.$colom.'="'.$value.'"') or die(mysql_error()); 
$noofrow=mysql_num_rows($query);
return $noofrow;
}

}
?>