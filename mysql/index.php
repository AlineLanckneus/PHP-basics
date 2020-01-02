<?php
    require('./connection.php');

    session_start();
    // need to include this block of code for index to work!
    $dbhost     = "localhost";
            $dbuser     = "test_user";
            $dbpass     = "123";
            $db         = "becode";
            //set DSN
            $dsn = 'mysql:host=' . $dbhost . ';dbname=' . $db;
            //create PDO instance
            $pdo = new PDO($dsn, $dbuser, $dbpass);
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="css/styles.css">
            <title>Table</title>
        </head>
        <body>
            <div class="container"> 
                <div class="table-responsive"> 
                    <table class="mainTable table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Email</th>
                                <th scope="col">Language</th>
                                <th scope="col">User id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $pdo->query('SELECT * FROM NewTable');

                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                echo '<tr><td>' . $row['first_name'] . '</td>';
                                echo '<td>' . $row['last_name'] . '</td>';
                                echo '<td>' . $row['username'] . '</td>';
                                echo '<td>' . $row['gender'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['pref_language'] . '</td>';
                                echo '<td><a href="./profile.php?user=' . $row['id'] . '" >' . $row['id'] . '</a></td></tr>';
                                } ?>
                        </tbody>
                    </table>
                </div>
                <a href="./insert.php">Go back to login page</a>
            </div>
        </body>
        </html>

        

        
<?php
        /* while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo $row['first_name'] . '<br>';
        } */

            //echo $row['email'] . '<br>';
            ?>