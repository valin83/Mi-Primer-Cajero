<html>
    <body>
        <form method="post" >
            <center>
                <h1><strong>Recuperar Password</strong></h1>
                <p>Email: 
                    <input type="text" name="Email" id="Email">
                    <br>
                    <input type="submit" name="Send" id="Send" value="Send">
                </p>
            </center>
        </form>

        <?php
        include_once ("connect.php");
        require 'config.php';
        /**
         * Step Two - Generating a password: The logic behind sending users their pass
         *  isn't that complex. Since we used md5 hash unfortunately we will not
         *  be able to reverse it so we are going to generate a new password and send
         *  one to them in the email and replace other in that database so the can login
         */
        if (isset($_POST['Register'])) {
            $password = substr(md5($_SERVER['REMOTE_ADDR'] . microtime() . rand(1, 100000)), 0, 6);
            // generate a random password
        }

        /**
         * Step Three - The Send Mail Function: This is where function can be helpful.
         *  Remember we have our function page well that's good because now instead
         *  of writing out the send mail function we can just write it in one line.
         */
        if (isset($_POST['Send'])) {
            $password = substr(md5($_SERVER['REMOTE_ADDR'] . microtime() . rand(1, 100000)), 0, 6);
            $nsql = "SELECT * FROM login WHERE mail = '" . mysql_real_escape_string($_POST['Email']) . "'";
            $query = mysql_query($nsql) or die(mysql_error());
            $row = mysql_fetch_object($query);
            $name = htmlspecialchars($row->name);
            $pass = htmlspecialchars($row->pass);
            $mail = htmlspecialchars($row->email);

            if ((empty($_POST['Email']))) {
// if the email field is empty there will be an error
                echo 'You one field empty.';
            } else {
                if (empty($name)) {
// if there is no name with the entered email
                    echo 'Invalid information.';
                } else {
                    if ($_POST['Email'] != $mail) {
                        echo 'Invalid information,';
// If their is no match in the email
                    } else {
                        if (!checkEmail($_POST['Email'])) {
// The checkEmail function we have in our function that saves us time and sapce
                            echo 'Your email is no valid!';
                        } else {
                            $result = mysql_query("UPDATE users SET password='$password' WHERE name='" . mysql_real_escape_string($name . "'") or die(mysql_error()));
                            $to = $_POST['Email'];
                            $from = "no-reply@Game.co.uk";
                            $subject = "Registration - You Registration Details";
                            $message = "
                                    <html>
                                        <body background=\"#4B4B4B\">
                                        <h1>Game Registration Details</h1>
                                           Dear $name, <br>
                                        <center>
                                            Your Username: $name <p>
                                            Your Password: $password <p>
                                        </body>
                                    </html>";

                            $headers = "From: Game Lost Details <no-reply@Game.co.uk>\r\n";
                            $headers .= "Content-type: text/html\r\n";

                            mail($to, $subject, $message, $headers);
                            echo 'We sent you an email with your Details!';
                        }
                    }
                }// check if name is unused.
            }// check if accepted to the tos.
        }// name check.
// if post register.		
        ?>

    </body>
</html>

