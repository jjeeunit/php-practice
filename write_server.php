<?php 
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );

 $db = new mysqli('localhost','root','whwpdms','je');

 $utitle = $_POST['utitle'];
 $naming = $_POST['naming'];
 $uname = $_POST['uname'];
 $ucontent = $_POST['ucontent'];
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
    
    $sql = "INSERT INTO board (utitle, naming, uname, ucontent, ufile1, ufile2) VALUE ('$utitle','$naming','$uname','$ucontent','$ufile1','$ufile2')";
    $result = mysqli_query($db, $sql);
    ?>

<html>
    <head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <button onclick="location.href='write_view.php'">목록으로</button >
    </div>
</body>
</html>