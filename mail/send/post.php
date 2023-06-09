<?php

 include '../../db.php';

 include '../../ckban.php';

 include '../../userrank.php';

 header("location: /mail");
 
 $tuser = $_POST['to'];

 $sub = $_POST['sub'];

 $body = $_POST['body'];

 $fuser = $_COOKIE['user'];
 
 $id = time();

 $senddate = date("Y-m-d H:i:s", time()); 

 mysql_query("INSERT INTO mail (UserFrom, UserTo, Message, Subject, SentDate)
 VALUES ('$fuser', '$tuser', '$body', '$sub', '$senddate')");

 ?>