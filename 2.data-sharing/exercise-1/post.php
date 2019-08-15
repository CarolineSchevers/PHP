<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data-sharing: Exercise 1</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <label for="username">Username: </label><br>
            <input type="text" id="username" name="username" placeholder="username">
            <input type="submit" value="Submit">
        </fieldset>
    </form>
    <br>
    <?php 
    if(!empty($_POST)) {
        echo "<p> Welcome, ".$_POST["username"]."!</p>"; 
    };
    ?>
</body>
</html>