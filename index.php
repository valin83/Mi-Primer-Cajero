<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <title>Cajero</title>
        <link rel="stylesheet" type="text/css" href="css/background.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen">

    </head>
    <body>

        <div style="text-align: center; font-weight: bold;">
            <h1>Cajero</h1>
        </div>
        <br>
        <br>
        <form id="form1" name="form1" method="post" action="functions/user_validate.php" class="login">
            <center>
                <h4>LOGIN</h4>
                <br>
                Username: <input name="username" id="username" type="text"> <br>
                <br>
                Password: <input name="password" id="password" type="password"> <br>
                <br>
                <input name="login" id="login" value="login" type="submit" class="button black bigrounded">
            </center>
            <div style="text-align: center;"> <br>
                Password lost?. <a href="functions/lost_pass.php">Recovery</a><br>
                Not a member ? <a href="functions/register.php">Sign up</a><br>
                <br>
            </div>
        </form>
        <br>
    </body>
</html>