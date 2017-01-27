<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html; charset="UTF-8" http-equiv="Content-Type" />
              <link   href="css/bootstrap.min.css" rel="stylesheet">
              <link rel="stylesheet" type="text/css" href="../../css/background.css" media="screen">

        <script charset="utf-8" src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <h3>Listado de Usuarios</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>

                <table class="table  table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Login Count</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email Address</th>
                            <th>Account Type</th>
                            <th>Password</th>
                            <th>Money</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'database.php';
                        $pdo = Database::connect();
                        $sql = 'SELECT * FROM users ORDER BY id DESC';
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['logincount'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['lastname'] . '</td>';
                            echo '<td>' . $row['mail'] . '</td>';
                            echo '<td>' . $row['accounttype'] . '</td>';
                            echo '<td>' . $row['password'] . '</td>';
                            echo '<td>' . $row['money'] . '</td>';
                            echo '<td width=250>';
                            echo '<center>';
                            echo '<a class="btn btn-info" href="read.php?id=' . $row['id'] . '">Read</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Delete</a>';
                            echo '<center>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /container -->
    </body>
</html>