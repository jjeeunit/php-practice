<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = mysqli_connect('localhost','root','whwpdms','je');

$boardNo = $_POST['boardNo'];
$originNo = $_POST['originNo'];
$groupOrd = $_POST['groupOrd'];
$depth = $_POST['depth'];
$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];

$sql1 = "INSERT INTO test_reply (boardNo, originNo, groupOrd, depth, rewriter, recontent, redate) VALUES ('$boardNo','$originNo', '$groupOrd','$depth','$rewriter','$recontent', NOW())";
$result = mysqli_query($db, $sql1);
?>
<html>
<head>
    <meta charset="UTF-8">
    <script>alert("댓글 등록되었습니다");</script>
</head>
<body>
    <div>
        <button onclick="location.href='test_reply_view.php?no=<?=$boardNo?>'">게시글로 돌아가게</button >
    </div>
</body>
</html>