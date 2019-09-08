<?php
    include_once 'connection.php';

    // if(!isset($_SERVER['HTTP_REFERER'])){
    //     // redirect them to your desired location
    //     header('location:../5.mysql/login.php');
    //     exit;
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/style_index.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        td,
        th {
            width: 300px;
            text-align: center;
        }
    </style>
    <title>Index</title>
</head>

<body>
    <form method='POST'>
        <button type='submit' name='login'>Log in</button>
        <button type='submit' name='logout'>Log out</button>
    </form>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Language</th>
        </tr>
        <tr></tr>
        <?php
            $conn = openConnection();

            $sql = "SELECT id, first_name, last_name, email,preferred_language  FROM hopper_2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $lang = strtolower($row['preferred_language']);
                    $flag = $lang.".svg";
                    
                    $email = $row['email'];
                    echo 
                    "<tr> 
                        <td ><a href='profile.php?user=$email'>". $row["first_name"] ."</a></td>
                        <td>" . $row["last_name"] . "</td>
                        <td>" . $row["email"] . "</td> 
                        <td><img style='border: 1px solid' width='30px' src='images/country-flags/svg/" . $flag . "' alt='language flag'></td>
                    </tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </table>
</body>

</html>