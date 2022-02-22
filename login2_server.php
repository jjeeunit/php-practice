<?php 
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );
 
 session_start(); 

 
function _json($msg= '', $err = true) 
{
    $json = array('msg'=> $msg ,'err' => $err);

    return exit(json_encode($json, JSON_FORCE_OBJECT));
}

$userid = isset($_POST['userid']) ? $_POST['userid'] : false;
$pass1 = isset($_POST['pass1']) ? $_POST['pass1'] : false;

if (strlen($userid) < 4) return _json('아이디는 4자 이상');
if (strlen($pass1) < 8) return _json('비밀번호는 8자 이상');


/********pdo 사용 */
// $Db = new PDO("mysql:host=localhost;dbname=je", 'root', 'whwpdms');
// $sql = $Db -> query("select * from wpdms where userid = '$userid'");
// $row = $sql->fetch();
// if ( false == $row ) return _json('회원정보를 찾을 수 없습니다.');
// if (true !== password_verify($pass1, $row['pass1'])) return _json('회원정보를 찾을 수 없습니다.');
// $_SESSION['userid'] = $userid;
// return _json('', false);

/********pdo 사용( bindParam )*/
// $Db = new PDO("mysql:host=localhost;dbname=je", 'root', 'whwpdms');
// $sql = $Db->prepare("select * from wpdms where userid = :userid");
// $sql->bindParam(':userid', $userid);
// $sql->execute();  
// $row = $sql->fetch();
// if ( false == $row ) return _json('회원정보를 찾을 수 없습니다.');
// if (true !== password_verify($pass1, $row['pass1'])) return _json('회원정보를 찾을 수 없습니다.');
// $_SESSION['userid'] = $userid;
// return _json('', false);

/********pdo 사용( array ) */
$Db = new PDO("mysql:host=localhost;dbname=je", 'root', 'whwpdms');
$sql = "select * from wpdms where userid = ?";
$stmt = $Db->prepare($sql);
$stmt->execute(array($userid));
$row = $stmt->fetch();
if ( false == $row ) return _json('회원정보를 찾을 수 없습니다.');
if (true !== password_verify($pass1, $row['pass1'])) return _json('회원정보를 찾을 수 없습니다.');
$_SESSION['userid'] = $userid;
return _json('', false);
?>