<?php 
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM files where id=".$_GET['id'])->fetch_array();

extract($_POST);

 		$fname=$qry['file_path'];   
       $file = ("assets/uploads/".$fname);
       
       header ("Content-Type: ".filetype($file));
       header ("Content-Length: ".filesize($file));
       header ("Content-Disposition: attachment; filename=".$qry['name'].'.'.$qry['file_type']);

       readfile($file);