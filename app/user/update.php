<?php
  
  require "../partials/db_connect.php";

  // Get input variables
  $user_id = $_POST['user_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $graduation_year = $_POST['graduation_year'];
  $major_id = $_POST['major_id'];

  // Sanitize them for SQL injection/HTML chars

  // Update the record
  $result = $connection->query("UPDATE users SET first_name=$first_name,
   last_name=$last_name, graduation_year=$graduation_year, major_id=$major_id WHERE user_id=$user_id;") or die(mysql_error());

  // Exit back to user's profile
  header("Location: show.php?id=1");

?>