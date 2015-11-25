<?php require "partials/header.php";?>

<a href="user/create.php">+ Add New Alum</a>
<br><br>
<table>
  <tr>
    <th>Name</th>
    <th>Company</th>
    <th>Job Position</th>
    <th>Major</th>
    <th>Graduation Year</th>
    <th>Email Address</th>
  </tr>

  <?php
    $result = db_select("SELECT * FROM users NATURAL JOIN majors");

    if($result == false){
      header("Location: error.html");
    }
    else {
      foreach ($result as $row) {
        $user_company = db_query("SELECT * FROM worked_at, companies, job_types WHERE worked_at.user_id = ".$row['user_id']." AND worked_at.company_id = companies.company_id AND worked_at.job_type_id = job_types.job_type_id AND worked_at.current_company = 1");
        $user_company = mysqli_fetch_assoc($user_company);
  ?>
    <tr>
      <td><a href="/user/show.php?id=<?php echo $row['user_id'];?>"><?php echo $row['first_name']." ".$row['last_name'];?></a></td>
      <td><a href="/company/show.php?company=<?php echo $user_company['company_id'];?>"><?php echo $user_company['company_name'];?></a></td>
      <td><?php echo $user_company['job_type_name'];?></td>
      <td><?php echo $row['major_name'];?></td>
      <td><?php echo $row['graduation_year'];?></td>
      <td><?php echo $row['email_address'];?></td>
    </tr>
  <?php }} ?>
</table>  

<?php require "partials/footer.php"?>