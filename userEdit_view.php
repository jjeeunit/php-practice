<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$db = new mysqli('localhost','root','whwpdms','je');
$sql = "select * from wpdms";
$result = mysqli_query($db, $sql);
$tmp = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원리스트</title>
</head>
<body>
<h2>회원리스트</h2>
        <form action = "userEdit_server.php" method ="post">
            <input type="hidden" name="no" value="<?=$tmp['no']?>">         
            <div id ="u_naming">
                <textarea name ="naming" id="uname" rows="1" cols="55" placeholder="이름" maxlength="100" disable><?php echo $tmp['naming']; ?></textarea>
            </div>
            <div id ="u_userid">
                <textarea name ="userid" id="uid" rows="1" cols="55" placeholder="아이디" maxlength="100" disable><?php echo $tmp['userid']; ?></textarea>
            </div>
            <div id ="u_phonenum">
                <textarea name ="phonenum" id="uphonenum" rows="1" cols="55" placeholder="휴대폰번호" maxlength="100" ><?php echo $tmp['phonenum']; ?></textarea>
            </div>
                <button type="submit">수정하기</button>
        </form>
                <button onclick="location.href='list.php'">목록으로</button >
        </table>  
</body>
</html>