<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data-sharing: Exercise 1</title>
</head>
<body>
    <form action="./transfer.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" placeholder="username"><br>

            <label for="firstName">First name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="First name"><br>

            <label for="lastName">Last name:</label>
            <input type="text" id="lastName" name="lastName" placeholder="Last name"><br>

            <label for="birthday">Birthday:</label>
            <input type="date" id ="birthday" name="birthday"><br>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Email"><br>

            <label for="photo">Photo:</label>
            <input type="file" id="file" name="file"><br>

            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>
    <br>
    <?php 
        if ($done)
        {
            header("Location: http://localhost/2.data-sharing/exercise-1/transfer.php");
            exit;
        }
    ?>
</body>
</html>