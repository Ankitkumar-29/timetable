<?php
session_start();
include 'dbconn.php';

if(isset($_POST["id"])&&isset($_COOKIE["userid"])){
    $id=$_COOKIE["userid"];
    setcookie("PHPSESSID","",time()-3600);
    setcookie("userid","",time()-3600);
    $qry="delete from active_session where userid='$id'";
    $conn->query($qry);
    session_destroy();
    echo 1;
}
else {
  echo 0;
}

 ?>
