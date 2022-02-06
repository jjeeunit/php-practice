<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$no = $_GET['no'];
$db = mysqli_connect('localhost','root','whwpdms','je');
$sql = "SELECT * FROM board WHERE no = $no";
$result = mysqli_query($db, $sql);
$tmp = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>댓글</title>
</head>
<body>
    
    <table border=1 align=center>
        <form id="board" name = "test_reply_server" action="test_reply_server.php" method="post" enctype="multipart/form-data" >
            <tr>
                <td>제목</td>
                <td><?php echo $tmp['utitle']?></td>
            </tr>
            <tr>
                <td>이름</td>
                <td><?php echo $tmp['naming']?></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><?php echo $tmp['uname']?></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><?php echo $tmp['ucontent']?></td>
            </tr>
            <tr>
                <td>첨부파일</td>
                <td><?php echo $tmp['ufile1']?><a href="download.php?file_name=<?=$tmp['ufile1']?>">파일다운로드</a><br>

                    <?php echo $tmp['ufile2']?><a href="download.php?file_name=<?=$tmp['ufile2']?>">파일다운로드</a>
                </td>
            </tr>   
        </form>
    </table>

    <table>
    <?php
    $sql_reply = "SELECT * FROM test_reply where boardNo = $no ORDER BY originNo DESC, groupOrd ASC";
    $result_reply = mysqli_query($db, $sql_reply);
    while($tmp2 = mysqli_fetch_assoc($result_reply)){?>
        <tr>
            <td>--------------</td>
        </tr>
        <tr >
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
                <a href="test_replyUpdate_view.php?no=<?=$no?>&replyNo=<?=$tmp2['replyNo']?>">수정</a> 
                <a href="test_replyDelete.php?replyNo=<?=$tmp2['replyNo']?>">삭제</a>
                <a href="test_reReply_view.php?boardNo=<?=$tmp['no']?>&originNo=<?=$tmp2['replyNo']?>&groupOrd=<?=$tmp2['groupOrd']?>&depth=<?=$tmp2['depth']?>">대댓글</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
    <p>&nbsp;</p>
    <div style="border: 1px solid; width: 600px; padding: 5px">
        <form id="reply" name="test_reply_server" action="test_reply_server.php" method="post">
            <input type="hidden" name="boardNo" value="<?=$boardNo?>"/>
            <input type="hidden" name="originNo" value="<?=$originNo?>"/>
            <input type="hidden" name="groupOrd" value="<?=$groupOrd?>"/>
            <input type="hidden" name="depth" value="<?=$depth?>"/>
            작성자: <input type="text" name="rewriter" size="20" maxlength="20"> <br/>
            <textarea name="recontent" rows="3" cols="60" maxlength="500" placeholder="댓글을 달아주세요."></textarea>
            <button type="submit">댓글달기</button>
        </form>
    </div>
    <div>
        <button onclick="location.href='read.php'">목록으로</button >
    </div>
</body>
</html>
