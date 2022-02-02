<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = new mysqli('localhost','root','whwpdms','je');

$no = isset($_POST['no']) ? $_POST['no'] : '';
$naming = isset($_POST['naming']) ? $_POST['naming'] : '';
$userid = isset($_POST['userid']) ? $_POST['userid'] : '';
$pass1 = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
$pass2 = password_hash($_POST['pass2'], PASSWORD_DEFAULT);
$phonenum = isset($_POST['phonenum']) ? $_POST['phonenum'] : '';   

$sql = "update wpdms set naming = '".$naming."', userid = '".$userid."', pass1 = '".$pass1."', pass2 = '".$pass2."' where no = '".$no."'";
$result = mysqli_query($db, $sql);

$sql2 = "update wpdms_detail set naming = '".$naming."', phonenum='".$phonenum."' where no2 = '".$no."'";
$result = mysqli_query($db, $sql2);
?>
<html>
<head>
    <meta charset="UTF-8">
    <script>alert("수정되었습니다");</script>
</head>
<body>
    <div>
        <button onclick="location.href='list.php'">목록으로</button >
    </div>
</body>
</html>     