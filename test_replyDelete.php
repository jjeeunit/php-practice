<?php

$boardNo = $_GET['boardNo'];
$replyNo = $_GET['replyNo'];
$depth = $_GET['depth'];
$originNo = $_GET['originNo'];

$db = mysqli_connect('localhost','root','whwpdms','je');


if($depth == 0){
    echo "댓글입니다";
    $sql_cnt_reply = "SELECT COUNT(originNo) FROM test_reply WHERE originNO = $originNo";
    if($sql_cnt_reply > 1){
        echo "삭제불가";
    }else if($sql_cnt_reply == 1){
        $sql2 = "DELETE FROM test_reply WHERE replyNo = '$replyNo'";
        $result2 = mysqli_query($db, $sql2);
        echo "삭제되었습니다";
    }
}else if($depth == 1){
    echo "대댓글입니다";
    if($depth == 1){
        $sql = "DELETE FROM test_reply WHERE replyNo = '$replyNo'";
        $result = mysqli_query($db, $sql);
        var_dump($sql);
    }
}
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