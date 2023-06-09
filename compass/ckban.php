<?
include 'db.php';
$bannedip = mysql_query("SELECT `user`, `reason`, `by`, `ended`, `endtime`, `starttime`, `ID` FROM `bans` WHERE `user` = '" . $_COOKIE['user'] . "' AND `ended` = \"No\" OR `user` = \"" . mysql_real_escape_string($_POST["user"]) . "\" AND `ended` = 'No'") or die(mysql_error());
$banned = mysql_fetch_assoc($bannedip);
if ($banned["user"]) // will be false/null/blank if no field matched the IP in the table
{

 echo "You've been banned because: ", $banned["reason"];
echo "<br>By: ", $banned["by"];
echo "<br>Until: ", $banned["endtime"];
echo "<br>Current Time: ", date("Y-m-d H:i:s");
echo "<br>Been banned since: ", $banned["starttime"];
echo "<hr>";

function dateDiff($start, $end) {

$start_ts = strtotime($start);

$end_ts = strtotime($end);

$diff = $start_ts - $end_ts;


return $diff / 86400;
}

$dateiff = dateDiff($banned['endtime'], date("Y-m-d H:i:s"));
if($dateiff > '0') {$thediff = round($dateiff); echo "$thediff"; echo " Days Until Unban";}
 else {mysql_query("UPDATE bans SET ended =  'Yes' WHERE ID ='" . $banned['ID'] . "'"); 
echo('<meta http-equiv="refresh" content="5">'); echo "You have been Unbanned... Refreshing... ";}
exit();
}