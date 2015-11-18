<?php require "../header.php";?>

<?php

  // The ID of the current company
  $company_id = $_GET["company"];
  $result = $connection->query("SELECT * from company where company_id=$company_id");

  while($obj = $result->fetch_object()){

?>
  <h2><?php echo $obj->company_name;?></h2>

<?
  }
  $result->close();
?>

<?php require "footer.php";?>