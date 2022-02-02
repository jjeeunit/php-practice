<?php 
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );
 
 $no = $_GET['no'];

 $db = new mysqli('localhost','root','whwpdms','je');
 $sql = "SELECT * FROM board WHERE no = $no";
 $result = mysqli_query($db, $sql);
 $tmp = mysqli_fetch_assoc($result);

 $sql2 = "SELECT * FROM reply WHERE bno2 = $no";
 $result2 = mysqli_query($db, $sql2);
 $tmp2 = mysqli_fetch_assoc($result2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>댓글</title>
</head>
<body>
    <table border=1 align=center>
        <form action="reply_server.php" method="post" enctype="multipart/form-data">
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
                <td><?php echo $tmp['ufile1']?></td>
            </tr>
            <tr>
                <td>첨부파일2</td>
                <td><?php echo $tmp['ufile2']?></td>
            </tr>
        </form>
    </table>
</body>
</html>

<table>
    <tr>
        <td>작성자</td>
        <td><?php echo $tmp2['rewriter']?></td>
    </tr>
    <tr>
        <td>댓글</td>
        <td><?php echo $tmp2['recontent']?></td>
    </tr>
</table>

<div>
    <form action="reply_server.php" method="post">
    작성자: <input type="text" name="rewriter" size="20" maxlength="20"> <br/>
    <textarea name="recontent" rows="3" cols="60" maxlength="500" placeholder="댓글을 달아주세요."></textarea>
    <button type="submit">댓글달기</button>
    </form>
</div>