<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = new mysqli('localhost','root','whwpdms','je');

$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];

$boardNo = $_POST['boardNo'];
//sql
$sql = "SELECT MAX(replyNo) AS replyNo FROM test_reply WHERE boardNo = '$boardNo'";
$result = mysqli_query($db, $sql);
$tmp = mysqli_fetch_assoc($result);
$originNo = $tmp['replyNo'];
$originNo = $originNo + 1;

$groupOrd = 0;
$depth = 0;

$sql1 = "INSERT INTO test_reply (boardNo, originNo, groupOrd, depth, rewriter, recontent, redate) VALUES ('$boardNo','$originNo','$groupOrd','$depth','$rewriter','$recontent',NOW())";
$result1 = mysqli_query($db, $sql1);
?>

<head>
    <meta charset="UTF-8">
    <script>alert("댓글이 작성되었습니다.");</script>
</head>
<body>
    <div>
        <button onclick = "location.href ='reply_view.php?no=<?=$boardNo?> '">게시글로</button>
    </div>
</body>
</html>