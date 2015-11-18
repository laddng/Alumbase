<?php require "header.php"?>

<table>
  <tr>
    <th>Name</th>
    <th>Company</th>
    <th>Major</th>
    <th>Graduation Year</th>
    <th>Email Address</th>
  </tr>

  <?php
    /* Echo out a list of alumni */
    $result = $connection->query("SELECT * FROM users NATURAL JOIN company");
    while($obj = $result->fetch_object()){
  ?>
    <tr>
      <td><a href="/user/show.php?id=<?php echo $obj->user_id;?>"><?php echo $obj->first_name." ".$obj->last_name;?></a></td>
      <td><a href="/company/show.php?company=<?php echo $obj->company_id;?>"><?php echo $obj->company_name;?></a></td>
      <td><?php echo $obj->major;?></td>
      <td><?php echo $obj->graduation;?></td>
    </tr>
  <?php
   }
   $result->close();
  ?>
</table>  

<?php require "footer.php"?>