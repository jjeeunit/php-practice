<?php
$originNo = $_GET['originNo'];
$replyNo = $_GET['replyNo'];
$depth = $_GET['depth'];
$boardNo = $_GET['boardNo'];

$db = mysqli_connect('localhost','root','whwpdms','je');
if($depth == 0){
    echo "댓글입니다.";
    $sql_cnt_reply = "SELECT COUNT(originNo) FROM test_reply WHERE originNo = '$originNo'";
    $result_cnt_reply = mysqli_query($db, $sql_cnt_reply);
    $tmp_cnt_reply = mysqli_fetch_assoc($result_cnt_reply);

    if($tmp_cnt_reply["COUNT(originNo)"] == 1){
        $sql2 = "DELETE FROM test_reply WHERE replyNo = '$replyNo'";
        $result2 = mysqli_query($db, $sql2);
        echo "삭제되었습니다";
    }else if($tmp_cnt_reply["COUNT(originNo)"] > 1){
        echo "삭제불가";
    }
}else if($depth == 1){
    echo "대댓글입니다. 삭제되었습니다";
    if($depth == 1){
        $sql = "DELETE FROM test_reply WHERE replyNo = '$replyNo'";
        $result = mysqli_query($db, $sql);
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