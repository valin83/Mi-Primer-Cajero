<html>
    <head>

        <meta charset="UTF-8">
        <title>Cajero</title>
        <link rel="stylesheet" type="text/css" href="../css/background.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../css/styles.css" media="screen">
    </head>
    
    <body>
        
        <?php
        include_once ("../db/connect.php");

        $usuario = $_POST['username'];
        $pass = sha1($_POST['password']);
        $pass1 = ($_POST['password']);


        if (empty($usuario) || empty($pass)) {
            print '<script language="JavaScript">';
            print 'alert
("Debe escribir un usuario y una contraseña\\nSi no es cliente presione \"Sing Up\" para registrarse");';
            print '</script>';
            header("refresh:1; ../index.php");
            exit();
        }

        $result = mysql_query("SELECT * from users where mail ='" . $usuario . "'");

        if ($row = mysql_fetch_array($result)) {
            if ($row['accounttype'] == 1){
                // si es user
                if ($row['password'] == $pass || $row['password'] == $pass1){
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION["aut"]= "NO";
                    header("Location: ../user_menu/user/contenido_u.html");
                }else{
                    echo "No se encuentra el usuario";
                    $_SESSION["aut"]= "NO";
                    header("refresh:2;../index.php");
                    exit();
                }
            } elseif ($row['accounttype'] == 0) {
                // si es admin
                if ($row['password'] == $pass || $row['password'] == $pass1){
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION["aut"]= "YES";
                    header("Location: ../user_menu/admin/contenido_a.html");
                }else{
                    echo "Usuario no encontrado";
                    $_SESSION["aut"]= "NO";
                    header("refresh:2;../index.php");
                    exit();
                }
            } else {
                //
                header("Location: ../index.php");
                exit();
            }
            
        }       
        /**
if ($row = mysql_fetch_array($result)) {
    if ($row['password'] == $pass || $row['password'] == $pass1) {
        if ($row['accounttype'] = 1) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: ../user_menu/user/contenido_u.html");
        } elseif ($row['accounttype'] = 0) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: ../user_menu/admin/contenido_a.html");
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
} else {
    echo "Usuario no encontrado";
    header("refresh:2;../index.php");
    exit();
}
 * 
 */
?>
        
    </body>
</html>    
