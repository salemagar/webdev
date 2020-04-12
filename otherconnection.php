<?php
  $servername = "localhost";
  $dataBaseName = "hawkinshall";
  $username = "root";
  $password = "";
  try{
    $otherConnection = new PDO("mysql:host=$servername;dbname=$dataBaseName", $username, $password);
    $otherConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }catch(PDOException $e){
    echo $e->getMessage();
    echo "<br> Please try again";
    die();
  }
 ?>
