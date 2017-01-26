<?php 

$mysql_server = "localhost"; // localhost is common on most hosts.
$mysql_user = "root"; //  this is the name of your username of the server.
$mysql_password = ""; // the password connected to the username. MAKE IT COMPLEX.
$mysql_database = "cajero"; // the database name of where to connect to and where the information will be help.
//$connection = mysql_connect("$mysql_server","$mysql_user","$mysql_password") or die ("Unable to establish a DB connection");
//$db = mysql_select_db("$mysql_database") or die ("Unable to establish a DB connection");
$connection = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_database)  or die ("Unable to establish a DB connection");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



?>
