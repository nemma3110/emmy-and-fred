<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['regno']) && isset($_POST['class']) && isset($_POST['phone']) && isset($_POST['material'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $regno = $_POST['regno'];
  $class = $_POST['class'];
  $phone = $_POST['phone'];
  $material = $_POST['material'];
  $price = $_POST['price'];
  $sql = 'UPDATE people SET name=:name, email=:email, regno=:regno, class=:class, phone=:phone, material=:material, price=:price WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':regno' => $regno, ':class' => $class, ':phone' => $phone, ':material' => $material, ':price' => $price, ':id' => $id])) {
    header("Location: index2.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
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
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Reg No</label>
          <input value="<?= $person->regno; ?>" type="text" name="regno" id="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="name">Class</label>
          <input value="<?= $person->class; ?>" type="text" name="class" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Phone</label>
          <input value="<?= $person->phone; ?>" type="text" name="phone" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Material</label>
          <input value="<?= $person->material; ?>" type="text" name="material" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Price</label>
          <input value="<?= $person->price; ?>" type="text" name="price" id="name" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
