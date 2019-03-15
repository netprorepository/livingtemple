
<?php

 $DB_HOST                        = "localhost";                  // Database Host Server
        $DB_USERNAME                    = "mobilecover";              // Database Username
        $DB_PASSWORD                    = "!B[rM7O9AyT*";              // Password for the Db User
        $DB_NAME                        = "mobilecover";   
mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD);

mysql_select_db($DB_NAME);
?>
<?php

/*******EDIT LINES 3-8*******/
     //MySQL Database Name  
$DB_TBLName = "user_registration"; //MySQL Table Name   
$filename = "excelfilename";         //File Name
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection   
$sql = "SELECT * FROM `user_registration`";

//execute query 
$result = mysql_query($sql) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());
    
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    } 
  
?>


		

