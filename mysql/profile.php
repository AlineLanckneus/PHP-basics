<?php
    require('connection.php');
    //require('insert.php');
    
    //session_start();
    echo var_dump($_GET);
    $pdo = getPdo();
    $userId = $_GET['user'];
    $fname = $lname = $username = $gender = $email = $preflang = "";
    /* $userId = isset($_GET['id']) ? $_GET['id'] : "" ; */
    //var_dump($_GET['id']);
    $result2 = $pdo->query("SELECT * FROM NewTable WHERE id = '$userId'");

        while($row2 = $result2->fetch(PDO::FETCH_ASSOC))
        {
            $userId = $row2['id'];
            $fname = ucwords($row2['first_name']);
            $lname = ucwords($row2['last_name']);
            $username = $row2['username'];
            $gender = ucwords($row2['gender']);
            $email = $row2['email'];
            $preflang = strtoupper($row2['pref_language']);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Profile Page</title>
</head>
<body class="profilePage">
    <?php
        echo $fname . '<br>';
        echo $lname . '<br>';
        echo $username . '<br>';
        echo $gender . '<br>';
        echo $email . '<br>';
        echo $preflang . '<br>';
    ?>
    <!-- <div class="container"> 
        <img class="meme" src="https://belikebill.ga/billgen-API.php?default=1" />
    </div> -->
    
    <div class="table-responsive"> 
        <table class="table-dark">
            <thead> 
                <tr>
                    <th>Your Profile Information </th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td><div align="left">FirstName:</div></td>
                    <td ><?php echo $fname ?></td>
                </tr>
                <tr>
                    <td ><div align="left">LastName:</div></td>
                    <td ><?php echo $lname ?></td>
                </tr>
                <tr>
                    <td ><div align="left">Username:</div></td>
                    <td><?php echo $username ?></td>
                </tr>
                <tr>
                    <td ><div align="left">Gender:</div></td>
                    <td ><?php echo $gender ?></td>
                </tr>
                <tr>
                    <td ><div align="left">Email: </div></td>
                    <td ><?php echo $email ?></td>
                </tr>
                <tr>
                    <td ><div align="left">Preferred Language: </div></td>
                    <td ><?php echo $preflang ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>