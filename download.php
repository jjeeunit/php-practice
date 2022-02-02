<?php 
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );
 
$db = new mysqli('localhost','root','whwpdms','je');

$no = $_GET['no'];
$sql = "select * from board where no = '".$no."'";
$result = mysqli_query($db, $sql);
$tmp = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일 다운로드</title>
</head>
<body>
    <table border=1 align=center>
        <form action="write_server.php" method="post" enctype="multipart/form-data">
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
                <td>첨부파일1</td>
                <td><?php echo $tmp['ufile1']?><a href = "download_1.php?file_no=<?=$tmp['ufile1']?>">파일다운로드</a></td>
            </tr>
            <tr>
                <td>첨부파일2</td>
                <td><?php echo $tmp['ufile2']?><a href = "download_1.php?file_no=<?=$tmp['ufile2']?>">파일다운로드</a></td>
            </tr>
        </form>
    </table>
</body>
</html>