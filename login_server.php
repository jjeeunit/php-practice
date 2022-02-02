<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

session_start();

$db = new mysqli('localhost','root','whwpdms','je');

$userid = $_POST['userid'];
$pass1 = $_POST['pass1'];


$sql = "SELECT * FROM wpdms WHERE userid = '$userid'";
$result = $db -> query($sql);

if($result->num_rows==1){
    $row = $result ->fetch_array(MYSQLI_ASSOC);
    $hash = $row['pass1'];


    if(password_verify($pass1, $hash)){
        $_SESSION['userid']=$userid;
        echo "로그인 성공!";
    }
    else{
        echo "로그인에 실패하였습니다";
    }
}
else{
    echo "로그인에 실패하였습니다";
}
?>
<br><br>
<body>
    <div class="base">
        <button type="button" name="btn" value="" onclick="location.href='logout.php'">LOGOUT</button>
    </div>
</body>