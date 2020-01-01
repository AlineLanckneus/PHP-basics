<?php
    include('./connection.php');
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" type="text/css" href="css/styles.css">
            <title>Table</title>
        </head>
        <body>
            <table class="mainTable">
                <thead>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Username</td>
                        <td>Gender</td>
                        <td>Email</td>
                        <td>Preferred Language</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query('SELECT * FROM NewTable');

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo '<tr><td>' . $row['first_name'] . '</td>';
                        echo '<td>' . $row['last_name'] . '</td>';
                        echo '<td>' . $row['username'] . '</td>';
                        echo '<td>' . $row['gender'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['pref_language'] . '</td></tr>';
                        } ?>
                </tbody>
            </table>
        </body>
        </html>

        

        
<?php
        /* while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo $row['first_name'] . '<br>';
        } */

            //echo $row['email'] . '<br>';
            ?>