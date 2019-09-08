<?php
    include_once 'connection.php';
    include 'auth.php';
    $conn = openConnection();

    $link = $_GET['user'];
    $user_sql = "SELECT first_name, last_name, username, linkedin, github, email, preferred_language, avatar, video, quote, quote_author FROM hopper_2 WHERE email='$link'";
    $user_result = $conn->query($user_sql);

        while($row = $user_result->fetch_assoc()) {  

            echo 
            "<form action='' method='POST'>
            <input type='text' name='first_name' value='" . $row['first_name'] ."' placeholder='First name' required><br>
            <input type='text' name='last_name' value='" . $row['last_name'] ."' placeholder='Last name' required><br>
            <input type='text' name='username' value='" . $row['username'] ."' placeholder='Username' required><br>
            <input type='text' name='linkedin'  value='" . $row['linkedin'] ."' placeholder='LinkedIn profile' required><br>
            <input type='text' name='github' value='" . $row['github'] ."' placeholder='Github profile' required><br>
            <select name='preferred_language' id='preferred_language' required>
                <option value='nl'>Nederlands</option>
                <option value='fr'>Français</option>
                <option value='gb-nir'>English</option>
                <option value='de'>Deutch</option>
                <option value='dz'>Dzongkha</option>
            </select><br>
            <input type='text' name='avatar' value='" . $row['avatar'] ."' placeholder='Avatar' required><br>
            <input type='text' name='video' value='" . $row['video'] ."' placeholder='Video' required><br>
            <input type='text' name='quote' value='" . $row['quote'] ."' placeholder='Quote' required><br>
            <input type='text' name='quote_author' value='" . $row['quote_author'] ."' placeholder='Quote_author' required><br>
            <input type='submit' name='edit_submit' value='Edit info!'>
        </form>";
        }

        if(isset($_POST['edit_submit'])) {
        $edit_sql = "UPDATE hopper_2 SET first_name='$first_name', last_name='$last_name', username='$username', linkedin='$linkedin', github='$github', preferred_language='$preferred_language', avatar='$avatar', video='$video', quote='$quote', quote_author='$quote_author' WHERE email='$link'";

        if ($conn->query($edit_sql) === TRUE) {
            header("Location: ../5.mysql/profile.php?user=$link");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling/style_edit.css">
    <title>Edit</title>
</head>
<body>
    
</body>
</html>