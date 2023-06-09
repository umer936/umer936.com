<?
mysql_query("INSERT INTO online (username, timeout) VALUES (\"" . $_COOKIE['user'] . "\", \"" . time() . "\")");
 mysql_query("UPDATE users SET lastonline=NOW() WHERE username='" . $_COOKIE['user'] . "'");  
 mysql_query("UPDATE users SET lastdoing='$place' WHERE username='" . $_COOKIE['user'] . "'");  