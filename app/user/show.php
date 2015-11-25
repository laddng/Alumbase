<?php require "../partials/header.php";?>

<?php

  $user_id = $_GET["id"];
  $result = db_query("SELECT * FROM users NATURAL JOIN majors WHERE users.user_id=".$user_id."");
  $user_info = mysqli_fetch_assoc($result);
  $work_info = db_select("SELECT * FROM worked_at, companies, job_types WHERE worked_at.user_id = ".$user_id." AND worked_at.company_id = companies.company_id AND worked_at.job_type_id = job_types.job_type_id");
?>
  <h2><?php echo $user_info['first_name']." ".$user_info['last_name'];?></h2>
  <ul>
    <li><b>Major:</b> <?php echo $user_info['major_name'];?></li>
    <li><b>Graduation Year:</b> <?php echo $user_info['graduation_year'];?></li>
    <li><b>Email Address:</b><a href="mailto:<?php echo $user_info['email_address'];?>"><?php echo $user_info['email_address'];?></a></li>
  </ul>
  <hr>
<?php
  foreach ($work_info as $work) {
?>
  <ul>
    <li><b>Name:</b> <a href="../company/show.php?company=<?php echo $work['company_id'];?>"><?php echo $work['company_name'];?></a></li>
    <li><b>Location:</b> <?php echo $work['company_location'];?></li>
    <li><b>URL:</b><a href="http://<?php echo $work['company_url'];?>"><?php echo $work['company_url'];?></a></li>
  </ul>
<? } ?>
  <a href="edit.php?user_id=<?php echo $user_info['user_id'];?>">Edit <?php echo $user_info['first_name'];?>'s profile</a>
  <a href="../company/create.php?user_id=<?php echo $user_info['user_id'];?>">Add previous work experience</a>

<?php require "../partials/footer.php";?>