<head>

<script src='http://killacta.org/popup.js'></script>
<link href='http://fonts.googleapis.com/css?family=Stardos+Stencil|Shadows+Into+Light+Two|Lobster|Prosto One|Droid+Sans|Simonetta|Iceberg' rel='stylesheet' type='text/css'>

<!--[if lt IE 7]>
<div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'>
<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44835506-1', 'umer936.com');
  ga('send', 'pageview');

</script>
<style>
behavior: url(PIE.htc);
</style>
<script src="less-1.1.5.min.js" type="text/javascript"></script>
</head>

<?php

$error = "<hr style='border: 20px solid red'><b style='color:red'>
DX OH NOES! You broke something! Look at what you did! ->";
$mysql_host = "localhost";
// $mysql_database = "";
$mysql_database = "";
$mysql_user = "";
$mysql_password = "";

$conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);


if (!$conn)
  {
  die('' . $error . ' ' . mysql_error()); header('location: /socketdown.php');
  }

?>

