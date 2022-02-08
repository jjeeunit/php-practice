<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$boardNo = $_GET['boardNo'];
$originNo = $_GET['originNo'];
$groupOrd = $_GET['groupOrd'];
$depth = $_GET['depth'];

$db = mysqli_connect('localhost','root','whwpdms','je');

// 계산해주는 부분
$sql_reply = "SELECT COUNT(*) as cnt FROM test_reply WHERE originNo = $originNo AND depth != 0";
$result_reply = mysqli_query($db, $sql_reply);
$tmp2 = mysqli_fetch_assoc($result_reply);
$groupOrd = $tmp2['cnt'] + 1;
$depth = $depth + 1;         // 이건 번외! while문 안돌리는데 대댓글이 어떻게 들어가는지?
//$depth = (int)$depth + 1;         // php에선 타입선언 안해도 되?
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>댓글</title>
</head>
<body>
    <p>&nbsp;</p>
    <div style="border: 1px solid; width: 600px; padding: 5px">
        <form name="test_reReply_server" action="test_reReply_server.php" method="post">
            <input type="hidden" name="boardNo" value="<?=$boardNo?>"/>
            <input type="hidden" name="originNo" value="<?=$originNo?>"/>
            <input type="hidden" name="groupOrd" value="<?=$groupOrd?>"/>
            <input type="hidden" name="depth" value="<?=$depth?>"/>
            작성자: <input type="text" name="rewriter" size="20" maxlength="20"> <br/>
            <textarea name="recontent" rows="3" cols="60" maxlength="500" placeholder="댓글을 달아주세요."></textarea>
            <button type="submit"> 대댓댓글달기</button>
        </form>
    </div>
</body>
</html>