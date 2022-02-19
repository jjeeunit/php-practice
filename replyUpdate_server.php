<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];
$replyNo = $_POST['replyNo'];
$boardNo = $_POST['boardNo'];

$db = new mysqli('localhost','root','whwpdms','je');
$sql = "UPDATE test_reply SET rewriter = '".$rewriter."', recontent = '".$recontent."' WHERE replyNo ='".$replyNo."'";
$result = mysqli_query($db, $sql);
?>

<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <button onclick="location.href='reply_view.php?no=<?=$boardNo?>'">게시글로</button>
    </div>
</body>
</html>