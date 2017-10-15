<?php
header("Content-type:text/javascript");

    include 'dbconn.php'
    $key=$_GET['key'];
    $array = array();
    $query=mysql_query("select * from `techers` where `name` LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['title'];
    }
    echo json_encode($array);
?>
