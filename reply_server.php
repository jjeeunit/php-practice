<?php
 ini_set( "display_errors", 1 );
 error_reporting( E_ALL );

 $bno2 = $_POST['bno2'];
//  $reno = $_POST['reno'];
//  $redepth = $_POST['redepth'];
//  $rewriter = $_POST['rewriter'];
//  $recontent = $_POST['recontent'];
//  $redate = $_POST['redate'];

 $db = new mysqli('localhost','root','whwpdms','je');

 $sql = "insert into reply (bno2, reno, redepth, rewriter, recontent, redate) values ('$bno2','$reno','$redepth','$rewriter','$recontent','$redate')";
 $result = mysqli_query($db, $sql);
?>