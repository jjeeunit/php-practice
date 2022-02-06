<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = mysqli_connect('localhost','root','whwpdms','je');

$replyNo = $_GET['replyNo'];
$no = $_GET['no'];

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
    <div id = "u_reply">
        <h1>댓글 수정</h1> 
        <form name = "test_replyUpdate_server" action = "test_replyUpdate_server.php" method ="post">
            <input type="hidden" name="replyNo" value="<?=$tmp2['replyNo']?>">
            <div id ="rewriter">
                <textarea name ="rewriter" id="rewriter" rows="1" cols="55" placeholder="작성자" maxlength="100" required><?php echo $tmp2['rewriter']; ?></textarea>
            </div>
            <div id ="recontent">
                <textarea name ="recontent" id="recontent" rows="1" cols="55" placeholder="내용" maxlength="100" required><?php echo $tmp2['recontent']; ?></textarea>
            </div>
                <button type="submit">수정하기</button>
        </form>
    </div>
</body>
</html>