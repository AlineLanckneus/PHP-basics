<?php
    include_once('./connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<title>Add Record Form</title>
</head>
<body>
    <div class="formContainer"> 
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
                <input type="date" name="created_at" id="created_at" value="<?php echo date("Y-m-d"); ?>" readonly>
            </p>
            <p>
                <label for="preferred_language">Preferred Language:</label><br>
                
                <input type="radio" name="pref_language" id="language" value="en">English<br>
                <input type="radio" name="pref_language" id="language" value="nl">Nederlands<br>
                <input type="radio" name="pref_language" id="language" value="fr">French<br>
                <input type="radio" name="pref_language" id="language" value="de">Deutsch<br>
                <input type="text" name="pref_language" id="language" placeholder="Other">
            </p>
            <p>
                <label for="avatar">Avatar:</label>
                <input type="text" name="avatar" id="avatar">
            </p>
            <p>
                <label for="video">Video:</label>
                <input type="text" name="video" id="video">
            </p>
            <p>
                <label for="quote">Quote:</label>
                <input type="text" name="quote" id="quote">
            </p>
            <p>
                <label for="quote_author">Quote Author:</label>
                <input type="text" name="quote_author" id="quote_author">
            </p>


            <input type="submit" name="submit" value="submit">

            <a href="./index.php">Go to profile overview</a>
        </form>
    </div>
</body>
</html>







