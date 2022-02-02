<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글</title>
</head>
<body>
    <h2>게시글</h2>
    <a href = "write_view.php">글 작성</a>
    <table border=1 align=center>
        <thead>
            <tr>
                <th>댓글</th>
                <th>파일 삭제</th>
                <th>파일 다운로드</th>
                <th>파일 수정</th>
                <th>NO</th>
                <th>제목</th>
                <th>작성자</th>
                <th>이름</th>
                <th>내용</th>
                <th>첨부파일1</th>
                <th>첨부파일2</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db = new mysqli('localhost','root','whwpdms','je');
            $sql = "select * from board";
            $result = mysqli_query($db, $sql);
            while($tmp = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><a href = "reply_view.php?no=<?=$tmp['no']?>">댓글</a></td>
                <td><a href = "filedelete.php?no=<?=$tmp['no']?>">파일 삭제</a></td>
                <td><a href = "download.php?no=<?=$tmp['no']?>">파일 다운로드</a></td>
                <td><a href = "fileupdate_view.php?no=<?=$tmp['no']?>">파일 수정</a></td>
                <td><?php echo $tmp['no']?></td>
                <td><?php echo $tmp['utitle']?></td>
                <td><?php echo $tmp['naming']?></td>
                <td><?php echo $tmp['uname']?></td>
                <td><?php echo $tmp['ucontent']?></td>
                <td><?php echo $tmp['ufile1']?></td>
                <td><?php echo $tmp['ufile2']?></td>
            </tr>
        <?php } ?>
            </tbody>
            </table>
</body>
</html>