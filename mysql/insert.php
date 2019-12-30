<?php
    include('./connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="css/styles.css">
<title>Add Record Form</title>
</head>
<body>
    <form action="insert.php" method="post">
        <p>
            <label for="firstName">First Name:</label>
            <input type="text" name="first_name" id="firstName">
        </p>
        <p>
            <label for="lastName">Last Name:</label>
            <input type="text" name="last_name" id="lastName">
        </p>
        <p>
            <label for="userName">Username:</label>
            <input type="text" name="username" id="userName">
        </p>
        <p>
            <label for="gender">Gender:</label><br>
            <input type="radio" name="gender" id="gender" value="female">Female<br>
            <input type="radio" name="gender" id="gender" value="male">Male<br>
            <input type="radio" name="gender" id="gender" value="non-binary">Non-binary<br>
            
            
        </p>
        <p>
            <label for="emailAddress">Email Address:</label>
            <input type="text" name="email" id="emailAddress">
        </p>
        <p>
            <label for="created_at">Created At:</label>
            <input type="date" name="created_at" id="created_at" value="<?php echo date("Y-m-d"); ?>">
        </p>
        <p>
            <label for="preferred_language">Preferred Language:</label>
            <input type="text" name="pref_language" id="language">
        </p>
        <input type="submit" value="Submit">
    </form>
</body>
</html>







