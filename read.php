<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>게시글</title>
</head>
<body>
    <h2>게시글</h2>
    <a href="./write_view.php">글 작성</a>       
        <table border="1">
            <thead>
                <tr>
                    <th>댓글</th>
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
    while( $tmp = mysqli_fetch_assoc($result) ) { ?>
        <tr>
            <td><a href="test_reply_view.php?no=<?=$tmp['no']?>">댓글</a></td>
            <td><a href="read_1.php?no=<?=$tmp['no']?>">파일다운로드</a><?php echo $tmp['no']?><br>
                <a href="fileupdate_view.php?no=<?=$tmp['no']?>">파일수정</a><?php echo $tmp['no']?>
            </td>
            <td><?php echo $tmp['utitle']?></td>
            <td><?php echo $tmp['naming']?></td>
            <td><?php echo $tmp['uname']?></td>
            <td><?php echo $tmp['ucontent']?></td>
            <td><?php echo $tmp['ufile1']?></td>
            <td><?php echo $tmp['ufile2']?></td>
        </tr>
    <?php } 
?>
        </tbody>
    </table>
</body>
</html>