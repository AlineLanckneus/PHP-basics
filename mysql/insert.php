<?php
    require('./connection.php');
    session_start();
    if(!empty($_POST) && isset($_POST['submit'])){
    try { 
        $pdo = getPdo();
            //query
            $sql = "INSERT INTO NewTable (first_name, last_name, username, gender, email, pref_language) VALUES (:first_name, :last_name, :username, :gender, :email, :pref_language)";
            $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':first_name', $_POST['first_name']);
                $stmt->bindParam(':last_name', $_POST['last_name']);
                $stmt->bindParam(':username', $_POST['username']);
                $stmt->bindParam(':gender', $_POST['gender']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':pref_language', $_POST['pref_language']);
                //$stmt->bindParam(':created_at', $_REQUEST['created_at']);

                $stmt->execute();
                echo 'form submitted and records inserted successfully';

                $_POST = array(); //clear input fields
        }
            catch(PDOException $e){
                die("error: could not execute $sql " . $e->getMessage());
            } 
        }
    /* var_dump($_SESSION); */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<title>Add Record Form</title>
</head>
<body>
    <h1>Sign Up</h1>
    <div class="formContainer"> 
        <form action="insert.php" method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="first_name" id="firstName">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" name="last_name" id="lastName">
            </div>
            <div class="form-group">
                <label for="userName">Username:</label>
                <input type="text" name="username" id="userName">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="gender">Gender:</label><br>
                <input type="radio" name="gender" id="gender" value="female">Female<br>
                <input type="radio" name="gender" id="gender" value="male">Male<br>
                <input type="radio" name="gender" id="gender" value="non-binary">Non-binary<br>
            </div>
            <div class="form-group">
                <label for="emailAddress">Email Address:</label>
                <input type="text" name="email" id="emailAddress">
            </div>
            <div class="form-group">
                <label for="created_at">Created At:</label>
                <input type="date" name="created_at" id="created_at" value="<?php echo date("Y-m-d"); ?>" readonly>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="preferred_language">Preferred Language:</label><br>
                
                <input type="radio" name="pref_language" id="language" value="en">English<br>
                <input type="radio" name="pref_language" id="language" value="nl">Nederlands<br>
                <input type="radio" name="pref_language" id="language" value="fr">French<br>
                <input type="radio" name="pref_language" id="language" value="de">Deutsch<br>
                <input type="text" name="pref_language" id="language" placeholder="Other">
            </div>
            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <input type="text" name="avatar" id="avatar">
            </div>
            <div class="form-group">
                <label for="video">Video:</label>
                <input type="text" name="video" id="video">
            </div>
            <div class="form-group">
                <label for="quote">Quote:</label>
                <input type="text" name="quote" id="quote">
            </div>
            <div class="form-group">
                <label for="quote_author">Quote Author:</label>
                <input type="text" name="quote_author" id="quote_author">
            </div>


            <input class="btn btn-primary" type="submit" name="submit" value="submit">

            <a href="./index.php">Go to profile overview</a>
        </form>
    </div>
</body>
</html>







