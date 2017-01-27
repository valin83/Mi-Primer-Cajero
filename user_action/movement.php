<html>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <title>Realizar Ingreso</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css" media="screen"></link>

    <head>

        <?php
//datos de la conexion a la base de datos
        include_once ('../db/connect.php');
        require ('../functions/functions.php');
        session_start();

        /**
         * http://php.net/manual/es/function.session-start.php
         * 
         * session_start() crea una sesión o reanuda la actual basada en un identificador
         *  de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie. 
         * 
         */
//obtenemos valores que envió la funcion en Javascript mediante el metodo GET

        if (isset($_GET['campo']) and isset($_GET['orden'])) {
            $campo = $_GET['campo'];
            $orden = $_GET['orden'];
        } else {
            //por defecto
            $campo = 'date';
            $orden = 'ASC';
        }
//realizamos la consulta de los empleados, ordenandolos segun campo y asc o desc
//ej. SELECT * FROM empleado ORDER BY nombres ASC
// ORIGINAL: 
//  $Consulta = mysql_query("SELECT * FROM empleado ORDER BY $campo $orden",$con);

        $consulta = mysql_query("SELECT * from movement where receiver ='" . $_SESSION['usuario'] . "' ORDER BY $campo $orden");
        ?>
    <table cellspacing="0" cellpading="0">
        <tr class="encabezado">
            <?php
            //definimos dos arrays uno para los nombre de los campos de la tabla y
            //para los nombres que mostraremos en vez de los de la tabla -encabezados
            $campos = "id,date,transmitter,receiver,amount,concept";
            $cabecera = "Identifier,Date,Transmitter,Receiver,Amount,Concept";

            //los separamos mediante coma
            $cabecera = explode(",", $cabecera);
            $campos = explode(",", $campos);

            //numero de elementos en el primer array
            $nroItemsArray = count($campos);

            //iniciamos variable i=0
            $i = 0;

            //mediante un bucle crearemos las columnas
            while ($i <= $nroItemsArray - 1) {
                //comparamos: si la columna campo es igual al elemento actual del array 
                if ($campos[$i] == $campo) {
                    //comparamos: si esta Descendente cambiamos a Ascendente y viceversa
                    if ($orden == "DESC") {
                        $orden = "ASC";
                        $flecha = "img/arrow_down.gif";
                    } else {
                        $orden = "DESC";
                        $flecha = "img/arrow_up.gif";
                    }
                    //si coinciden campo con el elemento del array la cabecera tendrá un color distinto
                    echo "	<td class=\"encabezado_selec\"><a onclick=\"OrdenarPor('" . $campos[$i] . "','" . $orden . "')\"><img src=\"" . $flecha . "\" />" . $cabecera[$i] . "</a></td> \n";
                } else {
                    //caso contrario la columna no tendra color
                    echo "	<td><a onclick=\"OrdenarPor('" . $campos[$i] . "','DESC')\">" . $cabecera[$i] . "</a></td> \n";
                }
                $i++;
            }
            ?>
        </tr>
        <?php

        //esta funcion permite comparar el campo actual y el nombre de la columna en la base de datos
        function estiloCampo($_campo, $_columna) {
            if ($_campo == $_columna) {
                return " class=\"filas_selec\"";
            } else {
                return "";
            }
        }

        //mostramos los resultados mediante la consulta de arriba

        while ($MostrarFila = mysql_fetch_array($consulta)) {
            echo "<tr> \n";
            echo "	<td" . estiloCampo($campo, 'id') . ">" . $MostrarFila['id'] . "</td> \n";
            echo "	<td" . estiloCampo($campo, 'date') . ">" . $MostrarFila['date'] . "</td> \n";
            echo "	<td" . estiloCampo($campo, 'transmitter') . ">" . $MostrarFila['transmitter'] . "</td> \n";
            echo "	<td" . estiloCampo($campo, 'receiver') . ">" . $MostrarFila['receiver'] . "</td> \n";
            echo "	<td" . estiloCampo($campo, 'amount') . ">" . $MostrarFila['amount'] . "</td> \n";
            echo "	<td" . estiloCampo($campo, 'concept') . ">" . $MostrarFila['concept'] . "</td> \n";
            echo "</tr> \n";
        }
        ?>
    </table>
</head>
</html>