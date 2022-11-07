<?php

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    //Checking if email is valid:
    $at = strpos($email, '@');
    $email_invalid = false;
    if (!$at) {
        $email_invalid = true;
    } else if (substr($email, $at+1, strlen($email)) != "ed.ac.uk") {
        $email_invalid = true;
    } 

    if ($email_invalid) {
        header('Location: http://uoe-classes.byethost3.com/sign-up.php/?problem=invalid_email');
    }
    // --------------------------------------


    // Checking if the username already exists:
    $query = "SELECT * FROM `users` WHERE 1;";

    $usernames = [];
    if($result = mysqli_query($conn, $query)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                array_push($GLOBALS["usernames"], $row['username']);
            }
        } 
    } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    }
    if (in_array($usernames, $username)) {
        header('Location: http://uoe-classes.byethost3.com/sign-up.php/?problem=username_taken');
    }
    // --------------------------------------

    // If nothing wrong, create the account:

    // Creating new user in users:
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users`(`name`, `email`, `username`, `password`) VALUES ($name, $email, $username, $hashed);";
    mysqli_query($sql);
    // header('Location: http://uoe-classes.byethost3.com/log_in.php')
    // --------------------------------------


    // --------------------------------------





?>