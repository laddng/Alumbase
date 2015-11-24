<?php

  // Connect function for DB
  function db_connect(){

    static $connection;
    if(!isset($connection)){
      $config = parse_ini_file("../config.ini");

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
    
  }

?>