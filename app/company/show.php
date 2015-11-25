<?php require "../partials/header.php";?>

<?php

  // The ID of the current company
  $company_id = $_GET["company"];
  $result = db_select("SELECT * from companies where companies.company_id=$company_id");

  foreach ($result as $company) {
?>
  <h2><?php echo $company['company_name'];?></h2>
  <ul>
    <li><b>Location:</b> <?php echo $company['company_location'];?></li>
    <li><b>URL:</b> <a href="http://<?php echo $company['company_url'];?>"><?php echo $company['company_url'];?></a></li>
  </ul>
  <h5>Alumni Who Have Worked At <?php echo $company['company_name'];?>:</h5>
  <ul>
    <?php
      $alumni = db_select("SELECT * FROM (SELECT * FROM worked_at NATURAL JOIN users where worked_at.company_id = $company_id) as users NATURAL JOIN job_types");
      foreach ($alumni as $value){
    ?>
      <li><a href="../user/show.php?id=<?php echo $value['user_id'];?>"><?php echo $value['first_name']." ".$value['last_name'];?></a> - <?php echo $value['job_type_name'];?></li>
    <? }} ?>
  </ul>
<?php require "../partials/footer.php";?>