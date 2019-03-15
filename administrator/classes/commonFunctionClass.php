<?php
class commonFunctionClass extends dbConnect
{
function __construct()
{
parent::__construct();
parent::connect_db();

}

public function insert($fields, $data, $table) 
{

$queryFields = implode(",", $fields);
$queryValues = implode('","', $data);

parent::query('INSERT INTO '.$table.'('.$queryFields.') VALUES ("'.$queryValues.'")') or die(mysql_error());
$_SESSION['insertedId']=mysql_insert_id();
echo INSRT_DATA_MASS_SUSS;


}

public function insert1($fields, $data, $table) 
{

$queryFields = implode(",", $fields);
$queryValues = implode('","', $data);

parent::query('INSERT INTO '.$table.'('.$queryFields.') VALUES ("'.$queryValues.'")') or die(mysql_error());

}


public function insertWithLastid($fields, $data, $table) 
{

$queryFields = implode(",", $fields);
$queryValues = implode('","', $data);

parent::query('INSERT INTO '.$table.'('.$queryFields.') VALUES ("'.$queryValues.'")') or die(mysql_error());
$mysqlInsertId=mysql_insert_id();
return $mysqlInsertId;
}


 public function insertsetvalue($tbl,$update_arr)
  {
 $qry = "insert into $tbl SET ";
 $qry .= self::array2updateStr($update_arr);
        
self::query($qry) or die(mysql_error());

}


public function delete($table,$idcolom,$delete)
{

parent::query('delete from '.$table.' where '.$idcolom.'="'.$delete.'"') or die(mysql_error()) ;
//header('Location:?page='.$pageId.'');
echo DELETE_DATA_MASS_SUSS;

}
public function deleteImage($table,$idcolom,$delete,$image)
{
unlink('document/'.$image);
parent::query('delete from '.$table.' where '.$idcolom.'="'.$delete.'"') or die(mysql_error()) ;
//header('Location:?page='.$pageId.'');
echo DELETE_DATA_MASS_SUSS;

}

public function delete1($table,$idcolom,$delete)
{

parent::query('delete from '.$table.' where '.$idcolom.'="'.$delete.'"') or die(mysql_error()) ;


}

/*public function deleteImage($image)
{
unlink(image/$image);
} */

public function fetch($table,$startpoint,$perpage)
{
 $query=parent::query("SELECT * FROM ".$table." ORDER BY id DESC LIMIT $startpoint,$perpage ") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    }
    return $result; 
	
	/* 
	for ($x = 0; $x < count($result); $x++) 
	{
   echo $result[$x][0] . "<BR>";  // outputs the first column from every row
	}
	
	*/
}


public function fetchUnder($table,$startpoint,$perpage,$where)
{
 $query=parent::query("SELECT * FROM ".$table." where ".$where." ORDER BY id DESC LIMIT $startpoint,$perpage ") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    }
    return $result; 
	
	/* 
	for ($x = 0; $x < count($result); $x++) 
	{
   echo $result[$x][0] . "<BR>";  // outputs the first column from every row
	}
	
	*/
}


public function singleRowFetch($table,$idColomNmae,$id)
{

 $query=parent::query("SELECT * FROM ".$table." where ".$idColomNmae."='".$id."' ") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    }
    return $result; 
	
}


public function findRecord($table,$where)
{
//return $test= "SELECT * FROM $table where ".$where."";

$query=parent::query("SELECT * FROM $table where ".$where." ") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    } 
    return $result; 
	
	
}


public function findRecord1($table)
{
//return $test= "SELECT * FROM $table where ".$where."";

$query=parent::query("SELECT * FROM $table") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    } 
    return $result; 
	
	
}

public function findSection($table,$where)
{
//return $test= "SELECT * FROM $table where ".$where."";

$query=parent::query("SELECT * FROM $table where ".$where." ") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    } 
    return $result; 
	
	
}


public function findAllRecord($table)
{
//return $test= "SELECT * FROM $table where ".$where."";

$query=parent::query("SELECT * FROM $table") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    } 
    return $result; 
	
	
}
public function findAllRecordcomp($table,$where)
{
//return $test= "SELECT * FROM $table where ".$where."";

$query=parent::query("SELECT * FROM $table where ".$where."") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    } 
    return $result; 
	
	
}



public function lastId($table,$uiqId)
{
$query=parent::query("SELECT MAX(".$uiqId.") FROM ".$table) or die(mysql_error()); 
$result = array();
$record = mysql_fetch_array($query);
$result[]=$record;
return $result[0][0];
}

public function authenticate($username)
{
	if(isset($username))	
	return true;
	else	
	print "<script type='text/javascript'>window.location='login.php';</script>";
	

}

public function option($table)
{
$query=parent::query("SELECT * FROM ".$table." where status=1 ORDER BY id DESC ") or die(mysql_error()); 
    $result = array();
    while ($record = mysql_fetch_array($query)) 
	{
         $result[] = $record;
    }
    return $result; 
	

}





public function uploadfile($file,$tem)
{
$file=$file;
	$tmp=$tem;
	$test=strpos($file,'.');
	$ext=substr($file,$test);
	$file=substr(self::uuid(), 1, 7);
	$attach=$file.$ext;         
	$destN="../products/".$attach;
	move_uploaded_file($tmp,$destN);
	return $attach;
}


public function uploadfileprofile($file,$tem)
{
$file=$file;
	$tmp=$tem;
	$test=strpos($file,'.');
	$ext=substr($file,$test);
	$file=substr(self::uuid(), 1, 7);
	$attach=$file.$ext;         
	$destN="img/".$attach;
	move_uploaded_file($tmp,$destN);
	return $attach;
}
public function uploadfileadds($file,$tem)
{
$file=$file;
	$tmp=$tem;
	$test=strpos($file,'.');
	$ext=substr($file,$test);
	$file=substr(self::uuid(), 1, 7);
	$attach=$file.$ext;         
	$destN="../adds/".$attach;
	move_uploaded_file($tmp,$destN);
	return $attach;
}

public function uploadfileblogs($file,$tem)
{
$file=$file;
	$tmp=$tem;
	$test=strpos($file,'.');
	$ext=substr($file,$test);
	$file=substr(self::uuid(), 1, 7);
	$attach=$file.$ext;         
	$destN="../blogs/".$attach;
	move_uploaded_file($tmp,$destN);
	return $attach;
}

public function uploadfilepopup($file,$tem)
{
$file=$file;
	$tmp=$tem;
	$test=strpos($file,'.');
	$ext=substr($file,$test);
	$file=substr(self::uuid(), 1, 7);
	$attach=$file.$ext;         
	$destN="../popup/".$attach;
	move_uploaded_file($tmp,$destN);
	return $attach;
}

public function uploadprofileimage($file,$tem)
{
$file=$file;
	$tmp=$tem;
	$test=strpos($file,'.');
	$ext=substr($file,$test);
	$file=substr(self::uuid(), 1, 7);
	$attach=$file.$ext;         
	$destN="product/".$attach;
	move_uploaded_file($tmp,$destN);
	return $attach;
}

public function uuid($prefix = '')

  {

    $chars = md5(uniqid(mt_rand(), true));

    $uuid  = substr($chars,0,8) . '-';

    $uuid .= substr($chars,8,4) . '-';

    $uuid .= substr($chars,12,4) . '-';

    $uuid .= substr($chars,16,4) . '-';

    $uuid .= substr($chars,20,12);

    return $prefix .$uuid;

  }
  
  	public function strToUrl($str)
	{
		$str = trim($str);
		$str = str_replace('(',"",$str);
		$str = str_replace(')',"",$str);
		$str = str_replace(",","",$str);
		$str = str_replace("'","",$str);
		$str = str_replace("\"","",$str);
		$str = str_replace("/","",$str);
		$str = str_replace('&',"and",$str);
		$str = str_replace(' ',"-",$str);
		$str = str_replace('---',"-",$str);
		$str = str_replace('--',"-",$str);
		$str = str_replace(':',"-",$str);
		$str = str_replace('$',"-",$str);
		$str = str_replace('---',"-",$str);
		$str = strtolower($str);
		return $str;
	}
	
	public function urlToStr($str)
	{
		//$str = trim($str);		
		$str = str_replace('-'," ",$str);		
		return $str;
	}
	
public function mailing($sent_to,$sent_from,$subject,$content)
{

date_default_timezone_set('Asia/Calcutta'); 
header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
header( "Cache-Control: no-cache, must-revalidate" );
header( "Cache-Control: post-check=0, pre-check=0", false );
header( "Pragma: no-cache" );
mail($sent_to,
                stripcslashes($subject),
                stripcslashes($content),
                "From: ". $sent_from ."\n".
                "Reply-To: ". $from ."\n".
                "MIME-Version: 1.0\n".
                "X-Sender: ". $sent_from ."\n".
                "X-Mailer: RequestForm\n".
                "X-Priority: 3 (Normal)\n".
                "content-type: text/html; charset=iso-8859-15\n");



}	
	

  
 public function db_update_record($tbl,$update_arr,$where)
  {
 $qry = "UPDATE $tbl SET ";
        $qry .= self::array2updateStr($update_arr);
        $qry .= $where;
		//echo   $qry;
		//exit;
	self::query($qry) or die(mysql_error());
	echo UPDATE_DATA_MASS_SUSS;
}


 public function db_update_recordm($tbl,$update_arr,$where)
  {
 $qry = "UPDATE $tbl SET ";
        $qry .= self::array2updateStr($update_arr);
        $qry .= $where;
		//echo   $qry;
		//exit;
	return self::query($qry) or die(mysql_error());
	//echo UPDATE_DATA_MASS_SUSS;
}
  
  
 public function array2updateStr($arr){
        $str = '';
        $cnt = 0;
            foreach($arr as $key => $val){
                $val = trim($val);
                $str .= ($cnt < sizeof($arr)-1) ? "$key='".$val."', " : "$key='".$val."'";
                $cnt++;
            }
        return $str;
    }
	
public function getCatname($query, $nq){
        $sqlcat = "select * from `category` where category_name IN ('$query') OR category_name = '$nq'";
		$resultcat = mysql_query($sqlcat);
		$rows = mysql_fetch_assoc($resultcat);
		return $rows['id'];
    }
	
public function getCatURL($nq){
        $sqlcat = "select * from `tbl_menu1` where id = '$nq'";
		$resultcat = mysql_query($sqlcat);
		$rows = mysql_fetch_assoc($resultcat);
		return $rows['url'];
    }
	
	public function getPostImageID($id)
	{
		$idd = array();
        $sqlcat = "select * from `tbl_images` where img_id = '$id'";
		$resultcat = mysql_query($sqlcat);
		while($rows = mysql_fetch_array($resultcat))
		{
			$idd[] =$rows['id'];
		}
		return $idd;
    }	
	
	public function getPostImage($id)
	{
		$image = array();
        $sqlcat = "select * from `tbl_images` where img_id = '$id'";
		$resultcat = mysql_query($sqlcat);
		while($rows = mysql_fetch_array($resultcat))
		{
			$image[] =$rows['image'];
		}
		return $image;
    }
	
	public function getCatID($url){
        $sqlcat = "select * from `tbl_menu1` where url = '$url'";
		$resultcat = mysql_query($sqlcat);
		$rows = mysql_fetch_assoc($resultcat);
		return $rows['id'];
    }
	
	
public function getSubCatname($query, $nq){
        $sqlcat = "select * from `sub_category` where sub_category IN ('$query') OR sub_category = '$nq'";
		$resultcat = mysql_query($sqlcat);
		$rows = mysql_fetch_assoc($resultcat);
		return $rows['id'];
    }
	
	//check page
	public function checkpage($id,$subid){
        $sqlcat = "select * from `tbl_page` where menu1 ='$id' and menu2 = '$subid'";
		$resultcat = mysql_query($sqlcat);
		$rows = mysql_fetch_assoc($resultcat);
		return mysql_num_rows($resultcat);
    }
	
	
public function editor($editor1)
{
?>
			
			 <script type="text/javascript">
				//<![CDATA[
					//CKEDITOR.replace( 'long_desc');
					var <?=$editor1?> = CKEDITOR.replace( '<?=$editor1?>' );
					CKFinder.setupCKEditor( <?=$editor1?>, 'ckfinder/' ) ;
				//]]>
			</script>
<?php
}

public function editorjs()
{
?>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
			<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
			<script src="ckeditor/_samples/sample.js" type="text/javascript"></script>
			<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
			<?php
}

}



?>