<?php
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );

 $ufile1 = $_FILES['ufile1']['name'];
 $ufile2 = $_FILES['ufile2']['name'];



//파일용량
//파일 확장자 생성
//파일 디렉토리 생성






 $db = new mysqli('localhost','root','whwpdms','je');
 $sql = "update board set ufile1 = '".$ufile1."', ufile2 = '".$ufile2."' where no ='".$no."'";
 $result = mysqli_query($db, $sql);
?>