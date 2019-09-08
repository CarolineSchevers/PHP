<?php
    include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling/style_register.css">
    <title>Register</title>
</head>

<body>
    <div class="register_form">
        <h1>Sign up!</h1>
        <h2>Please enter your personal info.</h2>
        <form method="POST">
            <input type="text" name="first_name" value="<?php echo $first_name ?>" placeholder="First name" required>
            <input type="text" name="last_name" value="<?php echo $last_name ?>" placeholder="Last name" required><br>
            <input type="text" name="username" value="<?php echo $username ?>" placeholder="Username" required>
            <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="c_password" placeholder="Confirm password" required><br> <!-- remove when pushing to database Rafael -->
            <select name="preferred_language" id="preferred_language" required>
                <option value="nl">Nederlands</option>
                <option value="fr">Français</option>
                <option value="gb-nir">English</option>
                <option value="de">Deutch</option>
                <option value="dz">Dzongkha</option>
            </select><br>
            <input type="text" class="link" name="avatar" value="<?php echo $avatar ?>" placeholder="Avatar link" required><br>
            <input type="text" class="link" name="linkedin"  value="<?php echo $linkedin ?>" placeholder="LinkedIn profile link" required><br>
            <input type="text" class="link" name="github" value="<?php echo $github ?>" placeholder="Github profile link" required><br>
            <input type="text" class="link" name="video" value="<?php echo $video ?>" placeholder="Video link" required><br>
            <input type="text" class="link" name="quote" value="<?php echo $quote ?>" placeholder="Quote" required><br>
            <input type="text" name="quote_author" value="<?php echo $quote_author ?>" placeholder="Quote_author" required><br>
            <input type="submit" class="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>