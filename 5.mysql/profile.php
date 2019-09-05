<?php
    include_once 'connection.php';
    include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling/style.css">
    <title>Profile</title>
</head>

<body>
    <form method='POST'>
        <button type='submit' name='login'>Log in</button>
        <button type='submit' name='logout'>Log out</button>
    </form>
    <div class="container">
        <?php
            //connecting to database
            $conn = openConnection();
            $link = $_GET['user'];

            //fetching data + display the data
            $sql = "SELECT first_name, last_name, username, linkedin, github, email, preferred_language, avatar, video, quote, quote_author FROM hopper_2 WHERE email='$link'";
            $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {  
                    $lang = strtolower($row['preferred_language']);
                    $flag = $lang.".svg";

                    echo 
                    "<div class='bill'>
                        <img src='https://belikebill.ga/billgen-API.php?default=1&name=". $row['first_name'] . "&sex=f' /> 
                    </div>
                    <div class='header'>
                        <img class='avatar' src='".$row['avatar']."'>
                        <div class='headright'>"
                        . $row['first_name'] . " " 
                        . $row['last_name'] . "<img class='flag' src='images/country-flags/svg/" . $flag . "' alt='language flag'>
                        </div>
                    </div>
                    <div class='infobox'>
                        <div> Email: " . $row['email'] . "</div>
                        <div>" . $row['video'] . "</div> 
                        <div>" . $row['quote'] . "</div>
                        <div>" . $row['quote_author'] . "</div>
                    </div>";
                }

            if($_SESSION['login_email'] === $link) {
                echo 
                "<form method='post'>
                    <button type='submit' class='profile_buttons' name='edit'>Edit</button>
                    <button type='submit' class='profile_buttons' name='delete'>Delete</button>
                </form>";
            }   
            
            if(isset($_POST['edit'])) {
                header("Location: ../5.mysql/edit.php?user=$link"); 
            }

            if(isset($_POST['delete'])) {
                // sql to delete a record
                $delete_sql = "DELETE FROM hopper_2 WHERE email='$link'";
                //If the record is deleted, go to register.php
                if ($conn->query($delete_sql) === TRUE) {
                    header("Location: ../5.mysql/register.php");
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            }
            //disconnnecting to database
            $conn->close();
        ?>
    </div>

</body>

</html>