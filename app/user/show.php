<?php require "../partials/header.php";?>

<?php

  // The ID of the current user
  $user_id = $_GET["id"];
  $result = $connection->query("SELECT * FROM users NATURAL JOIN majors WHERE user_id=$user_id");

  while($obj = $result->fetch_object()){

?>
  <h2><?php echo $obj->first_name." ".$obj->last_name;?></h2>
  <ul>
    <li><b>Major:</b> <?php echo $obj->major_name;?></li>
    <li><b>Graduation Year:</b> <?php echo $obj->graduation_year;?></li>
  </ul>
  <br>
  <a href="edit.php?user_id=<?php echo $obj->user_id;?>">Edit <?php echo $obj->first_name;?>'s profile</a>
<?
  }
  $result->close();
?>

<?php require "../partials/footer.php";?>