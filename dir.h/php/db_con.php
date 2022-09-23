<?php
$servername='localhost';
$username='id15088296_admin';
$password="C^Y!)MY%)53Ce%Xd";
$dbname = "amazingpizza";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
mysqli_set_charset($conn, 'utf8');
if(!$conn)
{
   die('Could not Connect My Sql:' .mysql_error());
}
/*else {
  echo("connected");
}
*/
?>