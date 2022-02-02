<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$folder = $_POST['folder'];
$makeDir = mkdir('C:\Users\yo812\Desktop\img'.'/'.$folder, 0777);

if($makeDir){
	echo $folder." 폴더 생성 완료!";
}else {
	echo $folder." 폴더 생성 실패!";
}
?>