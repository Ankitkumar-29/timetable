<?php
session_start();
function validate()
{
  if(isset($_COOKIE["PHPSESSID"])&&isset($_COOKIE["userid"]))
  {
    $userid=$_COOKIE["userid"];
    $sessid=$_COOKIE["PHPSESSID"];

    include 'dbconn.php';

    $qry="select * from active_session where sessionid='$sessid' and userid='$userid'";
    $rs=$conn->query($qry);
    if(mysqli_num_rows($rs)>0)
    {
      if(!isset($_SESSION["userid"])){
        $qry="select * from login_details where `userid`='$userid'";
        $rs=$conn->query($qry);
        $r=$rs->fetch_assoc();
        $_SESSION["userid"]=$userid;
        $_SESSION["type"]=$r["type"];
        $_SESSION["email"]=$r["email"];
      }
      return 1;
    }
    else {
      setcookie("PHPSESSID","",time()-3600);
      setcookie("userid","",time()-3600);
      return 0;
    }
  }
  else {
    return 0;
  }
}
?>
