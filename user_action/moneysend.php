<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <title>Realizar Transferencia</title>

    <head>
        <?php
        include_once ('../db/connect.php');
        require ('../functions/functions.php');

// Consultar la base de datos
        $consulta_mysql = 'select name,lastname,mail from users';
        $resultado_consulta_mysql = mysql_query($consulta_mysql);
        ?>
    </head>
    <body>

        <form action="" method="post">
            <select name='sendto' id='sendto'>

                <?php
                while ($fila = mysql_fetch_array($resultado_consulta_mysql)) {
                    echo "<option value='" . $fila['name'] . " " . $fila['lastname'] . " " . $fila['mail'] . "'>
                                         " . $fila['name'] . " " . $fila['lastname'] . "</option>";
                }
                ?>
            </select>
            <input type="submit">
        </form>

        <?php
        echo $_POST['sendto'];
        ?>

    </body>
</html>