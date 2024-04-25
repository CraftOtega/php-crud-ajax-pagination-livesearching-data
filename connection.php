 <?php
$servername="localhost";
$username="ccm_web";
$password="ccmwebsite";
$mydb="ccm_DB";
$conn=mysqli_connect($servername, $username, $password, $mydb);
if (!$conn) {
die("connection error".mysqli_connect_error());
}
$error="";



?> 