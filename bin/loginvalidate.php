<?php
session_start();
if(isset($_POST["userid"])&&isset($_POST["pass"]))
{
include 'dbconn.php';


$userid=$_POST["userid"];
$pass=$_POST["pass"];

$qry="select * from login_details where userid='$userid' and pass='$pass'";
$rs=$conn->query($qry);

if(mysqli_num_rows($rs)>0){
  $r=$rs->fetch_assoc();

  if($r["userid"]==$userid&&$r["pass"]==$pass)
  {
    $sessionid=session_id();

    $qry ="delete * from active_session where userid='$userid' and sessionid='$sessionid'";
    $conn->query($qry);

    $qry ="insert into active_session values('$sessionid','$userid')";
    $conn->query($qry);

     setcookie("userid",$userid,time()+86400*30);
     setcookie("livesession",$sessionid,time()+84600*30);
     echo "success";

  }

  else {

    echo "failed";
  }

}
else {
  echo "failed";
}
}
else {
  header("Location: ../index.php");
}
 ?>
