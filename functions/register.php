<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>

        <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
        <title>New User</title>
        <link rel="stylesheet" type="text/css" href="../css/background.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../css/styles.css" media="screen">

    </head><body>
        <?php
        include_once('../db/connect.php');
        require '../functions/functions.php';

        if (isset($_POST['Register'])) {

            if (strlen($_POST['Username']) < 3 || strlen($_POST['Username']) > 32) {
// This check the characters of the username and lastname and it makes sure if it is longer that 3 letters.
                echo 'Your name and last name must be between 3 and 32 characters!';
            } elseif (strlen($_POST['Lastname']) < 3 || strlen($_POST['Lastname']) > 32) {
// This check the characters of the userlastname and it makes sure if it is longer that 3 letters.
                echo 'Your last name must be between 3 and 32 characters!';
            } else {
                if (empty($_POST['Password'])) {
// This checks the password field to see if it is empty
                    echo 'You need to select a password!';
                } /** else {
                    if (preg_match('/[^a-z0-9ñáéíóúÑÁÉÍÓÚ\-\_\ \.]+/i', $_POST['Username'])) {
// this checks the user for any symbols space etc .You can remove this is you choose
                        echo 'Your name contains invalid characters!';
                    } elseif (preg_match('/[^a-z0-9ñáéíóúÑÁÉÍÓÚ\-\_\ \.]+/i', $_POST['Lastname'])) {
// this checks the user for any symbols space etc .You can remove this is you choose
                        echo 'Your last name contains invalid characters!';
                     } **/ else {
                        if (!checkEmail($_POST['Email'])) {
// this is one of the functions we added on the function page. for this to work make sure the function is required on this page
                            echo 'Your email is not valid!';
                        } else {
                            if (empty($_POST['Agree'])) {
// Check if the Checkbox is checked to agree with the terms of services
                                echo "You need to accept the Terms & conditions  in order to sign up.!";
                            } else {
// this check and makes sure that their are no duplication with the email
                                $sql = "SELECT id FROM users WHERE mail='" . mysql_real_escape_string($_POST['Email']) . "'";
                                $query = mysql_query($sql) or die(mysql_error());
                                $m_count = mysql_num_rows($query);

                                if ($m_count >= "1") {
                                    echo 'This email has already been used.!';
                                } else {
// this makes sure that all the uses that sign up have their own names
                                    $sql = "SELECT id FROM users WHERE name='" . mysql_real_escape_string($_POST['Username']) . "'";
                                    $query = mysql_query($sql) or die(mysql_error());
                                    $m_count = mysql_num_rows($query);
// this is a sha1 hash, its encrypt your password so it isnt easily hackable
                                    $password = sha1($_POST['Password']);
// this is a sha1 hash, its encrypt your password so it isnt easily hackable


/**
* *****************************************************************************
* *****************************************************************************
*
*  Send data to DB to store and send email to user to confirm the registration 
*  
* *****************************************************************************
* ***************************************************************************** 
*/

// The id is blank because it is an auto_increment  which mean it will auto add a value to every user and the are all different. this is mainly so we dont have dupilcate. 
//$sql = "INSERT INTO users SET id = '', name = '" . $_POST['Username'] . "' , password= '$password', mail= '" . $_POST["Email"] . "'";
// accounttype = '" . $_POST['Accounttype'] . "' ,
// money =  '" . $_POST['Balance'] . "' ";

$sql = "INSERT INTO users
	SET id = '',
	name = '" . $_POST['Username'] . "' ,
	lastname = '" . $_POST['Lastname'] . "' ,
	mail= '" . $_POST["Email"] . "' ,
	accounttype = '1', 
        password= '$password',
        money = '0' ";
                                    $res = mysql_query($sql);
                                    $to = $_POST['Email'];
                                    $from = "no-reply@tubanco.es";
                                    $subject = "Tus datos de registro";
                                    $message = "<html>
                                                    <body background=\"#4B4B4B\">
                                                        <h3>Detalles del registro de la cuenta bancaria</h3>
                                                        Hola " . $_POST['Username'] . ", <br>
                                                        <center>
                                                            Tu usuario: " . $_POST['Username'] . "<p>
                                                            Tu contraseña: " . $_POST['Password'] . "<p>
                                                        <p>
                        <font size=3> Bienvenido a tu nueva cuenta bancaria, gracias por tu registro</font>
                                                    </body>
                                                </html>";

                                    $headers = "From: Alta de nueva cuenta bancaria <no-reply@tubanco.es>\r\n";
                                    $headers .= "Content-type: text/html\r\n";

                                    mail($to, $subject, $message, $headers);

                                    echo "" . $_POST['Username'] . ", Cliente guardado correctamente en la BBDD.";

                                    // header("Location: index.php"); --> sin delay
                                    header("refresh:3;../index.php"); // --> con delay de 3 secs.

                                    exit;
                                }
                            }
                        }
                    }
                }
            }
        //}
        ?>
        <form method="post">
            <center>
                <h1><strong>Alta de clientes</strong></h1>
                <p>Nombre: <input name="Username" id="Username" type="text"> </p>
                <p>Apellidos: <input name="Lastname" id="Lastname" type="text"> </p>
                <p>Clave de acceso: <input name="Password" id="Password" type="password"> </p>
                <p>Email: <input name="Email" id="Email" type="text"> </p>
                <p>
                    <input name="Agree" id="Agree" type="checkbox">
                    <a href="../functions/terms_conditions.html">I'm accept the Terms &amp; conditions.</a>
                    <br> <br> <br>
                    <input name="Register" id="Register" value="Register" type="submit" class="button black bigrounded">
                </p>
            </center>
        </form>
    </body>
</html>
