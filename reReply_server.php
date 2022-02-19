<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$boardNo = $_POST['boardNo'];
$originNo = $_POST['originNo'];
$groupOrd = $_POST['groupOrd'];
$depth = $_POST['depth'];
$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];

$db = new mysqli('localhost','root','whwpdms','je');
$sql = "INSERT INTO test_reply (boardNo, originNo, groupOrd, depth, rewriter, recontent, redate) VALUES ('$boardNo','$originNo','$groupOrd','$depth','$rewriter','$recontent',NOW())";
$result = mysqli_query($db, $sql);
?>
<html>
<head>
    <meta charset="UTF-8">
    <script>alert("댓글 등록되었습니다");</script>
</head>
<body>
    <div>
        <button onclick="location.href='reply_view.php?no=<?=$boardNo?>'">게시글로</button >
    </div>
</body>
</html>