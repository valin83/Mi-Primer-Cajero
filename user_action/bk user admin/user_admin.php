<?php
/* Para iniciar las sesiones. */
session_start();
// Incluimos la conexión. 
    include_once("../db/connect.php");
// Pasamos el id por $_GET desde la url. 
    //$id = @$_GET["id"];
// Seleccionamos la id y pasamos la variable id. 
    // $ssql = "select * from users where id=" . $id;
    $ssql = "select * from users";
// Liberamos los datos. 
    $rs_libros = mysql_query($ssql);
// Pasamos los datos de la query a un array con un bucle while. 
while (@$fila = mysql_fetch_array($rs_libros)) {
// Sacamos todas las filas de la base con el array. 
    echo "Nombre: ";
    echo $fila["name"] . " | ";
    echo "Apellidos: ";
    echo $fila["lastname"] . " | ";    
    echo "E-mail: ";
    echo $fila["mail"] . " | ";
    echo "Tipo de cuenta: ";
    echo $fila["accounttype"] . " | ";
    echo "Password: ";
    echo $fila["password"] . " | ";
    echo "Money: ";
    echo $fila["money"] . "<br /><br />";
// Pasmos el id seleccionado a una sesión y las demás filas = campos. 
    // $_SESSION["id"] = $id;
    $_SESSION["id"] = $fila["id"];
    $_SESSION["name"] = $fila["name"];
    $_SESSION["lastname"] = $fila["lastname"];
    $_SESSION["mail"] = $fila["mail"];
    $_SESSION["accounttype"] = $fila["accounttype"];
    $_SESSION["password"] = $fila["password"];
    $_SESSION["money"] = $fila["money"];
}
// En el formulario pasamos los datos en cada celda. 
?> 
<a href="update-con-seleccion.php" target="_self">Atras</a><br /> 
<form action="update-campo.php" method="post">  
    <input type="text" name="id" value="<?php echo $_SESSION['id']; ?>">
    <br /> 
    Nombre: 
    <br /> 
    <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"> 
    <br/><br/>
    <br /> 
    Apellidos: 
    <br /> 
    <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>"> 
    <br/><br/> 
    Email: 
    <br /> 
    <input type="text" name="mail" value="<?php echo $_SESSION['mail']; ?>"> <br/><br/> 
    Tipo de cuenta: 
    <br /> 
    <input type="text" name="accounttype" value="<?php echo
$_SESSION['accounttype'];
?>"> <br/><br/> 
    Password: <br /> 
    <input type="text" name="password" value="<?php echo $_SESSION['password']; ?>"> <br/><br/> 
    Money: <br /> 
    <input type="text" name="money" value="<?php echo $_SESSION['money']; ?>"> <br/><br/> 
    <input type="submit" value="Editar"> 
</form>