<?php

$replyNo = $_GET['replyNo'];
$db = mysqli_connect('localhost','root','whwpdms','je');

$sql = "DELETE FROM test_reply WHERE replyNo = '$replyNo'";
$result = mysqli_query($db, $sql);
var_dump($sql);

?>
