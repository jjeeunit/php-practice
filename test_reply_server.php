<!-- 내가 작성한 코드 -->
<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = mysqli_connect('localhost','root','whwpdms','je');



$boardNo = $_POST['boardNo'];
$groupOrd = 0;
$depth = 0;
$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];
// $redate = date('Y-m-d H:i:s');


$sql = "SELECT MAX(replyNo) AS replyNo FROM test_reply WHERE boardNo = $boardNo";
$Result_reply = mysqli_query($db, $sql);
$Fetch = mysqli_fetch_assoc($Result_reply);
$originNo = $Fetch['replyNo'];
$originNo = $originNo + 1;
$sql1 = "INSERT INTO test_reply (boardNo, originNo, groupOrd, depth, rewriter, recontent, redate) VALUES ('$boardNo','$originNo', '$groupOrd','$depth','$rewriter','$recontent', NOW())";
$result = mysqli_query($db, $sql1);
?>
<html>
<head>
    <meta charset="UTF-8">
    <script>alert("댓글 등록되엇습니다");</script>
</head>
<body>
    <div>
        <button onclick="location.href='test_reply_view.php?no=<?=$boardNo?>'">게시글로 돌아가게</button >
    </div>
</body>
</html>