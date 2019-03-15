<?php

$file = basename($_GET['file']);
//header("Content-type: application/octet-stream");
//header("Content-Disposition: attachment; filename=".$file);
//header("Pragma: no-cache");
//header("Expires: 0");

$file = 'http://demo.deliciousweb.in/tiifany-ngu-demo/website/php/administrator/'.$file;

	header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);

//print "$file";

?>