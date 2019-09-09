<?php
session_start();
    // initializing variables
    $login_email    = "";
    $errors = array(); 

   ////////////////// The registration logic //////////////////
   include_once 'connection.php';
   $conn = openConnection();

   $first_name = $conn->real_escape_string($_POST['first_name']);
   $last_name = $conn->real_escape_string($_POST['last_name']);
   $username  = $conn->real_escape_string($_POST['username']); 
   $linkedin  = $conn->real_escape_string($_POST['linkedin']); 
   $github  = $conn->real_escape_string($_POST['github']); 
   $email  = $conn->real_escape_string($_POST['email']); 
   $password  = $conn->real_escape_string($_POST['password']); 
   $password_hash = md5($password);
   $c_password = $conn->real_escape_string($_POST['c_password']);   // remove when pushing to database Rafael
   $c_password_ḩash = md5($c_password);                             // remove when pushing to database Rafael
   $preferred_language = $_POST['preferred_language'];
   $belikebill = $_POST['belikebill'];
   $avatar = $conn->real_escape_string($_POST['avatar']);
   $video = $_POST['video'];
   $quote = $conn->real_escape_string($_POST['quote']);
   $quote_author = $conn->real_escape_string($_POST['quote_author']);
  
   if (isset($_POST['submit'])) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){  // failed email
            echo "<script type='text/javascript'>alert(\"Enter valid email.\");</script>";
        }
        
        if ($_POST["password"] !== $_POST["c_password"]) { // failed password
            echo "<script type='text/javascript'>alert(\"The passwords don't match. Please try again.\");</script>";
        }

        if (!filter_var($avatar, FILTER_VALIDATE_URL)) { 
            echo "<script type='text/javascript'>alert(\"Invalid URL for avatar.\");</script>";
            $avatar = "";

        }

        if (!filter_var($linkedin, FILTER_VALIDATE_URL)) { 
            echo "<script type='text/javascript'>alert(\"Invalid URL for LinkedIn.\");</script>";
            $linkedin = "";
        }

        if (!filter_var($github, FILTER_VALIDATE_URL)) { 
            echo "<script type='text/javascript'>alert(\"Invalid URL for GitHub.\");</script>";
            $github = "";
        }

        if (!filter_var($video, FILTER_VALIDATE_URL)) { 
            echo "<script type='text/javascript'>alert(\"Invalid URL for video.\");</script>";
            $video = "";
        }

        $email_check_query = "SELECT * FROM hopper_2 WHERE email='$email'";
        $result_email = $conn->query($email_check_query);
        $check_email = mysqli_fetch_assoc($result_email);
       
        if ($check_email) {
            if ($check_email['email'] === $email) {
                echo "<script type='text/javascript'>alert(\"Email already exists!\");</script>";
            }
        }
        
        if (($_POST["password"] === $_POST["c_password"]) && (filter_var($email, FILTER_VALIDATE_EMAIL))  && (filter_var($avatar, FILTER_VALIDATE_URL)) && (filter_var($linkedin, FILTER_VALIDATE_URL))  && (filter_var($github, FILTER_VALIDATE_URL))  && (filter_var($video, FILTER_VALIDATE_URL))) { 
            // remove c_password and '$c_password_ḩash' when pushing to database Rafael
           $sql = "INSERT INTO hopper_2 (first_name, last_name, username, linkedin, github, email, password, c_password, preferred_language, belikebill, avatar, video, quote, quote_author) 
           VALUES ('$first_name', '$last_name', '$username', '$linkedin', '$github', '$email', '$password_hash', '$c_password_ḩash', '$preferred_language', '$belikebill', '$avatar', '$video', '$quote', '$quote_author');";

           if ($result = mysqli_query($conn, $sql)) {
               header("Location: ../5.mysql/profile.php?user=$email");
           }
        }
    }

    ///////////////////// The login logic ///////////////////// 
    if (isset($_POST['login_user'])) {
        $login_email = mysqli_real_escape_string($conn, $_POST["login_email"]);
        $login_password = mysqli_real_escape_string($conn, $_POST["login_password"]);
    
        if (empty($login_email)) {
            array_push($errors, "Email is required");
        }

        if (empty($login_password)) {
            array_push($errors, "Password is required");
        }
    
        if (count($errors) == 0) {
            $login_password = md5($login_password);
            $login_query = "SELECT * FROM hopper_2 WHERE email='$login_email' AND password='$login_password'";
            $login_result = mysqli_query($conn, $login_query);
            if (mysqli_num_rows($login_result) == 1) {
            $_SESSION['login_email'] = $login_email;
            $_SESSION["success"] = "You are now logged in";
            header("Location: ./index.php");
            } else {
                array_push($errors, "Wrong email/password combination");
            }
        }
    }
?>