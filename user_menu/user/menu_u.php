<html><head>

        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
        <title>Menu Usuario</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css" media="screen">


    </head>

    <body>
            <br>
            <br>
            <br>
            <br>

        
            <form action="menuevents_u.php" method="post" target="events">
            <input type="radio" name="query" value="Saldo">Saldo<br>
            <input type="radio" name="query" value="Movimientos">Movimientos<br>
            <input type="radio" name="query" value="Ingresar_Dinero">Ingresar Dinero<br>
            <input type="radio" name="query" value="Sacar_Dinero">Sacar Dinero<br>
            <!-- <input type="radio" name="query" value="Mandar_Dinero">Mandar Dinero<br> -->
            <br>
            <br>
            <center>
            <input type="submit" name="submit" value="Submit" class="button black bigrounded">
            <br>
            <br>
            <br>
            <input type="submit" name="logout" value="Logout Session" class="button black bigrounded">
            </center>
        </form>



    </body>
</html>