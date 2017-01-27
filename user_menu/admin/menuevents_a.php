<html>
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
        <title>Events</title>
    </head>

    <body>

        <?php
        include_once ('../../db/connect.php');
        require ('../../functions/functions.php');

        session_start();

        $result = mysql_query("SELECT * from users where mail ='" . $_SESSION['usuario'] . "'");
        $row = mysql_fetch_array($result);

        echo ' <div style="text-align: center; font-weight: bold;"> <h1>Bienvenido ' . $row['name'] . ' ' . $row['lastname'] . '</h1></div>';

        if (isset($_POST['submit'])) {

            if (!isset($_POST['query'])) {
                echo "You chose nothing";
            }

            if ($_POST['query'] == "Saldo") {
                // query for Saldo
                echo "Saldo: ";
                header("Location: ../../user_action/money.php"); // --> sin delay
                exit;
            }

            if ($_POST['query'] == "Movimientos") {
                // query for Movimientos
                echo "Movimientos";
                header("Location: ../../user_action/movements.php"); // --> sin delay
                exit;
            }

            if ($_POST['query'] == "Ingresar_Dinero") {
                // query for Ingresar_Dinero
                echo "Ingresar_Dinero";
                header("Location: ../../user_action/income.php"); // --> sin delay
                exit;
            }

            if ($_POST['query'] == "Sacar_Dinero") {
                // query for Sacar_Dinero
                echo "Sacar_Dinero";
                header("Location: ../../user_action/moneyout.php"); // --> sin delay
            }

            if ($_POST['query'] == "Mandar_Dinero") {
                // query for Mandar_Dinero
                echo "Mandar_Dinero";
                header("Location: ../../user_action/moneysend.php"); // --> sin delay
                exit;
            }

            if ($_POST['query'] == "Gestionar_Usuarios") {
                // query for Otra_Opcion
                echo "Otra_Opcion";
                header("Location: ../../user_action/crud/index1.php"); // --> sin delay
            }
        } // brace for if(isset($_POST['submit']))

        if (isset($_POST['logout'])) {
            include "../../db/logout.php";
            print '<script type="text/javascript">';
            print 'window.parent.location = "../../index1.php"';
            print '</script>';

            //exit;
        }
        ?>
    </body>
</html>