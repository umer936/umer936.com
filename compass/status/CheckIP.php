$ip = $_SERVER['REMOTE_ADDR'];
 $user = $_COOKIE['user'];

 $q = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$user' AND ip='$ip'"));
 if ($q=="1") {$true = "True";} 
else {$true = "Fake"; echo "Your call could not be completed as dialed, please <a href=/logout.php>logout</a> and login again<hr>";}
