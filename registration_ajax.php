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
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            echo json_encode(array('success' => 1));

        } else {
            echo json_encode(array('success' => 0));
        }


    }
    ?>