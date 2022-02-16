<?php 
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );
 
 session_start();

$db = new mysqli('localhost','je','jejedb79!!','je');
$userid = $_POST['userid'];
$pass1 = $_POST['pass1'];
$sql = "select * from wpdms where userid = '$userid'";
$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    $hash = $row['pass1'];

    $result = password_verify($pass1, $hash);

    if($result == true){
        $_SESSION['userid'] = $userid;
        echo json_encode("로그인 성공!!!!!");
    }else{
        echo json_encode("로그인이 거부되었습니다");
    }
    
}else{
    echo json_encode("로그인에 실패하였습니다.");
}
?>