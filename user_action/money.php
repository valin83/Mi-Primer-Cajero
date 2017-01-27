<?php

include_once ('../db/connect.php');
require ('../functions/functions.php');

session_start();

$result = mysql_query("SELECT * from users where mail ='" . $_SESSION['usuario'] . "'");
$row = mysql_fetch_array($result);


echo ' <div style="text-align: center; font-weight: bold;"> <h1>Bienvenido ' . $row['name'] . ' ' . $row['lastname'] . '</h1></div>';
echo '<br><h3><span style="font-style: italic;">Su saldo actual es: ' . $row['money'] . '</span></h3><br>';
?>