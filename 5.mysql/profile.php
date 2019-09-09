<?php
    include_once 'connection.php';
    include 'auth.php';

    $link = $_GET['user'];
    $video_sql = "SELECT video FROM hopper_2 WHERE email='$link'";
    $video_result = $conn->query($video_sql);

        while($row = $video_result->fetch_assoc()) {  
            $string     = $row['video'];
            $search     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
            $replace    = "youtube.com/embed/$1";    
            $url = preg_replace($search,$replace,$string);
            // echo $url;
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling/style_profile.css">
    <title>Profile</title>
</head>

<body>
    <?php
            //connecting to database
            $conn = openConnection();
            $link = $_GET['user'];

            //fetching data + display the data
            $sql = "SELECT first_name, last_name, username, linkedin, github, email, preferred_language, belikebill, avatar, video, quote, quote_author FROM hopper_2 WHERE email='$link'";
            $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {  
                    $lang = strtolower($row['preferred_language']);
                    $flag = $lang.".svg";

                    echo 
                    "
                    <div class='profile'>
                        <div class ='avatarbox'>
                            <img class='avatar' src='".$row['avatar']."'>
                        </div>
                        <div class='personal_name'>
                            <h2>"
                                . $row['first_name'] . " " 
                                . $row['last_name'] . "
                                <img class='flag' src='images/country-flags/svg/" . $flag . "' alt='language flag'>
                            </h2><br>
                            Email: " . $row['email'] . "<br>
                            <br>
                            <div>" . $row['quote'] . "</div>
                            <div> ~ " . $row['quote_author'] . "</div>
                        </div>

                        <div class='log_buttons'>
                            <form method='POST' >
                                <button type='submit' class='log_buttons' name='login'>Log in</button>
                                <button type='submit' class='log_buttons' name='logout'>Log out</button>
                            </form>
                        </div>

                        <div class='bill'>
                            <img class='bill' src='https://belikebill.ga/billgen-API.php?default=1&name=". $row['first_name'] . "&sex=" .$row['belikebill']."' />
                        </div>
                        <div class='yt'>
                            <iframe width='500px' height='300px' src='$url'> </iframe>   
                        </div>
                    </div>";
                }

            if($_SESSION['login_email'] === $link) {
                echo 
                "<div class='profile_buttons'>
                    <form method='post'>
                        <button type='submit' name='edit'>Edit</button>
                        <button type='submit' name='delete'>Delete</button>
                    </form>
                </div>";
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

</body>

</html>