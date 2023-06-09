<meta name="viewport" content="width=device-width">
<script src=http://www.kryogenix.org/code/browser/sorttable/sorttable.js></script>
<style>
body, select, th, input, td {
font-family: Iceberg, Arial, Helvetica, sans-serif;
}
<?
include '../db.php';
include 'check.php';
?>
<div id=BanAUser>
<strong>Ban Users</strong>
<hr color=silver>
<form name="Ban User" action="banuser.php" method="POST">
<input name=user value=UserToBeBanned>
<input name=reason value=Reason>

<select name="EndTime">
<option value="">Ban Time</option>
<option value="">---</option>
<option value="Year">One Year</option>
<option value="Month">One Month</option>
<option value="Week">One Week</option>
<option value="Day">One Day</option>
</select>
<select name="BanEnded">
<option value="">Ended?</option>
<option value="">---</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
<input type="submit" value="Submit" />
</form>
</div>

<hr>
<?
$query="SELECT * FROM bans ORDER BY 'ID' DESC";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();
?>
<table border="0" class="sortable" id="bans" cellspacing="2" cellpadding="2" style="width: 100%;border-collapse: collapse;">
<tr>
<th>ID</th>
<th>User Banned</th>
<th>Banned By</th>
<th>Reason</th>
<th>Ban Start Time</th>
<th>End Time</th>
<th>Ban Ended</th>
</tr>

<?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"endtime");
$f2=mysql_result($result,$i,"user");
$f3=mysql_result($result,$i,"by");
$f4=mysql_result($result,$i,"starttime");
$f5=mysql_result($result,$i,"ended");
$f6=mysql_result($result,$i,"ID");
$f7=mysql_result($result,$i,"reason");
?>

<style>
td {font-size: 1.2em;
border: 1px solid #98BF21;
padding: 3px 7px 2px 7px;}
th {background-color: green; color: silver;}
#BanAUser {background-color: grey;}
</style>

<tr>
<td><?php echo $f6; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f7; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f1; ?></td>
<td><?php echo $f5; ?></td>
</tr>

<?php
$i++;
}
?>