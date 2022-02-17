<?php 
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );
 
 session_start();

$Db = new Mysqli('localhost','je','jejedb79!!','je');
$userid = isset($_POST['userid']) ? $_POST['userid'] : false;
$pass1 = isset($_POST['pass1']) ? $_POST['pass1'] : false;
$sql = "select * from wpdms where userid = '$userid'";

function _json($msg= '', $err = true)
{
    $json = array('err' => $err, 'msg'=> $msg);

    return exit(json_encode($json, JSON_FORCE_OBJECT));

}


if ((false === ($res = $Db->query($sql)))) return _json('회원정보를 찾을 수 없습니다.');
if ($res->num_rows < 1) return _json('아이디가 일치하지 않습니다.');
$row = $res->fetch_assoc();
if (true !== password_verify($pass1, $row['pass1'])) return _json('비밀번호가 일치하지 않습니다.');
$_SESSION['userid'] = $userid;
return _json('', false);

/*
if ((false === ($res = $Db->query($sql)))) exit(json_encode(array('err'=> true, 'msg' => '회원정보를 찾을 수 없습니다.')));
if ($res->num_rows < 1) exit(json_encode(array('err'=> true, 'msg' => '회원정보를 찾을 수 없습니다.')));
$row = $res->fetch_assoc();
if (true !== password_verify($pass1, $row['pass1'])) exit(json_encode(array('err'=> true, 'msg'=>'비밀번호가 일치하지 않습니다.')));
$_SESSION['userid'] = $userid;
exit(json_encode(array('err'=> false, 'msg' => '')));
*/

/*
var_dump($Db->query($sql));
if ((false !== ($res = $Db->query($sql))) && $res->num_rows > 0 ) {
    $row = $res->fetch_assoc();
    if (true !== password_verify($pass1, $row['pass1']))
    
}
*/
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <br><br>
    <div class="base">
        <button type="button" name="btn" value="" onclick="location.href='logout1.php'">LOGOUT</button>
    </div>
</body>
</html>