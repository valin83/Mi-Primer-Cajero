<?php
require 'database.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $lastnameError = null;
    $mailError = null;
    $account_typeError = null;
    $passwordError = null;
    $moneyError = null;

    // keep track post values
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $mail = $_POST['mail'];
    $accounttype = $_POST['accounttype'];
    $password = $_POST['password'];
    $money = $_POST['money'];

    // validate input
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    }

    if (empty($lastname)) {
        $lastnameError = 'Please enter Last Name';
        $valid = false;
    }

    if (empty($mail)) {
        $mailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailError = 'Please enter a valid Email Address';
        $valid = false;
    }
/*
    if (empty($accounttype)) { {
        $account_typeError = 'Please enter valid Account Type';
        $valid = false;
    }
*/
    if (empty($password)) {
        $passwordError = 'Please enter Password';
        $valid = false;
    }
/*
    if (empty($money)) {
        $moneyError = 'Please enter Money or 0';
        $valid = false;
    }
*/
    // update data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users  set name = ?, lastname = ?, mail = ?, accounttype = ?, password = ?, money = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $lastname, $mail, $accounttype, $password, $money, $id));
        Database::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $name = $data['name'];
    $lastname = $data['lastname'];
    $mail = $data['mail'];
    $accounttype = $data['accounttype'];
    $password = $data['password'];
    $money = $data['money'];
    Database::disconnect();
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset="UTF-8" http-equiv="Content-Type" />
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../css/background.css" media="screen">
        <script charset="utf-8" src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">

            <div class="span10 offset1">
                <div class="row">
                    <h3>Update a Customer</h3>
                </div>

                <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

                    <div class="control-group <?php echo!empty($nameError) ? 'error' : ''; ?>">
                        
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo!empty($name) ? $name : ''; ?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="control-group <?php echo!empty($lastnameError) ? 'error' : ''; ?>">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <input name="lastname" type="text"  placeholder="Last Name" value="<?php echo!empty($lastname) ? $lastname : ''; ?>">
                            <?php if (!empty($lastnameError)): ?>
                                <span class="help-inline"><?php echo $lastnameError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo!empty($mailError) ? 'error' : ''; ?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="mail" type="text" placeholder="Email Address" value="<?php echo!empty($mail) ? $mail : ''; ?>">
                            <?php if (!empty($mailError)): ?>
                                <span class="help-inline"><?php echo $mailError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo!empty($account_typeError) ? 'error' : ''; ?>">
                        <label class="control-label">Account Type</label>
                        <div class="controls">
                            <input name="accounttype" type="text"  placeholder="Account Type" value="<?php echo!empty($accounttype) ? $accounttype : ''; ?>">
                            <?php if (!empty($account_typeError)): ?>
                                <span class="help-inline"><?php echo $account_typeError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo!empty($passwordError) ? 'error' : ''; ?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="text"  placeholder="Password" value="<?php echo!empty($password) ? $password : ''; ?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo!empty($moneyError) ? 'error' : ''; ?>">
                        <label class="control-label">Money</label>
                        <div class="controls">
                            <input name="money" type="text"  placeholder="Money" value="<?php echo!empty($money) ? $money : ''; ?>">
                            <?php if (!empty($moneyError)): ?>
                                <span class="help-inline"><?php echo $moneyError; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a class="btn btn-info" href="index.php">Back</a>
                    </div>

                </form>
            </div>

        </div> <!-- /container -->
    </body>
</html>
