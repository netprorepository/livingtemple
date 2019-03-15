<!DOCTYPE html>
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
        <title>Admin</title> 
        <?php include 'include/scriptStyle.php' ?>

    </head> <body> 


        <div id="container"> 

            <?php
            include 'include/topHeader.php';
			if(isset($_POST['submit']))
			{
				extract($_POST);			
				$datetime=date("d/m/Y");
				$fields=array('pincode','cod');
				$data=array($pincode,$cod);
				
				$code_query = "select * from `picode` where pincode = '$pincode'";
				$code_result = mysql_query($code_query);
				$code_count = mysql_num_rows($code_result);
				if ($code_count > 0) {
					$message = $pincode . " Pincode allready exist<br>";
				} else {
					$lastId=$objComm->insertWithLastid($fields,$data,'picode');				
					$message=INSRT_DATA_MASS_SUSS;
				}
				
					
			}		
			
            if (isset($_POST['uploadData'])) {


                $csv_file = $_FILES["fileToUpload"]["tmp_name"];


                if (($getfile = fopen($csv_file, "r")) !== FALSE) {
                    $data = fgetcsv($getfile, 10000, ",");

                    while (($data = fgetcsv($getfile, 10000, ",")) !== FALSE) {
                        $num = count($data);
                        //for ($c=0; $c < $num; $c++) 
                        //{
                        $result = $data;
                        $str = implode(",", $result);
                        $slice = explode(",", $str);


                        $pincode = $slice[0];
                        $cod = $slice[1];




                        $fields = array('pincode', 'cod');
                        $data = array($pincode, $cod);
                        $code_query = "select * from `picode` where pincode = '" . $slice[0] . "'";
                        $code_result = mysql_query($code_query);
                        $code_count = mysql_num_rows($code_result);
                        if ($code_count > 0) {
                            $message .= $slice[0] . " Pincode allready exist<br>";
                        } else {
                            $lastId = $objComm->insertWithLastid($fields, $data, 'picode');
                        }

                        if ($message == "") {
                            $message = INSRT_DATA_MASS_SUSS;
                        }

                        //}
                    }

                    //$message=INSRT_DATA_MASS_SUSS;
                }
            }


            if (isset($_POST['UpdateData'])) {


                $csv_file = $_FILES["fileToUpdate"]["tmp_name"];


                if (($getfile = fopen($csv_file, "r")) !== FALSE) {
                    $data = fgetcsv($getfile, 10000, ",");

                    while (($data = fgetcsv($getfile, 10000, ",")) !== FALSE) {
                        $num = count($data);
                        //for ($c=0; $c < $num; $c++) 
                        //{
                        $result = $data;
                        $str = implode(",", $result);
                        $slice = explode(",", $str);

                        $pincode = $slice[0];
                        $cod = $slice[1];

                        $code_query = "select * from `picode` where pincode = '" . $slice[0] . "'";
                        $code_result = mysql_query($code_query);
                        $code_count = mysql_num_rows($code_result);
                        if ($code_count > 0) {
                            $sql = "UPDATE picode SET
								pincode='$pincode',
								cod='$cod' where cod='$cod''";

                            mysql_query($sql);
                        } else {

                            $message .= $slice[0] . " Pincode Not Found<br>";
                        }

                        if ($message == "") {
                            $message = INSRT_DATA_MASS_SUSS;
                        }


                        //}
                    }

                    //$message=INSRT_DATA_MASS_SUSS;
                }
            }

            if (isset($_POST['deleteData'])) {


                $csv_file = $_FILES["fileToDelete"]["tmp_name"];


                if (($getfile = fopen($csv_file, "r")) !== FALSE) {
                    $data = fgetcsv($getfile, 10000, ",");

                    while (($data = fgetcsv($getfile, 10000, ",")) !== FALSE) {
                        $num = count($data);
                        //for ($c=0; $c < $num; $c++) 
                        //{
                        $result = $data;
                        $str = implode(",", $result);
                        $slice = explode(",", $str);

                        $pincode = $slice[0];


                        $sql = "DELETE from picode  WHERE pincode = '$pincode'";
                        $result = mysql_query($sql) or die(mysql_error());
                    }
                    $message = "Deleted Successfully!";
                    //$message=INSRT_DATA_MASS_SUSS;
                }
//$message=INSRT_DATA_MASS_SUSS;
            }
            ?>			

            <div id="content"> 
                <div class="container"> 
                    <div class="crumbs">  
                        <ul id="breadcrumbs" class="breadcrumb">
                            <li> <i class="icon-home"></i> <a href="welcome.php">Dashboard</a> </li>  
                            <li> <a href="javascript:void(0);"><strong>Add Pin Code</strong></a> </li> </ul> 
                    </div> 


                    <?php include 'include/leftMenu.php' ?> 



                    <div class="row"> 
                        <div class="col-md-12"> 




                            <?php if (isset($message)) echo $message; ?>



                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Upload:</label> 
                                    <div class="col-md-10"><input type="file" name='fileToUpload' required ></div> </div> 


                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label> 
                                                              <div class="col-md-10"><a onclick='window.open ("<?= BASE_URL ?>administrator/example3.html",
                                                                  "mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="uploadData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Upload Data</button></div> </div>
                            </form>

                            <br/><br/><br/>

                            <!--<form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Update:</label> 
                                    <div class="col-md-10"><input type="file" name='fileToUpdate' required ></div> </div> 


                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label> 
                                                              <div class="col-md-10"><a onclick='window.open ("<?= BASE_URL ?>administrator/example3.html",
                                                                  "mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="UpdateData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Update Data</button></div> </div>
                            </form>

                            <br/><br/><br/>-->


                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Delete:</label> 
                                    <div class="col-md-10"><input type="file" name='fileToDelete' required ></div> </div> 


                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label> 
                                                              <div class="col-md-10"><a onclick='window.open ("<?= BASE_URL ?>administrator/delete-pincode.html",
                                                                  "mywindow","menubar=1,resizable=1,width=350,height=250");'> Example </a>   <button id="btn-load" name="deleteData" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Delete Data</button></div> </div>
                            </form>

                            <br/><br/><br/>

                            <form class="form-horizontal row-border" action="" method="post"  enctype="multipart/form-data"> 		   



                                <div class="form-group">
                                    <label class="col-md-2 control-label">Pinc Code:</label> 
                                    <div class="col-md-10"><input type="text" name='pincode' class="form-control"></div> </div> 

                                <div class="form-group">
                                    <label class="col-md-2 control-label">COD:</label> 
                                    <div class="col-md-10"><input type="text" name='cod' class="form-control"></div> </div> 

                                <button id="btn-load" name="submit" class="btn btn-primary btn-primary-margin-left" data-loading-text="Loading...">Submit</button>
                            </form> 

                        </div> </div> 





                </div> </div> </div> </body> </html>