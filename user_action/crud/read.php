<?php
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
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
                    <h3>Read a Customer</h3>
                </div>

                <div class="form-horizontal" >

                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['lastname']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['mail']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Account Type</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['accounttype']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['password']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Money</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['money']; ?>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <a class="btn btn-info" href="index.php">Back</a>
                    </div>
                </div>
            </div>

        </div> <!-- /container -->
    </body>
</html>
