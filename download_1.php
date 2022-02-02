<?php

//파일 다운로드
$file_no = isset($_GET['file_no']) ? $_GET['file_no'] :'';

$ufile = $file_no;
$ufileType = explode('.',$ufile);
$extension = array_pop($ufileType);


$file = 'C:\Users\yo812\Desktop\img'.'/'.$extension.'/'.$file_no; 

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file_no);
header('Content-Transfer-Encoding: binary');
header('Content-length: ' . filesize($file));
header('Expires: 0');
header("Pragma: public");

$fp = fopen($file, 'rb');
fpassthru($fp);
fclose($fp);
?>