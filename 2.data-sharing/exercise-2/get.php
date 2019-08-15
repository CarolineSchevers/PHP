<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stye.css">
    <title>Data-sharing; exercise 2</title>
</head>
<body>
    <form action="" method="get">
        <label for="rownumbers">Number of rows:</label>
        <input type="number" name="rownumbers" id="rownumbers">
        <input type="submit" value="Create table">
    </form>
    <br>

    <?php drawTable(($_GET["rownumbers"]), 2); ?>

</body>
</html>

<?php
    $rows = $_GET["rownumbers"]; // amount of tr 
    $cols = 2;                   // amount of td 
    function drawTable($rows, $cols){
    echo "<table cellpadding='3' cellspacing='0' border='1'>"; 
    
    for($tr=1; $tr <= $rows; $tr++){ 
        echo "<tr> 
            <td>".($tr)."</td>
            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, eveniet?</td>
            </tr>"; 
    };
    echo "</table>";
    };
?>