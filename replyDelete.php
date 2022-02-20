<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = new mysqli('localhost','root','whwpdms','je');

$depth = $_GET['depth'];
$replyNo = $_GET['replyNo'];
$boardNo = $_GET['boardNo'];
$originNo = $_GET['originNo'];


if ($depth == 0){
    echo "댓글입니다.";
    $sql2 = "SELECT COUNT(originNO) FROM test_reply WHERE originNo = '$originNo'";
    $result2 = mysqli_query($db, $sql2);
    $tmp2 = mysqli_fetch_assoc($result2);

    if ($tmp2["COUNT(originNO)"] == 1){
        $sql3 = "DELETE FROM test_reply WHERE replyNo = '$replyNo'";
        $result3 = mysqli_query($db, $sql3);
        echo "삭제되었습니다.";
    }else if ($tmp2["COUNT(originNO)"] > 1){
        echo "삭제불가.";
    }

}else if ($depth == 1){
    echo "대댓글입니다. 삭제되었습니다.";
    if ($depth == 1){
        $sql = "DELETE FROM test_reply WHERE replyNo = '$replyNo'";
        $result = mysqli_query($db, $sql);
    }
}
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