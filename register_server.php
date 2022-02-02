<?php 
ini_set( "display_errors", 1 );
error_reporting( E_ALL );

 $db = new mysqli('localhost','root','whwpdms','je');

 $naming=$_POST['naming'];
 $userid=$_POST['userid'];
 $pass1=$_POST['pass1'];
 $pass1= password_hash( $pass1, PASSWORD_DEFAULT);
 $pass2=$_POST['pass2'];
 $pass2= password_hash( $pass2, PASSWORD_DEFAULT);
 $phonenum = $_POST['phonenum'];

 $sql = "insert into wpdms (naming, userid, pass1, pass2) values ('$naming','$userid','$pass1','$pass2')";
 $result = mysqli_query($db, $sql);
 
 if ($result){
 $last_uid = mysqli_insert_id($db);
 } 
 $sql2 = "insert into wpdms_detail (no2, naming, phonenum) values ('$last_uid', '$naming','$phonenum')";
 $result = mysqli_query($db, $sql2);

?>