<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['email']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $regno = $_POST['regno'];
  $class = $_POST['class'];
  $phone = $_POST['phone'];
  $material = $_POST['material'];
  $price = $_POST['price'];
  $sql = 'INSERT INTO people(name, email, regno, class, phone, material, price) VALUES(:name, :email, :regno, :class, :phone, :material, :price)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':regno' => $regno, ':class' => $class, ':phone' => $phone, ':material' => $material, ':price' => $price])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header2.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add a Student</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Reg No</label>
          <input type="text" name="regno" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Class</label>
          <input type="text" name="class" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Phone</label>
          <input type="text" name="phone" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Material</label>
          <input type="text" name="material" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Price</label>
          <input type="text" name="price" id="name" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Add a Student</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
