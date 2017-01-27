<?php
include_once('../db/connect.php');
require '../functions/functions.php';
?>
<html >
    <head>
        <title>Lost Pass</title>
        <link rel="stylesheet" type="text/css" href="../css/background.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../css/styles.css" media="screen">

    </head>

    <body>
        <?php
        if (isset($_POST['Send'])) {

            $password = substr(sha1($_SERVER['REMOTE_ADDR'] . microtime() . rand(1, 100000)), 0, 6);
            // Generate a random password

            $nsql = "SELECT * FROM users WHERE mail='" . mysql_real_escape_string($_POST['Email']) . "'";
            $query = mysql_query($nsql) or die(mysql_error());
            $row = mysql_fetch_object($query);


            if ((empty($_POST['Email']))) { // if the email field is empty there will be an error
                // echo 'You one field empty.';
                
                print '<script language="JavaScript">';
                print 'alert("Debe escribir una direccion de correo válida");';
                print '</script>';
                header("refresh:1; ../functions/lost_pass.php");
                exit();
                
                
            } else {
                
                $name = htmlspecialchars($row->name);
                $pass = htmlspecialchars($row->password);
                $mail = htmlspecialchars($row->mail);
                
                if (empty($name)) {  // there is no name with the entered email
                    echo 'Invalid information.';
                } else {
                    if ($_POST['Email'] != $mail) {
                        echo 'Invalid information.'; // if their is no match in the email
                    } else {
                        if (!checkEmail($_POST['Email'])) { // the checkEmail function we have in our function that saves us time and sapce
                            echo 'Your email is not valid!';
                        } else {
                            $result = mysql_query("UPDATE users SET password='$password' WHERE name='" . mysql_real_escape_string($name) . "'")
                                    or die(mysql_error());
                            $to = $_POST['Email'];
                            $from = "no-reply@tubanco.es";
                            $subject = "Registration - Your Registration Details";
                            $message = "<html>
                                        <body background=\"#4B4B4B\">
                                        <h1>Bank Registration Details</h1>
                                            Dear $name, <br>
                                        <center>
                                            Your Username: $mail <p>
                                            Your Password: $password <p>
                                        </body>
                                    </html>";
                            $headers = "From: Bank Recovery Lost Password Details <no-reply@tubanco.es>\r\n";
                            $headers .= "Content-type: text/html\r\n";
                            mail($to, $subject, $message, $headers);
                            echo 'We sent you an email with your Details!';
                            // header("Location: index.php"); --> sin delay
                            header("refresh:3;../index.php"); // --> con delay de 3 secs.
                            exit;
                        }
                    }
                }// check if name is unused.
            }// check if accepted to the tos.
        }// name check.
        // if post register.	
        ?>
        <form method="post" >
            <center>
                <h1><strong>Lost Password</strong></h1>
                <p>Email: 
                    <input type="text" name="Email" id="Email">
                    <br>
                    <br>
                    <input type="submit" name="Send" id="Send" value="Send" class="button black bigrounded">
                </p>
            </center>
        </form>
    </body>
</html>
