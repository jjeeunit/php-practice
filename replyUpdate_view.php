<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$replyNo = $_GET['replyNo'];

$db = new mysqli('localhost','root','whwpdms','je');
$sql2 = "SELECT * FROM test_reply WHERE replyNo = $replyNo";
$result2 = mysqli_query($db, $sql2);
$tmp2 = mysqli_fetch_assoc($result2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글 수정</title>
</head>
<body>
    <h1>댓글 수정</h1>
    <div>
        <form name = "replyUpdate_server" action="replyUpdate_server.php" method="post">
            <input type="text" name = "replyNo" value="<?=$tmp2['replyNo']?>">
            <input type="text" name = "boardNo" value="<?=$tmp2['boardNo']?>">
            <div>
                <textarea name="rewriter" id="rewriter" cols="30" rows="10" placeholder="작성자" maxlength="100"><?php echo $tmp2['rewriter']?></textarea><br>
                <textarea name="recontent" id="recontent" cols="30" rows="10" placeholder="내용" maxlength="100"><?php echo $tmp2['recontent']?></textarea><br>
                <button type="submit">수정</button>
            </div>
        </form>
    </div>
</body>
</html>