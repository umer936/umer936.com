<? 
session_start();
session_destroy();

setcookie("user", "", time()-3600);
echo "You have been logged out <br><a href=/>Home</a>";

?>