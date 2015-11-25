<?php

  // Connect function for DB
  function db_connect(){

    static $connection;
    if(!isset($connection)){
      $path = dirname($_SERVER['DOCUMENT_ROOT']);
      $config = parse_ini_file($path."/config.ini");

      $connection = new mysqli('localhost', $config["user"], $config["password"], $config["dbname"]);
    }
    if($connection == false){
      header("Location: ../error.html");
    }
    return $connection;

  }

  // Query function for DB
  function db_query($query){

    $connection = db_connect();
    $result = mysqli_query($connection, $query);
    return $result;

  }

  // Error function for DB
  function db_error(){
    $connection = db_connect();
    return mysqli_error($connection);
  }

  // Select function for DB
  function db_select($query){
    $connection = db_connect();
    $rows = array();
    $result = db_query($query);

    if($result == false){
      return false;
    }

    while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }

    return $rows;
  }

  // Sanitizing user inputs into DB
  function db_quote($value){
    $connection = db_connect();
    return "'".mysqli_escape_string($connection, $value)."'";
  }
?>