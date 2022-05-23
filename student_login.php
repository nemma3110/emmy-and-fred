
<?php
	session_start();
 
	require_once 'conn2.php';
 
	if(ISSET($_POST['student_login'])){
		if($_POST['email'] != "email" || $_POST['password'] != "password"){
			$email = $_POST['email'];
			$password = $_POST['password'];
			// $sql = "SELECT * FROM `admin` WHERE `username`=:username AND `password`=:password ";
			// $statement=$dsn->prepare($sql);
		
			// $statement->execute(array('username'=>$_POST['username'],
			// 	'password'=>$_POST['password']));
			// $row = $query->rowCount();
			// if($count > 0) {
			// 	$_SESSION['username'] = $_POST['username'];
			// 	header("location: index2.php");
			// } 
			// else{
				
			// 	$message='Invalid username or password';
			// }
			$query ="SELECT * FROM student WHERE email=:email AND password=:upass";
			$stmt = $pdo->prepare($query);
			$stmt->execute([':email' => $email,':upass' => $password]);
			$countRow = $stmt->rowCount();
			if ($countRow > 0) {
				 $_SESSION['email']=$_POST['email'];
				  header("location: student_search.php");
						  }
						else
						  {
							header("location:student_login.php?fail");
						  }  
		}
	}
?>


<?php require 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>

<body>

	<nav class="navbar navbar-default">
	
		<div class="container-fluid">
		
		</div>
		
	</nav>

	<div class="col-md-3"></div>
	
	<div class="col-md-6 well">
	
		<h3 class="text-primary">Student Login</h3>
		<?php if (isset($_GET['fail'])) {
			?>
			<div class="alert alert-danger">Wrong Username and password</div>
			<?php
		}
		?>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="post" action="">
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control"/>
				</div>
				
				<center><input type="submit" class="btn btn-primary" name="student_login" value="Login"><span class="glyphicon glyphicon-log-in"></span> </button></center>
				<a href="register_form.php">Register New Account</a>
			</form>
		</div>
	</div>
</body>
</form>
</html>
<?php require 'footer.php'; ?>