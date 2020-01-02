<?php
    require('connection.php');
    //require('insert.php');
    session_start();
    echo var_dump($_GET);
    $pdo = getPdo();
    $userId = $_GET['user'];
    $fname = $lname = $username = $gender = $email = $preflang = "";
    /* $userId = isset($_GET['id']) ? $_GET['id'] : "" ; */
    var_dump($_GET['id']);
    $result2 = $pdo->query("SELECT * FROM NewTable WHERE id = '$userId'");

        while($row2 = $result2->fetch(PDO::FETCH_ASSOC))
        {
            $userId = $row2['id'];
            $fname = $row2['first_name'];
            $lname = $row2['last_name'];
            $username = $row2['username'];
            $gender = $row2['gender'];
            $email = $row2['email'];
            $preflang = $row2['pref_language'];
        }
//echo 'Session: <br>' . var_dump($_SESSION);
echo 'GET: ' . var_dump($_GET);
echo 'POST: ' . var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
</head>
<body>
    <?php
        echo $fname;
        echo $lname;
        echo $username;
        echo $gender;
        echo $email;
    ?>
    <table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>
	<td><div align="right"><a href="index.php">logout</a></div></td>
  </tr>
  <tr>
    <td width="129" rowspan="5"><img src="<?php echo $picture ?>" width="129" height="129" alt="no image found"/></td>
    <td width="82" valign="top"><div align="left">FirstName:</div></td>
    <td width="165" valign="top"><?php echo $fname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">LastName:</div></td>
    <td valign="top"><?php echo $lname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Gender:</div></td>
    <td valign="top"><?php echo $gender ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Address:</div></td>
    <td valign="top"><?php echo $address ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Contact No.: </div></td>
    <td valign="top"><?php echo $contact ?></td>
  </tr>
</table>
<p align="center"><a href="index.php"></a></p>
</body>
</html>