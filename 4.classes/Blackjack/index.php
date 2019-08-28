<?php
    if(isset($_GET['start'])){

        header('Location: game.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blackjack - Start</title>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Acme&display=swap');
    body {
      background-image: url('images/casino.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
      padding: 0;
      color: white;
      font-family: 'Acme', sans-serif;
      line-height: 2;
    }
    form {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-size: 50px;
    }
    input {
      width: 300px;
      height: 40px;
      font-size: 30px;
      color: white;
      font-family: 'Acme', sans-serif;
      font-weight: lighter;
      background-color: #ba2d40;
      border-radius: 0.7rem;
      border: none;
    }
  </style>
</head>
<body>
  <form id="startform" action="" method="GET">
    <label for="submit">Are you ready to take your chance?</label> <br>
    <input type="submit" id="submit" name="start" value="Yes, I am!">
</form>
</body>
</html>
