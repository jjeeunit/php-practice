<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

$no = isset($_GET['no'])? $_GET['no']:'';
$db = new mysqli('localhost','root','whwpdms','je');
$sql = "select * from wpdms w inner join wpdms_detail d on w.naming = d.naming where w.no ='".$no."'";
$result = mysqli_query($db, $sql);
$tmp = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보수정</title>
</head>
<body>
    <div>
        <h1>회원정보수정</h1>
        <form action="modify_server.php" method="post">
            <input type="hidden" name="no" value="<?=$tmp['no']?>"> <!--이걸 넣어야 update가 먹혀 -->
            <div id = "u_naming">
                <textarea name="naming" id="uname" rows="1" cols="55" placeholder="작성자" maxlength="100"><?php echo $tmp['naming'] ?></textarea>
            </div>
            <div id = "u_userid">
                <textarea name="userid" id="uid" rows="1" cols="55" placeholder="아이디" maxlength="100"><?php echo $tmp['userid'] ?></textarea>
            </div>
            <div id = "u_password1">
                <textarea name="pass1" id="upass1" rows="1" cols="55" placeholder="비밀번호" maxlength="100"><?php echo $tmp['pass1'] ?></textarea>
            </div>
            <div id = "u_password2">
                <textarea name="pass2" id="upass2" rows="1" cols="55" placeholder="비밀번호확인" maxlength="100"><?php echo $tmp['pass2'] ?></textarea>
            </div>
            <div id = "u_phonenum">
                <textarea name="phonenum" id="uphonenum" rows="1" cols="55" placeholder="휴대폰번호" maxlength="100"><?php echo $tmp['phonenum'] ?></textarea>
            </div>
                <button type="submit">수정하기</button>
        </form>
                <button onclick="location.href='list.php'">목록으로</button >
    </div>
</body>
</html>