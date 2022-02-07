<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$boardNo = $_POST['boardNo'];
$replyNo =  $_POST['replyNo'];
$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];

$db = mysqli_connect('localhost','root','whwpdms','je');

$sql = "update test_reply set rewriter ='".$rewriter."', recontent='".$recontent."' WHERE replyNo = '".$replyNo."'";
$result = mysqli_query($db, $sql);
var_dump($sql);
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <button onclick="location.href='test_reply_view.php?no=<?=$boardNo?>'">게시글로 돌아가게</button >
    </div>
</body>
</html>