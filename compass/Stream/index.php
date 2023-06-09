<?
include '../db.php';
include '../ckban.php';

$queryf = mysql_query("SELECT * FROM StreamCommunity ORDER BY id DESC LIMIT 10");


While ($row = mysql_fetch_array($queryf))
 {echo "<a href=/profiles/?user=".$row['User'].">".$row['User']."</a> ".$row['did']."<hr>"; 
}
?>