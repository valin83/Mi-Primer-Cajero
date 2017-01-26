<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cajero</title>
    </head>

    <body>
        
        <?php include_once ("connect.php");
        
        ?>
        
        <div style="text-align: center; font-weight: bold;">
            <H1>Cajero Automático Vocento</H1>
        </div>
        <br>
        <br>
        <form id="form1" name="form1" method="post" action="">
            <center> 
                <h4>LOGIN</h4>
                <br />
                <br />
                Username:
                <input type="text" name="Username" id="Username" />
                <br />
                <br />
                Password:
                <input type="password" name="password" id="password" />
                <br />
                <br />
                <input type="submit" name="Login" id="Login" value="Login" />
            </center>
        </form>
        <br>
        <?php
        ?>

    </body></html>