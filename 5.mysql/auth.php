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
<<<<<<< HEAD
   $password = $_POST['password'];
   $password_hash = md5($password);
   $c_password = $_POST['c_password'];
   $c_password_ḩash = md5($c_password);
=======
   $pwd = $_POST['pwd'];
   $pwd_hash = md5($pwd);
   $c_pwd = $_POST['c_pwd'];
   $c_pwd_ḩash = md5($c_pwd);
>>>>>>> 119c9a55bdfa6ddff202c2717a1db658ef88c8f0
   $preferred_language = $_POST['preferred_language'];
   $avatar = $_POST['avatar'];
   $video = $_POST['video'];
   $quote = $_POST['quote'];
   $quote_author = $_POST['quote_author'];
  
   if (isset($_POST['submit'])) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){  // failed email
            echo "<script type='text/javascript'>alert(\"Enter valid email.\");</script>";
        }
        
<<<<<<< HEAD
        if ($_POST["password"] !== $_POST["c_password"]) { // failed password
=======
        if ($_POST["pwd"] !== $_POST["c_pwd"]) { // failed password
>>>>>>> 119c9a55bdfa6ddff202c2717a1db658ef88c8f0
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
        
<<<<<<< HEAD
        if (($_POST["password"] === $_POST["c_password"]) && (filter_var($email, FILTER_VALIDATE_EMAIL))) { 

           $sql = "INSERT INTO hopper_2 (first_name, last_name, username, linkedin, github, email, password, c_password, preferred_language, avatar, video, quote, quote_author) 
           VALUES ('$first_name', '$last_name', '$username', '$linkedin', '$github', '$email', '$password_hash', '$c_password_ḩash', '$preferred_language', '$avatar', '$video', '$quote', '$quote_author');";
=======
        if (($_POST["pwd"] === $_POST["c_pwd"]) && (filter_var($email, FILTER_VALIDATE_EMAIL))) { 

           $sql = "INSERT INTO hopper_2 (first_name, last_name, username, linkedin, github, email, pwd, c_pwd, preferred_language, avatar, video, quote, quote_author) 
           VALUES ('$first_name', '$last_name', '$username', '$linkedin', '$github', '$email', '$pwd_hash', '$c_pwd_ḩash', '$preferred_language', '$avatar', '$video', '$quote', '$quote_author');";
>>>>>>> 119c9a55bdfa6ddff202c2717a1db658ef88c8f0

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
<<<<<<< HEAD
        $login_query = "SELECT * FROM hopper_2 WHERE email='$login_email' AND password='$login_password'";
=======
        $login_query = "SELECT * FROM hopper_2 WHERE email='$login_email' AND pwd='$login_password'";
>>>>>>> 119c9a55bdfa6ddff202c2717a1db658ef88c8f0
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