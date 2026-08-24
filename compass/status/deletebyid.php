<?php

 $idnum = $_GET['id'];
require_once __DIR__ . '/../mysql_credentials.php';

 $conn = mysql_connect($compass_online_mysql_host, $compass_online_mysql_user, $compass_online_mysql_password);
 mysql_select_db($compass_online_mysql_database, $conn);
 mysql_query("DELETE FROM status WHERE id='$idnum'");
 mysql_close($conn); Header ("location: index.php");
