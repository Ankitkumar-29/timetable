<?php
header("Content-type:text/javascript");
 //$_POST["clid"]="CIE-2";
 if(isset($_POST['clid']))
 {
   include 'dbconn.php';
   $cls =$_POST['clid'];
  //  echo $cls;
   $qry="SELECT * FROM `$cls` ORDER BY FIELD(Day,'Monday' , 'Tuesday' ,'Wednesday' , 'Thrusday' ,'Friday','Saturday' )";
   $rs=$conn->query($qry);
   if(mysqli_num_rows($rs)>0){
      while($r=$rs->fetch_assoc())
      {

        $tt_list[$r["Day"]]=$r;

      }
   }
   echo json_encode($tt_list);

 }
 ?>
