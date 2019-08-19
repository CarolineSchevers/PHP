<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
// Show +10 years
$birth = date_create($_POST["birthday"]);
$end = date('Y-m-d', strtotime('+10 years'));
$today = date('d-m-Y', strtotime('+10 years'));
$age = $end - $_POST["birthday"];

// Email without @domain
$email = $_POST["email"]; 
$parts = explode("@",$email); 
$mailName = $parts[0];

// Show uploaded file
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    $message = "";

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0) {
            if($fileSize < 5000000) {
                // $fileNameNew = uniqid('', true).".".$fileActualExt;
                //$fileDestination = '/uploads/'.$fileNameNew;
                $fileDestination = 'uploads/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                $message = "Your file is too big!";
            }
        } else {
            $message = "There was an error uploading your file!"; 
        }
    } else {
        $message = "You can't upload files of this type!"; 
    };
};

if(!empty($_POST)) {
    echo "<p>"

    .$message. "<br>
    <br>
    Welcome, future " .$_POST["username"]. "<br>
    Your name is " .$_POST["firstName"]." ".$_POST["lastName"]. "! <br>
    You were born on " .date_format($birth, "d-m-Y"). ", so today " .$today. ", you are " .$age. " years old now. <br>
    Is your email address still: " .$mailName."? <br>
    Your photo from 10 years ago: <br> 
    <img src='uploads/" .$fileName. "' width='150px'>
    </p>"; 
};

?>
</body>
</html>

