<?php
require 'db.php';
$sql = 'SELECT * FROM people';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Welcome To IPRC Tumba Destroyed Materials Management System</h2>
    </div>
      
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
