<?php
    include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="first_name" value="<?php echo $first_name ?>" placeholder="First name" required><br>
        <input type="text" name="last_name" value="<?php echo $last_name ?>" placeholder="Last name" required><br>
        <input type="text" name="username" value="<?php echo $username ?>" placeholder="Username" required><br>
        <input type="text" name="linkedin"  value="<?php echo $linkedin ?>" placeholder="LinkedIn profile" required><br>
        <input type="text" name="github" value="<?php echo $github ?>" placeholder="Github profile" required><br>
        <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email" required><br>
<<<<<<< HEAD
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="c_password" placeholder="Confirm password" required><br>
=======
        <input type="password" name="pwd" placeholder="Password" required><br>
        <input type="password" name="c_pwd" placeholder="Confirm password" required><br>
>>>>>>> 119c9a55bdfa6ddff202c2717a1db658ef88c8f0
        <select name="preferred_language" id="preferred_language" required>
            <option value="nl">Nederlands</option>
            <option value="fr">Français</option>
            <option value="gb-nir">English</option>
            <option value="de">Deutch</option>
            <option value="dz">Dzongkha</option>
        </select><br>
        <input type="text" name="avatar" value="<?php echo $avatar ?>" placeholder="Avatar" required><br>
        <input type="text" name="video" value="<?php echo $video ?>" placeholder="Video" required><br>
        <input type="text" name="quote" value="<?php echo $quote ?>" placeholder="Quote" required><br>
        <input type="text" name="quote_author" value="<?php echo $quote_author ?>" placeholder="Quote_author" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    
</body>
</html>