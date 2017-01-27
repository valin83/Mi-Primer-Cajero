<?php
/* Editar. */
// Incluimos la conexión. 
include_once("../db/connect.php");
// Seleccionamos los campos y la tabla. 
$ssql = "select id, name, lastname, mail, accounttype, password, money from users";
// Liberamos los datos. 
$rs_libros = mysql_query($ssql);


// Pasamos los datos de la query a un array con un bucle while.
while ($fila = mysql_fetch_array($rs_libros)) {
// Pasamos la variable $fila y creamos un enlace para pasar la id por url = $_GET. 
    echo'<a href="user_admin.php?id=' . $fila['id'] . '">Editar</a> ';
// Sacamos todas las filas de la base con el array. 
    echo $fila["name"] . " | ";
    echo $fila["lastname"] . " | ";
    echo $fila["mail"] . " | ";
    echo $fila["accounttype"] . " | ";
    echo $fila["password"] . " | ";
    echo $fila["money"] . "<br />";
}

?> 