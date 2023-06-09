<? include 'db.php';
?>
<center><meta name="viewport" content=width=device-width>
<strong>Stats</strong><br><hr><br>


<u>Users</u><br>
<? 
echo "Number of Users: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users"));
echo "<br>Number of Users Online In Past 1 Hour: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 1 HOUR)"));
echo "<br>Number of Users Online In Past 6 Hours: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 6 HOUR)"));
echo "<br>Number of Users Online In Past 12 Hours: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 12 HOUR)"));
echo "<br>Number of Users Online In Past 24 Hours: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 24 HOUR)"));
echo "<br>Number of Users Online In Past 48 Hours: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 48 HOUR)"));
echo "<br>Number of Users Online In Past Week: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 168 HOUR)"));
echo "<br>Number of Users Online In Past 2 Weeks: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 336 HOUR)"));
echo "<br>Number of Users Online In Past Month: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 730.484398 HOUR)"));
echo "<br>Number of Users Online In Past 2 Months: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 1460.9688 HOUR)"));
echo "<br>Number of Users Online In Past Year: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 8765.81277 HOUR)"));
echo "<br>Number of Users Online In Past 2 Years: ";
echo mysql_num_rows(mysql_query("SELECT * FROM users WHERE lastonline >= SUBDATE( CURRENT_DATE, INTERVAL 17531.6255 HOUR)"));