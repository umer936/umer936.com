 switch($_GET['security_Unique_site_id']){  
///////This is where each site is given a unique Security ID. This way only the sites you want to have access can have it.//////
    case "umer936isawhume_3DZ":
      $X='true';        //Security ID works
      $site='3DZone';//Specify Name Of Site
     break;
    case "umer936isawhume_Compass":      
      $X='true';
      $site='Compass';
     break;
    default:
      $X='false';       //Security ID doesn't work
     break;
 }
if($_GET['Username']!=NULL && $_GET['Password']!=NULL && $X!='false'){
 $pass = '';           //Give $pass the users password from the database
 if($pass==md5($_GET['Password'])){
   $t = strtotime("+ 0 minutes");
   $a = $_GET['mess'];
   $a = str_replace("asdasd674f", "&", $a);//Allow '&' Symbols
   $a = str_replace("284537u", " ", $a);   //Allow Spaces
  mysql_query("INSERT INTO STATUS TABLE"); 
}}