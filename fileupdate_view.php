<?php 
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );

 $no = $_GET['no'];
 $db = new mysqli('localhost','root','whwpdms','je');
 $sql = "SELECT * FROM board WHERE no = $no";
 $result = mysqli_query($db, $sql);
 $tmp = mysqli_fetch_assoc($result);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일 수정</title>

    <script type ="text/javascript">
        function updateSize(){
            if(document.getElementById("file1").value!=""){
                var fileSize1 = document.getElementById("file1").files[0].size;
                var maxSize1 = 1 * 1024 * 1024; 

                if(fileSize1 > maxSize1){
                    alert("첨부파일 사이즈는 1MB 이내로 등록 가능합니다");
                    return;
                }
            }

            if(document.getElementById("file2").value!=""){
                var fileSize2 = document.getElementById("file2").files[0].size;
                var maxSize2 = 1 * 1024 * 1024; 

                if(fileSize2 > maxSize2){
                    alert("첨부파일 사이즈는 1MB 이내로 등록 가능합니다");
                    return;
                }
            }
        }
    </script>
</head>
<body>
    <table border=1 align=center>
        <form action="fileupdate_server.php" method = "post" enctype="multipart/form-data">  <!--enctype 빠지면 파일이 안 올라가-->
            <input type = "hidden" name="no" value ="<?=$_GET['no']?>"> <!-- 이거 빠지면 수정이 안되!-->
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
                <td><?php echo $tmp['ufile1']?><input type="file" id = "file1" name="ufile1" accept=".gif, .jpg, .png, .txt" onchange="updateSize();"></td>
            </tr>
            <tr>
                <td>첨부파일2</td>
                <td><?php echo $tmp['ufile2']?><input type="file" id = "file2" name="ufile2" accept=".gif, .jpg, .png, .txt" onchange="updateSize();"></td>
            </tr>
            <tr>
                <td><button type="submit">수정하기</button></td>
            </tr>
        </form>
    </table>
</body>
</html>