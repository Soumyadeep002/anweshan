<?php
// define('site-db',true);


// if(!defined('my-site')){

//     Header("location:access-denied.html");
//     }
    
?>
<?php
$sname="localhost";
$unmae="root";
$password="";

$db_name="event_buddy_01";

$conn=mysqli_connect($sname,$unmae,$password,$db_name);

if(!$conn){
  
    echo "Connection Failed !";
}
// else{
//     echo"hi";
// }

?>

