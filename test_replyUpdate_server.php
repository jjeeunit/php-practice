<?php
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

echo $replyNo =  $_POST['replyNo'];
$rewriter = $_POST['rewriter'];
$recontent = $_POST['recontent'];

$db = mysqli_connect('localhost','root','whwpdms','je');

$sql = "update test_reply set rewriter ='".$rewriter."', recontent='".$recontent."' WHERE replyNo = '".$replyNo."'";
$result = mysqli_query($db, $sql);
var_dump($sql);
?>