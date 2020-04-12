<?php
  $servername = "localhost";
  $dataBaseName = "trojancenter";
  $username = "root";
  $password = "";
  try{
    $connection1 = new PDO("mysql:host=$servername;dbname=$dataBaseName", $username, $password);
    $connection1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }catch(PDOException $e){
    echo $e->getMessage();
    echo "<br> Please try again";
    die();
  }
 ?>
