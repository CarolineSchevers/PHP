<?php
  function openConnection() {
    
    // Try to figure out what these should be for you
    $dbhost    = "localhost";
    $dbuser    = "root";
    $dbpass    = "becode";
    $db        = "becode_genk";

    // Database Raphael
    // $dbhost    = "136.144.221.129";
    // $dbuser    = "genk";
    // $dbpass    = "{)+O^O@iw!].zmjT";
    // $db        = "becode_genk";
    
    // Try to understand what happens here 
    // Make connection to the database becode_genk. If the connecton fails there will be an error.
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn->error);
    
    // Why we do this here
    return $conn;
   }
   
    // And why would we do this here ?
   function closeConnection($conn) {
       $conn->close();
   }    

   // Log in and log out
  if (isset($_POST["login"])) {
    header("Location: ../5.mysql/login.php");
  }

  if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: ../5.mysql/login.php");
  }
?>