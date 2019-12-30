<?php

    //function openConnection() {
        
            $dbhost     = "localhost";
            $dbuser     = "test_user";
            $dbpass     = "123";
            $db         = "becode";

        try { 
            $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        /* $sql = "INSERT INTO student (first_name, last_name, email) VALUES ('Peter', 'Parker', 'peterparker@mail.com')";    
        $pdo->exec($sql);
            echo "New record created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

            unset($pdo); */

        $sql = "INSERT INTO student (first_name, last_name, username, gender, email, created_at, pref_language) VALUES (:first_name, :last_name, :username, :gender, :email, :created_at, :pref_language)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':first_name', $_REQUEST['first_name']);
        $stmt->bindParam(':last_name', $_REQUEST['last_name']);
        $stmt->bindParam(':username', $_REQUEST['username']);
        $stmt->bindParam(':gender', $_REQUEST['gender']);
        $stmt->bindParam(':email', $_REQUEST['email']);
        $stmt->bindParam(':created_at', $_REQUEST['created_at']);
        $stmt->bindParam(':pref_language', $_REQUEST['pref_language']);

        $stmt->execute();
        echo 'records inserted successfully';
        } catch(PDOException $e){
            die("error: could not execute $sql " . $e->getMessage());
        }
        unset($pdo);

?>