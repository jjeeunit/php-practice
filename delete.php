<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$no = isset($_GET['no']) ? $_GET['no'] :'';
$db = new mysqli('localhost','root','whwpdms','je');
//var_dump('checking no in delete.php::', $no);

$sql = "DELETE FROM wpdms WHERE no ='".$no."'";
$result = mysqli_query($db, $sql);

$sql2 = "DELETE FROM wpdms_detail WHERE no='".$no."'";
$result2 = mysqli_query($db,$sql2);  
?>        
<html>
<head>
    <meta charset="UTF-8">
    <script>alert("삭제되었습니다");</script>
</head>
<body>
    <div>
        <button onclick="location.href='list.php'">목록으로</button >
    </div>
</body>
</html>