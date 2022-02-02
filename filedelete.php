<?php
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );
 
 $no = $_GET['no'];
 $db = new mysqli('localhost','root','whwpdms','je');

 $sql = "SELECT * FROM board WHERE no = $no";
 $result = mysqli_query($db, $sql);
 $tmp = mysqli_fetch_assoc($result);

 if(file_exists('C:\Users\yo812\Desktop\img')){
    echo "파일이 존재합니다";

    $extTmp1 = explode('.', $tmp['ufile1']);
    $ext1 = array_pop($extTmp1);
    $fileRoad1 = 'C:\Users\yo812\Desktop\img'.'/'.$ext1.'/'.$tmp['ufile1'];
     if(file_exists($fileRoad1)){
         unlink($fileRoad1);
         echo '파일삭제성공';
     }else{
         echo '파일없음';
     }

     $extTmp2 = explode('.',$tmp['ufile2']);
     $ext2 = array_pop($extTmp2);
     $fileRoad2 = 'C:\Users\yo812\Desktop\img'.'/'.$ext2.'/'.$tmp['ufile2'];
     if(file_exists($fileRoad2)){
         unlink($fileRoad2);
         echo '파일삭제성공';
     }else{
         echo '파일없음';
     }

     $sql2 = "DELETE FROM board WHERE no = $no";
     $result = mysqli_query($db, $sql2);

 }else{
     echo "파일이 존재하지 않습니다";
 }
?>

<html>
    <head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <button onclick="location.href='read.php'">목록으로</button >
    </div>
</body>
</html>