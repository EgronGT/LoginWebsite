<?php

if (isset($_POST['submit'])) {
  
    include_once 'dbh.inc.php';

    $first = mysqli_escape_string ($conn, $_POST['first']);
    $last = mysqli_real_escape_string ($conn, $_POST['last']);
    $email = mysqli_real_escape_string ($conn, $_POST['email']);
    $uid = mysqli_real_escape_string ($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string ($conn, $_POST['pwd']);

    //Error handles
    //Check for empty fields
    if (empty($first)){
        header("Location: ../signup.php?signup=nameEmpty");
        exit();

    }else if (empty($last)){
            header("Location: ../signup.php?signup=lastEmpty");
            exit();

    }else if(empty($email)){
        header("Location: ../signup.php?signup=emailEmpty");
        exit();

    }else if(empty($uid)){
        header("Location: ../signup.php?signup=uidEmpty");
        exit();
    } else if (empty($pwd)) {
          header("Location: ../signup.php?signup=pwdEmpty");
          exit();
    } else {
       //Check if input chararacters are valid
       if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/",$last)) {
            header("Location: ../signup.php?signup=nameInvalid");
            exit();
       } else {
           //Check if email is valid
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?signup=emailInvalid");
            exit();

           } else {
                $sql = "SELECT * FROM users WHERE user_id='$uid";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                
                } else { 
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                   
                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last,
                    user_email, user_uid, user_pwd) VALUES ('$first','$last',
                    '$email', '$uid', '$hashedPwd');";
                     mysqli_query($conn, $sql);
                     header("Location: ../signup.php?signup=success");
                    exit();


                }
           }
       }
    } 


} else {
    header("Location: ../signup.php");
    exit();

}

