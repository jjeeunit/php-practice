<?php
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );
 
 $db = new mysqli('localhost','root','whwpdms','je');

 $no = $_POST['no']; 
 $ufile1 = $_FILES['ufile1']['name'];
 $ufile2 = $_FILES['ufile2']['name'];
 $ufileTmp1 = $_FILES['ufile1']['tmp_name'];
 $ufileTmp2 = $_FILES['ufile2']['tmp_name'];

//파일 확장자 생성(jpg, png, txt, gif)
$dir = '';
$ufileType1 = explode('.',$ufile1);
$ufileType2 = explode('.',$ufile2);
$extension1 = array_pop($ufileType1);
$extension2 = array_pop($ufileType2);

$sql = "SELECT * FROM board WHERE no = '".$no."'";
$result = mysqli_query($db, $sql);
$tmp = mysqli_fetch_assoc($result);

//파일 있으면 삭제 그리고 수정하기
if(isset($tmp['ufile1']) && (strlen($tmp['ufile1']) > 0 )){

    $extTmp1 = explode('.', $tmp['ufile1']);
    $ext1 = array_pop($extTmp1);
    $fileRoad1 = 'C:\Users\yo812\Desktop\img'.'/'.$ext1.'/'.$tmp['ufile1'];

    if(file_exists($fileRoad1)){
        unlink($fileRoad1);
        echo '파일삭제성공';
    }else{
        echo '파일없음';
    }
}

if(isset($tmp['ufile2']) && (strlen($tmp['ufile2']) > 0)){

    $extTmp2 = explode('.', $tmp['ufile2']);
    $ext2 = array_pop($extTmp2);
    $fileRoad2 = 'C:\Users\yo812\Desktop\img'.'.'.$ext2.'.'.$tmp['ufile2'];

    if(file_exists($fileRoad2)){
        unlink($fileRoad2);
        echo '파일삭제성공';
    }else{
        echo '파일없음';
    }
}

//파일 확장자 생성(jpg, png, txt, gif)
    if(($extension1 == 'jpg')||($extension2 == 'jpg')){
        $dir = 'jpg';
        if(false == file_exists('C:\Users\yo812\Desktop\img'.'/'.$dir)){
            mkdir('C:\Users\yo812\Desktop\img'.'/'.$dir);
            chmod('C:\Users\yo812\Desktop\img'.'/'.$dir,0777);
        }
    }
   if(($extension1 =='txt')||($extension2 == 'txt')){
       $dir = 'txt';
       if(false == file_exists('C:\Users\yo812\Desktop\img'.'/'.$dir)){
           mkdir('C:\Users\yo812\Desktop\img'.'/'.$dir);
           chmod('C:\Users\yo812\Desktop\img'.'/'.$dir,0777);
       }
   }
   if(($extension1 =='png')||($extension2 == 'png')){
       $dir = 'png';
       if(false == file_exists('C:\Users\yo812\Desktop\img'.'/'.$dir)){
           mkdir('C:\Users\yo812\Desktop\img'.'/'.$dir);
           chmod('C:\Users\yo812\Desktop\img'.'/'.$dir,0777);
       }
   }
   if(($extension1 == 'gif')||($extension2 == 'gif')){
       $dir ='gif';
       if(false == file_exists('C:\Users\yo812\Desktop\img'.'/'.$dir)){
           mkdir('C:\Users\yo812\Desktop\img'.'/'.$dir);
           chmod('C:\Users\yo812\Desktop\img'.'/'.$dir,0777);
       }
   }
   
   //파일 업로드 저장(jpg, png, txt, gif 로 들어가게 저장)
   move_uploaded_file($ufileTmp1,'C:\Users\yo812\Desktop\img'.'/'.$extension1.'/'.$ufile1);
   move_uploaded_file($ufileTmp2,'C:\Users\yo812\Desktop\img'.'/'.$extension2.'/'.$ufile2);

 $sql2 = "UPDATE board SET ufile1 = '".$ufile1."', ufile2 = '".$ufile2."' WHERE no ='".$no."'";
 $result = mysqli_query($db, $sql2);
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