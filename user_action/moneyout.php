<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <title>Sacar Dinero</title>
    <link rel="stylesheet" type="text/css" href="../css/background.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../css/styles.css"   media="screen">

    <head>

        <?php
        include_once ('../db/connect.php');
        require ('../functions/functions.php');

        session_start();

        $result = mysql_query("SELECT * from users where mail ='" . $_SESSION['usuario'] . "'");
        $row = mysql_fetch_array($result);


        echo ' <div style="text-align: center; font-weight: bold;"> <h1>Sacar Dinero</h1></div>';
        echo '<br><h3><span style="font-style: italic;">Su saldo actual es: ' . $row['money'] . '</span></h3><br>';

        if (isset($_POST['incoming'])) {

            $moneyold = $row['money'];
            $moneynew = $_POST['amount'];
            $amount = $moneyold - $moneynew;

            if ($moneyold >= $moneynew) {

                $sqlmov = "INSERT INTO movement
                            SET id = '',
                            date = now(),
                            transmitter = '" . $row['mail'] . "' ,
                            receiver = '" . $row['mail'] . "' ,
                            amount = - '" . $_POST['amount'] . "' ,
                            concept = '" . $_POST['concept'] . "' ";




                $sqluser = "UPDATE users SET money = $amount where mail ='" . $_SESSION['usuario'] . "'";

                $res1 = mysql_query($sqlmov);
                $res2 = mysql_query($sqluser);

                header("Location: moneyout.php");
                exit;
            } else {
                print '<script language="JavaScript">';
                print 'alert("No hay saldo suficiente para realizar la operación");';
                print '</script>';
            }
        }
        ?>

        <!--Script for only numbers in TextArea-->

        <script language="javascript">
            function checkInput(ob) {
                var invalidChars = /[^0-9]/gi
                if (invalidChars.test(ob.value)) {
                    ob.value = ob.value.replace(invalidChars, "");
                }
            }
        </script>
    </head>

    <body>
        <br>
        <br>
        <form method="post" action="" name="income">

            <p>Importe:
                <input maxlength="10" id="amount" name="amount" onKeyUp="checkInput(this)" type="text">
            </p>
            <p>
                <br> 
                <input name="incoming" id="incoming" value="Sacar Dinero" type="submit" class="button black bigrounded">
                <br>
            </p>
        </form>
    </body></html>