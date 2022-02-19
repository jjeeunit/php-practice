<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$no = $_GET['no'];
$db = new mysqli('localhost','root','whwpdms','je');
$sql = "SELECT * FROM board WHERE no = '$no'";
$result = mysqli_query($db, $sql);
$tmp = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 댓글</title>
</head>
<body>
    <table border = 1>
        <form name = "reply_server" id ="board" action="reply_server.php" method = "post" enctype="multipart/form-data">
            <tr>
                <td>제목</td>
                <td><?php echo $tmp['utitle']?></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><?php echo $tmp['naming']?></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><?php echo $tmp['uname']?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><?php echo $tmp['ucontent']?></td>
            </tr>
            <tr>
                <td>첨부파일1</td>
                <td><?php echo $tmp['ufile1']?><a href = "download_1.php?file_no=<?=$tmp['ufile1']?>">파일다운로드</a></td>
            </tr>
            <tr>
                <td>첨부파일2</td>
                <td><?php echo $tmp['ufile2']?><a href = "download_1.php?file_no=<?=$tmp['ufile2']?>">파일다운로드</a></td>
            </tr>
        </form>
    </table>

    <?php
    $sql2 = "SELECT * FROM test_reply WHERE boardNo = $no ORDER BY originNo DESC, groupOrd ASC";
    $result2 = mysqli_query($db, $sql2);
    while($tmp2 = mysqli_fetch_assoc($result2)){?>
    <table>
        <tr>
            <td>--------------------</td>
        </tr>
        <tr>
            <td>replyNo</td>
            <td><?php echo $tmp2['replyNo']?></td>
        </tr>
        <tr>
            <td>깊이</td>
            <td><?php echo $tmp2['depth']?></td>
        </tr>
        <tr>
            <td>작성자</td>
            <td><?php echo $tmp2['rewriter']?></td>
        </tr>
        <tr>
            <td>댓글</td>
            <td><?php echo $tmp2['recontent']?></td>
        </tr>
        <tr>
            <td>시간</td>
            <td><?php echo $tmp2['redate']?></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href="replyUpdate_view.php?replyNo=<?=$tmp2['replyNo']?>">수정</a>
                <a href="">삭제</a>
                <a href="reReply_view.php?boardNo=<?=$tmp['no']?>&originNo=<?=$tmp2['replyNo']?>&groupOrd=<?=$tmp2['groupOrd']?>&depth=<?=$tmp2['depth']?>">대댓글</a>
            </td>
        </tr>
    <?php }?>
    </table>
    <p>&nbsp;</p>
    <div>
        <form name = "reply_server" id="reply" action="reply_server.php" method = "post">
            <input type="hidden" name = "boardNo" value = "<?=$tmp['no']?>" >
            작성자: <input type="text" name = "rewriter" size="20" maxlength="20"> <br/>
            <textarea name="recontent" id="recontent" cols="30" rows="10" placeholder="댓글을 달아주세요."></textarea>
            <button type="submit">댓글달기</button>
        </form>
    </div>
</body>
</html>