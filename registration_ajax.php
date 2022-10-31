<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($con, $phone);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, phone, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$phone', '$create_datetime')";
        $result   = mysqli_query($con, $query);

        $select_query = "SELECT * FROM users";
        $json_array =array();
        if ($result) {
            $_SESSION['username'] = $username;
            $users_result  = mysqli_query($con, $select_query);
            while($row = mysqli_fetch_assoc($users_result)){
                $json_array[] = $row;
            }

            //write users to json file

            $path = 'data/users-info.json';
            // Convert JSON data from an array to a string
            $jsonString = json_encode($json_array, JSON_PRETTY_PRINT);
            // Write in the file
            $fp = fopen($path, 'w');
            fwrite($fp, $jsonString);
            fclose($fp);

            echo json_encode(array('success' => 1));

        } else {
            echo json_encode(array('success' => 0));
        }
    }
    ?>