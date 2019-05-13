<?php
session_start(); 


$memId=$_SESSION["memId"];
// $time=now();
$time=date("ymdhisa");
$upload_dir = "images/customized//";
if( ! file_exists($upload_dir ))
  mkdir($upload_dir);
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$data = base64_decode($img);
$fileName =$time . $memId;
$file = $upload_dir . $fileName . ".png";
$success = file_put_contents($file, $data);
echo $success ? $file : 'Unable to save the file.';
?>