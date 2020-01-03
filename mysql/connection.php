<?php
    
        global $pdo;
        //put code below in function to call it more easily
        function getPdo(){ 
            /* if(!empty($_POST) && isset($_POST['submit'])){  */
                $dbhost     = "localhost";
                $dbuser     = "test_user";
                $dbpass     = "123";
                $db         = "becode";
                //set DSN
                $dsn = 'mysql:host=' . $dbhost . ';dbname=' . $db;
                //create PDO instance
                $pdo = new PDO($dsn, $dbuser, $dbpass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
            }
        //}
            //moved code below to insert.php
        /* try { 
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
 */
        
    
        //unset($pdo);

        
         //PDO query

           /* $stmt = $pdo->query('SELECT * FROM student');

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo $row['email'] . '<br>';
            }

 
        /* while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo $row['first_name'] . '<br>';
        } */

        //PREPARED STATEMENTS (prepare & execute)

        //unsafe

        //$sql = 'SELECT * FROM student WHERE author= "$author"';

        //FETCH MULTIPLE POSTS

        //user input
        //$author = 'Brad';
        //positional params

        /* $sql = 'SELECT * FROM posts WHERE author = ?'; //? is placeholder
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$author]);
        $posts = $stmt->fetchAll();

        var_dump($posts);

        foreach($posts as $post){
            echo $post->title . '<br>';
 */
        //}

        //named params
        /* $sql = 'SELECT * FROM posts WHERE author = :author'; //? is placeholder
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['author' =>$author]);
        $posts = $stmt->fetchAll();

        var_dump($posts);
        foreach($posts as $post){
            echo $post->title . '<br>';

        }
 */














?>