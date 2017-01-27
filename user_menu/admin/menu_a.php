<html><head>

        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
        <title>Menu Administrador</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" media="screen">


    </head>

    <body>
        <br> <br> <br> <br>        
        <form action="menuevents_a.php" method="post" target="events">
            <input type="radio" name="query" value="Saldo">Saldo<br>
            <input type="radio" name="query" value="Movimientos">Movimientos<br>
            <input type="radio" name="query" value="Ingresar_Dinero">Ingresar Dinero<br>
            <input type="radio" name="query" value="Sacar_Dinero">Sacar Dinero<br>
            <!-- <input type="radio" name="query" value="Mandar_Dinero">Mandar Dinero<br> -->
            
            <?php
            
            include_once ("../../functions/user_validate.php");

            
            //session_start();
            if ($_SESSION["aut"] === "YES"){
                echo '<input type="radio" name="query" value="Gestionar_Usuarios">GESTIONAR USUARIOS<br>';
            } else{
                require_once ("../db/logout.php");
                header("refresh:0;../index1.php");

            }
            
            /* include_once ("../../db/connect.php");
            
            // $usuario = $_POST['username'];
            $_SESSION['username'] = $usuario;
            $result = mysql_query("SELECT * from users where mail ='" . $usuario . "'");
            $row = mysql_fetch_array($result);
            
            
            
                if ($row['accounttype'] == 0){ 
                    print '<input type="radio" name="query" value="Gestionar_Usuarios">GESTIONAR USUARIOS<br>';
                }*/
            
            ?>
            

            <br> <br>
            <center>
                <input type="submit" name="submit" value="Submit" class="button black bigrounded">
                <br> <br> <br>
                <input type="submit" name="logout" value="Logout Session" class="button black bigrounded">
            </center>
        </form>
    </body>
</html>