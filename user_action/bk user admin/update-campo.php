<?php

// Incluimos la conexión. 
include_once("../db/connect.php");
// Pasamos los datos del formulario. 
$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$mail = $_POST['mail'];
$accounttype = $_POST['accounttype'];
$password = $_POST['password'];
$money = $_POST['money'];
// Pasamos los datos para actualizarlos en la tabla. 
$ssql = "UPDATE `users` SET `id`='$id',`name`='$name', `lastname`='$lastname', `mail`='$mail',`accounttype`='$accounttype',`password`='$password',`money`='$money' WHERE `id`='$id'";
// Liberamos los datos con la condición if. 
if (mysql_query($ssql)) {
    echo "Actualización exitosa ";
} else {
    echo "Error de actualizacion ";
}
// Mostramos los datos. 
echo 'id: ' . $_POST['id'] . ', Nombre: ' . $_POST['name'] . ', Apellidos: ' . $_POST['lastname'] . ', E-mail: ' . $_POST['mail'] . ', Account Type: ' . $_POST['accounttype'] . ', Password: ' . $_POST['password'] . ', Money: ' . $_POST['money'] . '<br /><br />';
echo '<a href="user_admin.php" target="_self">Atras</a>';
echo '<a href="update-con-seleccion.php" target="_self">Inicio</a>';
// Cerramos la conexion con el servidor. 
// mysql_close($conexion);
?> 