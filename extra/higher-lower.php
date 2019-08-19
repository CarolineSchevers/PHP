<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Random</title>
</head>

<body>
    <form method="post">
        <input type="number" min="1" name="number" placeholder="Please enter your number">
        <input type="submit" value="Submit">
    </form>
    <?php
session_start();

$input = $_POST['number'];

if(!isset($_SESSION['random'])){
    $_SESSION['random'] = rand(1,10);
}

if (!empty($_POST)){
    if($input < $_SESSION['random']){
        echo "higher";
    }
    else if ($input > $_SESSION['random']) {
        echo "lower";
    } else {
        echo "You are a winner!";
        unset($_SESSION['random']);
    }
}

?>
</body>

</html>