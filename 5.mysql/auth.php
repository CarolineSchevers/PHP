<?php
session_start();
    // initializing variables
    $login_email    = "";
    $errors = array(); 

   ////////////////// The registration logic //////////////////
   include_once 'connection.php';
   $conn = openConnection();

   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $username = $_POST['username'];
   $linkedin = $_POST['linkedin'];
   $github = $_POST['github'];
   $email = $_POST['email'];
   $pwd = $_POST['pwd'];
   $pwd_hash = md5($pwd);
   $c_pwd = $_POST['c_pwd'];
   $c_pwd_ḩash = md5($c_pwd);
   $preferred_language = $_POST['preferred_language'];
   $avatar = $_POST['avatar'];
   $video = $_POST['video'];
   $quote = $_POST['quote'];
   $quote_author = $_POST['quote_author'];
  
   if (isset($_POST['submit'])) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){  // failed email
            echo "<script type='text/javascript'>alert(\"Enter valid email.\");</script>";
        }
        
        if ($_POST["pwd"] !== $_POST["c_pwd"]) { // failed password
            echo "<script type='text/javascript'>alert(\"The passwords don't match. Please try again.\");</script>";
        }

        $email_check_query = "SELECT * FROM hopper_2 WHERE email='$email'";
        $result_email = $conn->query($email_check_query);
        $check_email = mysqli_fetch_assoc($result_email);
       
        if ($check_email) {
            if ($check_email['email'] === $email) {
                echo "<script type='text/javascript'>alert(\"Email already exists!\");</script>";
            }
        }
        
        if (($_POST["pwd"] === $_POST["c_pwd"]) && (filter_var($email, FILTER_VALIDATE_EMAIL))) { 

           $sql = "INSERT INTO hopper_2 (first_name, last_name, username, linkedin, github, email, pwd, c_pwd, preferred_language, avatar, video, quote, quote_author) 
           VALUES ('$first_name', '$last_name', '$username', '$linkedin', '$github', '$email', '$pwd_hash', '$c_pwd_ḩash', '$preferred_language', '$avatar', '$video', '$quote', '$quote_author');";

           if($result = mysqli_query($conn, $sql)) {
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
        $login_query = "SELECT * FROM hopper_2 WHERE email='$login_email' AND pwd='$login_password'";
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