<?php

// Database Connection

$host="localhost";
$uname="mobilecover";
$pass="!B[rM7O9AyT*";
$database = "mobilecover"; 

$connection=mysql_connect($host,$uname,$pass); 

echo mysql_error();

//or die("Database Connection Failed");
$selectdb=mysql_select_db($database) or 
die("Database could not be selected"); 
$result=mysql_select_db($database)
or die("database cannot be selected <br>");

// Fetch Record from Database
$output = "";
$table = 'user_registration'; // Enter Your Table Name 
$sql = mysql_query("select first_name, last_name, password, user_email, user_phone, user_city, user_state, user_zip_code, user_country, user_address, newsletter, loginType, date, status from $table");
$columns_total = mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename = "User_Registraion.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>