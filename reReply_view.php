<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$boardNo = $_GET['boardNo'];
$originNo = $_GET['originNo'];
$groupOrd = $_GET['groupOrd'];
$depth = $_GET['depth'];

$db = new mysqli('localhost','root','whwpdms','je');

$sql2 = "SELECT COUNT(*) as cnt FROM test_reply WHERE originNo = $originNo AND depth != 0";
$result2 = mysqli_query($db, $sql2);
$tmp2 = mysqli_fetch_assoc($result2);
$groupOrd = $tmp2['cnt'] + 1;
$depth = $depth + 1; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>대댓글</title>
</head>
<body>
    <div>
        <form name = "reReply_server" action="reReply_server.php" method = "post">
            <input type="hidden" name = "boardNo" value="<?=$boardNo?>">
            <input type="hidden" name = "originNo" value = "<?=$originNo?>">
            <input type="hidden" name = "groupOrd" value = "<?=$groupOrd?>">
            <input type="hidden" name = "depth" value = "<?=$depth?>">
            작성자: <input type="text" name = "rewriter" size="20" maxlength="20"> <br/>
            <textarea name="recontent" id="recontent" cols="30" rows="10" placeholder="댓글을 달아주세요."></textarea>
            <button type="submit">대댓글달기</button>
        </form>
    </div>
</body>
</html>