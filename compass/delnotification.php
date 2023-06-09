<? 
include 'db.php';

echo "<script>location.href=document.referrer;</script>";


mysql_query("UPDATE notifications SET read='yes' WHERE ID='" . $_GET['id'] . "'"); 

 ?>