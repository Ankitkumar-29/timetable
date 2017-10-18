<?php
if(isset($_POST['content']) && isset($_POST['sclid']))
{
include "dbconn.php";
$data= $_POST['content'];
$sclid ="SUB_".$_POST['sclid'];
  foreach ($data as $key => $value) {
      $i=0;
      $sub="";
    foreach ($value as $key1 => $value1){
      if($i==0)
      {
        $sub=$value1;
        $i++;
      }
      else {
        $qry="UPDATE `$sclid` SET `name`='$value1' WHERE `sub`='$sub'";
        $conn->query($qry);
      }
  }
  }
  echo "success";
}
else {
 echo "failed";
}
 ?>
